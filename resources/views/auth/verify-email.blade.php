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
    <!-- Google Fonts
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
                <h3>ACCOUNT VERIFICATION</h3>
                <p>{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
                @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif
            </div>

            <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body poss-recover">
                        <form method="POST" action="{{ route('verification.send') }}" id="loginForm">
                            @csrf
                            <div style="margin:10px;">
                                <!-- <x-button>
                                    {{ __('Resend Verification Email') }}
                                </x-button> -->
                                <button type="submit"
                                    class="btn btn-success btn-block">{{ __('Resend Verification Email') }}</button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}" id="loginForm">
                            @csrf
                            <div style="margin:10px;">
                                <button type="submit" class="btn btn-default btn-block">{{ __('Logout') }}</button>
                                <!-- <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Logout') }}
                            </button> -->
                            </div>
                        </form>

                        <!-- <form action="#" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Email</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you email adress"
                                    required="" value="" name="username" id="username" class="form-control">
                                <span class="help-block small">Your registered email address</span>
                            </div>

                            <button class="btn btn-success btn-block">Reset password</button>
                        </form> -->
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

