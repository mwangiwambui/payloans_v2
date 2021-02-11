@extends('layouts.dashboard_layout')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Loans Portal</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
{{--    @if ((\Illuminate\Support\Facades\Auth::user()->role_id == 2)and (\Illuminate\Support\Facades\Auth::user()->role_id == 1))--}}
{{--        @isset($total_pending_apps)--}}
{{--            @isset($applications_count)--}}
        @can('isAdmin')
{{--            <h3>Admin</h3>--}}


                <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-lg-6 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3>{{isset($total_pending_apps) ? $total_pending_apps: 0}}</h3>

                                            <p>New Loan Requests</p>
                                        </div>
                                        <div class="icon">
                                            <i class="fas fa-shopping-cart"></i>
                                        </div>
                                        <a href="{{route('loans')}}" class="small-box-footer">
                                            More info <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-6 col-6">
                                    <!-- small card -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3>{{isset($applications_count) ? $applications_count : 0}}</h3>

                                            <p>Total loan requests</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="#" class="small-box-footer">
                                            More info <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
{{--    @endisset--}}
{{--    @endisset--}}
{{--    @else--}}
    @endcan
    @can('isUser')
{{--        @isset($total_client_applications)--}}

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    {{--                                <h3>{{$pending_apps}}</h3>--}}

                                    <p>Apply for a new loan</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                                <a href="{{route('application')}}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{isset($total_client_applications) ? $total_client_applications: 0}}</h3>

                                    <p>Total Applications</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ui-icon-clock"></i>
                                </div>
                                <a href="#" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
{{--        @endisset--}}
    @endcan
{{--    @endif--}}


@endsection



















