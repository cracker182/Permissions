@extends('laralum::layouts.master')
@section('title', 'Create permission')
@section('subtitle', 'Permissions module')
@section('content')
    @include('laralum_permissions::form', ['action' => route('laralum::permissions.store'), 'button' => 'Create', 'cancel' => route('laralum::permissions.index')])
@endsection
