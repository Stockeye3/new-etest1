
@extends('layouts.master')

@section('title')
<title> {{$product->name}} </title>
@endsection

@section('custom_head')
<link href="{{ asset('css/product_show.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<hr><hr><hr><hr>
<div class="container">
    <div class="row">
        <div class="col-xs-4 item-photo">
            <img  src="{{url('uploads/'.$product->filename)}}" />
        </div>
        <div class="col-5" style="border:0px solid gray">
           
            <h3> {{$product->name}} </h3>    
            
            <!-- Precios -->
            <h6 class="title-price"><small> {{ $product->description }} </small></h6>
            <h4 style="margin-top:0px;">{{"$ ". $product->price}}</h4>

          
            <div class="section">
                <h6 class="title-attr" style="margin-top:15px;" >
            </div>
 
            <div class="section" style="padding-bottom:20px;">
                <h6 class="title-attr"><small>Quantity</small></h6>                    
                <div>

                Stock: {{$product->qty}} pieces left  
            </div>                

           @if ( $product->qty > 0 ) 
            <div class="section" style="padding-bottom:20px;">
            <a href="{{ route('product.addtocart', ['id' => $product->id] ) }}">
                <button class="btn btn-success"><i class="fa fa-shopping-cart"> Add To Cart</i></a></button>
                
            </div>
           @else
           <label class="out-of-stock">OUT OF STOCK</label>
           @endif
        </div>                              


    </div>
</div>        
