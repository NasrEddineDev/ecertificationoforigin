@extends('layouts.mainlayout')

@Push('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/component.css') }}" />
    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('select2/css/select2.min.css') }}">
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
            padding: 0.3rem 1.25rem;
            border: 1px solid currentColor;
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

        .select2-container {
            z-index: 999;
        }

        .select2 {
            z-index: 999;
        }

        .select2-drop-active {
            margin-top: -25px;
        }

        .select2-dropdown {
            z-index: 999 !important;
            position: absolute;
            cursor: default;
        }

        .selectRow {
            display: block;
            padding: 20px;
        }

        .select2-container {
            width: 100%;
        }

        .select2-drop-active {
            margin-top: -25px;
        }
        .error{
   color: #FF0000; 
  }
  .error + span > span>span{
   border: 1px solid #FF0000!important; 
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
                                <h4 class="card-title">{{ __('Edit Enterprise') }}</h4>
                                <br />
                                <p class="card-description"> {{ __('General Information') }} </p>
                                <form class="form-sample" method="post" enctype="multipart/form-data"
                                    action="{{ route('enterprises.update', $enterprise->id) }}">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Name') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="{{ $enterprise->name }}" name="name"
                                                        id="name" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            @if (Auth::User()->role->name != 'user')
                                                <div class="form-group row">
                                                    <label
                                                        class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Status') }}</label>
                                                    <div class="col-sm-9">
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="" disabled>{{ __('Select The Status') }}
                                                            </option>
                                                            <option value="PENDING"
                                                                {{ $enterprise->status == 'PENDING' ? 'selected' : '' }}>
                                                                {{ __('Pending') }}</option>
                                                            <option value="ACTIVATED"
                                                                {{ $enterprise->status == 'ACTIVATED' ? 'selected' : '' }}>
                                                                {{ __('Activated') }}</option>
                                                            <option value="STOPPED"
                                                                {{ $enterprise->status == 'STOPPED' ? 'selected' : '' }}>
                                                                {{ __('Stopped') }} </option>
                                                            <option value="OTHER"
                                                                {{ $enterprise->status == 'OTHER' ? 'selected' : '' }}>
                                                                {{ __('Other') }}</option>
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-sm-5 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                <input type="text" value="{{ $enterprise->balance }}" name="balance" id="balance" class="form-control" />
                                              </div> --}}
                                                </div>
                                            @else
                                                <input hidden type="text" value="{{ $enterprise->status }}" name="status"
                                                    id="status" class="form-control" />
                                                <input hidden type="text" value="{{ $enterprise->balance }}"
                                                    name="balance" id="balance" class="form-control" />
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Type Of Exporter') }}</label>
                                                <div class="col-sm-9">
                                                    <select name="exporter_type" id="exporter_type" class="form-control">
                                                        <option value="" disabled>{{ __('Select The Type Of Exporter') }}
                                                        </option>
                                                        <option value="TRADER"
                                                            {{ $enterprise->exporter_type == 'TRADER' ? 'selected' : '' }}>
                                                            {{ __('Trader') }}</option>
                                                        <option value="PRODUCER"
                                                            {{ $enterprise->exporter_type == 'PRODUCER' ? 'selected' : '' }}>
                                                            {{ __('Producer') }}</option>
                                                        <option value="CRAFTSMAN"
                                                            {{ $enterprise->exporter_type == 'CRAFTSMAN' ? 'selected' : '' }}>
                                                            {{ __('Craftsman') }}</option>
                                                        <option value="FARMER"
                                                            {{ $enterprise->exporter_type == 'FARMER' ? 'selected' : '' }}>
                                                            {{ __('Farmer') }} </option>
                                                        <option value="OTHER"
                                                            {{ $enterprise->exporter_type == 'OTHER' ? 'selected' : '' }}>
                                                            {{ __('Other') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Type Of Activity') }}</label>
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
                                            </div> --}}
                                        </div>
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Legal Form') }}</label>
                                                <div class="col-sm-9">
                                                    <select name="legal_form" id="legal_form" class="form-control">
                                                        <option value="" disabled>{{ __('Select The Legal Form') }}
                                                        </option>
                                                        <option value="0"
                                                            {{ $enterprise->legal_form == '0' ? 'selected' : '' }}>
                                                            {{ __('SPA') }}</option>
                                                        <option value="1"
                                                            {{ $enterprise->legal_form == '1' ? 'selected' : '' }}>
                                                            {{ __('SARL') }}</option>
                                                        <option value="2"
                                                            {{ $enterprise->legal_form == '2' ? 'selected' : '' }}>
                                                            {{ __('EURL') }}</option>
                                                        <option value="3"
                                                            {{ $enterprise->legal_form == '3' ? 'selected' : '' }}>
                                                            {{ __('ETS') }}</option>
                                                        <option value="4"
                                                            {{ $enterprise->legal_form == '4' ? 'selected' : '' }}>
                                                            {{ __('SNC') }}</option>
                                                        <option value="5"
                                                            {{ $enterprise->legal_form == '5' ? 'selected' : '' }}>
                                                            {{ __('Other') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-lg-3 col-md-5 col-sm-12 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Export Activity Code') }}</label>
                                                <div class="col-lg-9 col-md-7 col-sm-12">
                                                    <select id="activities" class="activities select2 form-control"
                                                        name="activities[]" multiple="multiple" required>

                                                        {{-- @foreach (explode(',', $settings->where('name', 'Offers List')->first()->value) as $offer)
                                                            <option selected value="{{ $offer }}">
                                                                {{ $offer }}</option>
                                                        @endforeach --}}

                                                        {{-- @foreach ($enterprise->activities as $activity)
                                                            <option value="{{ $activity->id }}">
                                                                {{ $activity->code . ' ' . $activity->name_ar }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Trade Register') }}</label>
                                                <div class="col-sm-4">
                                                    <input type="text" value="{{ $enterprise->rc_number }}"
                                                        placeholder="{{ __('RC Number') }}" name="rc_number"
                                                        id="rc_number" class="form-control" />
                                                </div>

                                                <div class="col-lg-1 col-md-1 col-sm-1">
                                                    <div class="toolbar add-product dt-tb">
                                                        <a id="previewRc" href="#"
                                                            style="padding: 8px 12px;margin-left:-10px;height: 40px;top:auto;{{ App()->currentLocale() == 'ar' ? 'right:auto;left: 35px;' : '' }}">
                                                            <i class="fa fa-eye fa-lg"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
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
                                                                <span>{{ $enterprise->rc }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                    {{ __('Tax Identification') }}</label>
                                                <div class="col-sm-4">
                                                    <input type="text" value="{{ $enterprise->rc_number }}"
                                                        placeholder="{{ __('NIF Number') }}" name="nif_number"
                                                        id="nif_number" class="form-control" />
                                                </div>

                                                <div class="col-lg-1 col-md-1 col-sm-1">
                                                    <div class="toolbar add-product dt-tb">
                                                        <a id="previewNif" href="#"
                                                            style="padding: 8px 12px;margin-left:-10px;height: 40px;top:auto;{{ App()->currentLocale() == 'ar' ? 'right:auto;left: 35px;' : '' }}">
                                                            <i class="fa fa-eye fa-lg"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
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
                                                                <span>{{ $enterprise->nif }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Statistical Identification') }}</label>
                                                <div class="col-sm-4">
                                                    <input type="text" value="{{ $enterprise->rc_number }}"
                                                        placeholder="{{ __('NIS Number') }}" name="nis_number"
                                                        id="nis_number" class="form-control" />
                                                </div>

                                                <div class="col-lg-1 col-md-1 col-sm-1">
                                                    <div class="toolbar add-product dt-tb">
                                                        <a id="previewNis" href="#"
                                                            style="padding: 8px 12px;margin-left:-10px;height: 40px;top:auto;{{ App()->currentLocale() == 'ar' ? 'right:auto;left: 35px;' : '' }}">
                                                            <i class="fa fa-eye fa-lg"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-holder">
                                                        <div class="box">
                                                            <input type="file" name="nis" id="nis"
                                                                class="inputfile inputfile-2"
                                                                data-multiple-caption="{count} files selected" multiple />
                                                            <label for="nis"><svg xmlns="http://www.w3.org/2000/svg"
                                                                    width="20" height="17" viewBox="0 0 20 17">
                                                                    <path
                                                                        d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                                </svg>
                                                                <span>{{ $enterprise->nis }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col-md-6">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Export Activity Code') }}</label>
                                                <div class="col-sm-9">
                                                    <input value="{{ $enterprise->export_activity_code }}"
                                                        name="export_activity_code" id="export_activity_code" type="text"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <p class="card-description"> {{ __('Contact Information') }} </p>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Address') }}</label>
                                                <div class="col-sm-9">
                                                    <input value="{{ $enterprise->address }}" name="address" id="address"
                                                        type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Email') }}</label>
                                                <div class="col-sm-9">
                                                    <input value="{{ $enterprise->email }}" name="email" id="email"
                                                        type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('State') }}</label>
                                                <div class="col-sm-9">
                                                    <select name="state_code" id="state_code" class="form-control"
                                                        style="margin-top: 0;"
                                                        {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('City') }}</label>
                                                <div class="col-sm-9">
                                                    <select name="city_id" id="city_id" class="form-control"
                                                        style="margin-top: 0;"
                                                        {{ App::currentLocale() == 'ar' ? 'dir=rtl' : '' }}>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Mobile') }}</label>
                                                <div class="col-sm-9">
                                                    <input value="{{ $enterprise->mobile }}" name="mobile" id="mobile"
                                                        type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Tel') }}</label>
                                                <div class="col-sm-9">
                                                    <input value="{{ $enterprise->tel }}" name="tel" id="tel" type="text"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Website') }}</label>
                                                <div class="col-sm-9">
                                                    <input value="{{ $enterprise->website }}" name="website"
                                                        id="website" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Fax') }}</label>
                                                <div class="col-sm-9">
                                                    <input value="{{ $enterprise->fax }}" name="fax" id="fax"
                                                        type="text" class="form-control" />
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
    </div>

    <div id="InformationproModalhdbgcl" class="modal modal-edu-general Customwidth-popup-WarningModal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-6">
                    <h4 class="modal-title">{{ __('CACI E-Certification') }}</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <div class="modal-body">

                    <object style="width:100%;" id="object" data="">
                        <embed id="embed" src="" />
                    </object>
                    {{-- <iframe id="iframe" src="" type="application/pdf" width="100%" height="900px;"></iframe> --}}
                    {{-- src="{{ asset('data/enterprises/' . Auth::User()->Enterprise->id . '/certificates/gzal-draft.pdf') }}" --}}

                </div>
                <div class="modal-footer danger-md" style="background-color: #65b12d!important;">
                </div>
            </div>
        </div>
    </div>

    <div id="loadingDiv" class="spinner-border text-success" role="status"
        style="width: 100%; height: 100%;position: absolute">
        <div class="inner" style="width: 200px; height: 200px;text-align:center"><svg xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
                style="margin: auto; display: block; /*! shape-rendering: auto; */" width="200px" height="200px"
                viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <g transform="translate(50,50)">
                    <circle cx="0" cy="0" r="10" fill="none" stroke="#d74946" stroke-width="4"
                        stroke-dasharray="31.41592653589793 31.41592653589793">
                        <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1"
                            dur="0.48076923076923084s" calcMode="spline" keySplines="0.2 0 0.8 1" begin="0"
                            repeatCount="indefinite"></animateTransform>
                    </circle>
                    <circle cx="0" cy="0" r="20" fill="none" stroke="#0069ce" stroke-width="4"
                        stroke-dasharray="62.83185307179586 62.83185307179586">
                        <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1"
                            dur="0.48076923076923084s" calcMode="spline" keySplines="0.2 0 0.8 1"
                            begin="-0.12019230769230771" repeatCount="indefinite"></animateTransform>
                    </circle>
                    <circle cx="0" cy="0" r="30" fill="none" stroke="#f0af31" stroke-width="4"
                        stroke-dasharray="94.24777960769379 94.24777960769379">
                        <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1"
                            dur="0.48076923076923084s" calcMode="spline" keySplines="0.2 0 0.8 1"
                            begin="-0.24038461538461542" repeatCount="indefinite"></animateTransform>
                    </circle>
                    <circle cx="0" cy="0" r="40" fill="none" stroke="#94b224" stroke-width="4"
                        stroke-dasharray="125.66370614359172 125.66370614359172">
                        <animateTransform attributeName="transform" type="rotate" values="0 0 0;360 0 0" times="0;1"
                            dur="0.48076923076923084s" calcMode="spline" keySplines="0.2 0 0.8 1"
                            begin="-0.36057692307692313" repeatCount="indefinite"></animateTransform>
                    </circle>
                </g>
                <!-- [ldio] generated by https://loading.io/ -->
            </svg>
            <span class="sr-only">{{ __('Loading...') }}</span>
        </div>
    </div>

@endsection

@Push('js')
    <script src="{{ URL::asset('CustomFileInputs/js/custom-file-input.js') }}"></script>
    <script src="{{ URL::asset('select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/lang/messages_' . App()->currentLocale() . '.js') }}"></script>
    <script type="text/javascript">
        var $loading = $('#loadingDiv').hide();
        $(document)
            .ajaxStart(function() {
                var curr = $('body').height()
                $('.spinner-border').height(curr);
                $loading.show();
            })
            .ajaxStop(function() {
                $loading.hide();
            });

        $(document).ready(function() {
            var lang = "{{ App()->currentLocale() }}";
            var dir = '';
            if (lang == 'ar') dir = 'rtl';
            else dir = 'ltr';
            $('#activities').select2({
                // width: 'resolve',
                dir: dir,
                width: $('.content').width(),
                placeholder: '{{ __('Type Activities Codes') }}',
                allowClear: true,
                tokenSeparators: [","],
                // tags: true,
                ajax: {
                    url: '/getactivities',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        console.log(data);
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.code + ' ' + item.name_ar,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                },
                templateSelection: function(data, container) {
                    // Add custom attributes to the <option> tag for the selected option
                    $(data.element).attr('data-custom-attribute', data.code);
                    return data.text.substr(0, data.text.indexOf(' '));
                },
                language: {
                    "noResults": function() {
                        return '{{ __('No Activities Found') }}';
                    }
                },
                escapeMarkup: function(markup) {
                    return markup;
                }
            });


            // Fetch the preselected item, and add to the control
            var activitiesSelect = $('#activities');
            $.ajax({
                type: 'GET',
                url: '/getselectedactivities/{{ $enterprise->id }}'
            }).then(function(data) {
                // create the option and append to Select2
                $.each(data.activities, function(index, activity) {
                    var option = new Option(activity.code + ' ' + activity.name_ar, activity.id,
                        true, true);
                    activitiesSelect.append(option).trigger('change');
                })

                // manually trigger the `select2:select` event
                activitiesSelect.trigger({
                    type: 'select2:select',
                    params: {
                        data: data.activities
                    }
                });
            });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/getalgerianstates",
                type: "GET",
                success: function(data) {
                    $('#state_code').empty();
                    $('#state_code').append(
                        '<option value="0" disabled>{{ __('Select The State') }}</option>'
                    );
                    $.each(data.states, function(index, city) {
                        $('#state_code').append('<option value="' + city.value +
                            '" ' + (city.value ==
                                '{{ $enterprise->city->wilaya_code }}' ?
                                'selected' : '') + '>' + city.text + '</option>');
                    })
                }
            });

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/getcities/{{ $enterprise->city->wilaya_code }}",
                type: "GET",
                success: function(data) {
                    $('#city_id').empty();
                    $('#city_id').append(
                        '<option value="0" disabled selected>{{ __('Select The City') }}</option>'
                    );
                    $.each(data.cities, function(index, city) {
                        $('#city_id').append('<option value="' + city.value + '" ' + (city
                            .value == '{{ $enterprise->city->id }}' ?
                            'selected' : '') + '>' + city.text + '</option>');
                    })
                }
            });

            $(document).on('change', '#state_code', function() {
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
                            $('#city_id').append('<option value="' + city.value + '">' +
                                city.text + '</option>');
                        })
                    }
                })
            });

            $(document).on('click', '#previewRc', function() {
                var w = window,
                    d = document,
                    e = d.documentElement,
                    g = d.getElementsByTagName('body')[0],
                    y = w.innerHeight || e.clientHeight || g.clientHeight;

                var object = document.getElementById("object");
                object.height = y * 8.4 / 10;
                object.data =
                    "{{ url('data/enterprises/' . $enterprise->id . '/' . 'documents/' . $enterprise->rc) }}";
                var embed = document.getElementById("embed");
                embed.src =
                    "{{ url('data/enterprises/' . $enterprise->id . '/' . 'documents/' . $enterprise->rc) }}";
                $('#InformationproModalhdbgcl').modal('show');
            });

            $(document).on('click', '#previewNif', function() {
                var w = window,
                    d = document,
                    e = d.documentElement,
                    g = d.getElementsByTagName('body')[0],
                    y = w.innerHeight || e.clientHeight || g.clientHeight;

                var object = document.getElementById("object");
                object.height = y * 8.4 / 10;
                object.data =
                    "{{ url('data/enterprises/' . $enterprise->id . '/' . 'documents/' . $enterprise->nif) }}";
                var embed = document.getElementById("embed");
                embed.src =
                    "{{ url('data/enterprises/' . $enterprise->id . '/' . 'documents/' . $enterprise->nif) }}";
                $('#InformationproModalhdbgcl').modal('show');
            });

            $(document).on('click', '#previewNis', function() {
                var w = window,
                    d = document,
                    e = d.documentElement,
                    g = d.getElementsByTagName('body')[0],
                    y = w.innerHeight || e.clientHeight || g.clientHeight;

                var object = document.getElementById("object");
                object.height = y * 8.4 / 10;
                object.data =
                    "{{ url('data/enterprises/' . $enterprise->id . '/' . 'documents/' . $enterprise->nis) }}";
                var embed = document.getElementById("embed");
                embed.src =
                    "{{ url('data/enterprises/' . $enterprise->id . '/' . 'documents/' . $enterprise->nis) }}";
                $('#InformationproModalhdbgcl').modal('show');
            });

            var validator = $(".form-sample").validate({});

        });

    </script>
@endpush
