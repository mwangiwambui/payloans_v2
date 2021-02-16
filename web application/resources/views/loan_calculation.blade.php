@extends('layouts.applayout')
@section('content')
    <body class="bg_right">
    <!-- Page Banner -->
    <section class="pagebanner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bannerTitle text-left">
                        <h2>Loan Calcualtion</h2>
                        <p>We are here to help you when you need your<br>financial support, then we are help you.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Banner -->

    <!-- Common Section -->
    <section class="commonSection calculationPage">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-12">
                    <div class="tw-stretch-element-inside-column">
                        <div class="calculationThumb">
                            <img src="{{ asset('payloan') }}images/calculation.png" alt=""/>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-12">
                    <div class="caclculationFrom">
                        <form action="#" method="post" class="row">
                            <div class="col-md-6">
                                <input type="number" step="any" name="amount" placeholder="Amount">
                            </div>
                            <div class="col-md-6">
                                <input type="number" step="any" name="install_amount" placeholder="Installment amount">
                            </div>
                            <div class="col-md-12">
                                <input type="number" step="any" name="months" placeholder="Long of months?">
                            </div>
                            <div class="col-md-12">
                                <div id="price_range"></div>
                                <div class="amount_range">
                                    <label for="amount"></label>
                                    <input type="text" id="amount">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="loanCaclculat">
                        <div class="row">
                            <div class="col-lg-5 col-md-6">
                                <div class="totalAmout">
                                    <h4>Total Amount</h4>
                                    <h2>$68,960</h2>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6">
                                <div class="instalAmout text-center">
                                    <div class="singleAmount">
                                        <h4>Installment</h4>
                                        <h3>$6985</h3>
                                    </div>
                                    <div class="singleAmount">
                                        <h4>Interest Rate</h4>
                                        <h3>$6985</h3>
                                    </div>
                                    <a href="#" class="common_btn">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Common Section -->

    </body>
@endsection
