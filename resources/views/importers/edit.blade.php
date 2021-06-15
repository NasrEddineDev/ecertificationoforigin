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
              <h4 class="card-title">{{ __('Edit Importer') }}</h4>
              <br />
              <p class="card-description"> {{ __('Importer') }} </p>
              <form class="form-sample" method="post" action="{{ route('importers.update', $importer->id) }}">
                @csrf
                @method('put')
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Importer Name') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" id="name" class="form-control" value="{{ $importer->name }}"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Legal Form') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="legal_form" id="legal_form" class="form-control" value="{{ $importer->legal_form }}"/>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Type Of Activity') }}</label>
                      <div class="col-sm-9">                                
                        <select name="activity_type" id="activity_type" class="form-control">
                          <option value="02" disabled selected>{{ __('Select The Type Of Activity') }}</option>
                          @if (isset($categories))
                              @foreach ($categories as $category){
                                  <option value="{{ $category->id }}" {{ $importer->category_id ==  $category->id  ? 'selected' : ''}}>
                                      {{ App()->currentLocale() == 'ar' ? $category->name_ar :
                                      (App()->currentLocale() == 'en' ? $category->name : $category->name_fr) }}</option>
                              @endforeach
                          @endif
                    </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row activity_type_name">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Type Of Activity') }}</label>
                      <div class="col-sm-9">
                        <input type="text" name="activity_type_name" id="activity_type_name" class="form-control"  value="{{ $importer->activity_type_name }}"/>
                      </div>
                      {{-- <label class="col-sm-3 col-form-label">{{ __('Importer Type') }}</label>
                      <div class="col-sm-9">
                        <select name="type" id="type" class="form-control">
                          <option>{{ __('Type 01') }}</option>
                          <option>{{ __('Type 02') }}</option>
                          <option>{{ __('Type 03') }}</option>
                        </select>
                      </div> --}}
                    </div>
                  </div>
                </div>

                <p class="card-description"> {{ __('Contact Information') }} </p>
                
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Email') }}</label>
                      <div class="col-sm-9">
                        <input name="email" id="email" type="text" class="form-control" value="{{ $importer->email }}"/> 
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Mobile') }}</label>
                      <div class="col-sm-9">
                        <input name="mobile" id="mobile" type="text" class="form-control" value="{{ $importer->mobile }}"/>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Country') }}</label>
                      <div class="col-sm-9">                                     
                        <select name="country_id" id="country_id" class="form-control">
                        <option value="" selected disabled>{{ __('Select The Country') }}</option>
                        @if (isset($countries))
                            @foreach ($countries as $country){
                                <option value="{{ $country->id }}">
                                    {{ $country->name }}</option>
                            @endforeach
                        @endif
                    </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('State') }}</label>
                      <div class="col-sm-9">
                        <select name="state_id" id="state_id" class="form-control">
                          <option value="" selected disabled>{{ __('Select The State') }}</option>
                          @if (isset($states))
                              @foreach ($states as $state){
                                  <option value="{{ $state->id }}">
                                      {{ $state->name }}</option>
                              @endforeach
                          @endif
                      </select>                      
                    </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Address') }}</label>
                      <div class="col-sm-9">
                        <input name="address" id="address" type="text" class="form-control" value="{{ $importer->address }}"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Tel') }}</label>
                      <div class="col-sm-9">
                        <input name="tel" id="tel" type="text" class="form-control" value="{{ $importer->tel }}"/>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Website') }}</label>
                      <div class="col-sm-9">
                        <input name="website" id="website" type="text" class="form-control" value="{{ $importer->website }}"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Fax') }}</label>
                      <div class="col-sm-9">
                        <input name="fax" id="fax" type="text" class="form-control" value="{{ $importer->fax }}"/>
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
                            <a href="{{ route('importers.index') }}" style="color: inherit;">{{ __('Cancel') }}</a>
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

      $('.activity_type_name').hide();
      $('#activity_type').on('change', function() {
          if (this.value == 'OTHER') {
              $('.activity_type_name').show();
          } else {
              $('.activity_type_name').hide();
          }
      });

      
      $('#country_id').on('change', function() {
                var selectedState = $('#country_id').find(":selected").val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/getstates/" + selectedState,
                    type: "GET",
                    success: function(data) {
                        $('#state_id').empty();
                        $('#state_id').append(
                            '<option value="0" disabled selected>{{__('Select The State')}}</option>'
                        );
                        $.each(data.states, function(index, state) {
                            $('#state_id').append('<option value="' + state.value + '">' + state.text + '</option>');
                        })
                    }
                })
            });


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
  mobile: {
        required: true
    },
  country_id: {
        required: true
    },
    legal_form: {
        required: false
    },

    email: {
        required: true,
        email: true,
        emailcheck: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
    },
    country_id: {
        required: true
    },
    state_id: {
        required: true
    },
  address: {
        required: true
    },
    activity_type: {
        required: true
    },
},
messages: {

  name: {
        required: "Name is required",
    },
  mobile: {
        required: "Mobile number is required",
    },
    email: {
        required: "Email is required",
        emailcheck: "Please enter valid email",
    },
    country_id: {
        required: "Country is required",
    },
    state_id: {
        required: "State is required",
    },
  address: {
        required: "Address is required",
    },
    activity_type: {
        required: "Activity Type is required",
    },
},
});


    });
</script>
@endpush