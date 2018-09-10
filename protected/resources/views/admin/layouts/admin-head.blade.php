  <head>
    <meta charset="UTF-8">
    <title> IMB Karangasem </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/icon" href="{{ URL('assets/img/icon.png') }}"/>
    <!-- Bootstrap 3.3.4 -->
    {!! Html::style('assets/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.css') !!}
    
  
       <!-- Font Awesome Icons -->
    {!! Html::style('assets/css/font-awesome.css') !!}
    <!-- Ionicons -->
   {!! Html::style('assets/css/ionicframework.css') !!}
   
    <!-- jvectormap -->
    {!! Html::style('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}
    {!! Html::style('assets/plugins/select2/select2.min.css') !!}
    
    
    
    <!-- Theme style -->
    {!! Html::style('assets/dist/css/AdminLTE.min.css') !!}
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {!! Html::style('assets/dist/css/skins/_all-skins.min.css') !!}

    {!! Html::style('assets/css/admin-style.css') !!}
    {!! Html::style('assets/css/datepicker.css') !!}
    
    <!-- data tables style -->
    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('assets/plugins/timepicker/bootstrap-timepicker.min.css') !!}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Theme style -->
    {!! Html::style('assets/css/jquery-confirm.min.css') !!}
    {!! Html::style('assets/css/style.css') !!}
    {!! Html::style('assets/plugins/bootstrap-wysihtml5/summernote.css') !!}

    <style type="text/css">
        @media (min-width: 768px) {
          .modal-xl {
            width: 90%;
           max-width:1200px;
          }
        }
    </style>
    
  </head>