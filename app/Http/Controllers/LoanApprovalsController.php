<?php

namespace App\Http\Controllers;

use App\Models\Account_Details;
use App\Models\Guarantor;
use App\Models\Loan_Applications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            <a class="btn btn-primary btn-sm" href="' . route('loan-details', $key['id']) . '">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
            ';
            $key['loan_detail'] = '<a href="{{route(\'loan-details\',$key[\'id\'])}}"></a>';

            $key['default_bar'] = ($key['default_score'] < 50 ? '
            <div class="progress progress-sm">
                              <div id = "progress_bar" class="progress-bar bg-green" role="progressbar" aria-valuenow="' . $key['default_score'] . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $key['default_score'] . '%">
                              </div>
                          </div>
                          <small>

                         ' . $key['default_score'] . '% default
                          </small>' :
                '<div class="progress progress-sm">
                              <div id = "progress_bar" class="progress-bar bg-red" role="progressbar" aria-valuenow="' . $key['default_score'] . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $key['default_score'] . '%">
                              </div>
                          </div>
                          <small>

            ' . $key['default_score'] . '% default
                          </small>'

            );
        }

        return response()->json($borrower);
        //
    }

    public function approve_loans(Request $request, $id)
    {
//        $id = $request->id;

        Loan_Applications::where('id', $id)->update(['is_approved' => 1]);
        return back()->with('message', 'User has been verified');
    }

    public function approve_guarantor($id)
    {
//        $id = $request->id;
//        die(print_r($id));
        Guarantor::where('id', $id)->update(['approved' => 1]);
//        dd($id);
        $borrower = Guarantor::where('id', $id)->get();
//        dd($borrower[0]['tracking_number']);
        $approver_count = Guarantor::where('loan_id', $borrower[0]['loan_id'])->count();
        if ($approver_count == 3) {
            Loan_Applications::where('id', $borrower[0]['user_id'])->update(['verified' => 1]);
        }

        return view('homepage');

    }

    public function send_email_loan(Request $request)
    {
        $details = [
            'subject' => $request->subject,
            'name' => $request->name,
            'body' => $request->body,
        ];
        \Mail::to($request->email)->send(new \App\Mail\ApprovalLoans($details));

        return back()->with('message', 'Email has been sent');


    }

    public function view_my_loans(Request $request)
    {
        $id = Auth::id();
        $myloans = Loan_Applications::where('id', $id)->get();
        return view('my_loans', compact($myloans));

    }

    public function view_client_loans(Request $request, $id)
    {
        $myloans = Loan_Applications::where('user_id', $id)->get();

        $number = 1;

        foreach ($myloans as $key) {
            $key['number'] = $number++;
            $key['default_bar'] = ($key['default_score'] < 50 ? '
            <div class="progress progress-sm">
                              <div id = "progress_bar" class="progress-bar bg-green" role="progressbar" aria-valuenow="' . $key['default_score'] . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $key['default_score'] . '%">
                              </div>
                          </div>
                          <small>

                         ' . $key['default_score'] . '% default
                          </small>' :
                '<div class="progress progress-sm">
                              <div id = "progress_bar" class="progress-bar bg-red" role="progressbar" aria-valuenow="' . $key['default_score'] . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $key['default_score'] . '%">
                              </div>
                          </div>
                          <small>

            ' . $key['default_score'] . '% default
                          </small>'

            );
            $key['loan_state'] = ($key['loan_status'] == 1 ?
                '<span class="badge badge-success">Paid</span>' :
                '<span class="badge badge-warning">Pending</span>');
            $key['request_date'] = date("d M Y", strtotime($key['created_at']));
        }
        return response()->json($myloans);

    }

    public function get_all_loans(Request $request)
    {
        $all_loans = Loan_Applications::all();
        return view('all_loans', compact($all_loans));
    }
    public function get_guarantor_details(Request $request, $id){
        $guarantor_details = Guarantor::where('loan_id', $id)->get();
        $number = 1;
        foreach ($guarantor_details as $key) {
            $key['number'] = $number++;
            $key['name'] = User::where('id', $key['guarantor_id'])->get()[0]['name'];
            $key['email'] = User::where('id', $key['guarantor_id'])->get()[0]['email'];
            $key['income'] = Account_Details::where('user_id', $key['guarantor_id'])->get()[0]['total_amount'];
            $key['approved'] = ($key['approved'] == 1 ?
                '<span class="badge badge-success">Approved</span>' :
                '<span class="badge badge-warning">Pending</span>');

        }

        return response()->json($guarantor_details);
    }
}
