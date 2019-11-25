
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AdminLTE 3 | Starter</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <script src="https://www.gstatic.com/firebasejs/4.6.2/firebase.js"></script>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
   @include('partials.header')

    <!-- Main Sidebar Container -->
       @include('partials.sidebar')

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
<script>

    $(document).ready(function () {

       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });

       $('.show-order').on('click', function () {

           $.ajax({
               url: "{{ route('admin.order.read') }}",
               type: 'POST',
               dataType: 'html',
               success: function (data) {

                   $('.order-notification').html(data);
               }
           })
       })

    });

</script>

@yield('script')
</body>
</html>
