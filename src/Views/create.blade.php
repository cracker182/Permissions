@extends('laralum::layouts.master')
@section('icon', 'mdi-plus-circle')
@section('title', 'Create permission')
@section('subtitle', 'Create a new permission to the database')
@section('content')
    @include('laralum_permissions::form', ['action' => route('laralum::permissions.store'), 'button' => 'Create', 'cancel' => route('laralum::permissions.index')])
@endsection
