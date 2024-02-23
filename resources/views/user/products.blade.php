@extends('layout.pages')
@section('title')
     Products
@endsection
@section('content')
    <!-- products -->
    <div class="product-section mt-150 mb-150">
        <div class="row product-lists">
          @foreach($products as $product)
            <div class="col-lg-4 col-md-6 text-center strawberry">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{route('single-productRe',$product->id)}}"><img src="{{asset($product->image)}}" alt=""></a>
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
    </div>


@endsection
