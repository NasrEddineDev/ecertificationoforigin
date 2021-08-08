@extends('layouts.mainlayout')

@Push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-table.css') }}" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet">
    <style>
        .slow .toggle-group {
            transition: left 0.7s;
            -webkit-transition: left 0.7s;
        }

        table tr td,
        table tr th {
            vertical-align: middle !important;
            text-align: center !important;
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
                                <h4 class="card-title">{{ __('Edit Role') }}</h4>
                                <br />
                                <form class="form-sample" method="post" action="{{ route('roles.update', $role->id) }}">
                                    @csrf
                                    @method('put')
                                    <div class="row">
                                        <div class="col-md-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">
                                            <div class="form-group row">
                                                <label
                                                    class="col-sm-3 col-form-label {{ App()->currentLocale() == 'ar' ? 'pull-right' : '' }}">{{ __('Role Name') }}</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="{{ $role->name }}" name="name" id="name"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="card-description"> {{ __('Permissions') }} </p>

                                    <div class="row">
                                        <table id="table" data-toggle="table">
                                            <thead>
                                                <tr>
                                                    <th data-field="type" data-editable="true">{{ __('Permissions') }}
                                                    </th>
                                                    <th data-field="white_background" data-editable="true">
                                                        {{ __('Create') }}</th>
                                                    <th data-field="colorized_background" data-editable="true">
                                                        {{ __('Read') }}</th>
                                                    <th data-field="white_background" data-editable="true">
                                                        {{ __('Update') }}</th>
                                                    <th data-field="colorized_background" data-editable="true">
                                                        {{ __('Delete') }}</th>
                                                    <th data-field="colorized_background" data-editable="true">
                                                        {{ __('List') }}</th>
                                                    <th data-field="colorized_background" data-editable="true">
                                                        {{ __('Others') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr id="">
                                                    <td>
                                                    </td>
                                                    <td>
                                                      <input type="checkbox" checked data-toggle="toggle" data-size="xs"
                                                          data-style="slow">
                                                        <input type="checkbox" checked data-toggle="toggle" data-size="xs"
                                                            data-onstyle="primary" data-style="slow">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" checked data-toggle="toggle" data-size="xs"
                                                            data-onstyle="secondary" data-style="slow">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" checked data-toggle="toggle" data-size="xs"
                                                            data-onstyle="success" data-style="slow">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" checked data-toggle="toggle" data-size="xs"
                                                            data-onstyle="danger" data-style="slow">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" checked data-toggle="toggle" data-size="xs"
                                                            data-onstyle="warning" data-style="slow">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" checked data-toggle="toggle" data-size="xs"
                                                            data-onstyle="info" data-style="slow">

                                                        <input type="checkbox" checked data-toggle="toggle" data-size="xs"
                                                            data-onstyle="light" data-style="slow">

                                                        <input type="checkbox" checked data-toggle="toggle" data-size="xs"
                                                            data-onstyle="dark" data-style="slow">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="form-group-inner">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}"
                                                    style="text-align: center">
                                                    <div class="login-horizental cancel-wp form-bc-ele">
                                                        <button type="submit" class="btn btn-white">
                                                            <a href="{{ route('roles.index') }}"
                                                                style="color: inherit;">{{ __('Cancel') }}</a>
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-primary login-submit-cs">{{ __('Save Change') }}</button>
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
<script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

@endpush
