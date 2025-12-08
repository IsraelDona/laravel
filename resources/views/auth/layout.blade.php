<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - MLD Bénin</title>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('adminLTE/css/adminlte.min.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">

    <style>
        body {
            background: linear-gradient(135deg, #c7caceff, #e9f3f6ff);
        }
        .login-box, .register-box {
            width: 420px;
        }
        .card {
            border-radius: 12px;
        }
        .register-logo b, .login-logo b {
            font-size: 32px;
        }
    </style>
</head>

<body class="hold-transition login-page">

    @yield('content')

    <script src="{{ asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminLTE/js/adminlte.min.js') }}"></script>

</body>
</html>
