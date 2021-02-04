<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-control" content="public">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Homepage">
    <link rel=“canonical” href="" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- OG Tags -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Homepage" />
    <meta property="og:description" content="Homepage" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="" />
    <meta name="twitter:creator" content="" />
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="">
    <!-- OG Tags end-->
    <!-- Styles -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css')}}?{{time()}}">
    <style>
        .contact-banner-form span.error, .contact-banner-form label.error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!--------------HEADER SECTION START HERE------------->
    @include('partials.header')
    <!--------------HEADER SECTION ENDS HERE-------------->

    @yield('content')

    <!-------------FOOTER SECTION START HERE---------------->
    @include('partials.footer')
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('assets/plugins/jquery-validation/additional-methods.min.js')}}"></script>
<script src="{{ asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('assets/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js')}}"></script>
@yield('scripts')
<script>
    jQuery('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = jQuery(this).attr('href');
        jQuery('#delete_customer').attr("href", url);
        jQuery('.confirm-delete-box').addClass('show');
    });
    jQuery('#cancel_delete').on('click', function (event) {
        event.preventDefault();
        jQuery('.confirm-delete-box').removeClass('show');
    });

    
</script>
</body>
</html>
