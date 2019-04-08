
@extends('layouts.master')

@section('title')
<title> Cart </title>
@endsection

@section('content')

<h2 align ='center'> My Cart </h2> 
@if (Session::has('cart'))







<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-9 col-md-offset-3">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <form method="post" action="{{route('cart.update')}}">
        @method('PATCH')
        {{ csrf_field() }}
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="{{url('uploads/'.$product['item']['filename']) }}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading">{{$product['item']['name'] }} <a href="#"></a></h4>
                                                         
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                            <input type="text" class="form-control" name="{{$product['item']['id']}}" value="{{$product['qty']}}">
                        </td>

                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$product['item']['price']}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{$product['price']}}</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <button type="submit" class="btn btn-danger">
                            <span class="glyphicon glyphicon-remove"></span> Remove

                            
                        </button></td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>${{$totalPrice}}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>$0.00</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>${{$totalPrice}}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>
                        <button type="submit" class="btn btn-info">Update</button>
                        </form>
                        </td>

                        <td>                           
                        
                        </td>

                        <td> <a href="{{route('home')}}">
                        <button type="button" class="btn btn-dark">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button> </a>
                        </td>


                        <td>
                        <a href="{{route('checkout.view')}}" type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@else
<p align= 'center'> NO ITEMS IN THE CART YET :D </p>

@endif
@endsection