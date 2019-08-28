<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BeOne commercial</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="panel/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="panel/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="panel/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="panel/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="panel/vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="panel/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="{{route('admin_panel')}}">
                        BEONE TV
                    </a>
                </div>
                <div class="login-form">
                  <form method="POST" action="{{ route('login') }}">
                      @csrf
                        <div class="form-group">
                            <label>Email address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Se Connecter</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="panel/vendors/jquery/dist/jquery.min.js"></script>
    <script src="panel/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="panel/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="panel/assets/js/main.js"></script>


</body>

</html>
