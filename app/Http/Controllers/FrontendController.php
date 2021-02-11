<?php

namespace App\Http\Controllers;

use App\Models\Guarantor;
use App\Models\Loan_Applications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function admin_dashboard(){
        $applications_count = DB::table('loan__applications')->count();
//        die($applications_count);
//        $applications_count = $total_application->count();

        $total_pending_apps = Loan_Applications::where('is_approved', 0)->count();
//        $total_pending_apps = $pending_apps->count();

        $total_client_applications = Loan_Applications::where('user_id', Auth::id())->count();
//        $total_client_applications = $client_applications->count();

        return view('starter', compact($applications_count, $total_pending_apps, $total_client_applications));
    }
    public function loan_application(){
        $loan_application = Loan_Applications::all();
        return view('admin.applications', compact($loan_application));
    }
    public function loan_details(Request $request, Loan_Applications $loan_Applications){

        $user_details = User::where('id', $loan_Applications->user_id)->get();

        return view('admin.loan_detail', compact('loan_Applications','user_details'));
    }


}
