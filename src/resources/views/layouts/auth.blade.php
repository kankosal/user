<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | @yield('page_title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset(config('admin_user.theme') . '/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset(config('admin_user.theme') . '/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    
    @yield('content')

    <!-- jQuery -->
    <script src="{{ asset(config('admin_user.theme') . '/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset(config('admin_user.theme') . '/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset(config('admin_user.theme') . '/dist/js/adminlte.min.js') }}"></script>
</body>

</html>
