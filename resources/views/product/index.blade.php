@extends('layouts.master')


@section('title')
<title> All Products </title>
@endsection

@section('custom_head')
<link href="{{ asset('css/shop.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div align='right'>
     <a href="{{route('shoppingCart')}}">
        <span class='badge'> {{ Session::has('cart') ? Session::get('cart')->totalQty: ' ' }}
        </span>
   <i class="fa fa-shopping-cart"> <b> My cart </b></i> 
     </a>
   </div>

    <h2 class="h2"> Shop </h2>
    <hr>

    
    @foreach ($categories as $category)
        @if($category->visible)
            <br>
            <h3 class='category-name'>{{$category->name}} </h3>
            <table>
                <tr>
                    @foreach ($products as $product)
                        @if ($product->category_id == $category->id && $product->visible)
                     <td>

                            <div class="product-grid">
                                    <a href="{{route('product.show',$product)}}">
                                        <img class="shop-image" height='170' width='170' src="{{url('uploads/'.$product->filename)}}" >

                                    <h3 class="product-name" >{{$product->name}}</h3> </a>
                                        <p class=product-price> {{'$ '. $product->price}} <p>
                                
                                      
                                      <a href="{{ route('product.addtocart', ['id' => $product->id] ) }}"><i class="fa fa-shopping-cart"> Add To Cart</i></a>

                            </div>

                    </td>
                        @endif

                    @endforeach

                </tr>                
                </table>

        
        @endif 
        <hr>
    @endforeach


@endsection


