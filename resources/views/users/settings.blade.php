@extends('layouts.mainlayout')

@Push('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/component.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('wizard/css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('select2/css/select2.min.css') }}">
    <style>
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
        }

    </style>
@endpush

@section('content')

    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline7-list mt-b-30">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('General Settings') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Settings --}}
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="sparkline7-list mt-b-30">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('Language') }}</h4>
                                <form method="post" action="{{ route('users.settings.post') }}"
                                    class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                    @csrf
                                    <div class="form-group-inner">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-12 {{ App()->currentLocale() == 'ar' ? 'pull-left' : 'pull-right' }}"
                                                    style="width: auto">
                                                    <button type="submit"
                                                        class="btn btn-primary login-submit-cs"><i class="fa fa-fw fa-save"></i>{{ __('Save Change') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-description"> {{ __('Default Language') }} </p>
                                    <div class="row">
                                        <div class="col-md-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Language') }}</label>
                                                <div class="col-sm-9">
                                                    <select id="language" name="language" class="form-control">
                                                        <option selected disabled> {{__('Select The Default Language')}}</option>
                                                        <option {{ $language ==  'ar' ? 'selected' : ''}} value="ar"> <span
                                                                class="edu-icon edu-home-admin author-log-ic">
                                                                <img class="flag-icon" src="{{ URL::asset('') }}img/flag/algeria.png" alt="" />
                                                            </span>العربية</option>
                                                        <option {{ $language ==  'en' ? 'selected' : ''}} value="en">
                                                            <span
                                                                class="edu-icon edu-user-rounded author-log-ic lang-image">
                                                                <img class="flag-icon" src="{{ URL::asset('') }}img/flag/united-states.png" alt="" />
                                                            </span>English
                                                        </option>
                                                        <option {{ $language ==  'fr' ? 'selected' : ''}} value="fr">
                                                            <span class="edu-icon edu-money author-log-ic">
                                                                <img class="flag-icon" src="{{ URL::asset('') }}img/flag/france.png" alt="" />
                                                            </span>Français
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Stamps --}}
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="sparkline7-list mt-b-30">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('Theme') }}</h4>
                                <form method="post" action="{{ route('users.settings.post') }}"
                                    class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                    @csrf
                                    <div class="form-group-inner">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-12 {{ App()->currentLocale() == 'ar' ? 'pull-left' : 'pull-right' }}"
                                                    style="width: auto">
                                                    <button type="submit"
                                                        class="btn btn-primary login-submit-cs"><i class="fa fa-fw fa-save"></i>{{ __('Save Change') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="card-description">
                                        {{ __('Default Theme') }} </p>
                                    <div class="row">
                                        <div class="col-md-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Theme') }}</label>
                                                <div class="col-sm-9">
                                                    <select id="theme" name="theme" class="form-control">
                                                        <option selected disabled>{{__('Select The Default Theme')}}</option>
                                                        <option {{ $theme ==  'default' ? 'selected' : ''}} value="default">{{__('Default')}}</option>
                                                        <option {{ $theme ==  'deepskyblue' ? 'selected' : ''}} value="deepskyblue">{{__('Deep Sky Blue')}}</option>
                                                        <option {{ $theme ==  'skyblue' ? 'selected' : ''}} value="skyblue">{{__('Sky Blue')}}</option>
                                                        <option {{ $theme ==  'lightskyblue' ? 'selected' : ''}} value="lightskyblue">{{__('Light Sky Blue')}}</option>
                                                        <option {{ $theme ==  'custom' ? 'selected' : ''}} value="custom">{{__('Custom')}}</option>
                                                        <option {{ $theme ==  'old' ? 'selected' : ''}} value="old">{{__('Old')}}</option>
                                                        <option {{ $theme ==  'caci' ? 'selected' : ''}} value="caci">{{__('Caci')}}</option>
                                                    </select>
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
    </div>
@endsection
@Push('js')
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('CustomFileInputs/js/custom-file-input.js') }}"></script>
    <script src="{{ URL::asset('select2/js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var lang = "{{ App()->currentLocale() }}";
            var dir = '';
            if (lang == 'ar') dir = 'rtl';
            else dir = 'ltr';
        });
    </script>
@endpush
