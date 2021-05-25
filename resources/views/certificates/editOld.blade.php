@extends('layouts.mainlayout')

@section('content')

<div class="basic-form-area mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline12-list">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{ __('Add New Product') }}</h4>
              <br />
              <p class="card-description"> {{ __('Product') }} </p>
              <form class="form-sample" method="post" action="{{ route('products.update', $product->id) }}" >
                @csrf
                @method('put')
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Product Name') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Order Number') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="order_number" id="order_number" value="{{ $product->order_number }}" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Product Brand') }}</label>
                      <div class="col-sm-9">
                        <select name="brand" id="brand" class="form-control">
                          <option>{{ __('Alafia') }}</option>
                          <option>{{ __('Elio') }}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Product Type') }}</label>
                      <div class="col-sm-9">
                        <select name="type" id="type" class="form-control">
                          <option>{{ __('Food') }}</option>
                          <option>{{ __('Petrol') }}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Product Category') }}</label>
                      <div class="col-sm-9">
                        <select name="category" id="category" class="form-control">
                          <option>{{ __('Category1') }}</option>
                          <option>{{ __('Category2') }}</option>
                          <option>{{ __('Category3') }}</option>
                          <option>{{ __('Category4') }}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('HS Code') }}</label>
                      <div class="col-sm-9">
                        <input name="hs_code" id="hs_code" type="text" value="{{ $product->hs_code }}" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Net Weight') }}</label>
                      <div class="col-sm-9">
                        <input name="net_weight" id="net_weight" value="{{ $product->net_weight }}" type="text" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Real Weight') }}</label>
                      <div class="col-sm-9">
                        <input name="real_weight" id="real_weight" value="{{ $product->real_weight }}" type="text" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Description') }}</label>
                      <div class="col-sm-9">
                        <input name="description" id="description" value="{{ $product->description }}" type="text" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>

                <p class="card-description"> {{ __('Package') }} </p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Package Type') }}</label>
                      <div class="col-sm-9">
                        <input name="package_type" id="package_type" value="{{ $product->package_type }}" type="text" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Package Count') }}</label>
                      <div class="col-sm-9">
                        <input name="package_count" id="package_count" value="{{ $product->package_count }}" type="text" class="form-control" />
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
                            <a href="{{ route('products.index') }}" style="color: inherit;">{{ __('Cancel') }}</a>
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