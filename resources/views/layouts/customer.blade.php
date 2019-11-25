<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>AdminLTE 3 | Starter</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase.js"></script>
    <link rel="manifest" href="{{ asset('manifest.json') }}">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('partials.customer_header')
@include('partials.customer_sidebar')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <br>
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/firebase.js') }}"></script>
@yield('script')
</body>
</html>
