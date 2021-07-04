<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Wizard-v3</title>

    <!--====== Favicon Icon ======-->
    {{-- <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png"> --}}
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('') }}img/logo/caci-logo.ico" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        * {
            margin: 0;
            padding: 0
        }

        html {
            height: 100%
        }

        p {
            color: grey
        }

        #heading {
            text-transform: uppercase;
            color: #2C7744;
            font-weight: normal
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        .form-card {
            text-align: left
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform input,
        #msform textarea {
            padding: 8px 15px 8px 15px;
            border: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            background-color: #ECEFF1;
            font-size: 16px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #2C7744;
            outline-width: 0
        }

        #msform .action-button {
            width: 100px;
            background: #2C7744;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 0px 10px 5px;
            float: right
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            background-color: #65b12d
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px 10px 0px;
            float: right
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            background-color: #000000
        }

        .card {
            z-index: 0;
            border: none;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C7744;
            margin-bottom: 15px;
            font-weight: normal;
            text-align: left
        }

        .purple-text {
            color: #2C7744;
            font-weight: normal
        }

        .steps {
            font-size: 25px;
            color: gray;
            margin-bottom: 10px;
            font-weight: normal;
            text-align: right
        }

        .fieldlabels {
            color: gray;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #2C7744
        }

        #progressbar li {
            list-style-type: none;
            font-size: 15px;
            width: 14.28%;
            float: left;
            position: relative;
            font-weight: 400
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f13e"
        }

        #progressbar #activation:before {
            font-family: FontAwesome;
            content: "\f13e"
        }

        #progressbar #enterprise:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f030"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 20px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #2C7744
        }

        .progress {
            height: 14px
        }

        .progress-bar {
            background-color: #2C7744
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

    </style>
    {{-- @if (App::currentLocale() == 'ar')
        <style>
            #form-total>.steps>ul {
                float: right;
                display: inline-block;
            }

            #form-total>.steps>ul>li {
                float: right;
                display: inline-block;
            }

            #form-total>.actions>ul {
                float: left;
                display: inline-block;
            }

            #form-total>.actions>ul>li {
                float: right;
                margin-left: 5px;
            }

            .inner {
                text-align: right;
            }

            .label {
                left: auto;
                right: 10px;
            }

            .wizard-v3-content {
                /* font-family: 'Amiri'!important, serif!important; */
                font-family: "Amiri", "serif", "Times New Roman" !important;
            }

            #form-total .steps li .step-icon::before {
                right: auto;
                left: 100%
            }

            #form-total .steps li:last-child .step-icon::after {
                left: auto;
                right: 100%
            }

            #username {
                text-align: right;
            }

            .actions ul li:first-child {
                margin-left: auto;
            }

            #form-total .steps li:nth-child(5) a .step-text {
                margin-left: 7px !important;
            }

            .form-row .form-holder:nth-child(0) {
                float: right;
            }

            table th,
            table td {
                text-align: right;
            }

            /* .dropdown-toggle{
                height: 40px;
                width: 400px !important;
            } */
            .select2 {
                z-index: 99999;
            }

            .select2-drop-active {
                margin-top: -25px;
            }

            .select2-dropdown {
                z-index: 99999 !important;
                position: absolute;
                cursor: default;
            }

            .selectRow {
                display: block;
                padding: 20px;
            }

            .select2-container {
                width: 200px;
            }

            .select2-drop-active {
                margin-top: -25px;
            }

        </style>
    @endif --}}
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-11 col-sm-9 col-md-7 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2 id="heading">Sign Up Your User Account</h2>
                    <p>Fill all form field to go to next step</p>
                    <form id="msform">
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active" id="account"><strong>Account</strong></li>
                            <li id="activation"><strong>Activation</strong></li>
                            <li id="enterprise"><strong>Enterprise</strong></li>
                            <li id="payment"><strong>Manager</strong></li>
                            <li id="payment"><strong>Documents</strong></li>
                            <li id="payment"><strong>Resume</strong></li>
                            <li id="confirm"><strong>Finish</strong></li>
                        </ul>
                        <div class="progress">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div> <br> <!-- fieldsets -->
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Account Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 1/7</h2>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                        <div class="form-group row">
                                            <label
                                                class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Email') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="email" id="email" placeholder="Email"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label
                                                class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="username" id="username" placeholder="Username"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                        <div class="form-group row">
                                            <label
                                                class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Password') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="password" id="password" placeholder="password"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label
                                                class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Confirm Password') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="confirm_password" id="confirm_password"
                                                    placeholder="Confirm Password" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Account Activation:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2/7</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                        <div class="form-group row">
                                            <p>{{ __('Thank you for creating new account') }}</p>
                                            <p>{{ __("Before getting started, you must verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another") }}

                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group row"
                                            style="vertical-align: middle!important;margin-top:7%;margin-bottom:5%;">
                                            <div style="margin:auto;text-align:center;">
                                                <button id="resend" type="submit"
                                                    class="btn btn-success btn-block">{{ __('Resend Verification Message by Email') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="button" name="next" class="next action-button" value="Next" />
                            <input type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Enterprise Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2 - 4</h2>
                                    </div>
                                </div> 

                                
                                <div class="row">
                                    <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                        <div class="form-group row">
                                            <label
                                                class="col-sm-5 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Enterprise Name') }}</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="name_ar" id="name_ar" placeholder="Enterprise Name In Arabic"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            {{-- <label
                                                class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label> --}}
                                            <div class="col-sm-12">
                                                <input type="text" name="name" id="name" placeholder="Enterprise Name In English"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group row">
                                            {{-- <label
                                                class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('User Name') }}</label> --}}
                                            <div class="col-sm-12">
                                                <input type="text" name="name_fr" id="name_fr" placeholder="Enterprise Name In French"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                        <div class="form-group row">
                                            <label
                                                class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Password') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="password" id="password" placeholder="password"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label
                                                class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Confirm Password') }}</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="confirm_password" id="confirm_password"
                                                    placeholder="Confirm Password" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <input type="button" name="next" class="next action-button" value="Next" /> <input
                                type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Enterprise Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2 - 4</h2>
                                    </div>
                                </div> <label class="fieldlabels">First Name: *</label> <input type="text" name="fname"
                                    placeholder="First Name" /> <label class="fieldlabels">Last Name: *</label> <input
                                    type="text" name="lname" placeholder="Last Name" /> <label
                                    class="fieldlabels">Contact No.: *</label> <input type="text" name="phno"
                                    placeholder="Contact No." /> <label class="fieldlabels">Alternate Contact No.:
                                    *</label> <input type="text" name="phno_2" placeholder="Alternate Contact No." />
                            </div> <input type="button" name="next" class="next action-button" value="Next" /> <input
                                type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Enterprise Information:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 2 - 4</h2>
                                    </div>
                                </div> <label class="fieldlabels">First Name: *</label> <input type="text" name="fname"
                                    placeholder="First Name" /> <label class="fieldlabels">Last Name: *</label> <input
                                    type="text" name="lname" placeholder="Last Name" /> <label
                                    class="fieldlabels">Contact No.: *</label> <input type="text" name="phno"
                                    placeholder="Contact No." /> <label class="fieldlabels">Alternate Contact No.:
                                    *</label> <input type="text" name="phno_2" placeholder="Alternate Contact No." />
                            </div> <input type="button" name="next" class="next action-button" value="Next" /> <input
                                type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Image Upload:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 3 - 4</h2>
                                    </div>
                                </div> <label class="fieldlabels">Upload Your Photo:</label> <input type="file"
                                    name="pic" accept="image/*"> <label class="fieldlabels">Upload Signature
                                    Photo:</label> <input type="file" name="pic" accept="image/*">
                            </div> <input type="button" name="next" class="next action-button" value="Submit" /> <input
                                type="button" name="previous" class="previous action-button-previous"
                                value="Previous" />
                        </fieldset>
                        <fieldset>
                            <div class="form-card">
                                <div class="row">
                                    <div class="col-7">
                                        <h2 class="fs-title">Finish:</h2>
                                    </div>
                                    <div class="col-5">
                                        <h2 class="steps">Step 4 - 4</h2>
                                    </div>
                                </div> <br><br>
                                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2> <br>
                                <div class="row justify-content-center">
                                    <div class="col-3"> <img src="{{ URL::asset('') }}registration/img/GwStPmg.png"
                                            class="fit-image">
                                    </div>
                                </div> <br><br>
                                <div class="row justify-content-center">
                                    <div class="col-7 text-center">
                                        <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            $(".next").click(function() {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(++current);
            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep) {
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar")
                    .css("width", percent + "%")
            }

            $(".submit").click(function() {
                return false;
            })

        });
    </script>

</body>

</html>
