@extends('layouts.mainlayout')
@Push('css') 
    <!-- normalize CSS ============================================ -->
    <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-table.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-editable.css') }}" />
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
                                    <h1>{{__('Enterprises List') }}</h1>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">
                                        <div class="toolbar add-product dt-tb">
                                            @can('create',  App\Models\Enterprise::class)
                                            <a class="" href="{{ route('enterprises.create') }}" 
                                            style="{{App()->currentLocale() == 'ar' ? 'right:auto;left: 35px;' : ''}}">{{__('Add New Enterprise') }}</a>
                                            @endcan
                                        </div>
                                    <div id="toolbar">
                                        @can('filter-type',  App\Models\Enterprise::class)
                                        <select class="form-control dt-tb">
											<option value="ALL" selected>{{__('ALL') }}</option>
											<option value="DRAFT">{{__('DRAFT') }}</option>
											<option value="PENDING">{{__('PENDING') }}</option>
											<option value="ACTIVATED">{{__('ACTIVATED') }}</option>
											<option value="SUSPENDED">{{__('SUSPENDED') }}</option>
											<option value="STOPPED">{{__('STOPPED') }}</option>
										</select>
                                        @endcan
                                    </div>
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" 
                                    data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" 
                                    data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" 
                                    data-buttons-align="{{App()->currentLocale() == 'ar' ? 'left' : 'right'}}" data-search-align="{{App()->currentLocale() == 'ar' ? 'left' : 'right'}}"
                                    data-toolbar-align="{{App()->currentLocale() == 'ar' ? 'right' : 'left'}}"
                                    data-toolbar="#toolbar" data-locale="{{App()->currentLocale() == 'en' ? 'en-US' : (App()->currentLocale() == 'ar' ? 'ar-SA' : 'fr-FR')}}">
                                        <thead>
                                            <tr>
                                                <th data-field="state" data-checkbox="true"></th>
                                                <th data-field="id">{{__('ID') }}</th>
                                                <th data-field="name" data-editable="true">{{__('Name') }}</th>
                                                <th data-field="legal_form" data-editable="true">{{__('Legal Form') }}</th>
                                                <th data-field="status" data-editable="true">{{__('Status') }}</th>
                                                <th data-field="balance" data-editable="true">{{__('Balance') }}</th>
                                                <th data-field="activity_type" data-editable="true">{{__('Activity Type') }}</th>
                                                {{-- <th data-field="address" data-editable="true">Address</th> --}}
                                                <th data-field="mobile" data-editable="true">{{__('Mobile') }}</th>
                                                {{-- <th data-field="email" data-editable="true">Email</th> --}}
                                                <th data-field="manager" data-editable="true">{{__('Manager') }}</th>
                                                <th data-field="action">{{__('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($enterprises as $enterprise)
                                            <tr id="{{ $enterprise->id }}">
                                                <td></td>
                                                <td>{{ $enterprise->id }}</td>
                                                <td>{{ $enterprise->name }}</td>
                                                <td>{{ $enterprise->legal_form }}</td>
                                                <td><button class="btn {{ ($enterprise->status == "PENDING") ? 'btn-warning' :( 
                                                   ($enterprise->status == "ACTIVATED") ? 'btn-success':(
                                                   ($enterprise->status == "STOPPED") ? 'btn-danger' : 'btn-default'))}}" 
                                                   style="font-size: 14px;padding:0px;width:80%">
                                                    {{__($enterprise->status) }}
                                                </button>
                                                </td>
                                                <td>{{ $enterprise->balance }}</td>
                                                <td>{{ $enterprise->activity_type }}</td>
                                                {{-- <td>{{ $enterprise->address }}</td> --}}
                                                <td>{{ $enterprise->mobile }}</td>
                                                {{-- <td>{{ $enterprise->email }}</td> --}}
                                                <td>{{ isset($enterprise->Manager) ? $enterprise->Manager->firstname.' '.$enterprise->Manager->lastname : '' }}</td>
                                                {{-- <td>{{ $certificate->invoice_date }}</td>
                                                <td>{{ $certificate->invoice_number }}</td> --}}
                                                <td class="datatable-ct" style="display:block!important;">
                                                    <div class="input-group">
                                                    {{-- <a rel="tooltip" class="btn btn-success"
                                                        href="{{ route('enterprises.show', $enterprise->id) }}"
                                                        data-original-title="" title="View">
                                                        <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>--}}
                                                    @can('view',  App\Models\Enterprise::class)
                                                    <a rel="tooltip" class="btn btn-success"
                                                        href="{{ route('enterprises.show', $enterprise->id) }}"
                                                        data-original-title="" title="{{ __('Detail') }}">
                                                        <i class="fa fa-list fa-lg" aria-hidden="true"></i>
                                                        <div class="ripple-container"></div>
                                                    </a> 
                                                    @endcan
                                                    @can('update',  App\Models\Enterprise::class)
                                                    <a rel="tooltip" class="btn btn-primary" style="margin-left: 5px;margin-right: 5px;"
                                                        href="{{ route('enterprises.edit', $enterprise->id) }}"
                                                        data-original-title="" title="{{ __('Edit') }}">
                                                        <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                                        <div class="ripple-container"></div>
                                                    </a> 
                                                    @endcan
                                                    @can('delete',  App\Models\Enterprise::class)
                                                    <a rel="tooltip" class="btn btn-danger pd-setting-ed" href="#"
                                                        data-url="{{ route('enterprises.destroy', $enterprise->id) }}"
                                                        data-enterprise_name="{{ $enterprise->name }}"
                                                        data-original-title="" title="{{ __('Delete') }}" data-toggle="modal"
                                                        data-target="#DangerModalhdbgcl"
                                                        style="background-color: #d80027!important;">
                                                        <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                                                        <div class="ripple-container"></div>
                                                    </a>
                                                    @endcan
                                                </div>
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
@endpush