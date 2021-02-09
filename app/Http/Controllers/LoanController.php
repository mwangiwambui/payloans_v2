<?php

namespace App\Http\Controllers;

use App\Models\Guarantor;
use App\Models\Loan_Applications;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

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
        $formInput = $request->except(array('country', 'street', 'city', 'address', 'gender', 'bank_statement', 'coapplicant_id_2', 'coapplicant_id_3', 'coapplicant_income_2', 'coapplicant_income_3'));
//        die(print_r($formInput));

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
        User::find(Auth::user()->id);
        $formInput['loan_amount_term'] = $request->loan_amount_term * 365;
        $credit_history = Loan_Applications::where('user_id', Auth::user()->id);
        if ($credit_history)
            $formInput['credit_history'] = 1;
        else
            $formInput['credit_history'] = 0;

        $tracking_date = Carbon::now()->timestamp;
//        dd($date);php
        $guarantor = new Guarantor;
        $guarantor->user_id = Auth::user()->id;
        $guarantor->guarantor_id = $request->coapplicant_id;
        $guarantor->tracking_number = $tracking_date;
        $guarantor->save();
        $first_guarantor = $guarantor->id;
//        dd($first_guarantor);

        $guarantor2 = new Guarantor;
        $guarantor2->user_id = Auth::user()->id;
        $guarantor2->guarantor_id = $request->coapplicant_id_2;
        $guarantor2->tracking_number = $tracking_date;
        $guarantor2->save();
        $second_guarantor = $guarantor2->id;
//        dd($second_guarantor);

        $guarantor3 = new Guarantor;
        $guarantor3->user_id = Auth::user()->id;
        $guarantor3->guarantor_id = $request->coapplicant_id_3;
        $guarantor3->tracking_number = $tracking_date;
        $guarantor3->save();
        $third_guarantor = $guarantor3->id;
//        dd($third_guarantor);


        $response = Http::post('http://127.0.0.1:5000/predict', [
            'Gender' => $request->gender,
            'Married' => $request->married,
            'Dependants' => $request->dependants,
            'Education' => $request->education,
            'Self_Employed' => $request->self_employed,
            'ApplicantIncome' => (int)$request->applicant_income,
            'CoapplicantIncome' => (int)$request->coapplicant_income,
            'LoanAmount' => (int)$request->loan_amount,
            'Loan_Amount_Term' => (int)$request->loan_amount_term * 365,
            'Credit_History' => (int)$formInput['credit_history'],
            'Property_Area' => $request->property_area,
        ]);


//        print($response->body());
        $ml_result = json_decode($response->body(), TRUE);
//        $ml_result = $response->body();
        $formInput['default_score'] = $ml_result['default_score'];


        Auth::user()->loan_requests()->create($formInput);
        $user = User::find(Auth::user()->id);
        if ($user) {
            $user->country = $request->country;
            $user->street = $request->street;
            $user->city = $request->city;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->save();
        }
//First coapplicant email
        $details = [
            'name' => User::where('id', $request->coapplicant_id)->get('name'),
            'requestor' => User::where('id', Auth::user()->id)->get('name'),
            'id' => $first_guarantor
        ];

        \Mail::to(User::where('id', $request->coapplicant_id)->get('email'))->send(new \App\Mail\Gmail($details));

        //Second coapplicant email
        $details = [
            'name' => User::where('id', $request->coapplicant_id_2)->get('name'),
            'requestor' => User::where('id', Auth::user()->id)->get('name'),
            'id' => $second_guarantor
        ];

        \Mail::to(User::where('id', $request->coapplicant_id_2)->get('email'))->send(new \App\Mail\Gmail($details));

        //Third coapplicant email
        $details = [
            'name' => User::where('id', $request->coapplicant_id_3)->get('name'),
            'requestor' => User::where('id', Auth::user()->id)->get('name'),
            'id' => $third_guarantor
        ];

        \Mail::to(User::where('id', $request->coapplicant_id_3)->get('email'))->send(new \App\Mail\Gmail($details));

        return back()->with('message', 'Loan request has been received');


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
        return view('admin.loans', compact('borrower'));
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
