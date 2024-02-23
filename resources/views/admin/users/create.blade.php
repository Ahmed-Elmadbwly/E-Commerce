@extends('layout.app')

@section('title', 'Create User')

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
    <h1 class="mb-0">Add User</h1>
    <hr />
    <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{old('name')}}">
            </div>
            <div class="col">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>
            <div class="col">
                <input type="password" name="password_confirmation" class="form-control" placeholder="password confirmation">
            </div>
        </div>
        <div>
            <div class="col mb-3">
                <select id="options"  class="form-control" name="role">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
