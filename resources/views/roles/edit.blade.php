@extends('layouts.mainlayout')

@Push('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ URL::asset('css/data-table/bootstrap-table.css') }}" />
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
        rel="stylesheet" />
    <style>
        .slow .toggle-group {
            transition: left 0.7s;
            -webkit-transition: left 0.7s;
        }

        .toggle.btn-dark {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
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
                                                    <th data-field="create" data-editable="true">
                                                        {{ __('Create') }}</th>
                                                    <th data-field="view" data-editable="true">
                                                        {{ __('View') }}</th>
                                                    <th data-field="list" data-editable="true">
                                                        {{ __('List') }}</th>
                                                    <th data-field="update" data-editable="true">
                                                        {{ __('Update') }}</th>
                                                    <th data-field="delete" data-editable="true">
                                                        {{ __('Delete') }}</th>
                                                    <th data-field="others" data-editable="true">
                                                        {{ __('Others') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($permissions_groups as $permissions_group)
                                                    <tr>
                                                        <td>
                                                            {{ __(ucfirst(explode('-', $permissions_group->first()->name)[1])) }}
                                                        </td>
                                                        @foreach ($permissions_group as $permission)
                                                            @if (str_contains($permission->name, 'create') || str_contains($permission->name, 'view') || str_contains($permission->name, 'update') || str_contains($permission->name, 'delete') || str_contains($permission->name, 'list'))
                                                                <td>
                                                                    <input id='{{ $permission->id }}' type="checkbox"
                                                                        {{ $permissions_ids->contains($permission->id) ? 'checked' : '' }}
                                                                        data-toggle="toggle" data-size="xs"
                                                                        data-style="slow" data-on="{{ __('On') }}"
                                                                        data-off="{{ __('Off') }}"
                                                                        data-onstyle="{{ str_contains($permission->name, 'create') ? 'dark' : (str_contains($permission->name, 'view') ? 'success' : (str_contains($permission->name, 'update') ? 'danger' : (str_contains($permission->name, 'delete') ? 'warning' : (str_contains($permission->name, 'list') ? 'info' : (str_contains($permission->name, 'others') ? 'slow' : 'slow'))))) }}"
                                                                        data-style="ios">
                                                                </td>
                                                            @endif
                                                        @endforeach
                                                        <td>
                                                            @foreach ($permissions_group as $permission)
                                                                @if (!str_contains($permission->name, 'create') && !str_contains($permission->name, 'view') && !str_contains($permission->name, 'update') && !str_contains($permission->name, 'delete') && !str_contains($permission->name, 'list'))
                                                                    <input id='{{ $permission->id }}' type="checkbox"
                                                                        {{ $permissions_ids->contains($permission->id) ? 'checked' : '' }}
                                                                        data-toggle="toggle" data-size="sm"
                                                                        data-on="{{ __(ucfirst(explode('-', $permission->name)[0])) }}"
                                                                        data-off="{{ __(ucfirst(explode('-', $permission->name)[0])) }}"
                                                                        data-style="random">
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="form-group-inner">
                                        <div class="login-btn-inner">
                                            <div class="row">
                                                <div class="col-lg-6 {{ App()->currentLocale() == 'ar' ? 'pull-right' : 'pull-left' }}"
                                                    style="text-align: center">
                                                    <div class="login-horizental cancel-wp form-bc-ele">
                                                        <button type="button" class="btn btn-white">
                                                            <a href="{{ route('roles.index') }}"
                                                                style="color: inherit;">{{ __('Cancel') }}</a>
                                                        </button>
                                                        <button type="button" id="save"
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
    <div style="display:none;" id="permissions_ids" data-permissions-ids="{{ json_encode($permissions_ids) }}"></div>

@endsection

@Push('js')
    <script type="text/javascript" src="{{ URL::asset('js/data-table/bootstrap-table.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script>
        $(document).ready(function() {
            var permissions_ids = $('#permissions_ids').data('permissions-ids');
            $(document).on('change', 'input', function() {
                var permission_id = this.id;
                if (this.checked) {
                    permissions_ids.push(parseInt(permission_id));
                } else {
                    permissions_ids = jQuery.grep(permissions_ids, function(value) {
                        return value != permission_id;
                    });
                }
            });

            $("#save").click(function(e) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/roles/{{ $role->id }}',
                    type: 'PUT',
                    data: {
                        "name": $('#name').val(),
                        "permissions_ids": JSON.stringify(permissions_ids)
                    },
                    success: function(data) {
                        window.location.href = "{{ route('roles.index') }}";
                    }
                })
            });
        });
    </script>
@endpush
