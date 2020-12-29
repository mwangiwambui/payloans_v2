<!-- Preloading -->
<div class="preloader text-center">
    <div class="la-ball-circus la-2x">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- Preloading -->
<!-- Header section -->
<header class="header_1" id="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3">
                <div class="logo">
                    <a href="index.html"><img src="images/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <nav class="mainmenu MenuInRight text-right">
                    <a href="javascript:void(0);" class="mobilemenu d-md-none d-lg-none d-xl-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                    <ul>
                        <li class="menu-item-has-children">
                            <a href="#">home</a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Home 01</a></li>
                                <li><a href="index2.html">Home 02</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Services</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('services')}}">Service 01</a></li>
                                <li><a href="services2.html">Service 02</a></li>
                                <li><a href="{{route('service_details')}}">Service Details</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('about')}}">About</a></li>
                                <li><a href="404.html">404 Page</a></li>
                                <li><a href="faq.html">Faq Page</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Portfolio</a>
                                    <ul class="sub-menu">
                                        <li><a href="portfolio.html">Portfolio</a></li>
                                        <li><a href="portfolio_detail.html">Portfolio Details</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Testimonial</a>
                                    <ul class="sub-menu">
                                        <li><a href="testimonial.html">Testimonial 01</a></li>
                                        <li><a href="testimonial2.html">Testimonial 02</a></li>
                                    </ul>
                                </li>
                                <li><a href="team.html">Team Member</a></li>
                                <li><a href="{{route('application')}}">Application Form</a></li>
                                <li><a href="{{route(('loan_calculation'))}}">Loan Calculation</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li><a href="blog.html">Blog Page</a></li>
                                <li><a href="single_blog.html">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2 col-md-2 hidden-xs">
                <div class="navigator_btn btn_bg text-right">
                    <a class="common_btn" href="{{route('application')}}">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header section -->

