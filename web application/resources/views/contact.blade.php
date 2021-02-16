@extends('layouts.applayout')

@section('content')
    <body class="bg_right">
    !-- Page Banner -->
    <section class="pagebanner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bannerTitle text-left">
                        <h2>Contact Us</h2>
                        <p>We are here to help you when you need your<br>financial support, then we are help you.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Banner -->

    <!-- Common Section -->
    <section class="commonSection contactPage">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="formArea">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <form action="#" method="post" class="contactFrom row" id="contactForm">
                                    <div class="col-md-6">
                                        <input class="required" type="text" name="f_name" id="f_name"
                                               placeholder="First name*">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="required" type="text" name="l_name" id="l_name"
                                               placeholder="Last name*">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="required" type="email" name="email" id="email"
                                               placeholder="Email here*">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="required" type="text" name="phone" id="phone"
                                               placeholder="Phone*">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="required" type="text" name="address" id="address"
                                               placeholder="Address*">
                                    </div>
                                    <div class="col-md-12">
                                        <textarea class="required" name="con_message*" id="con_message"
                                                  placeholder="Text here...."></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button name="submit" type="submit" id="con_submit" class="common_btn">Send
                                            Message
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-5 col-md-5 noPaddingLeft">
                                <div class="gmap" id="gmap"></div>
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
