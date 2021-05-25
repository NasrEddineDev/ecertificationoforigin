@extends('layouts.mainlayout')

@section('content')

<div class="basic-form-area mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline12-list">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{ __('Add New Category') }}</h4>
              <br />
              <p class="card-description"> {{ __('Category') }} </p>
              <form class="form-sample" method="post" action="{{ route('categories.update', $category->id) }}" >
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                        <div class="form-group row">
                            <label
                                class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" name="name_ar" id="name_ar" class="form-control"
                                    placeholder="{{ __('Name') }}"  value="{{ $category->name_ar }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label
                                class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('English Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}"
                                    placeholder="{{ __('English Name') }}" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                        <div class="form-group row">
                            <label
                                class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('French Name') }}</label>
                            <div class="col-sm-9">
                                <input type="text" name="name_fr" id="name_fr" class="form-control" 
                                placeholder="{{ __('French Name') }}" value="{{ $category->name_fr }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label
                                class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Description') }}</label>
                            <div class="col-sm-9">
                                <input type="text" name="description" id="description" class="form-control" 
                                placeholder="{{ __('Description') }}" value="{{ $category->description }}"/>
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
                            <a href="{{ route('categories.index') }}" style="color: inherit;">{{ __('Cancel') }}</a>
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