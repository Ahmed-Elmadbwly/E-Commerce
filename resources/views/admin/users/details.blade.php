@extends('layout.app')

@section('title', 'Show User')

@section('contents')
    <h1 class="mb-0">Detail User</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{$data->name}}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="price" class="form-control" placeholder="Price" value="{{$data->email}}" readonly>
        </div>
    </div>
     <div class="row">
         <div class="col mb-3">
             <label class="form-label">Role</label>
             <input type="text" name="price" class="form-control" placeholder="Price" value="{{$data->role}}" readonly>
         </div>
     </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{$data->created_at}}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{$data->update_at}}" readonly>
        </div>
    </div>
@endsection
