<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>attendance login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="icon" href="images/ticon.png" type="image/icon type">

  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="{{ asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('public/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('public/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('public/dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('public/plugins/iCheck/square/blue.css') }}">

  <link rel="stylesheet" href="{{ asset('public/bower_components/select2/dist/css/select2.min.css') }}">



  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Attendance System</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="POST" action="{{ route('login') }}">

                        @csrf

                @if (Session::has('message'))
                  <div class="alert alert-danger text-center">
                  <strong>Oops! </strong> {{ Session::get('message') }}
                  </div>
                @endif

      <div class="form-group has-feedback">

        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="E-Mail Address">

        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

        @error('email')
            <span class="invalid-feedback text-danger" role="alert">
                {{ $message }}
            </span>
        @enderror

      </div>

      <div class="form-group has-feedback">

        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

        @error('password')
            <span class="invalid-feedback" role="alert">
                {{ $message }}
            </span>
        @enderror

      </div>

     
      <div class="row">

        <div class="col-xs-12">

         <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

        </div>

      </div>

    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="{{ asset('public/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('public/plugins/iCheck/icheck.min.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="{{ asset('public/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script>
  $('.select2').select2()
</script>

</body>
</html>
