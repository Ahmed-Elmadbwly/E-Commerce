@extends('layout.app')

@section('title', 'Create Product')

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
    <h1 class="mb-0">Add Product</h1>
    <hr />
    <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Title">
            </div>
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="Price">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="file" name="image" >
            </div>
            <div class="col">
                <textarea class="form-control" name="des" placeholder="Descriptoin"></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <select id="options"  class="form-control" name="cat_id">
                @foreach($category as $i)
                    <option value="{{$i->id}}">{{$i->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
