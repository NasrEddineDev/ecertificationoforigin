@extends('layouts.mainlayout')

@section('content')

<div class="basic-form-area mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline12-list">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">{{ __('Edit Product') }}</h4>
              <br />
              <p class="card-description"> {{ __('Product') }} </p>
              <form class="form-sample" method="post" action="{{ route('products.update', $product->id) }}" >
                @csrf
                @method('put')
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Product Name') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('HS Code') }}</label>
                      <div class="col-sm-9">
                        <input name="hs_code" id="hs_code" value="{{ $product->hs_code }}" type="text" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Product Type') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="type" value="{{ $product->type }}" id="type" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Product Brand') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="brand" value="{{ $product->brand }}" id="brand" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Product Category') }}</label>
                      <div class="col-sm-9">
                        <select name="category_id" id="category_id" class="form-control">     
                          <option value="0" disabled>
                          {{ __('Select The Category') }}</option>
                          @foreach ($categories as $category){
                              <option value="{{ $category->id }}" {{ $product->subCategory->category_id ==  $category->id ? 'selected' : '' }}>
                                  {{ $category->number . ' ' . (App()->currentLocale() == 'ar' ? $category->name_ar : (App()->currentLocale() == 'en' 
                                  ? $category->name : $category->name_fr)) }}
                              </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Product SubCategory') }}</label>
                      <div class="col-sm-9">
                        <select name="sub_category_id" id="sub_category_id" class="form-control"> 
                          <option value="0" disabled>
                          {{ __('Select The SubCategory') }}</option>
                          @foreach ($sub_categories as $sub_category){
                              <option value="{{ $sub_category->id }}" {{ $product->sub_category_id ==  $sub_category->id ? 'selected' : '' }}>
                                  {{ $sub_category->number . ' ' . (App()->currentLocale() == 'ar' ? $sub_category->name_ar : (App()->currentLocale() == 'en' 
                                  ? $sub_category->name : $sub_category->name_fr)) }}
                              </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Measure Unit') }}</label>
                      <div class="col-sm-9">
                        <select name="measure_unit" id="measure_unit" class="form-control">
                          <option value="" selected disabled>{{ __('Select The Measure Unit') }}</option>
                          <option value="KG">{{ __('Kilogram (kg), for mass (weight)') }}</option>
                          <option value="T">{{ __('Tonne (T), for mass (weight)') }}</option>
                          <option value="U">{{ __('Unit (u), for number of units') }}</option>
                          <option value="L">{{ __('Litre (L), for capacity (volume)') }}</option>
                          <option value="M">{{ __('Metre (M), for length (distance)') }}</option>
                          <option value="M²">{{ __('Square Metre (M²), for area') }}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Description') }}</label>
                      <div class="col-sm-9">
                        <input name="description" value="{{ $product->description }}" id="description" type="text" class="form-control" />
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