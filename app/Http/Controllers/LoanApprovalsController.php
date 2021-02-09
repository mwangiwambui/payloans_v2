<?php

namespace App\Http\Controllers;

use App\Models\Guarantor;
use App\Models\Loan_Applications;
use App\Models\User;
use Illuminate\Http\Request;

class LoanApprovalsController extends Controller
{
    public function view_loans()
    {
        return view('admin.loans');
    }

    public function get_loans()
    {
        $borrower = Loan_Applications::where('loan_status', 0)->get();
        $number = 1;
        foreach ($borrower as $key) {
            $key['number'] = $number++;
            $key['full_name'] = User::select('name')->where('id', $key['user_id'])->get()[0]['name'];
            //$borrower[$key]['name']. ' ' . $borrower[$key]['last_name'];
            $key['phone_number'] = '0701229387';
            $key['email'] = User::select('email')->where('id', $key['user_id'])->get()[0]['email'];
            $key['bank_st'] = '<button id="approve-loan" type="button" class="btn btn-xs btn-primary waves-effect waves-themed" data-toggle="modal"
                       data-target="#bank_statement_modal">View</button>';
//            $key['actions'] =
//                ($key['is_approved'] ?
//                    "<span class='fw-300'></span> <sup class='badge badge-success fw-500'>APPROVED</sup>" :
//                    '<button id="approve-user" type="button" class="btn btn-xs btn-danger waves-effect waves-themed">Approve</button>');
            $key['actions'] = '
            <a class="btn btn-primary btn-sm" href="'.route('loan-details',$key['user_id']).'">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
            ';
            $key['loan_detail'] = '<a href="{{route(\'loan-details\',$key[\'user_id\'])}}"></a>';
            $key['default_bar'] = ($key['default_score'] < 50 ? '
            <div class="progress progress-sm">
                              <div id = "progress_bar" class="progress-bar bg-green" role="progressbar" aria-valuenow="'.$key['default_score'].'" aria-valuemin="0" aria-valuemax="100" style="width: '.$key['default_score'].'%">
                              </div>
                          </div>
                          <small>

                         ' . $key['default_score'] . '% Default
                          </small>':
                '<div class="progress progress-sm">
                              <div id = "progress_bar" class="progress-bar bg-red" role="progressbar" aria-valuenow="'.$key['default_score'].'" aria-valuemin="0" aria-valuemax="100" style="width: '.$key['default_score'].'%">
                              </div>
                          </div>
                          <small>

            ' . $key['default_score'] . '% Default
                          </small>'

            );
        }
        return response()->json($borrower);
        //
    }

    public function approve_loans(Request $request)
    {
        $id = $request->id;
        Loan_Applications::where('id', $id)->update(['is_approved' => 1]);
        return response()->json(['ok' => true, 'msg' => $request->name . ' has been verified']);
    }

    public function approve_guarantor($id)
    {
//        $id = $request->id;
//        die(print_r($id));
        Guarantor::where('id', $id)->update(['approved' => 1]);
        $borrower = Guarantor::where('id', $id)->get();
        $approver_count = Guarantor::where('tracking_number', $borrower->tracking_number)->count();
        if ($approver_count == 3){
            Loan_Applications::where('id',$borrower->user_id)->update(['verified' => 1]);
        }

        return view('dashboard');

    }

    public function send_email_loan(Request $request)
    {
        $details = [
            'subject' => $request->subject,
            'name' => $request->name,
            'body' => $request->body,
        ];
        \Mail::to($request->email)->send(new \App\Mail\ApprovalLoans($details));
    }
}
