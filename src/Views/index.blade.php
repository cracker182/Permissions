@extends('laralum::layouts.master')
@section('icon', 'ion-key')
@section('title', __('laralum_permissions::general.permission_list'))
@section('subtitle', __('laralum_permissions::general.permissions_desc'))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('laralum::index') }}">@lang('laralum_permissions::general.home')</a></li>
        <li><span>@lang('laralum_permissions::general.permission_list')</span></li>
    </ul>
@endsection
@section('content')
    <div class="uk-container uk-container-large">
        <div uk-grid class="uk-child-width-1-1">
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        @lang('laralum_permissions::general.permission_list')
                    </div>
                    <div class="uk-card-body">
                        <div class="uk-overflow-auto">
                            <table class="uk-table uk-table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('laralum_permissions::general.name')</th>
                                        <th>@lang('laralum_permissions::general.slug')</th>
                                        <th>@lang('laralum_permissions::general.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse( $permissions as $permission )
                                        <tr>
                                            <td>{{ $permission->id }}</td>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->slug }}</td>
                                            <td class="uk-table-shrink">
                                                <div class="uk-button-group">
                                                    @can('update', $permission)
                                                        <a href="{{ route('laralum::permissions.edit', ['permission' => $permission->id]) }}" class="uk-button uk-button-small uk-button-default">
                                                            @lang('laralum_permissions::general.edit')
                                                        </a>
                                                    @else
                                                        <button disabled class="uk-button uk-button-small uk-button-default uk-disabled">
                                                            @lang('laralum_permissions::general.edit')
                                                        </button>
                                                    @endcan
                                                    @can('delete', $permission)
                                                        <a href="{{ route('laralum::permissions.destroy.confirm', ['permission' => $permission->id]) }}" class="uk-button uk-button-small uk-button-danger">
                                                            @lang('laralum_permissions::general.delete')
                                                        </a>
                                                    @else
                                                        <button disabled class="uk-button uk-button-small uk-button-default uk-disabled">
                                                            @lang('laralum_permissions::general.delete')
                                                        </button>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $permissions->links('laralum::layouts.pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
