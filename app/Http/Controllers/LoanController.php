<?php

namespace App\Http\Controllers;

use App\Models\Loan_Applications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $personal_data = $request->all(array('country','street','city','address','gender'));
        print_r ($personal_data);
        print_r($formInput);
        debug($personal_data);
        try {
            $this->validate($request, [
                'applicant_income' => 'required',
                'loan_amount' => 'required',
                'loan_amount_term' => 'required',
                'property_area' => 'required',
            ]);
        } catch (ValidationException $e) {
        }

        $image = $request->file('bank_statement');
        if ($image){
            $imageName= $image->getClientOriginalName();
            $image->move('uploads',$imageName);
            $formInput['bank_statement']= $imageName;
            $formInput['loan_amount_term'] = $request->loan_amount_term * 365;
        }
        Auth::user()->loan_processing()->create($formInput);
        $user = User::find(Auth::user()->id);
        if($user) {
            $user->country = $request->country;
            $user->street = $request->street;
            $user->city = $request->city;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->save();
        }

        return back()->with('message','Product has successfully been added');


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

    public function fileUploadPost(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);
        return back()
            ->with('success', 'You have succesfully upload file')
            ->with('file', $fileName);
    }
}
