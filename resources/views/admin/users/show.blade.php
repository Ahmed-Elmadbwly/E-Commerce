@extends('layout.app')

@section('title', 'Home Users')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List users</h1>
        <a href="{{route('users.create')}}" class="btn btn-primary">Add user</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if($data->count() > 0)
            @foreach($data as $rs)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $rs->name }}</td>
                    <td class="align-middle">{{$rs->email}}</td>
                    <td class="align-middle">{{$rs->role}}</td>
                    <td class="align-middle">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('users.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
                            <a href="{{ route('users.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                            <form action="{{ route('users.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger m-0">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td class="text-center" colspan="5">users not found</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
