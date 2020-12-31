@extends('layouts.dashboard_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Loan Approval</h1>
                        <p>Please approve the users and recommend the way forward for the applications. </p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Approve Loans</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <ol class="breadcrumb page-breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">{{ config('app.name', 'Tribore Health') }}</a></li>
                    <li class="breadcrumb-item">Manage Doctors</li>
                    <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
                </ol>
                <div class="subheader">
                    <h1 class="subheader-title">
                        <i class='subheader-icon fal fa-hospital-user'></i> Manage Doctors <span class='fw-300'></span> <sup class='badge badge-primary fw-500'>WIP</sup>
                        {{--            <small>--}}
                        {{--                Insert page description or punch line--}}
                        {{--            </small>--}}
                    </h1>

                </div>
                <!-- Your main content goes below here: -->

                <div class="row">
                    <div class="col-12">
                        <div id="panel-1" class="panel">
                            <div class="panel-hdr">
                                <h2>
                                    VIEW APPLICANTS
                                </h2>
                                <div class="panel-toolbar">
                                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                </div>
                            </div>
                            <div class="panel-container show">
                                <div class="panel-content">
                                    <div class="frame-wrap">
                                        <table id="members_loans" class="table m-0" width="100%">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Loan Amount</th>
                                                <th>Bank Statements</th>
                                                <th>Loan Predictions</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->




@endsection
@push('backend-scripts')
    <script>
        $(()=>{
            const members_loans = $('#members_loans');
            const d_table = members_loans.DataTable({
                'ajax': {
                    url: "{{ route('backend.get.loans') }}",
                    dataSrc: ''
                },
                columns: [
                    {data: 'number'},
                    {data: 'full_name'},
                    {data: 'phone_number'},
                    {data: 'email'},
                    {data: 'license_no'},
                    {data: 'hospital_name'},
                ]
            });
            console.log(d_table);
            {{--const doctors_datatable = doctors_table.DataTable({--}}
            {{--    ajax: {--}}
            {{--        url: "{{ route('backend.get.doctors') }}",--}}
            {{--        dataType:'json',--}}
            {{--        dataSrc: ''--}}
            {{--    },--}}
            {{--    columns: [--}}
            {{--        {data: 'number'},--}}
            {{--        {data: 'full_name'},--}}
            {{--        {data: 'phone_number'},--}}
            {{--        {data: 'email'},--}}
            {{--        {data: 'license_no'},--}}
            {{--        {data: 'license_doc'},--}}
            {{--        {data: 'hospital_name'},--}}
            {{--        {data: 'actionss'},--}}
            {{--    ]--}}
            {{--});--}}
        })
    </script>
@endpush
