<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SITASI STIKI Indonesia</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="shortcut icon" type="image/icon" href="{{ URL('assets/img/icon.png') }}"/>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>

        .colorgraph {
          height: 5px;
          border-top: 0;
          background: #c4e17f;
          border-radius: 5px;
          background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
          background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
          background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
          background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
        }
        .caption-slide h3{
            background: #000000;
            opacity: 0.8;
            margin-bottom: 10px !important;
            padding: 20px;
        }
        .caption-slide p{
            background: #000000;
            opacity: 0.8;
            margin-bottom: 65px !important;
            padding: 20px;
        }
        .fa-btn {
            margin-right: 6px;
        }
        .navbar-inverse{
            background: #000000 !important;
            padding: 0px 20px 7px 20px;
        }
        .navbar-inverse li{
            padding-top: 7px;
        }
        .navbar{
            margin-bottom: 0px !important;
        }
        body
        {
            position: relative;
            /*padding-top: 64px;*/
            background: #fafafa;
        }
        #myCarousel .nav a small
        {
            display: block;
        }
        #myCarousel .nav
        {
            background: #eee;
        }
        .nav-justified > li > a
        {
            border-radius: 0px;
        }
        #font-pills a{
            color: #000;
        }
        #font-pills a:hover, #font-pills a:active{
            font-weight: bold;
        }
        .nav-pills>li[data-slide-to="0"].active a { background-color: #000000; color: #fff !important; }
        .nav-pills>li[data-slide-to="1"].active a { background-color: #e67e22; color: #fff !important; }
        .nav-pills>li[data-slide-to="2"].active a { background-color: #9B0000; color: #fff !important; }
        .nav-pills>li[data-slide-to="3"].active a { background-color: #8e44ad; color: #fff !important; }

        .bs-footer {
            padding-top: 40px;
            padding-bottom: 30px;
            /*margin-top: 100px;*/
            color: #777;
            text-align: center;
            border-top: 1px solid #e5e5e5;
        }
        .footer-links {
            margin: 10px 0;
            padding-left: 0;
        }
        .footer-links li {
            display: inline;
            padding: 0 2px;
        }
        .footer-links li:first-child {
            padding-left: 0;
        }
        @media (min-width: 768px) {
            .bs-footer {
                text-align: left;
            }
            .bs-footer p {
                margin-bottom: 0;
            }

        }

        @media (max-width: 800px) {
            .caption-slide h3{
                background: #000000;
                opacity: 0.8;
                margin-bottom: 10px !important;
                padding: 20px;
                font-size: 14px;
            }
            .caption-slide p{
                background: #000000;
                opacity: 0.8;
                margin-bottom: -20px !important;
                padding: 20px;
                font-size: 10px;
            }
        }


        @media (max-width: 360px) {
            .caption-slide h3{
                background: #000000;
                opacity: 0.8;
                margin-bottom: 10px !important;
                padding: 20px;
                font-size: 12px;
            }
            .caption-slide p{
                background: #000000;
                opacity: 0.8;
                margin-bottom: -50px !important;
                padding: 20px;
                font-size: 8px;
            }
        }

        .bs-callout {
            padding: 20px;
            margin: 0px 0;
            border: 1px solid #eee;
            border-left-width: 5px;
            border-radius: 3px;
        }
        .bs-callout h4 {
            margin-top: 0;
            margin-bottom: 5px;
        }
        .bs-callout p:last-child {
            margin-bottom: 0;
        }
        .bs-callout code {
            border-radius: 3px;
        }
        .bs-callout+.bs-callout {
            margin-top: -5px;
        }
        .bs-callout-default {
            border-left-color: #777;
        }
        .bs-callout-default h4 {
            color: #777;
        }
        .bs-callout-primary {
            border-left-color: #428bca;
        }
        .bs-callout-primary h4 {
            color: #428bca;
        }
        .bs-callout-success {
            border-left-color: #5cb85c;
        }
        .bs-callout-success h4 {
            color: #5cb85c;
        }
        .bs-callout-danger {
            border-left-color: #d9534f;
        }
        .bs-callout-danger h4 {
            color: #d9534f;
        }
        .bs-callout-warning {
            border-left-color: #f0ad4e;
        }
        .bs-callout-warning h4 {
            color: #f0ad4e;
        }
        .bs-callout-info {
            border-left-color: #5bc0de;
        }
        .bs-callout-info h4 {
            color: #5bc0de;
        }

        #login { 
           /*background:url(assets/img/logointesis.png) no-repeat center center fixed ; */
           background: #E1F5FE;
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: 100% 100%;
          color:#000000;
          padding-bottom: 10px;
        }
        .scrollup:focus{
            outline: none !important;
            color: #000;
        }
        .scrollup:hover{
            color: #9b0000;
        }
        .scrollup {
            width: 40px;
            height: 40px;
            position: fixed;
            bottom: 50px;
            right: 10px;
            display: none;
            /*text-indent: -9999px;*/
            /*background: url(assets/img/back_to_top.png);*/
            font-size: 30px;
            /*background-color: #000;*/
            color: #000;
        }
        
        /* LOader*/

        #loader {
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: #fff;
          z-index: 9999999999;
        }

        .spinner {
          position: absolute;
          width: 40px;
          height: 40px;
          top: 50%;
          left: 53%;
          margin-left: -40px;
          margin-top: -40px;
          -webkit-animation: rotatee 2.0s infinite linear;
          animation: rotatee 2.0s infinite linear;
        }
        .dot1, .dot2 {
            background-color: #F22613;
        }
        .dot1, .dot2 {
          width: 60%;
          height: 60%;
          display: inline-block;
          position: absolute;
          top: 0;
          border-radius: 100%;
          -webkit-animation: bouncee 2.0s infinite ease-in-out;
          animation: bouncee 2.0s infinite ease-in-out;
        }

        .dot2 {
          top: auto;
          bottom: 0px;
          -webkit-animation-delay: -1.0s;
          animation-delay: -1.0s;
        }

        @-webkit-keyframes rotatee { 100% { -webkit-transform: rotate(360deg) }}
        @keyframes rotatee {
          100% {
            transform: rotate(360deg);
                -webkit-transform: rotate(360deg);
            }
        }

        @-webkit-keyframes bouncee {
          0%, 100% { -webkit-transform: scale(0.0) }
          50% { -webkit-transform: scale(1.0) }
        }

        @keyframes bouncee {
          0%, 100% {
            transform: scale(0.0);
                -webkit-transform: scale(0.0);
            } 50% {
                transform: scale(1.0);
                -webkit-transform: scale(1.0);
              }
        }

        #menuli{
            color: #ffffff;
        }

        #menuli:hover{
            color: #ecf0f1;
        }
        .btn-outline {
            background-color: transparent;
            color: inherit;
            transition: all .5s;
        }

        .btn-primary.btn-outline {
            color: #428bca;
        }

        .btn-success.btn-outline {
            color: #5cb85c;
        }

        .btn-info.btn-outline {
            color: #5bc0de;
        }

        .btn-warning.btn-outline {
            color: #f0ad4e;
        }

        .btn-danger.btn-outline {
            color: #d9534f;
        }

        .btn-primary.btn-outline:hover,
        .btn-success.btn-outline:hover,
        .btn-info.btn-outline:hover,
        .btn-warning.btn-outline:hover,
        .btn-danger.btn-outline:hover {
            color: #fff;
        }
        /* LOader*/
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{URL('assets/img/logostiki.png')}}" class="img-responsive pull-right" alt="Responsive image">
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}" id="menuli"><span class="fa fa-home"></span> Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}" id="menuli"><span class="fa fa-sign-in"></span> Login</a></li>
                        <!-- <li><a href="{{ url('/register') }}" id="menuli"><span class="fa fa-user-plus"></span> Register</a></li> -->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-home"></i>Halaman {{ Session::get('namePermission') }}</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')



