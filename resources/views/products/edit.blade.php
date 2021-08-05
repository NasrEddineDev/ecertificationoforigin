@extends('layouts.mainlayout')

@Push('css')
    <style>
        .error {
            color: #FF0000;
        }

        .warning {
            color: red;
        }

        input.error {
            border: 1px solid red !important;
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
              <h4 class="card-title">{{ __('Edit Product') }}</h4>
              <br />
              <p class="card-description"> {{ __('Product') }} </p>
              <form class="form-sample" method="post" action="{{ route('products.update', $product->id) }}" >
                @csrf
                @method('put')
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Product Name') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control" required/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('HS Code') }}</label>
                      <div class="col-sm-9">
                        <input name="hs_code" id="hs_code" value="{{ $product->hs_code }}" type="text" class="form-control" required/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Measure Unit') }}</label>
                      <div class="col-sm-9">
                        <select name="measure_unit" id="measure_unit" class="form-control" required>
                          <option value="" selected disabled>{{ __('Select The Measure Unit') }}</option>
                          <option value="KG" {{ $product->measure_unit ==  "KG" ? 'selected' : '' }}>{{ __('Kilogram (kg), for mass (weight)') }}</option>
                          <option value="T" {{ $product->measure_unit ==  "T" ? 'selected' : '' }}>{{ __('Tonne (T), for mass (weight)') }}</option>
                          <option value="U" {{ $product->measure_unit ==  "U" ? 'selected' : '' }}>{{ __('Unit (u), for number of units') }}</option>
                          <option value="L" {{ $product->measure_unit ==  "L" ? 'selected' : '' }}>{{ __('Litre (L), for capacity (volume)') }}</option>
                          <option value="M" {{ $product->measure_unit ==  "M" ? 'selected' : '' }}>{{ __('Metre (M), for length (distance)') }}</option>
                          <option value="M²" {{ $product->measure_unit ==  "M²" ? 'selected' : '' }}>{{ __('Square Metre (M²), for area') }}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Product Brand') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="brand" value="{{ $product->brand }}" id="brand" class="form-control" required/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Product Category') }}</label>
                      <div class="col-sm-9">
                        <select name="category_id" id="category_id" class="form-control" required>     
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
                      <label class="required col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Product SubCategory') }}</label>
                      <div class="col-sm-9">
                        <select name="sub_category_id" id="sub_category_id" class="form-control" required> 
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
                          <label
                              class="required col-md-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Enterprise') }}</label>
                          <div class="col-md-9">
                              <select name="enterprise_id" id="enterprise_id" class="form-control"
                                  required>
                                  <option selected disabled>{{ __('Select The Enterprise') }}
                                  </option>
                                  @foreach ($enterprises as $enterprise){
                                      <option value="{{ $enterprise->id }}"  {{ $product->enterprise->id ==  $enterprise->id ? 'selected' : '' }}>
                                          {{ __($enterprise->name) }}
                                      </option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
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
                          <button type="button" class="btn btn-white">
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

@Push('js')
    <script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/lang/messages_' . App()->currentLocale() . '.js') }}"></script>
    <script src="{{ URL::asset('js/input-mask/jquery.inputmask.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            //       $('.activity_type_name').hide();
            // $('#activity_type').on('change', function() {
            //     if (this.value == 'OTHER') {
            //         $('.activity_type_name').show();
            //     } else {
            //         $('.activity_type_name').hide();
            //     }
            // });


            $('#category_id').on('change', function() {
                var selectedCategory = $('#category_id').find(":selected").val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/getsubcategories/" + selectedCategory,
                    type: "GET",
                    success: function(data) {
                        $('#sub_category_id').empty();
                        $('#sub_category_id').append(
                            '<option value="0" disabled selected>{{ __('Select The SubCategory') }}</option>'
                        );
                        $.each(data.subCategories, function(index, subCategory) {
                            $('#sub_category_id').append('<option value="' + subCategory
                                .value +
                                '">' + subCategory.text + '</option>');
                        })
                    }
                })
            });

            $.validator.addMethod("formatcheck", function(value, element, regexp) {
                /* Check if the value is truthy (avoid null.constructor) & if it's not a RegEx. (Edited: regex --> regexp)*/
                if (regexp && regexp.constructor != RegExp) {
                    /* Create a new regular expression using the regex argument. */
                    regexp = new RegExp(regexp);
                }
                /* Check whether the argument is global and, if so set its last index to 0. */
                else if (regexp.global) regexp.lastIndex = 0;
                /* Return whether the element is optional or the result of the validation. */
                return this.optional(element) || regexp.test(value);
            });

            var account_validator = $(".form-sample").validate({
                rules: {
                  hs_code: {
                        required: true,
                        formatcheck: '[0-9]{2}.[0-9]{4}.[0-9]{4}',
                    },
                },
                messages: {
                  hs_code: {
                        required: "{{ __('This field is required.') }}",
                        formatcheck: "{{ __('Incorrect Format') }}",
                    },
                },
            });

            $('#hs_code').inputmask("99.9999.9999"); //specifying options

        });
    </script>
@endpush