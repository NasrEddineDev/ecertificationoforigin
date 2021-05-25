@extends('layouts.mainlayout')
@Push('css')
<!-- normalize CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-table.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-editable.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/modals.css') }}" />
<style>
    .not-active {
        pointer-events: none;
        cursor: default;
        text-decoration: none;
        background-color: gray!important;
      }
          </style>
          
@endpush

@section('content')

<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>{{ __('Importers List')}}</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div class="toolbar add-product dt-tb">
                                <a class="{{ (Auth::User()->role->name == 'user' && Auth::User()->enterprise->status == 
                                "PENDING") ? 'not-active' : '' }}" href="{{ route('importers.create') }}" 
                                style="{{App()->currentLocale() == 'ar' ? 'right:auto;left: 35px;' : ''}}">
                                {{ __('Add New Importer')}}</a>
                            </div>
                            {{-- <div id="toolbar">
                                <select class="form-control dt-tb">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div> --}}
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" 
                            data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" 
                            data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" 
                            data-buttons-align="{{App()->currentLocale() == 'ar' ? 'left' : 'right'}}" data-search-align="{{App()->currentLocale() == 'ar' ? 'left' : 'right'}}"
                            data-toolbar-align="{{App()->currentLocale() == 'ar' ? 'right' : 'left'}}"
                            data-toolbar="#toolbar" data-locale="{{App()->currentLocale() == 'en' ? 'en-US' : (App()->currentLocale() == 'ar' ? 'ar-SA' : 'fr-FR')}}">
                            <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">{{ __('ID')}}</th>
                                        <th data-field="name" data-editable="true">{{ __('Name')}}</th>
                                        <!-- <th data-field="legal_form" data-editable="true">{{ __('Legal Form')}}</th> -->
                                        <th data-field="activity_type" data-editable="true">{{ __('Activity Type')}}</th>
                                        <!-- <th data-field="type" data-editable="true">{{ __('Type')}}</th> -->
                                        <th data-field="address" data-editable="true">{{ __('Address')}}</th>
                                        <th data-field="mobile" data-editable="true">{{ __('Mobile')}}</th>
                                        <th data-field="email" data-editable="true">{{ __('Email')}}</th>
                                        <!-- <th data-field="website" data-editable="true">{{ __('Website')}}</th>
                                        <th data-field="tel" data-editable="true">{{ __('Tel')}}</th>
                                        <th data-field="fax" data-editable="true">{{ __('Fax')}}</th> -->
                                        @if (Auth::user()->can('view-enterprise-user'))
                                        <th data-field="enterprise" data-editable="true">{{ __('Enterprise')}}</th>
                                        @endif
                                        <th data-field="action">{{ __('Action')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($importers as $importer)
                                    <tr id="{{ $importer->id }}">
                                        <td></td>
                                        <td>{{ $importer->id }}</td>
                                        <td>{{ $importer->name }}</td>
                                        <!-- <td>{{ $importer->legal_form }}</td> -->
                                        <td>{{ $importer->activity_type }}</td>
                                        <!-- <td>{{ $importer->type }}</td> -->
                                        <td>{{ $importer->address }}</td>
                                        <td>{{ $importer->mobile }}</td>
                                        <td>{{ $importer->email }}</td>
                                        <!-- <td>{{ $importer->website }}</td>
                                        <td>{{ $importer->tel }}</td>
                                        <td>{{ $importer->fax }}</td> -->
                                        @if (Auth::user()->can('view-enterprise-user'))
                                        <td>{{ $importer->enterprise_id }}</td>
                                        @endif
                                        <td class="datatable-ct">
                                            <a rel="tooltip" class="btn btn-success" href="{{ route('importers.show',$importer->id) }}" 
                                                data-original-title="" title="{{ __('Detail') }}">
                                                <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                                                <div class="ripple-container"></div>
                                            </a>
                                            <a rel="tooltip" class="btn btn-primary" href="{{ route('importers.edit',$importer->id) }}" 
                                                data-original-title="" title="{{ __('Edit') }}">
                                                <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                                <div class="ripple-container"></div>
                                            </a>
                                            <a rel="tooltip" class="btn btn-danger pd-setting-ed" href="#" data-url="{{ route('importers.destroy',$importer->id) }}" 
                                            data-importer_name="{{ $importer->name }}" data-original-title="" title="{{ __('Delete') }}" data-toggle="modal" 
                                            data-target="#DangerModalhdbgcl" style="background-color: #d80027!important;">
                                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="DangerModalhdbgcl" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-4">
                <h4 class="modal-title">{{ __('Delete the importer')}}</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                <h2>{{ __('Remove Permanently!')}}</h2>
                <p>{{ __('Do you want to deletet the importer')}} <strong id="ImporterName" style="color: #d80027!important;"></strong> {{ __('forever')}} ?</p>
            </div>
            <div class="modal-footer danger-md">
                <a data-dismiss="modal" href="#" style="background-color: #d80027!important;">{{ __('No')}}</a>
                <a id="Delete" href="#" style="background-color: #d80027!important;">{{ __('Yes')}}</a>
            </div>
        </div>
    </div>
</div>

@endsection

@Push('js') // this is for internal js
<!-- data table JS ============================================ -->
<script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/data-table/tableExport.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/data-table/data-table-active.js') }}"></script>
{{-- <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-editable.js') }}"></script> --}}
<script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-editable.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-resizable.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/data-table/colResizable-1.5.source.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-export.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-ar-SA.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-en-US.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table-fr-FR.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#DangerModalhdbgcl').on('shown.bs.modal', function(e) {
            var link = $(e.relatedTarget),
                url = link.data("url"),
                importer_name = link.data("importer_name");
                // e.closest('tr').hide();
                // alert(e.closest.closest('tr'));
            $("#Delete").attr("href", url);
            $("#ImporterName").text(importer_name);
        });

        $("#Delete").click(function(e){
            e.preventDefault();
            var url = $("#Delete").attr("href");
            var id = url.substring(url.lastIndexOf('/') + 1);
            $.ajax({
                headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            type: 'DELETE',
            success: function(result) {
                $('#DangerModalhdbgcl').modal('toggle');
                // document.getElementById("table").deleteRow(4); 
                $('table#table tr#'+id).remove();
            }
        });
    }); 

    });
</script>
@endpush