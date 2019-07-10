<head>

    <!-- Basic -->
    <title> SIMETRIS IMB </title>
    @yield('title')



    <!-- Define Charset -->
    <meta charset="utf-8">

    <!-- Responsive Metatag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/icon" href="{{ URL('assets/img/icon.png') }}"/>
    

    <!-- Page Description and Author -->

    <!-- Bootstrap CSS  -->
    {!! Html::style('assets/bootstrap/css/bootstrap.min.css') !!}

    <!-- Font Awesome CSS -->
    {!! Html::style('assets/css/font-awesome-4.6.3/css/font-awesome.min.css') !!}
    {!! Html::style('assets/css/bootstrap-iconpicker.min.css') !!}

    <!-- Margo CSS Styles  -->
    {!! Html::style('assets/front/css/style.css') !!}

    <!-- Responsive CSS Styles  -->
    {!! Html::style('assets/front/css/responsive.css') !!}

    <!-- Css3 Transitions Styles  -->
    {!! Html::style('assets/front/css/animate.css') !!}

    {!! Html::style('assets/plugins/select2/select2.min.css') !!}

    <style type="text/css">
        .entry:not(:first-of-type)
        {
            margin-top: 10px;
        }

        .glyphicon
        {
            font-size: 12px;
        }
    </style>

    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/colors/red.css')}}" title="red" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/colors/jade.css')}}" title="jade" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/colors/green.css')}}" title="green" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/colors/blue.css')}}" title="blue" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/colors/beige.css')}}" title="beige" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/colors/cyan.css')}}" title="cyan" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/colors/orange.css')}}" title="orange" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/colors/peach.css')}}" title="peach" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/colors/pink.css')}}" title="pink" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/colors/purple.css')}}" title="purple" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/colors/sky-blue.css')}}" title="sky-blue" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/colors/yellow.css')}}" title="yellow" media="screen" />


    <!-- Margo JS  -->
    {!! Html::script('assets/front/js/jquery-2.1.1.min.js') !!}
    {!! Html::script('assets/front/js/jquery.migrate.js') !!}
    {!! Html::script('assets/front/js/modernizrr.js') !!}
    {!! Html::script('assets/bootstrap/js/bootstrap.min.js') !!}
    {!! Html::script('assets/front/js/jquery.fitvids.js') !!}
    {!! Html::script('assets/front/js/owl.carousel.min.js') !!}
    {!! Html::script('assets/front/js/nivo-lightbox.min.js') !!}
    {!! Html::script('assets/front/js/jquery.isotope.min.js') !!}
    {!! Html::script('assets/front/js/jquery.appear.js') !!}
    {!! Html::script('assets/front/js/count-to.js') !!}
    {!! Html::script('assets/front/js/jquery.textillate.js') !!}
    {!! Html::script('assets/front/js/jquery.lettering.js') !!}
    {!! Html::script('assets/front/js/jquery.easypiechart.min.js') !!}
    {!! Html::script('assets/front/js/jquery.nicescroll.min.js') !!}
    {!! Html::script('assets/front/js/jquery.parallax.js') !!}
    {!! Html::script('assets/front/js/mediaelement-and-player.js') !!}
    {!! Html::script('assets/front/js/script.js') !!}

    <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>