<a href="#" class="scrollup"><b><i class="fa fa-angle-double-up fa-lg"></i></b></a>

<footer class="bs-footer" role="contentinfo">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                   <img src="{{ URL('assets/img/logo_stiki_bw.jpg') }}" class="img-responsive pull-left" alt="Responsive image" style="padding-right: 2%;"> 
                 <div align="justify" style="padding-left:2%; ">
SITASI merupakan sistem yang dapat melakukan pengajuan Penelitian, Pengabdian Dosen dan membantu proses yang terlibat didalamnya seperti progres pengajuan, mengelola data pengajuan, dll. sistem ini dibuat dengan tujuan meringankan pekerjaan ketua LPPM, mencegah hilangnya file karena virus atau bencana alam, dengan menggunakan tempat penyimpanan yang lebih terstruktur dan efektif seperti database, memperkecil kesalahan dalam penulisan nama dosen, dll.
<p align="center"> All Rights Reserved &copy; 2018 | <a href="http://adipancaiskandar.com" target="_blank">STIKI Indonesia</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>



<div id="loader">
  <div class="spinner">
    <div class="dot1"></div>
    <div class="dot2"></div>
  </div>
</div>


    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    {!! Html::script('assets/js/jquery.nicescroll.min.js') !!}
    <script type="text/javascript">

        $(window).load(function() {
                $('#loader').delay(1000).fadeOut(500);
        });
        
        $(document).ready( function() {

            $('#myCarousel').carousel({
                interval:   4000,
                autoplay:false
            });

            $("html").niceScroll({
                scrollspeed: 100,
                mousescrollstep: 38,
                cursorwidth: 5,
                cursorborder: 0,
                cursorcolor: '#9b0000',
                autohidemode: true,
                zindex: 999999999,
                horizrailenabled: false,
                cursorborderradius: 0,
            });
            
            var clickEvent = false;
            $('#myCarousel').on('click', '.nav a', function() {
                    clickEvent = true;
                    $('#slidepills li').removeClass('active');
                    $(this).parent().addClass('active');        
            }).on('slid.bs.carousel', function(e) {
                if(!clickEvent) {
                    var count = $('#slidepills').children().length -1;
                    var current = $('#slidepills li.active');
                    current.removeClass('active').next().addClass('active');
                    var id = parseInt(current.data('slide-to'));
                    // console.log(current);
                    if(count == id) {
                        $('#font-pills').first().addClass('active'); 
                        // console.log(id+" "+count);   
                    }
                }
                clickEvent = false;
            });
            $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                    $('.scrollup').fadeIn();
                } else {
                    $('.scrollup').fadeOut();
                }
            });

            $('.scrollup').click(function () {
                $("html, body").animate({
                    scrollTop: 0
                }, 600);
                return false;
            });

            $(function () {
                $('.button-checkbox').each(function () {

                    // Settings
                    var $widget = $(this),
                        $button = $widget.find('button'),
                        $checkbox = $widget.find('input:checkbox'),
                        color = $button.data('color'),
                        settings = {
                            on: {
                                icon: 'glyphicon glyphicon-check'
                            },
                            off: {
                                icon: 'glyphicon glyphicon-unchecked'
                            }
                        };

                    // Event Handlers
                    $button.on('click', function () {
                        $checkbox.prop('checked', !$checkbox.is(':checked'));
                        $checkbox.triggerHandler('change');
                        updateDisplay();
                    });
                    $checkbox.on('change', function () {
                        updateDisplay();
                    });

                    // Actions
                    function updateDisplay() {
                        var isChecked = $checkbox.is(':checked');

                        // Set the button's state
                        $button.data('state', (isChecked) ? "on" : "off");

                        // Set the button's icon
                        $button.find('.state-icon')
                            .removeClass()
                            .addClass('state-icon ' + settings[$button.data('state')].icon);

                        // Update the button's color
                        if (isChecked) {
                            $button
                                .removeClass('btn-default')
                                .addClass('btn-' + color + ' active');
                        }
                        else {
                            $button
                                .removeClass('btn-' + color + ' active')
                                .addClass('btn-default');
                        }
                    }

                    // Initialization
                    function init() {

                        updateDisplay();

                        // Inject the icon if applicable
                        if ($button.find('.state-icon').length == 0) {
                            $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i>');
                        }
                    }
                    init();
                });
            });


        }); //end doc ready
    </script>

</body>
</html>
