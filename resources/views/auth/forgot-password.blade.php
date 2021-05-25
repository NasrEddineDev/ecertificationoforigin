<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Password Recevery | Kiaalap - Kiaalap Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('') }}img/caci-favicon.ico" />
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center ps-recovered">
				<h3>PASSWORD RECOVER</h3>
				<p>Please fill the form to recover your password</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body poss-recover">
                        <p>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</p>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="email" class="form-control" placeholder="example@gmail.com" title="Please enter you email adress" required name="email" id="email" value="{{old('email')}}" autofocus>
                                <span class="help-block small">Your registered email address</span>
                            </div>

                            <button class="btn btn-success btn-block">Email Password Reset Link</button>
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
            <p>Copyright © 2021. All rights reserved. Algerian Chamber of Commerce and Industry <a
                        href="https://caci.dz">CACI</a></p>
			</div>
		</div>   
    </div>
</body>
</html>


