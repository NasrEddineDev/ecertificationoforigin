@extends('layouts.mainlayout')

@Push('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/component.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('wizard/css/custom.css') }}" />
    <style>
        .pdfobject-container {
            height: 30rem;
            border: 1rem solid rgba(0, 0, 0, .1);
        }

        .inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .inputfile+label {
            max-width: 100% !important;
            width: 100% !important;
            height: 80%;
            font-size: 16px !important;
        }

        .box label {
            margin-bottom: -7px !important;
            border: 1px solid currentColor !important;
            padding: 0.5rem 1.25rem !important;
        }

        .invoice_date {
            padding-left: 5px;
            padding-right: 0px;
        }

        .invoice_number {
            padding-right: 0px;
        }

        #invoice+label {
            padding: 0.25rem 1rem;
        }

        .signature_center {
            margin: auto !important
        }

        /* .modal-dialog {
                                  width: 90% !important;
                                  height: 90% !important;
                                  margin: auto;
                                  margin-top: 20px;
                                  padding: auto;
                              }

                              .modal-edu-general .modal-body {
                                  text-align: center;
                                  padding: 0;
                                  width: 100%;
                                  height: 100% !important;
                              }

                              .modal-content {
                                  height: auto;
                                  min-height: 100%;
                                  border-radius: 0;
                              } */

        #changeProfilePicture {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .profile-pic {
            border-radius: 1000px !important;
            overflow: hidden;
            width: 128px;
            height: 128px;
            border: 8px solid rgba(54, 31, 72, 1);
            /* position: absolute; */
            /* top: 72px; */
        }

        #changeProfilePicture:hover {
            text-decoration: none;
        }

        #changeProfilePicture .profile-pic {
            border-radius: 50%;
            height: 150px;
            width: 150px;
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply;
            color: transparent;
            transition: all .3s ease;
            display: flex;
            justify-content: center;
            align-items: center;

            &:hover {
                background-color: rgba(0, 0, 0, .5);
                z-index: 10000;
                color: rgba(250, 250, 250, 1);
                transition: all .3s ease;
            }

            /* span {
                                display: inline-flex;
                                padding: .2em;
                            } */
        }

        .file-upload {
            /* display: none !important; */
        }

        .profilePicture {
            /* height: 100vh;
                      background-color: rgba(54,31,72,1); */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profilePicture a:hover {
            text-decoration: none;
        }

        .profile-pic {
            border-radius: 50%;
            height: 150px;
            width: 150px;
            background-size: cover;
            background-position: center;
            background-blend-mode: multiply;
            color: transparent;
            transition: all .3s ease;
            display: flex;
            justify-content: center;
            align-items: center;



        }

        .profile-pic:hover {
            background-color: rgba(0, 0, 0, .5);
            z-index: 10000;
            color: rgba(250, 250, 250, 1);
            transition: all .3s ease;
        }

        .profile-pic span {
            display: inline-flex;
            padding: .2em;
        }

        .file-upload-input-profile-picture {
            width: auto !important;
            height: auto !important;
        }

    </style>
@endpush


@section('content')

    <!-- Single pro tab review Start-->
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <ul id="myTabedu1" class="tab-review-design">
                            <li class="active"><a href="#account"> {{ __('Acount Information') }}</a></li>
                            <li><a href="#basic">{{ __('Basic Information') }}</a></li>
                            @if (Auth::User()->role->name == 'user')
                                <li><a href="#enterprise">{{ __('Enterprise') }}</a></li>
                                <li><a href="#manager">{{ __('Manager') }}</a></li>
                            @endif
                            <li><a href="#signature_stamp">{{ __('Signature and Stamp') }}</a></li>

                        </ul>
                        <div id="myTabContent" class="tab-content custom-product-edit">
                            <div class="product-tab-list tab-pane fade active in" id="account">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div id="dropzone1" class="pro-ad">
                                                <form method="post" action="{{ route('account.update', 'account') }}"
                                                    class="dropzone dropzone-custom needsclick add-professors"
                                                    id="demo1-upload">
                                                    @csrf
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-6 col-md-6 col-sm-6 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                            <p class="card-description"> {{ __('Login Information') }}
                                                            </p>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Username') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" placeholder="{{ __('Username') }}"
                                                                        value="{{ $user->username }}" name="username"
                                                                        id="username" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Email Address') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"
                                                                        placeholder="{{ __('Email Address') }}"
                                                                        value="{{ $user->email }}" name="email"
                                                                        id="email" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                            <p class="card-description">
                                                                {{ __('Change The Password') }}
                                                            </p>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Old Password') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="password"
                                                                        placeholder="{{ __('Old Password') }}"
                                                                        name="old_password" id="old_password" value=""
                                                                        class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('New Password') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"
                                                                        placeholder="{{ __('New Password') }}"
                                                                        name="new_password" id="new_password" value=""
                                                                        class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Confirm New Password') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"
                                                                        placeholder="{{ __('Confirm New Password') }}"
                                                                        name="new_password_confirmation"
                                                                        id="new_password_confirmation" value=""
                                                                        class="form-control" />
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <button type="submit"
                                                                    class="btn btn-primary waves-effect waves-light">{{ __('Save') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tab-list tab-pane fade" id="basic">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <form method="post" action="{{ route('account.update', 'basic') }}"
                                                class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div
                                                        class="col-lg-6 col-md-6 col-sm-6 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                        <div class="devit-card-custom">
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('First Name') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"
                                                                        placeholder="{{ __('First Name') }}"
                                                                        value="{{ $user->Profile->firstname }}"
                                                                        name="firstname" id="firstname"
                                                                        class="form-control" />
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Gender') }}</label>
                                                                <div class="col-sm-8">

                                                                    <select class="form-control" name="gender" id="gender">
                                                                        {{-- <option value="" disabled>
                                                                        {{ __('Select The Gender') }}</option> --}}
                                                                        <option value="Male"
                                                                            {{ $user->Profile->gender == 'MALE' ? 'selected' : '' }}>
                                                                            {{ __('Male') }}</option>
                                                                        <option value="Female"
                                                                            {{ $user->Profile->gender == 'FEMALE' ? 'selected' : '' }}>
                                                                            {{ __('Female') }}
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Mobile') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" placeholder="{{ __('Mobile') }}"
                                                                        value="{{ $user->Profile->mobile }}"
                                                                        name="mobile" id="mobile" class="form-control" />
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('AGCE User Id') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"
                                                                        placeholder="{{ __('AGCE User Id') }}"
                                                                        value="{{ $user->Profile->agce_user_id }}"
                                                                        name="agce_user_id" id="agce_user_id"
                                                                        class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('State') }}</label>
                                                                <div class="col-sm-8">

                                                                    <select name="state_code" id="state_code"
                                                                        class="form-control">
                                                                        <option value="0" disabled>
                                                                            {{ __('Select The State') }}</option>
                                                                        @foreach ($states as $state){
                                                                            <option value="{{ $state->iso2 }}"
                                                                                {{ $user->Profile->City->wilaya_code == $state->iso2 ? 'selected' : '' }}>
                                                                                {{ $state->iso2 . ' ' . __($state->name) }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('City') }}</label>
                                                                <div class="col-sm-8">

                                                                    <select name="city_id" id="city_id"
                                                                        class="form-control">
                                                                        @if (isset($cities))
                                                                            @foreach ($cities as $city){
                                                                                <option value="{{ $city->id }}"
                                                                                    {{ $user->Profile->City->id == $city->id ? 'selected' : '' }}>
                                                                                    {{ App()->currentLocale() == 'ar' ? $city->commune_name : $city->commune_name_ascii }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Last Name') }}</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" placeholder="{{ __('Last Name') }}"
                                                                    value="{{ $user->Profile->lastname }}"
                                                                    name="lastname" id="lastname" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Birthday') }}</label>
                                                            <div class="col-sm-8">
                                                                <input type="date" placeholder="{{ __('Birthday') }}"
                                                                    value="{{ $user->Profile->birthday }}"
                                                                    name="birthday" id="birthday" class="form-control" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Address') }}</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" placeholder="{{ __('Address') }}"
                                                                    value="{{ $user->Profile->address }}" name="address"
                                                                    id="address" class="form-control" />
                                                            </div>
                                                        </div>

                                                        <div class="form-group row profilePicture">
                                                            {{-- onclick="$('.file-upload-input-profile-picture').trigger( 'click' )"> --}}
                                                            <a href="#" aria-label="Change Profile Picture">
                                                                <div class="profile-pic"
                                                                    style="background-image: url({{ Auth::user()->Profile->picture ? (Auth::user()->Role->name == 'user' ? 'data/enterprises/' . Auth::user()->Enterprise->id . '/' . 'documents/' : 'data/dri/' . Auth::User()->id . '/') . Auth::user()->Profile->picture : URL::asset('') . 'data/documents/pro4.jpg' }})">
                                                                    <input class="file-upload-input-profile-picture"
                                                                        name="profile_picture" id="profile_picture"
                                                                        type='file' onchange="readURLProfilePicture(this);"
                                                                        accept="image/*" />
                                                                    <span class="glyphicon glyphicon-camera"></span>
                                                                    <span>{{ __('Change Image') }}</span>

                                                                </div>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light">{{ __('Save') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (Auth::User()->role->name == 'user')
                                <div class="product-tab-list tab-pane fade" id="enterprise">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form method="post" action="{{ route('account.update', 'enterprise') }}"
                                                    class="dropzone dropzone-custom needsclick add-professors"
                                                    id="demo1-upload" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-6 col-md-6 col-sm-6 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                            <div class="devit-card-custom">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Enterprise Name') }}</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text"
                                                                            placeholder="{{ __('Enterprise Name') }}"
                                                                            value="{{ $user->Enterprise->name }}"
                                                                            name="name" id="name" class="form-control" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Activity Type') }}</label>
                                                                    <div class="col-sm-8">
                          
                                                                        <select name="activity_type" id="activity_type" class="form-control">
                                                                            <option value="02" disabled selected>{{ __('Select The Type Of Activity') }}</option>
                                                                            @if (isset($categories))
                                                                                @foreach ($categories as $category){
                                                                                    <option value="{{ $category->id }}">
                                                                                        {{ App()->currentLocale() == 'ar' ? $category->name_ar :
                                                                                        (App()->currentLocale() == 'en' ? $category->name : $category->name_fr) }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                      </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row activity_type_name">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Type Of Activity') }}</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text"
                                                                            placeholder="{{ __('Type Of Activity') }}"
                                                                            value="{{ $user->Profile->lastname }}"
                                                                            name="activity_type_name"
                                                                            id="activity_type_name" class="form-control" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('NIF file') }}</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="box">
                                                                            <input type="file" name="nif" id="nif"
                                                                                class="inputfile inputfile-2"
                                                                                data-multiple-caption="{count} files selected"
                                                                                multiple />
                                                                            <label for="nif"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="20" height="17"
                                                                                    viewBox="0 0 20 17">
                                                                                    <path
                                                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                                </svg>
                                                                                <span>{{ __('Choose the NIF file') }}&hellip;</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('NIS file') }}</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="box">
                                                                            <input type="file" name="nis" id="nis"
                                                                                class="inputfile inputfile-2"
                                                                                data-multiple-caption="{count} files selected"
                                                                                multiple />
                                                                            <label for="nis"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="20" height="17"
                                                                                    viewBox="0 0 20 17">
                                                                                    <path
                                                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                                </svg>
                                                                                <span>{{ __('Choose the NIS file') }}&hellip;</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('RC file') }}</label>
                                                                    <div class="col-sm-8">
                                                                        <div class="box">
                                                                            <input type="file" name="rc" id="rc"
                                                                                class="inputfile inputfile-2"
                                                                                data-multiple-caption="{count} files selected"
                                                                                multiple />
                                                                            <label for="rc"><svg
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    width="20" height="17"
                                                                                    viewBox="0 0 20 17">
                                                                                    <path
                                                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                                </svg>
                                                                                <span>{{ __('Choose the RC file') }}&hellip;</span>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Mobile') }}</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text"
                                                                            placeholder="{{ __('Mobile') }}"
                                                                            value="{{ $user->Profile->lastname }}"
                                                                            name="mobile" id="mobile"
                                                                            class="form-control" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('State') }}</label>
                                                                    <div class="col-sm-8">

                                                                        <select name="state_code" id="state_code"
                                                                            class="form-control">
                                                                            <option value="0" disabled>
                                                                                {{ __('Select The State') }}</option>
                                                                            @foreach ($states as $state){
                                                                                <option value="{{ $state->iso2 }}"
                                                                                    {{ $user->Profile->City->wilaya_code == $state->iso2 ? 'selected' : '' }}>
                                                                                    {{ $state->iso2 . ' ' . __($state->name) }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Address') }}</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text"
                                                                            placeholder="{{ __('Address') }}"
                                                                            value="{{ $user->Profile->lastname }}"
                                                                            name="address" id="address"
                                                                            class="form-control" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Website') }}</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text"
                                                                            placeholder="{{ __('Website') }}"
                                                                            value="{{ $user->Profile->lastname }}"
                                                                            name="website" id="website"
                                                                            class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Legal Form') }}</label>
                                                                <div class="col-sm-8">

                                                                    <select class="form-control" name="legal_form"
                                                                        id="legal_form">
                                                                        <option value="06" disabled>
                                                                            {{ __('Select The Legal Form') }}
                                                                        </option>
                                                                        <option value="SPA">{{ __('SPA') }}</option>
                                                                        <option value="SARL">{{ __('SARL') }}</option>
                                                                        <option value="EURL">{{ __('EURL') }}</option>
                                                                        <option value="ETS">{{ __('ETS') }}</option>
                                                                        <option value="SNC">{{ __('SNC') }}</option>
                                                                        <option value="OTHER">{{ __('Other') }}</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Type Of Exporter') }}</label>
                                                                <div class="col-sm-8">
                                                                    <select
                                                                        {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}
                                                                        class="form-control" name="exporter_type"
                                                                        id="exporter_type">
                                                                        <option value="" selected disabled>
                                                                            {{ __('Select The Type Of Exporter') }}
                                                                        </option>
                                                                        <option value="TRADER">{{ __('Trader') }}
                                                                        </option>
                                                                        <option value="CRAFTSMAN">{{ __('Craftsman') }}
                                                                        </option>
                                                                        <option value="PRODUCER">{{ __('Producer') }}
                                                                        </option>
                                                                        <option value="FARMER">{{ __('Farmer') }}
                                                                        </option>
                                                                        <option value="OTHER">{{ __('Other') }}</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row export_activity_code">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Export Activity Code') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"
                                                                        placeholder="{{ __('Export Activity Code') }}"
                                                                        value="{{ $user->Enterprise->export_activity_code }}"
                                                                        name="export_activity_code"
                                                                        id="export_activity_code" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('NIF Number') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"
                                                                        placeholder="{{ __('NIF Number') }}"
                                                                        value="{{ $user->Enterprise->nif_number }}"
                                                                        name="nif_number" id="nif_number"
                                                                        class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('NIS Number') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"
                                                                        placeholder="{{ __('NIS Number') }}"
                                                                        value="{{ $user->Enterprise->nis_number }}"
                                                                        name="nis_number" id="nis_number"
                                                                        class="form-control" />
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('RC Number') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"
                                                                        placeholder="{{ __('RC Number') }}"
                                                                        value="{{ $user->Enterprise->rc_number }}"
                                                                        name="rc_number" id="rc_number"
                                                                        class="form-control" />
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Email') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" placeholder="{{ __('Email') }}"
                                                                        value="{{ $user->Enterprise->email }}"
                                                                        name="email" id="email" class="form-control" />
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('City') }}</label>
                                                                <div class="col-sm-8">

                                                                    <select name="city_id" id="city_id"
                                                                        class="form-control">
                                                                        @if (isset($cities))
                                                                            @foreach ($cities as $city){
                                                                                <option value="{{ $city->id }}"
                                                                                    {{ $user->Enterprise->city_id && $user->Enterprise->City->id == $city->id ? 'selected' : '' }}>
                                                                                    {{ App()->currentLocale() == 'ar' ? $city->commune_name : $city->commune_name_ascii }}
                                                                                </option>
                                                                            @endforeach
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Tel') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" placeholder="{{ __('Tel') }}"
                                                                        value="{{ $user->Enterprise->tel }}" name="tel"
                                                                        id="tel" class="form-control" />
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Fax') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" placeholder="{{ __('Fax') }}"
                                                                        value="{{ $user->Enterprise->fax }}" name="fax"
                                                                        id="fax" class="form-control" />
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <button type="submit"
                                                                    class="btn btn-primary waves-effect waves-light">{{ __('Save') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="manager">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form method="post" action="{{ route('account.update', 'manager') }}"
                                                    class="dropzone dropzone-custom needsclick add-professors"
                                                    id="demo1-upload" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div
                                                            class="col-lg-6 col-md-6 col-sm-6 col-xs-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                            <div class="devit-card-custom">
                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('First Name') }}</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text"
                                                                            placeholder="{{ __('First Name') }}"
                                                                            value="{{ $user->Enterprise->Manager->firstname }}"
                                                                            name="firstname" id="firstname"
                                                                            class="form-control" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Gender') }}</label>
                                                                    <div class="col-sm-8">

                                                                        <select class="form-control" name="gender"
                                                                            id="gender">
                                                                            <option value="" disabled>
                                                                                {{ __('Select The Gender') }}</option>
                                                                            <option value="Male"
                                                                                {{ $user->Enterprise->Manager->gender == 'MALE' ? 'selected' : '' }}>
                                                                                {{ __('Male') }}</option>
                                                                            <option value="Female"
                                                                                {{ $user->Enterprise->Manager->gender == 'FEMALE' ? 'selected' : '' }}>
                                                                                {{ __('Female') }}
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Mobile') }}</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text"
                                                                            placeholder="{{ __('Mobile') }}"
                                                                            value="{{ $user->Enterprise->Manager->mobile }}"
                                                                            name="mobile" id="mobile"
                                                                            class="form-control" />
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label
                                                                        class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Email') }}</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text"
                                                                            placeholder="{{ __('Email') }}"
                                                                            value="{{ $user->Enterprise->Manager->email }}"
                                                                            name="email" id="email" class="form-control" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Last Name') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text"
                                                                        placeholder="{{ __('Last Name') }}"
                                                                        value="{{ $user->Enterprise->Manager->lastname }}"
                                                                        name="lastname" id="lastname"
                                                                        class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Birthday') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="date"
                                                                        placeholder="{{ __('Birthday') }}"
                                                                        value="{{ $user->Enterprise->Manager->birthday }}"
                                                                        name="birthday" id="birthday"
                                                                        class="form-control" />
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Address') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" placeholder="{{ __('Address') }}"
                                                                        value="{{ $user->Enterprise->Manager->address }}"
                                                                        name="address" id="address" class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label
                                                                    class="col-sm-4 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Tel') }}</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" placeholder="{{ __('Tel') }}"
                                                                        value="{{ $user->Enterprise->Manager->tel }}"
                                                                        name="tel" id="tel" class="form-control" />
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <button type="submit"
                                                                    class="btn btn-primary waves-effect waves-light">{{ __('Save') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="product-tab-list tab-pane fade" id="signature_stamp">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <form method="post"
                                                action="{{ route('account.update', 'signature_stamp') }}"
                                                class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <p class="card-description">
                                                    {{ __('Signing and Stamp Information') }} </p>
                                                <div class="row">
                                                    <div
                                                        class="col-md-4 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                        <div class="form-row center">
                                                            <div class="form-holder signature_center">
                                                                <div class="file-upload">
                                                                    <button class="file-upload-btn" type="button"
                                                                        onclick="$('.file-upload-input-signature').trigger( 'click' )">{{ __('Add Signature Image') }}</button>

                                                                    <div class="image-upload-wrap-signature">
                                                                        <input class="file-upload-input-signature"
                                                                            name="signature" id="signature" type='file'
                                                                            onchange="readURLSignature(this);"
                                                                            accept="image/*" />
                                                                        <div class="drag-text">
                                                                            <h3>{{ __('Drag and drop an image or select add Image') }}
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="file-upload-content-signature">
                                                                        <img class="file-upload-image-signature"
                                                                            src="{{ (Auth::user()->Role->name == 'user' ? 'data/enterprises/' . Auth::user()->Enterprise->id . '/' . 'documents/' : 'data/dri/' . Auth::User()->id . '/') . Auth::user()->Profile->signature }}"
                                                                            alt="your image" />
                                                                        <div class="image-title-wrap">
                                                                            <button type="button"
                                                                                onclick="removeUploadSignature()"
                                                                                class="remove-image">{{ __('Remove') }}
                                                                                <span
                                                                                    class="image-title-signature">{{ __('Uploaded Image') }}</span></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-4 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                        <div class="form-row">
                                                            <div class="form-holder signature_center">
                                                                <div class="file-upload">
                                                                    <button class="file-upload-btn" type="button"
                                                                        onclick="$('.file-upload-input-square-stamp').trigger( 'click' )">
                                                                        {{ __('Add Square Stamp Image') }}
                                                                    </button>

                                                                    <div class="image-upload-wrap-square-stamp">
                                                                        <input class="file-upload-input-square-stamp"
                                                                            name="square_stamp" id="square_stamp"
                                                                            type='file' onchange="readURLSquareStamp(this);"
                                                                            accept="image/*" />
                                                                        <div class="drag-text">
                                                                            <h3>{{ __('Drag and drop an image or select add Image') }}
                                                                            </h3>
                                                                        </div>
                                                                    </div>
                                                                    <div class="file-upload-content-square-stamp">
                                                                        <img class="file-upload-image-square-stamp"
                                                                            src="{{ (Auth::user()->Role->name == 'user' ? 'data/enterprises/' . Auth::user()->Enterprise->id . '/' . 'documents/' : 'data/dri/' . Auth::User()->id . '/') . Auth::user()->Profile->square_stamp }}"
                                                                            alt="your image" />
                                                                        <div class="image-title-wrap">
                                                                            <button type="button"
                                                                                onclick="removeUploadSquareStamp()"
                                                                                class="remove-image">
                                                                                {{ __('Remove') }} <span
                                                                                    class="image-title-square-stamp">{{ __('Uploaded Image') }}</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if (Auth::user()->Role->name == 'user')
                                                        <div
                                                            class="col-md-4 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                            <div class="form-row">
                                                                <div class="form-holder signature_center">
                                                                    <div class="file-upload">
                                                                        <button class="file-upload-btn" type="button"
                                                                            onclick="$('.file-upload-input-round-stamp').trigger( 'click' )">{{ __('Add Round Stamp Image') }}</button>

                                                                        <div class="image-upload-wrap-round-stamp">
                                                                            <input class="file-upload-input-round-stamp"
                                                                                name="round_stamp" id="round_stamp"
                                                                                type='file'
                                                                                onchange="readURLRoundStamp(this);"
                                                                                accept="image/*" />
                                                                            <div class="drag-text">
                                                                                <h3>{{ __('Drag and drop an image or select add Image') }}
                                                                                </h3>
                                                                            </div>
                                                                        </div>
                                                                        <div class="file-upload-content-round-stamp">
                                                                            <img class="file-upload-image-round-stamp"
                                                                                src="{{ 'data/enterprises/' . Auth::user()->Enterprise->id . '/' . 'documents/' . Auth::user()->Profile->round_stamp }}"
                                                                                alt="your image" />
                                                                            <div class="image-title-wrap">
                                                                                <button type="button"
                                                                                    onclick="removeUploadRoundStamp()"
                                                                                    class="remove-image">
                                                                                    {{ __('Remove') }} <span
                                                                                        class="image-title-round-stamp">{{ __('Uploaded Image') }}</span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="payment-adress">
                                                            <button type="submit"
                                                                class="btn btn-primary waves-effect waves-light">{{ __('Save') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="basic-form-area mg-b-15">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="sparkline12-list">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h4 class="card-title">{{ __('Edit your account') }}</h4>
                                                        <br />
                                                        <p class="card-description"> {{ __('Login Information') }} </p>
                                                        <form class="form-sample" method="post" action="{{ route('account.update', 'test') }}" >
                                                          @csrf
                                                          @method('put')
                                                          
                                                          <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">{{ __('Username') }}</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" value="{{ $user->username }}" name="username" id="username" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">{{ __('Email Address') }}</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" value="{{ $user->email }}" name="email" id="email" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <p class="card-description"> {{ __('Change The Password') }} </p>
                                                          <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-12">
                                                                            <input type="password" placeholder="{{ __('Old Password') }}" name="old_password" id="old_password" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-12">
                                                                            <input type="password" placeholder="{{ __('New Password') }}" value="" name="new_password" id="new_password" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group row">
                                                                        <div class="col-sm-12">
                                                                            <input type="password" placeholder="{{ __('Confirm New Password') }}" value="" name="new_password_confirmation" id="new_password_confirmation" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <p class="card-description"> {{ __('General Information') }} </p>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">{{ __('First Name') }}</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" value="{{ $user->firstname }}" name="firstname" id="firstname" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">{{ __('Last Name') }}</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" value="{{ $user->lastname }}" name="lastname" id="lastname" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">{{ __('Gender') }}</label>
                                                                        <div class="col-sm-9">
                                                                        <input type="radio" name="gender" id="gender" value="male" class="radio-1"> Male
                                                                        <input type="radio" name="gender" id="gender" value="female"> Female
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">{{ __('Birthday') }}</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="date" value="{{ $user->birthday }}" name="birthday" id="birthday" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">{{ __('Address') }}</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" value="{{ $user->address }}" name="address" id="address" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label">{{ __('Mobile') }}</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" value="{{ $user->mobile }}" name="mobile" id="mobile" class="form-control" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                         

                                                            <div class="form-group-inner">
                                                                <div class="login-btn-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3"></div>
                                                                        <div class="col-lg-9">
                                                                            <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                                                <button type="submit" class="btn btn-white">
                                                                                    <a href="{{ route('products.index') }}"
                                                                                        style="color: inherit;">{{ __('Cancel') }}</a>
                                                                                </button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary login-submit-cs">{{ __('Save Change') }}</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
    <input type="text" value="{{ !empty(Auth::User()->profile->signature) }}" id="signatureIsExist" hidden>
    <input type="text" value="{{ !empty(Auth::User()->profile->square_stamp) }}" id="squareStampIsExist" hidden>
    <input type="text" value="{{ !empty(Auth::User()->profile->round_stamp) }}" id="roundStampIsExist" hidden>

@endsection

@Push('js')
    {{-- <script type="text/javascript" src="{{ URL::asset('js/dropzone/dropzone.js') }}"></script> --}}
    <script src="{{ URL::asset('CustomFileInputs/js/custom-file-input.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('.activity_type_name').hide();
            $('#activity_type').on('change', function() {
                if (this.value == '99') {
                    $('.activity_type_name').show();
                } else {
                    $('.activity_type_name').hide();
                }
            });

            $('.export_activity_code').hide();
            $('#exporter_type').on('change', function() {
                if (this.value == 'TRADER') {
                    $('.export_activity_code').show();
                } else {
                    $('.export_activity_code').hide();
                }
            });

            $('#state_code').on('change', function() {
                var selectedState = $('#state_code').find(":selected").val().split(" ")[0];
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/getcities/" + selectedState,
                    type: "GET",
                    success: function(data) {
                        $('#city_id').empty();
                        $('#city_id').append(
                            '<option value="0" disabled selected>{{ __('Select The City') }}</option>'
                        );
                        $.each(data.cities, function(index, city) {
                            $('#city_id').append('<option value="' + city.value +
                                '">' + city.text + '</option>');
                        })
                    }
                })
            });

            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        // $('.profile-pic').attr('src', e.target.result);
                        $('.profile-pic').attr('style', 'background-image: url(' + e.target.result + ')');
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function() {
                readURL(this);
            });

            $(".profile-pic").on('click', function() {
                $(".file-upload").click();
            });

            $(".profilePicture").on('click', function(event) {
                event.preventBubble = true;
            });



        });

        function readURLProfilePicture(input) {
            if (input.files && input.files[0]) {

                var readerSignature = new FileReader();

                readerSignature.onload = function(e) {
                    // $('.image-upload-wrap-profile-picture').hide();

                    // $('.file-upload-image-profile-picture').attr('src', e.target.result);
                    // $('.file-upload-content-profile-picture').show();
                    // $('.profile-pic').attr('src', e.target.result);
                    $('.profile-pic').css("background-image", "url(" + e.target.result + ")");
                    // $('.image-title-profile-picture').html(input.files[0].name);
                };

                readerSignature.readAsDataURL(input.files[0]);

            } else {
                removeUploadProfilePicture();
            }
        }

        function removeUploadProfilePicture() {
            $('.file-upload-input-profile-picture').replaceWith($('.file-upload-input-profile-picture').clone());
            $('.file-upload-content-profile-picture').hide();
            $('.image-upload-wrap-profile-picture').show();
        }


        roundStampIsExist = $('#roundStampIsExist').val(); //"{{ empty(Auth::User()->profile()->square_stamp) }}"
        if (roundStampIsExist) {
            $('.file-upload-content-round-stamp').show();
            $('.image-upload-wrap-round-stamp').hide();
        }

        function readURLRoundStamp(input) {
            if (input.files && input.files[0]) {

                var readerRoundStamp = new FileReader();

                readerRoundStamp.onload = function(e) {
                    $('.image-upload-wrap-round-stamp').hide();

                    $('.file-upload-image-round-stamp').attr('src', e.target.result);
                    $('.file-upload-content-round-stamp').show();

                    $('.image-title-round-stamp').html(input.files[0].name);
                };

                readerRoundStamp.readAsDataURL(input.files[0]);

            } else {
                removeUploadRoundStamp();
            }
        }

        function removeUploadRoundStamp() {
            $('.file-upload-input-round-stamp').replaceWith($('.file-upload-input-round-stamp').clone());
            $('.file-upload-content-round-stamp').hide();
            $('.image-upload-wrap-round-stamp').show();
        }
        $('.image-upload-wrap-round-stamp').bind('dragover', function() {
            $('.image-upload-wrap-round-stamp').addClass('image-dropping');
        });
        $('.image-upload-wrap-round-stamp').bind('dragleave', function() {
            $('.image-upload-wrap-round-stamp').removeClass('image-dropping');
        });

        signatureIsExist = $('#signatureIsExist').val(); //"{{ !empty(Auth::User()->profile()->signature) }}";
        // console.log(signatureIsExist);
        if (signatureIsExist) {
            $('.file-upload-content-signature').show();
            $('.image-upload-wrap-signature').hide();
        }

        function readURLSignature(input) {
            if (input.files && input.files[0]) {

                var readerSignature = new FileReader();

                readerSignature.onload = function(e) {
                    $('.image-upload-wrap-signature').hide();

                    $('.file-upload-image-signature').attr('src', e.target.result);
                    $('.file-upload-content-signature').show();

                    $('.image-title-signature').html(input.files[0].name);
                };

                readerSignature.readAsDataURL(input.files[0]);

            } else {
                removeUploadSignature();
            }
        }

        function removeUploadSignature() {
            $('.file-upload-input-signature').replaceWith($('.file-upload-input-signature').clone());
            $('.file-upload-content-signature').hide();
            $('.image-upload-wrap-signature').show();
        }
        $('.image-upload-wrap-signature').bind('dragover', function() {
            $('.image-upload-wrap-signature').addClass('image-dropping');
        });
        $('.image-upload-wrap-signature').bind('dragleave', function() {
            $('.image-upload-wrap-signature').removeClass('image-dropping');
        });


        squareStampIsExist = $('#squareStampIsExist').val(); //"{{ empty(Auth::User()->profile()->square_stamp) }}"
        if (squareStampIsExist) {
            $('.file-upload-content-square-stamp').show();
            $('.image-upload-wrap-square-stamp').hide();
        }

        function readURLSquareStamp(input) {
            if (input.files && input.files[0]) {

                var readerSquareStamp = new FileReader();

                readerSquareStamp.onload = function(e) {
                    $('.image-upload-wrap-square-stamp').hide();

                    $('.file-upload-image-square-stamp').attr('src', e.target.result);
                    $('.file-upload-content-square-stamp').show();

                    $('.image-title-square-stamp').html(input.files[0].name);
                };

                readerSquareStamp.readAsDataURL(input.files[0]);

            } else {
                removeUploadSquareStamp();
            }
        }

        function removeUploadSquareStamp() {
            $('.file-upload-input-square-stamp').replaceWith($('.file-upload-input-square-stamp').clone());
            $('.file-upload-content-square-stamp').hide();
            $('.image-upload-wrap-square-stamp').show();
        }
        $('.image-upload-wrap-square-stamp').bind('dragover', function() {
            $('.image-upload-wrap-square-stamp').addClass('image-dropping');
        });
        $('.image-upload-wrap-square-stamp').bind('dragleave', function() {
            $('.image-upload-wrap-square-stamp').removeClass('image-dropping');
        });

    </script>
@endpush
