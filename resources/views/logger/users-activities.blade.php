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
            background-color: gray !important;
        }
      tr td:last-child{
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  width: 50%; /* Extend the cell as much as possible */
  max-width: 0; /* Avoid resizing beyond table width */
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
                                <h1>{{ __('Activities List') }}</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                    data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                    data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                    data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true"
                                    data-buttons-align="{{ App()->currentLocale() == 'ar' ? 'left' : 'right' }}"
                                    data-search-align="{{ App()->currentLocale() == 'ar' ? 'left' : 'right' }}"
                                    data-toolbar-align="{{ App()->currentLocale() == 'ar' ? 'right' : 'left' }}"
                                    data-toolbar="#toolbar"
                                    data-locale="{{ App()->currentLocale() == 'en' ? 'en-US' : (App()->currentLocale() == 'ar' ? 'ar-SA' : 'fr-FR') }}">
                                    <thead>
                                        <tr>
                                            <th data-field="id">{{ __('ID') }}</th>
                                            <th data-field="date" data-editable="true">{{ __('Date') }}</th>
                                            <th data-field="model" data-editable="true">{{ __('Model') }}</th>
                                            <th data-field="user_id" data-editable="true">{{ __('User Id') }}</th>
                                            <th data-field="user" data-editable="true">{{ __('User') }}</th>
                                            <th data-field="type" data-editable="true">{{ __('Type') }}</th>
                                            <th data-field="subject" data-editable="true">{{ __('Subject') }}</th>
                                            <th data-field="properties" data-editable="true">{{ __('Properties') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usersActivities as $userActivity)
                                            <tr id="{{ $userActivity->id }}">
                                                <td>{{ $userActivity->id }}</td>
                                                <td>{{ $userActivity->created_at }}</td>
                                                <td>{{ str_replace("App\Models\\","",$userActivity->subject_type) }}</td>
                                                <td>{{ $userActivity->causer_id }}</td>
                                                <td><a class="btn btn-success" style="font-size: 14px;padding-top:0px;padding-bottom:0px;"
                                                    href="{{ route('users.show', $userActivity->causer_id ?? '') }}">
                                                    {{ __($userActivity->causer->username) }}</a></td>
                                                <td>{{ __($userActivity->description) }}</td>
                                                <td><a class="btn btn-info" style="font-size: 14px;padding-top:0px;padding-bottom:0px;"
                                                    href="{{ route('certificates.show', $userActivity->subject_id) }}">
                                                    {{ __($userActivity->subject_id) }}</a></td>
                                                    <td>{{ $userActivity->properties }}</td>
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
                    <h4 class="modal-title">{{ __('Delete the payment') }}</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <div class="modal-body">
                    <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                    <h2>{{ __('Remove Permanently!') }}</h2>
                    <p>{{ __('Do you want to delete the payment') }} <strong id="PaymentName"
                            style="color: #d80027!important;"></strong> {{ __('forever') }} ?</p>
                </div>
                <div class="modal-footer danger-md">
                    <a data-dismiss="modal" href="#" style="background-color: #d80027!important;">{{ __('No') }}</a>
                    <a id="Delete" href="#" style="background-color: #d80027!important;">{{ __('Yes') }}</a>
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
                    payment_name = link.data("payment_name");
                // e.closest('tr').hide();
                // alert(e.closest.closest('tr'));
                $("#Delete").attr("href", url);
                $("#PaymentName").text(payment_name);
            });

            $("#Delete").click(function(e) {
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
                        $('table#table tr#' + id).remove();
                    }
                });
            });

            $('tr td:last-child').bind('mouseenter', function(){
    var $this = $(this);

    if(this.offsetWidth < this.scrollWidth && !$this.attr('title')){
        $this.attr('title', $this.text());
    }
});

        });

    </script>
@endpush
