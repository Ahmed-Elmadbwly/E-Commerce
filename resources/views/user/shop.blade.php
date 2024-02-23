@extends('layout.pages')
@section('title')
    Shop
@endsection
@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach($category as $i)
                            <li data-filter=".{{$i->id}}">{{$i->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row product-lists">
                @foreach($products as $product)
                    <div class="col-lg-4 col-md-6 text-center {{$product->cat_id}}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{route('single-productRe',$product->id)}}"> <img style="height: 100px; width: 100px" src="{{asset($product->image)}}" alt=""></a>
                            </div>
                            <h3>{{$product->name}}</h3>
                            <p class="product-price"><span>Per Kg</span> {{$product->price}} </p>
                            <form method="POST" action="{{ route('card.create') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button style="font-family: 'Poppins', sans-serif; border-radius: 50px; display: inline-block; background-color: #F28123;color: #fff; padding: 10px 20px;" type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="pagination-wrap">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a class="active" href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
