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
            background-color: gray !important;
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
                                <h1>{{ __('Payments List') }}</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div class="toolbar add-product dt-tb">
                                    @if (Auth::User()->role->name != 'user')
                                        <a href="{{ route('payments.create') }}" class="not-active"
                                            style="{{ App()->currentLocale() == 'ar' ? 'right:auto;left: 35px;' : '' }}">
                                            {{ __('Add New Payment') }}
                                        </a>
                                    @else
                                        <a href="{{ route('payments.create-balance-poste') }}" class="not-active"
                                            style="{{ App()->currentLocale() == 'ar' ? 'right:auto;left: 215px;' : '' }}">{{ __('Buy New Balance') }}</a>
                                        <span style="{{ App()->currentLocale() == 'ar' ? 'right:auto;left: 35px;' : '' }}">
                                            {{ __('Current Balance') . ' : ' . $current_balance . ' ' . __('Points') }} </span>
                                    @endif
                                </div>
                                <!-- <div id="toolbar">
                                    <select class="form-control dt-tb">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div> -->
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
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="id">{{ __('ID') }}</th>
                                            <th data-field="amount" data-editable="true">{{ __('Amount') }}</th>
                                            <th data-field="status" data-editable="true">{{ __('Status') }}</th>
                                            <th data-field="mode" data-editable="true">{{ __('Mode') }}</th>
                                            <th data-field="type" data-editable="true">{{ __('Type') }}</th>
                                            <th data-field="date" data-editable="true">{{ __('Date') }}</th>
                                            <th data-field="document" data-editable="true">{{ __('Document') }}</th>
                                            <th data-field="description" data-editable="true">{{ __('Description') }}
                                            </th>
                                            @if (Auth::User()->role->name != 'user')
                                                <th data-field="enterprise_name" data-editable="true">
                                                    {{ __('Enterprise Name') }}</th>
                                            @endif
                                            <th data-field="action">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payments as $payment)
                                            <tr id="{{ $payment->id }}">
                                                <td></td>
                                                <td>{{ $payment->id }}</td>
                                                <td>{{ $payment->amount }}</td>
                                                <td><button
                                                        class="btn {{ $payment->status == 'DRAFT' ? 'btn-warning' : ($payment->status == 'ACCEPTED' ? 'btn-success' : 'btn-danger') }}"
                                                        style="font-size: 14px;padding-top:0px;padding-bottom:0px;">{{ __($payment->status) }}</button>
                                                </td>
                                                <td>{{ __($payment->mode) }}</td>
                                                <td>{{ __($payment->type) }}</td>
                                                <td>{{ $payment->date }}</td>
                                                <td>{{ $payment->document }}</td>
                                                <td>{{ $payment->description }}</td>
                                                @if (Auth::User()->role->name != 'user')
                                                    <td>{{ $payment->Enterprise->name }}</td>
                                                @endif
                                                <td class="datatable-ct">
                                                    {{-- <a rel="tooltip" class="btn btn-success" href="{{ route('payments.show',$payment->id) }}" 
                                                data-original-title="" title="{{ __('Detail') }}">
                                                <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                                                <div class="ripple-container"></div>
                                            </a>
                                            <a rel="tooltip" class="btn btn-primary" href="{{ route('payments.edit',$payment->id) }}" 
                                                data-original-title="" title="{{ __('Edit') }}">
                                                <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                                <div class="ripple-container"></div>
                                            </a> --}}
                                                    <a rel="tooltip" class="btn btn-danger pd-setting-ed" href="#"
                                                        data-url="{{ route('payments.destroy', $payment->id) }}"
                                                        data-payment_name="{{ $payment->name }}" data-original-title=""
                                                        title="{{ __('Delete') }}" data-toggle="modal"
                                                        data-target="#DangerModalhdbgcl"
                                                        style="background-color: #d80027!important;">
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
                    <h4 class="modal-title">{{ __('Delete the payment') }}</h4>
                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                    </div>
                </div>
                <div class="modal-body">
                    <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                    <h2>{{ __('Remove Permanently!') }}</h2>
                    <p>{{ __('Do you want to deletet the payment') }} <strong id="PaymentName"
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

        });

    </script>
@endpush