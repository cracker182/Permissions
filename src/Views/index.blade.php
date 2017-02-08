@extends('laralum::layouts.master')
@section('icon', 'mdi-svg')
@section('title', 'Permissions')
@section('subtitle', 'Permissions module')
@section('content')
    <div class="row">
        <div class="col col-md-12">
            <div class="card shadow">
                <div class="card-block">
                    @if ($permissions->count() == 0)
                        <center>
                            <br /><br />
                            <h3>There are no permissions yet</h3>
                            <h1 class="mdi mdi-emoticon-sad"></h1>
                            <br />
                        </center>
                    @else
                        <h4>Permission list</h4><br />
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <th>{{ $permission->id }}</th>
                                            <td>{{ $permission->name }}</td>
                                            <td>{{ $permission->slug }}</td>
                                            <td>{{ $permission->description }}</td>
                                            <td>
                                                <a href="{{ route('laralum::permissions.edit', ['id' => $permission->id]) }}" class="btn btn-primary btn-sm">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a href="{{ route('laralum::permissions.destroy.confirm', ['id' => $permission->id]) }}" class="btn btn-danger btn-sm">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
