@extends('laralum::layouts.master')
@section('icon', 'mdi-key-variant')
@section('title', 'Permissions')
@section('subtitle', 'Permissions will help you creating a complex yet simple way to manage your roles access correctly')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-block">
                    <h5>Quick Actions</h5><br />
                    <a class="btn btn-success" href="{{ route('laralum::permissions.create') }}">Create Permission</a>
                    <a class="btn btn-primary disabled" href="#">Permissions Settings</a>
                    <br />
                </div>
            </div>
        </div>
    </div>
    <br />
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
                        <h5>Permission list</h5><br />
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
