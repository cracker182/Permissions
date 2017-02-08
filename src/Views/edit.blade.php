@extends('laralum::layouts.master')
@section('title', 'Edit permission')
@section('subtitle', 'Permissions module')
@section('content')
    @include('laralum_permissions::form', ['action' => route('laralum::permissions.update', ['permission' => $permission]), 'button' => 'Edit', 'method' => 'PATCH', 'permission' => $permission, 'cancel' => route('laralum::permissions.index')])
@endsection
