@extends('layout.pages')
@section('title')
    Card
@endsection

@section('content')
    <div class="cart-section mt-150 mb-150" id="card">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                            </tr>
                            </thead>
                            <tbody >
                            @foreach($data as $i)
                                @if($i->quantity == 0)
                                    @continue
                                @endif
                            <tr class="table-body-row">
                                <td class="product-remove"><a href="{{route('card.delete',$i->id)}}"><i class="far fa-window-close"></i></a></td>
                                <td class="product-image"><img style="height: 50px; width: 50px" src="{{asset($i->image)}}" alt=""></td>
                                <td class="product-name">{{$i->name}}</td>
                                <td class="product-price">{{$i->price}}$</td>
                                <td class="product-quantity">
                                    <input type="number" name="quantity" data-rowid="{{$i->id}}" value="{{$i->quantity}}" onchange="updateQuantity(this)">
                                </td>
                                <td class="product-total">{{$i->quantity * $i->price}}</td>
                                <?php  $total+=$i->quantity * $i->price;?>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Total</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="total-data">
                                <td><strong>Subtotal: </strong></td>
                                <td>{{$total}}$</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Shipping: </strong></td>
                                <td>$45</td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td>${{$total+45}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <form id="updateQuantity" method="POST" action="{{route('update.quantity')}}#card">
       @csrf
       @method('put')
       <input type="hidden" id="rowid" name="rowid">
       <input type="hidden" id="quantity" name="quantity">
   </form>
@endsection
@section('js')
    <script>
        function updateQuantity(qty){
            $('#rowid').val($(qty).data('rowid'));
            $('#quantity').val($(qty).val());
            $('#updateQuantity').submit();
        }
    </script>
@endsection
