@extends('layouts.mainlayout')

@section('content')

<div class="basic-form-area mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline12-list">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{ __('Add New Producer') }}</h4>
              <br />
              <p class="card-description"> {{ __('Producer') }} </p>
              <form class="form-sample" method="post" action="{{ route('producers.update', $producer->id) }}">
                @csrf
                @method('put')
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Producer Name') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" id="name" class="form-control"  value="{{ $producer->name }}"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Legal Form') }}</label>
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
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Type Of Activity') }}</label>
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
                      <label class="col-sm-3 col-form-label">{{ __('Producer Type') }}</label>
                      <div class="col-sm-9">
                        <select name="type" id="type" class="form-control" value="{{ $producer->type }}">
                          <option value="1">{{ __('Type 01') }}</option>
                          <option value="2">{{ __('Type 02') }}</option>
                          <option value="3">{{ __('Type 03') }}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>

                <p class="card-description"> {{ __('Contact') }} </p>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                      <div class="col-sm-9">
                        <input name="email" id="email" type="text" class="form-control" value="{{ $producer->email }}"/> 
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Mobile') }}</label>
                      <div class="col-sm-9">
                        <input name="mobile" id="mobile" type="text" class="form-control" value="{{ $producer->mobile }}" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Address') }}</label>
                      <div class="col-sm-9">
                        <input name="address" id="address" type="text" class="form-control" value="{{ $producer->address }}" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('tel') }}</label>
                      <div class="col-sm-9">
                        <input name="tel" id="tel" type="text" class="form-control" value="{{ $producer->tel }}" />
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Website') }}</label>
                      <div class="col-sm-9">
                        <input name="website" id="website" type="text" class="form-control" value="{{ $producer->website }}" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Fax') }}</label>
                      <div class="col-sm-9">
                        <input name="fax" id="fax" type="text" class="form-control" value="{{ $producer->fax }}" />
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
                            <a href="{{ route('producers.index') }}" style="color: inherit;">{{ __('Cancel') }}</a>
                          </button>
                          <button type="submit" class="btn btn-primary login-submit-cs">{{ __('Save Change') }}</button>
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