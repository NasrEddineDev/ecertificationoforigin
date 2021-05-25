@extends('layouts.mainlayout')

@Push('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('CustomFileInputs/css/normalize.css') }}" />
    <!-- <link rel="stylesheet" type="text/css" href=" URL::asset('CustomFileInputs/css/demo.css') " /> -->
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
                                <form class="form-sample" method="post" action="{{ route('enterprises.update', $enterprise->id) }}" >
                                  @csrf
                                  @method('put')
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Name') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="{{ $enterprise->name }}" name="name" id="name" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                          @if (Auth::User()->role->name != 'user' )
                                          <div class="form-group row">
                                              <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Status and Balance') }}</label>
                                              <div class="col-sm-9">
                                                  <select name="status" id="status" class="form-control">
                                                      <option value="" disabled>{{ __('Select The Status') }}</option>
                                                      <option value="PENDING" {{ $enterprise->status == "PENDING" ? 'selected' : '' }}>{{ __('Pending') }}</option>
                                                      <option value="ACTIVATED" {{ $enterprise->status == "ACTIVATED" ? 'selected' : '' }}>{{ __('Activated') }}</option>
                                                      <option value="STOPPED" {{ $enterprise->status == "STOPPED" ? 'selected' : '' }}>{{ __('Stopped') }} </option>
                                                      <option value="OTHER" {{ $enterprise->status == "OTHER" ? 'selected' : '' }}>{{ __('Other') }}</option>
                                                  </select>
                                              </div>  
                                              {{-- <div class="col-sm-5 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                                <input type="text" value="{{ $enterprise->balance }}" name="balance" id="balance" class="form-control" />
                                              </div> --}}
                                          </div>
                                          @else
                                          <input hidden type="text" value="{{ $enterprise->status }}" name="status" id="status" class="form-control" />
                                          <input hidden type="text" value="{{ $enterprise->balance }}" name="balance" id="balance" class="form-control" />
                                          @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
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
                                            </div>
                                        </div>
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Legal Form') }}</label>
                                                <div class="col-sm-9">
                                                    <select name="legal_form" id="legal_form" class="form-control">
                                                        <option value="" disabled>{{ __('Select The Legal Form') }}</option>
                                                        <option value="0" {{ $enterprise->legal_form == "0" ? 'selected' : '' }}>
                                                            {{ __('SPA') }}</option>
                                                        <option value="1" {{ $enterprise->legal_form == "1" ? 'selected' : '' }}>
                                                            {{ __('SARL') }}</option>
                                                        <option value="2" {{ $enterprise->legal_form == "2" ? 'selected' : '' }}>
                                                            {{ __('EURL') }}</option>
                                                        <option value="3" {{ $enterprise->legal_form == "3" ? 'selected' : '' }}>
                                                            {{ __('ETS') }}</option>
                                                        <option value="4" {{ $enterprise->legal_form == "4" ? 'selected' : '' }}>
                                                            {{ __('SNC') }}</option>
                                                        <option value="5" {{ $enterprise->legal_form == "5" ? 'selected' : '' }}>
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
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Type Of Exporter') }}</label>
                                                <div class="col-sm-9">
                                                    <select name="exporter_type" id="exporter_type" class="form-control">
                                                        <option value="" disabled>{{ __('Select The Type Of Exporter') }}</option>
                                                        <option value="TRADER" {{ $enterprise->exporter_type == "TRADER" ? 'selected' : '' }}>
                                                        {{ __('Trader') }}</option>
                                                        <option value="PRODUCER" {{ $enterprise->exporter_type == "PRODUCER" ? 'selected' : '' }}>
                                                            {{ __('Producer') }}</option>
                                                        <option value="CRAFTSMAN" {{ $enterprise->exporter_type == "CRAFTSMAN" ? 'selected' : '' }}>
                                                            {{ __('Craftsman') }}</option>
                                                        <option value="FARMER" {{ $enterprise->exporter_type == "FARMER" ? 'selected' : '' }}>
                                                            {{ __('Farmer') }} </option>
                                                        <option value="OTHER" {{ $enterprise->exporter_type == "OTHER" ? 'selected' : '' }}>
                                                            {{ __('Other') }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Trade Register') }}</label>
                                                <div class="col-sm-9">
                                                  <div class="form-holder">
                                                    <div class="box">
                                                        <input type="file" name="rc" id="rc" class="inputfile inputfile-2"
                                                            data-multiple-caption="{count} files selected" multiple />
                                                        <label for="rc"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="17" viewBox="0 0 20 17">
                                                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                            </svg>
                                                            <span>{{ __('Choose the RC file') }}</span>
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
                                                <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Tax Identification Number') }}</label>
                                                <div class="col-sm-9">
                                                  <div class="form-holder">
                                                    <div class="box">
                                                        <input type="file" name="nif" id="nif" class="inputfile inputfile-2"
                                                            data-multiple-caption="{count} files selected" multiple />
                                                        <label for="nif"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="17" viewBox="0 0 20 17">
                                                                <path
                                                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                            </svg>
                                                            <span>{{ __('Choose the NIF file') }}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Statistical Identification Number') }}</label>
                                                <div class="col-sm-9">
                                                  <div class="form-holder">
                                                    <div class="box">
                                                        <input type="file" name="nis" id="nis" class="inputfile inputfile-2"
                                                            data-multiple-caption="{count} files selected" multiple />
                                                        <label for="nis"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="17" viewBox="0 0 20 17">
                                                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z" />
                                                            </svg>
                                                            <span>{{ __('Choose the NIS file') }}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-md-6">
                                          <!-- <div class="form-group row">
                                              <label class="col-sm-3 col-form-label">{{ __('Activity Code') }}</label>
                                              <div class="col-sm-9">
                                                  <input value="{{ $enterprise->activity_code }}" name="activity_code" id="activity_code" type="text"
                                                      class="form-control" />
                                              </div>
                                          </div> -->
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group row">
                                              <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Export Activity Code') }}</label>
                                              <div class="col-sm-9">
                                                  <input value="{{ $enterprise->export_activity_code }}" name="export_activity_code" id="export_activity_code" type="text"
                                                      class="form-control" />
                                              </div>
                                          </div>
                                      </div>
                                    </div>

                                    <p class="card-description"> {{ __('Contact Information') }} </p>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Address') }}</label>
                                                <div class="col-sm-9">
                                                    <input value="{{ $enterprise->address }}" name="address" id="address" type="text"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Email') }}</label>
                                                <div class="col-sm-9">
                                                    <input value="{{ $enterprise->email }}" name="email" id="email" type="text"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Mobile') }}</label>
                                                <div class="col-sm-9">
                                                    <input value="{{ $enterprise->mobile }}" name="mobile" id="mobile" type="text"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Tel') }}</label>
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
                                                <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Website') }}</label>
                                                <div class="col-sm-9">
                                                    <input value="{{ $enterprise->website }}" name="website" id="website" type="text"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Fax') }}</label>
                                                <div class="col-sm-9">
                                                    <input value="{{ $enterprise->fax }}" name="fax" id="fax" type="text"
                                                        class="form-control" />
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

@endsection
