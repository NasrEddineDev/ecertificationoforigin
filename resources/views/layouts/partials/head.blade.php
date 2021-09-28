<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>{{config('app.name')}}</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">

{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

<!-- favicon ============================================ -->
<!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"> -->
<link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('') }}img/logo/caci-logo.ico" />
<!-- Google Fonts ============================================ -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
<!-- Bootstrap CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}" />
<!-- Bootstrap CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" />
<!-- owl.carousel CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/owl.theme.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/owl.transitions.css') }}" />
<!-- animate CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}" />
<!-- normalize CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}" />
<!-- meanmenu icon CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/meanmenu.min.css') }}" />
<!-- main CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<!-- educate icon CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/educate-custon-icon.css') }}" />
<!-- morrisjs CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/morrisjs/morris.css') }}" />
<!-- mCustomScrollbar CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/scrollbar/jquery.mCustomScrollbar.min.css') }}" />
<!-- metisMenu CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/metisMenu/metisMenu.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/metisMenu/metisMenu-vertical.css') }}" />
<!-- calendar CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/calendar/fullcalendar.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/calendar/fullcalendar.print.min.css') }}" />
<!-- style CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}" />
<!-- responsive CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}" />
<!-- notifications CSS ============================================ -->
<link rel="stylesheet" href="css/notifications/Lobibox.min.css">

<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .flag-icon {
        background-size: contain;
        background-position: 50%;
        background-repeat: no-repeat;
        position: relative;
        display: inline-block;
        width: 1.33333333em;
        line-height: 1em;
    }

</style>
@if (App::currentLocale() == 'ar')
    <style>
        body {

            font-family: "Amiri", "serif", "Times New Roman" !important;

        }

        table th,
        table td {
            text-align: right !important;
        }

    </style>
@endif
