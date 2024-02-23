@extends('layout.pages')
@section('title')
    Single Product
@endsection
@section('content')
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{asset($product->image)}}" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{$product->name}}</h3>
                        <p class="single-product-pricing"><span>Per Kg</span> {{$product->price}}</p>
                        <p>{{$product->des}}</p>
                        <div class="single-product-form">
                            <form method="POST" action="{{ route('card.create') }}">
                                @csrf
                                <input type="number" name="number" placeholder="0">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button style="font-family: 'Poppins', sans-serif; border-radius: 50px; display: inline-block; background-color: #F28123;color: #fff; padding: 10px 20px;" type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            </form>
                            <p><strong>Categories: </strong>Fruits, Organic</p>
                        </div>
                        <h4>Share:</h4>
                        <ul class="product-share">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single productRe -->

    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Related</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($re_product as $pro)
                    @if($pro == $product)
                        @continue
                    @endif
                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{route('single-productRe',$pro->id)}}"><img src="{{asset($pro->image)}}" alt=""></a>
                            </div>
                            <h3>{{$pro->name}}</h3>
                            <p class="product-price"><span>Per Kg</span> {{$pro->price}} </p>
                            <form method="POST" action="{{ route('card.create') }}">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $pro->id }}">
                                <button style="font-family: 'Poppins', sans-serif; border-radius: 50px; display: inline-block; background-color: #F28123;color: #fff; padding: 10px 20px;" type="submit" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
