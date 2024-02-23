@extends('layout.app')

@section('title', 'Edit categories')

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
    <h1 class="mb-0">Edit category</h1>
    <hr />
    <form action="{{route('category.update',$data->id)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="name" class="form-control" placeholder="Title" value="{{$data->name}}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <input class="form-control" name="des" placeholder="Descriptoin" value="{{$data->des}}}" ></input>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Image</label>
                <img src="{{asset($data->image)}}"  style="width: 100px; height: 100px">
                <input type="hidden" name="oldimage" value="{{asset($data->image)}}">
                <input type="file" name="image" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection
