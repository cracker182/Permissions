@extends('laralum::layouts.master')
@section('icon', 'mdi-pencil-circle')
@section('title', 'Edit permission')
@section('subtitle', "You're editing permission #" . $permission->id . " created " . $permission->created_at->diffForHumans())
@section('content')
    @include('laralum_permissions::form', ['action' => route('laralum::permissions.update', ['permission' => $permission]), 'button' => 'Edit', 'method' => 'PATCH', 'permission' => $permission, 'cancel' => route('laralum::permissions.index')])
@endsection
