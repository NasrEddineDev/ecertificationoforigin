@extends('layouts.mainlayout')


@Push('css')
<style>
  .error{
   color: #FF0000; 
  }
  .warning {
	color: red;
}
input.error {
	border:1px solid red!important;
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
              <h4 class="card-title">{{ __('Add New Product') }}</h4>
              <br />
              <form class="form-sample" method="post" action="{{ route('products.store') }}">
                @csrf
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Product Name') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" id="name" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('HS Code') }}</label>
                      <div class="col-sm-9">
                        <input name="hs_code" id="hs_code" type="text" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Product Type') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="type" id="type" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Product Brand') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="brand" id="brand" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Product Category') }}</label>
                      <div class="col-sm-9">
                        <select name="category" id="category" class="form-control">
                          <option value='1'>{{ __('Livestock, Livestock products and agricultural products') }}</option>
                          <option value='2'>{{ __('Agro-industrial Products') }}</option>
                          <option value='3'>{{ __('Fishery products') }}</option>
                          <option value='4'>{{ __('Mining Products') }}</option>
                          <option value='5'>{{ __('Energy and petrochemical products') }}</option>
                          <option value='6'>{{ __('Chemical, cosmetic, pharmaceutical and veterinary products') }}</option>
                          <option value='7'>{{ __('Steel and metal products') }}</option>
                          <option value='8'>{{ __('Ferrous and non-ferrous waste') }}</option>
                          <option value='9'>{{ __('Equipment, materials and products of the mechanical industry') }}</option>
                          <option value='10'>{{ __('Electrical and electronic equipment and articles') }}</option>
                          <option value='11'>{{ __('Building materials and ceramics') }}</option>
                          <option value='12'>{{ __('Cork and wooden articles') }}</option>
                          <option value='13'>{{ __('Paper and cardboard') }}</option>
                          <option value='14'>{{ __('Publishing and graphic arts') }}</option>
                          <option value='15'>{{ __('Leather goods, leathers and skins') }}</option>
                          <option value='16'>{{ __('Handicraft products') }}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Measure Unit') }}</label>
                      <div class="col-sm-9">
                        <select name="measure_unit" id="measure_unit" class="form-control">
                          <option value="" selected disabled>{{ __('Select The Measure Unit') }}</option>
                          <option value="kG">{{ __('Mass - kilogram (kg)') }}</option>
                          <option value="M">{{ __('Length - meter (m)') }}</option>
                          <option value="U">{{ __('Number of units - unit (u)') }}</option>
                          <option value="L">{{ __('Liters- liter (L)') }}</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Net Weight') }}</label>
                      <div class="col-sm-9">
                        <input name="net_weight" id="net_weight" type="text" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Real Weight') }}</label>
                      <div class="col-sm-9">
                        <input name="real_weight" id="real_weight" type="text" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div> --}}

                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Description') }}</label>
                      <div class="col-sm-9">
                        <input name="description" id="description" type="text" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>

                {{-- <p class="card-description"> {{ __('Package') }} </p>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Package Type') }}</label>
                      <div class="col-sm-9">
                        <input name="package_type" id="package_type" type="text" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">{{ __('Package Count') }}</label>
                      <div class="col-sm-9">
                        <input name="package_count" id="package_count" type="text" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div> --}}

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

@Push('js') 
<script src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
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



$.validator.addMethod("emailcheck", function(value, element, regexp) {
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
            $.validator.addMethod("passwordcheck", function(value) {
                return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                    &&
                    /[a-z]/.test(value) // has a lowercase letter
                    &&
                    /\d/.test(value) // has a digit
            });

            var account_validator = $(".form-sample").validate({

rules: {
  name: {
        required: true
    },
    type: {
        required: true
    },
    measure_unit: {
        required: true
    },
    hs_code: {
        required: true
    },
},
messages: {

  name: {
        required: "Please enter Name",
    },
    type: {
        required: "Please enter Type",
    },
    hs_code: {
        required: "Please enter HS Code",
    },
    measure_unit: {
        required: "Please enter Measure Unit",
    },
},
});


    });
</script>
@endpush