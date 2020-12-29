<?php

namespace App\Http\Controllers;

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


}
