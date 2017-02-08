@extends('laralum::layouts.master')
@section('title', 'Permissions')
@section('subtitle', 'Permissions module')
@section('content')
    <div class="row">
        <div class="col-12 col-lg-10 offset-lg-1">
            @if ($permissions->count() > 1)
                <table class="table table-responsive">
                  <thead>
                    <tr>
                          <th><center>#</center></th>
                          <th><center>Name</center></th>
                          <th><center>Slug</center></th>
                          <th><center>Description</center></th>
                          <th colspan="2"><center>Actions</center></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($permissions as $permission)
                    <tr>
                      <th scope="row">{{$permission->id}}</th>
                      <td>{{$permission->name}}</td>
                      <td>{{$permission->slug}}</td>
                      <td>{{$permission->description}}</td>
                      <td><center><a href="{{route('laralum::permissions.edit', ['id' => $permission->id])}}" class="btn btn-primary btn-sm"><i class="mdi mdi-pencil"></i> Edit</a></center></td>
                      <td><center><a href="{{route('laralum::permissions.delete.confirm', ['id' => $permission->id])}}" class="btn btn-danger btn-sm"><i class="mdi mdi-delete"></i> Delete</a></center></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
            @else
                No permission yet
            @endif
        </div>
    </div>
@endsection
