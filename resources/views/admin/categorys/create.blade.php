@extends('layout.app')

@section('title', 'Create categories')

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
    <h1 class="mb-0">Add category</h1>
    <hr />
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="row mb-3">
                <div class="col">
                    <textarea class="form-control" name="des" placeholder="Descriptoin"></textarea>
                </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="file" name="image" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
