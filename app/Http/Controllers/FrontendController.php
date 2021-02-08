<?php

namespace App\Http\Controllers;

use App\Models\Loan_Applications;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request){
        return view('homepage');
    }

    public function application(Request $request){
        return view('application_form');
    }

    public function about(Request $request){
        return view('about');
    }

    public function blog(Request $request){
        return view('blog');
    }

    public function service_details(Request $request){
        return view('service_details');
    }
    public function services(Request $request){
        return view('services');
    }
    public function loan_calculation(Request $request){
        return view('loan_calculation');
    }
    public function loan_application(){
        $loan_application = Loan_Applications::all();
        return view('admin.applications', compact($loan_application));
    }
    public function loan_details(Request $request, Loan_Applications $loan_Applications){

        $user_details = User::where('id', $loan_Applications->user_id)->get();
//        dd($user_details[0]->id);
        return view('admin.loan_detail', compact('loan_Applications','user_details'));
    }


}
