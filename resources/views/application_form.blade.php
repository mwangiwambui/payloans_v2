@extends('layouts.dashboard_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Loan Application</h1>
                        <p>Please fill in all needed information in the loan application form below to request a loan from your organization. Information regarding income assets are requested for qualification. </p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Apply Loan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                @if($success = Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{session('message')}}
                    </div>
                @endif
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach

                @endif
                <form method="POST" action="{{route('loans.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Personal Details</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Are you married?</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="married1" name="married" value="Yes">
                                        <label for="married1" class="custom-control-label">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="married2" name="married" value="No">
                                        <label for="married2" class="custom-control-label">No</label>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Have you graduated?</label>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="education1" name="education" value="Graduate">
                                        <label for="education1" class="custom-control-label">Yes</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input class="custom-control-input" type="radio" id="education2" name="education" value="Not Graduate">
                                        <label for="education2" class="custom-control-label">No</label>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>No of dependants</label>
                                    <select class="form-control select2" name="dependants" style="width: 100%;">
                                        <option selected="selected" value="0">None</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3+">3 or more</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Area where you live</label>
                                    <select class="form-control select2" name="property_area" style="width: 100%;">
                                        <option>Urban</option>
                                        <option value="Semiurban">Semi-Urban</option>
                                        <option>Rural</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="gender1" name="gender" value="Male">
                                    <label for="gender1" class="custom-control-label">Male</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="gender2" name="gender" value="Female">
                                    <label for="gender2" class="custom-control-label">Female</label>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <h5>Home Information</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control select2" name="country" style="width: 100%;">
                                        <option selected="selected">Kenya</option>
                                        <option>Uganda</option>
                                        <option>Tanzania</option>
                                        <option>Rwanda</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" placeholder="Enter City">
                                </div>

                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Street Address</label>
                                    <input type="text" class="form-control" name="street" placeholder="Enter Street ..">
                                </div>
                                <div class="form-group">
                                    <label>Postal / Zip Code</label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter Address ..">
                                </div>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Employment Details</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Job Title</label>
                                    <input type="text" class="form-control" name="job_title" placeholder="Enter Job Title">
                                </div>
                                <!-- /.form-group -->
                                <div class="form-group">
                                    <label>Employer Name</label>
                                    <input type="text" class="form-control" name="employer_name" placeholder="Enter Employer ....">
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Are you self-employed</label>
                                    <div class="custom-control custom-radio">
                                        <div class="col-6">
                                        <input class="custom-control-input" type="radio" id="selfemployed1" name="self_employed" value="Yes">
                                        <label for="selfemployed1" class="custom-control-label">Yes</label>
{{--                                    </div>--}}
                                        </div>
                                        <div class="col-6">
{{--                                    <div class="custom-control custom-radio">--}}
                                        <input class="custom-control-input" type="radio" id="selfemployed2" name="self_employed" value="No">
                                        <label for="selfemployed2" class="custom-control-label">No</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.form-group -->
{{--                                <div class="form-group">--}}
{{--                                    <label>Enter Monthly Income</label>--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text">Ksh.</span>--}}
{{--                                        </div>--}}
{{--                                        <input type="number" name="applicant_income" class="form-control">--}}
{{--                                        <div class="input-group-append">--}}
{{--                                            <span class="input-group-text">.00</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <!-- /.form-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label for="exampleInputFile">Upload bank statements for the last three months</label>
                                <div class="custom-file">
                                    <input type="file" name="bank_statement" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->
                        <hr>
                        <h5>Guarantor Details</h5>
                        <p>Kindly key in your guarantors in order of priority</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Co-applicant Sacco id</label>
                                    <div class="input-group">
                                        <input type="number" name="coapplicant_id" class="form-control">
                                    </div>
                                </div>

                            </div>
{{--                            <!-- /.col -->--}}
{{--                            <div class="col-md-6">--}}
{{--                                <!-- /.form-group -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Co-applicant income</label>--}}
{{--                                    <input type="number" class="form-control" name="coapplicant_income" placeholder="Enter Co-applicant income ....">--}}
{{--                                </div>--}}
{{--                                <!-- /.form-group -->--}}
{{--                            </div>--}}
{{--                            <!-- /.col -->--}}
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Second Co-applicant Sacco id</label>
                                    <div class="input-group">
                                        <input type="number" name="coapplicant_id_2" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <!-- /.col -->
{{--                            <div class="col-md-6">--}}
{{--                                <!-- /.form-group -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Co-applicant income</label>--}}
{{--                                    <input type="number" class="form-control" name="coapplicant_income_2" placeholder="Enter Co-applicant income ....">--}}
{{--                                </div>--}}
{{--                                <!-- /.form-group -->--}}
{{--                            </div>--}}
                            <!-- /.col -->
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Third Co-applicant Sacco id</label>
                                    <div class="input-group">
                                        <input type="number" name="coapplicant_id_3" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <!-- /.col -->
{{--                            <div class="col-md-6">--}}
{{--                                <!-- /.form-group -->--}}
{{--                                <div class="form-group">--}}
{{--                                    <label>Co-applicant income</label>--}}
{{--                                    <input type="number" class="form-control" name="coapplicant_income_3" placeholder="Enter Co-applicant income ....">--}}
{{--                                </div>--}}
{{--                                <!-- /.form-group -->--}}
{{--                            </div>--}}
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- /.row -->
                        <hr>
                        <h5>Loan Specific Details</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Loan Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Ksh.</span>
                                        </div>
                                        <input type="number" name="loan_amount" class="form-control">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Loan Amount Term in years</label>
                                    <input type="number" class="form-control" name="loan_amount_term" placeholder="Enter Number of years">
                                </div>

                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
                <!-- /.card -->


                </form>


            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


@endsection
