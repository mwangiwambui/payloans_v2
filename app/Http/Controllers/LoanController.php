<?php

namespace App\Http\Controllers;

use App\Models\Loan_Applications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use function PHPUnit\Framework\throwException;
use function Psy\debug;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan = Loan_Applications::all();
        return view('application_form', compact('loan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loans = Loan_Applications::all();
        return view('apply_loan', compact('loans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Request
     */
    public function store(Request $request)
    {
        $formInput= $request->except(array('country','street','city','address','gender', 'bank_statement'));

        try {
            $this->validate($request, [
                'applicant_income' => 'required',
                'loan_amount' => 'required',
                'loan_amount_term' => 'required',
                'property_area' => 'required',
                'coapplicant_id' => ['required', 'exists:users,id']
            ]);

        } catch (ValidationException $e) {
        }
        if ($files = $request->file('bank_statement')) {
            $fileName = Auth::user()->id . "." . $files->getClientOriginalExtension();
            $files->move(public_path('uploads'), $fileName);
            $formInput['bank_statement'] = "$fileName";
        }

        $response = Http::post('http://example.com/users', [
            'gender' => 'Steve',
            'married' => 'Network Administrator',
            'dependants' => 'Network Administrator',
            'education' => 'Network Administrator',
            'self_employed' => 'Network Administrator',
            'applicant_income' => 'Network Administrator',
            'coapplicant_income' => 'Network Administrator',
            'loan_amount' => 'Network Administrator',
            'loan_amount_term' => 'Network Administrator',
            'credit_history' => 'Network Administrator',
            'property_area' => 'Network Administrator',
        ]);


        $formInput['loan_amount_term'] = $request->loan_amount_term * 365;

        Auth::user()->loan_requests()->create($formInput);
        $user = User::find(Auth::user()->id);
        if($user) {
            $user->country = $request->country;
            $user->street = $request->street;
            $user->city = $request->city;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->save();
        }

        return back()->with('message','Loan request has been received');


//        Auth::user()->loan_processing()->create($request->all());
//        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loans = Loan_Applications::all();
        $borrower = User::with('loan_requests')->where('loan_status', 0)->get();
        $members = Loan_Applications::whereHas('loan_requests', function ($query) use ($id) {
            $query->where('user_id', $id);
        })->paginate(5);

        $number = 1;

        foreach ($borrower as $key => $value) {
            $borrower[$key]['number'] = $number++;
            $borrower[$key]['full_name'] = $borrower[$key]['name'];
                //$borrower[$key]['name']. ' ' . $borrower[$key]['last_name'];
            $borrower[$key]['phone_number'] = '0701229387';
            $borrower[$key]['bank_statement'] = ucwords(strtolower(User::find($borrower[$key]['id'])->loans_requests->bank_statement));
            $borrower[$key]['bank_statement'] = '<button id="verify-user" type="button" class="btn btn-xs btn-primary waves-effect waves-themed" data-toggle="modal"
                       data-target="#license_modal">View</button>';
            $borrower[$key]['actions'] =
                ($borrower[$key]['is_verified'] ?
                    "<span class='fw-300'></span> <sup class='badge badge-success fw-500'>APPROVED</sup>" :
                    '<button id="verify-user" type="button" class="btn btn-xs btn-danger waves-effect waves-themed">Approved</button>');
        }
        return view('admin.loans',compact('borrower'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
