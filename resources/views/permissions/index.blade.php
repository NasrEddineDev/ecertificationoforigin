@extends('layouts.mainlayout')
@Push('css')
<!-- normalize CSS ============================================ -->
<link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-table.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-editable.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/modals.css') }}" />
<style>
    .not-active {
        /* pointer-events: none; */
        cursor: default;
        text-decoration: none;
        background-color: gray!important;
      }
      table .datatable-ct {
    width: 200px!important;
    overflow: hidden;
    white-space: nowrap;
}
          </style>
          
@endpush

@section('content')

<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-9 col-sm-12 col-xs-12 {{App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left'}}">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>{{ __('Permissions List') }}</h1>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" 
                            data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" 
                            data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true"  data-click-to-select="true" 
                            data-buttons-align="{{App()->currentLocale() == 'ar' ? 'left' : 'right'}}" data-search-align="{{App()->currentLocale() == 'ar' ? 'left' : 'right'}}"
                            data-toolbar-align="{{App()->currentLocale() == 'ar' ? 'right' : 'left'}}"
                            data-toolbar="#toolbar" data-locale="{{App()->currentLocale() == 'en' ? 'en-US' : (App()->currentLocale() == 'ar' ? 'ar-SA' : 'fr-FR')}}">
                            <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">{{ __('ID') }}</th>
                                        <th data-field="name" data-editable="true">{{ __('Name') }}</th>
                                        <th data-field="group" data-editable="true">{{ __('Group') }}</th>
                                        <th data-field="description">{{ __('Description') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                    <tr id="{{ $permission->id }}">
                                        <td></td>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ __($permission->name) }}</td>
                                        <td>{{ __($permission->group) }}</td>
                                        <td>{{ __($permission->description) }}</td>
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

<div id="DangerModalhdbgcl" class="modal modal-edu-general FullColor-popup-DangerModal fade" permission="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-4">
                <h4 class="modal-title">{{ __('Delete the permission') }}</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                <h2>{{ __('Remove Permanently!') }}</h2>
                <p>{{ __('Do you want to deletet the permission') }} <strong id="permissionName" style="color: #d80027!important;"></strong> {{ __('forever') }} ?</p>
            </div>
            <div class="modal-footer danger-md">
                <a data-dismiss="modal" href="#" style="background-color: #d80027!important;">{{ __('No') }}</a>
                <a id="Delete" href="#" style="background-color: #d80027!important;">{{ __('Yes') }}</a>
            </div>
        </div>
    </div>
</div>

<div id="PermissionsModalhdbgcl" class="modal modal-edu-general Customwidth-popup-WarningModal fade" permission="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-6">
                <h4 class="modal-title">{{ __('Delete the permission') }}</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                <h2>{{ __('Remove Permanently!') }}</h2>
                <p>{{ __('Do you want to deletet the permission') }} <strong id="permissionName" style="color: #d80027!important;"></strong> {{ __('forever') }} ?</p>
            </div>
            <div class="modal-footer danger-md">
                <a data-dismiss="modal" href="#">{{ __('No') }}</a>
                <a id="Delete" href="#">{{ __('Yes') }}</a>
            </div>
        </div>
    </div>
</div>

@endsection

@Push('js') 
<!-- // this is for internal js -->
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
                permission_name = link.data("permission_name");
                // e.closest('tr').hide();
                // alert(e.closest.closest('tr'));
            $("#Delete").attr("href", url);
            $("#permissionName").text(permission_name);
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

    //     $("#Delete").click(function(e){
    //         e.preventDefault();
    //         var url = $("#Delete").attr("href");
    //         var id = url.substring(url.lastIndexOf('/') + 1);
    //         $.ajax({
    //             headers: {
    //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: url,
    //         type: 'DELETE',
    //         success: function(result) {
    //             $('#DangerModalhdbgcl').modal('toggle');
    //             // document.getElementById("table").deleteRow(4); 
    //             $('table#table tr#'+id).remove();
    //         }
    //     });
    // }); 

    });
</script>
@endpush