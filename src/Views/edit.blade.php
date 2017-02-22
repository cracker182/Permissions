@extends('laralum::layouts.master')
@section('icon', 'ion-edit')
@section('title', __('laralum_permissions::general.edit_permission'))
@section('subtitle', __('laralum_permissions::general.edit_desc', ['id' => $permission->id, 'time_ago' => $permission->created_at->diffForHumans()]))
@section('breadcrumb')
    <ul class="uk-breadcrumb">
        <li><a href="{{ route('laralum::index') }}">@lang('laralum_permissions::general.home')</a></li>
        <li><a href="{{ route('laralum::permissions.index') }}">@lang('laralum_permissions::general.permission_list')</a></li>
        <li><span>@lang('laralum_permissions::general.create_permission')</span></li>
    </ul>
@endsection
@section('content')
    @include('laralum_permissions::form', [
        'action' => route('laralum::permissions.update', ['permission' => $permission]),
        'button' => __('laralum_permissions::general.edit'),
        'title' => __('laralum_permissions::general.edit_permission', ['id' => $permission->id]),
        'method' => 'PATCH',
        'permission' => $permission,
        'cancel' => route('laralum::permissions.index')
    ])
@endsection
