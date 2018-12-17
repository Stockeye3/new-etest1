@extends('layouts.master')

@section('title')
<title> All Products </title>
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
            <h3>{{$category->name}} </h3>

            <table>
                <tr>
                    @foreach ($products as $product)
                        @if ($product->category_id == $category->id && $product->visible)
                     <td>
                        <div class="col-md-3 col-sm-8">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="{{route('product.show',$product)}}">
                                        <img class="pic-1" height='200' width='200' src="{{url('uploads/'.$product->filename)}}" >
                                    </a>


                                </div>

                                <div class="product-content">
                                    <h3 class="title"><a href="{{route('product.show',$product)}}">{{$product->name}}</a></h3>
                                    <div class="price"> {{ $product->price  . ' $'}}    
                                    </div>
                                      
                                      <a href="{{ route('product.addtocart', ['id' => $product->id] ) }}"><i class="fa fa-shopping-cart"> Add</i></a>
                                            
                                </div>


                            </div>
                        </div>
                    </td>
                        @endif
                    @endforeach

                </tr>                
                </table>

        
        @endif 
    @endforeach
                   
<hr>
<hr>

@endsection


