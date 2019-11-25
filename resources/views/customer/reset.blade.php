<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forgot Password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo" style="box-shadow: 0px 0px 5px #ccc; border-radius: 5%;">
        <a href="#"><b>Customer</b>Login</a>
    </div>

    <div>

        <p class="login-box-msg"><b>Reset Password</b></p>

        @if ($errors->has('email'))

            <div class="alert alert-danger" role="alert">
                {{ $errors->first('email') }}
            </div>

        @endif

        @if ($errors->has('password'))

            <div class="alert alert-danger" role="alert">
                {{ $errors->first('password') }}
            </div>

        @endif

        <form action="{{ route('customer.password.update') }}" method="POST">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group has-{{ $errors->has('password') ? 'error' : 'feedback' }}">
                <input type="password" id="password" class="form-control" name="email"
                       required placeholder="Password">
                <span class="fa fa-envelope-o form-control-feedback"></span>
            </div>

            <div class="form-group">
                <input type="password" id="password_confirm" class="form-control" name="password_confirmation"
                       required placeholder="Password Confirmation">
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-warning btn-block btn-flat">Reset Password</button>
                    </div>
                </div>
            </div>

        </form>

    </div>


</div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

</body>
</html>
