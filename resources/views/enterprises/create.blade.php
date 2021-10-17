@extends('layouts.mainlayout')

@Push('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/component.css') }}" />
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
    </style>
@endpush


@section('content')

    <div class="basic-form-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline12-list">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('Add New Enterprise') }}</h4>
                                <br />
                                <p class="card-description"> {{ __('General Information') }} </p>
                                <form class="form-sample" method="post" action="{{ route('enterprises.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">{{ __('Name') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" id="name" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">{{ __('Type Of Activity') }}</label>
                                                <div class="col-sm-9">
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
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">{{ __('Legal Form') }}</label>
                                                <div class="col-sm-9">
                                                    <select name="legal_form" id="legal_form" class="form-control">
                                                        <option value="06" disabled selected>
                                                            {{ __('Select The Legal Form') }}</option>
                                                        <option value="0">{{ __('SPA') }}</option>
                                                        <option value="1">{{ __('SARL') }}</option>
                                                        <option value="2">{{ __('EURL') }}</option>
                                                        <option value="3">{{ __('ETS') }}</option>
                                                        <option value="4">{{ __('SNC') }}</option>
                                                        <option value="5">{{ __('Other') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">{{ __('Type Of Exporter') }}</label>
                                                <div class="col-sm-9">
                                                    <select name="exporter_type" id="exporter_type">
                                                        <option value="" selected disabled>
                                                            {{ __('Select The Type Of Exporter') }}
                                                        </option>
                                                        <option value="TRADER">{{ __('Trader') }}</option>
                                                        <option value="CRAFTSMAN">{{ __('Craftsman') }}</option>
                                                        <option value="PRODUCER">{{ __('Producer') }}</option>
                                                        <option value="FARMER">{{ __('Farmer') }} </option>
                                                        <option value="OTHER">{{ __('Other') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">{{ __('Trade Register') }}</label>
                                                <div class="col-sm-9">
                                                    <div class="form-holder">
                                                        <div class="box">
                                                            <input type="file" name="rc" id="rc"
                                                                class="inputfile inputfile-2"
                                                                data-multiple-caption="{count} files selected" multiple />
                                                            <label for="rc"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="20" height="17" viewBox="0 0 20 17">
                                                                    <path
                                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                </svg>
                                                                <span>{{ __('Choose the RC file') }}&hellip;</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">{{ __('Tax Identification Number') }}</label>
                                                <div class="col-sm-9">
                                                    <div class="form-holder">
                                                        <div class="box">
                                                            <input type="file" name="nif" id="nif"
                                                                class="inputfile inputfile-2"
                                                                data-multiple-caption="{count} files selected" multiple />
                                                            <label for="nif"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="20" height="17" viewBox="0 0 20 17">
                                                                    <path
                                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                </svg>
                                                                <span>{{ __('Choose the NIF file') }}&hellip;</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">{{ __('Statistical Identification Number') }}</label>
                                                <div class="col-sm-9">
                                                    <div class="form-holder">
                                                        <div class="box">
                                                            <input type="file" name="nis" id="nis" class="inputfile inputfile-2"
                                                                data-multiple-caption="{count} files selected" multiple />
                                                            <label for="nis"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="20" height="17" viewBox="0 0 20 17">
                                                                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                </svg>
                                                                <span>{{ __('Choose the NIS file') }}&hellip;</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label">{{ __('Export Activity Code') }}</label>
                                                <div class="col-sm-9">
                                                    <input name="export_activity_code" id="export_activity_code" type="text"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="card-description"> {{ __('Contact Information') }} </p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">{{ __('Address') }}</label>
                                                <div class="col-sm-9">
                                                    <input name="address" id="address" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                                                <div class="col-sm-9">
                                                    <input name="email" id="email" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">{{ __('Mobile') }}</label>
                                                <div class="col-sm-9">
                                                    <input name="mobile" id="mobile" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">{{ __('Tel') }}</label>
                                                <div class="col-sm-9">
                                                    <input name="tel" id="tel" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">{{ __('Website') }}</label>
                                                <div class="col-sm-9">
                                                    <input name="website" id="website" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">{{ __('Fax') }}</label>
                                                <div class="col-sm-9">
                                                    <input name="fax" id="fax" type="text" class="form-control" />
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
                                                            <a href="{{ route('enterprises.index') }}"
                                                                style="color: inherit;">
                                                                {{ __('Cancel') }}</a>
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
    </div>

@endsection
