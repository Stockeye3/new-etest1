
@extends('layouts.master')

@section('title')
<title> {{$product->name}} </title>
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
                    <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                    <input value="1" />
                    <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                </div>
                Stock: {{$product->qty}} pieces left  
            </div>                

           @if ( $product->qty > 0 ) 
            <div class="section" style="padding-bottom:20px;">
                <button class="btn btn-success">Add to Cart</button>
                
            </div>
           @else
           <button class="btn btn-danger">OUT OF STOCK</button>
           @endif
        </div>                              

        <div class="col-xs-9">

    </div>
</div>        
