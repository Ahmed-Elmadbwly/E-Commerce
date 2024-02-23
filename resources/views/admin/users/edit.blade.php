@extends('layout.app')

@section('title', 'Edit User')

@section('contents')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1 class="mb-0">Edit User</h1>
    <hr />
    <form action="{{route('users.update',$data->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Title" value="{{$data->name}}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Price" value="{{$data->email}}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <select id="options"  class="form-control" name="role">
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
