@extends('laralum::layouts.master')
@section('title', 'Delete permission')
@section('subtitle', 'Permissions module')
@section('content')
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6 offset-md-2 offset-lg-3">
            <form action="{{route('laralum::permissions.destroy', ['permission', $permission->id])}}" method="POST">
                {{ csrf_field() }}
                {{ method_field("DELETE") }}
                Are you sure you want to permanently permission {{$permission->slug}} ?
                <br><br>
                <a href="{{route('laralum::permissions.index')}}" class="btn btn-info float-left">Cancel</a>
                <button type="submit" class="btn btn-danger float-right">Permanently delete</button>
            </form>
        </div>
    </div>
@endsection
