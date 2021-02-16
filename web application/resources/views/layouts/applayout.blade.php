<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payloan - Banking & Business Loan HTML5 Responsive Template</title>
    <meta charset="UTF-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include All CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('payloan') }}/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('payloan') }}/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('payloan') }}/css/payloan-icon.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('payloan') }}/css/icofont.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('payloan') }}/css/animate.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('payloan') }}/css/settings.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('payloan') }}/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('payloan') }}//css/owl.theme.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('payloan') }}/css/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('payloan') }}/css/preset.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('payloan') }}/css/theme.css"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('payloan') }}/css/responsive.css"/>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{ asset('payloan') }}/images/favicon.png">
</head>
<body>
@include('layouts.header')
@yield('content')

@include('layouts.footer')
</body>
<!-- Include All JS -->
<script src="{{ asset('payloan') }}/js/jquery.js"></script>
<script src="{{ asset('payloan') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('payloan') }}/js/jquery.themepunch.revolution.min.js"></script>
<script src="{{ asset('payloan') }}/js/jquery.themepunch.tools.min.js"></script>
<script src="{{ asset('payloan') }}/js/jquery-ui.js"></script>
<script src="{{ asset('payloan') }}/js/shuffle.js"></script>
<script src="{{ asset('payloan') }}/js/slick.js"></script>
<script src="{{ asset('payloan') }}/js/gmaps.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCysDHE3s4Qw3nTh9o58-2mJcqvR6HV8Kk"></script>
<script src="{{ asset('payloan') }}/js/owl.carousel.js"></script>
<script src="{{ asset('payloan') }}/js/theme.js"></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

<script>
    $(document).ready(function(){

        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;
        var current = 1;
        var steps = $("fieldset").length;

        setProgressBar(current);

        $(".next").click(function(){

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

//Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
            next_fs.show();
//hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
// for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    next_fs.css({'opacity': opacity});
                },
                duration: 500
            });
            setProgressBar(++current);
        });

        $(".previous").click(function(){

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

//Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
            previous_fs.show();

//hide the current fieldset with style
            current_fs.animate({opacity: 0}, {
                step: function(now) {
// for making fielset appear animation
                    opacity = 1 - now;

                    current_fs.css({
                        'display': 'none',
                        'position': 'relative'
                    });
                    previous_fs.css({'opacity': opacity});
                },
                duration: 500
            });
            setProgressBar(--current);
        });

        function setProgressBar(curStep){
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width",percent+"%")
        }

        $(".submit").click(function(){
            return false;
        })

    });
</script>
@stack('backend-scripts')

<script>
    function isEmpty(value){
        return (value == null || value.length === 0);
    }
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 100,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>

</body>
</html>
