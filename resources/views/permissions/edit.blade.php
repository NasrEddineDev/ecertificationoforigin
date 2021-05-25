@extends('layouts.mainlayout')

@section('content')

<div class="basic-form-area mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline12-list">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{ __('Edit Role') }}</h4>
              <br />
              <form class="form-sample" method="post" action="{{ route('roles.update', $role->id) }}" >
                @csrf
                @method('put')
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Role Name') }}</label>
                      <div class="col-sm-9">
                        <input type="text" value="{{ $role->name }}" name="name" id="name" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <p class="card-description"> {{ __('Permissions') }} </p>

                <div class="form-group-inner">
                  <div class="login-btn-inner">
                    <div class="row">
                      <div class="col-lg-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}" style="text-align: center">
                        <div class="login-horizental cancel-wp form-bc-ele">
                          <button type="submit" class="btn btn-white">
                            <a href="{{ route('roles.index') }}" style="color: inherit;">{{ __('Cancel') }}</a>
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