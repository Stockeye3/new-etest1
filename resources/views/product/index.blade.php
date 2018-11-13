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

    
    <?php
    $i = 0;

    foreach ($categories as $category) {

        if ($category->visible) {

            echo('<h3> <u> Category: '. $category->name. '</u> </h3>');
            $i++;

            echo '<table>';
            echo'<tr>';
            foreach ($products as $product) {
                if ($product->category_id == $i && $product->visible) {
                ?>

                    <td>
                        <div class="col-md-3 col-sm-8">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="#">
                                    <img class="pic-1" height='200' width='200' src="{{$product->photo}}" >
                                    </a>


                                </div>

                                <div class="product-content">
                                    <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                                    <div class="price"> {{ $product->price  . ' $'}}    
                                    </div>
                                      
                                      <a href="{{ route('product.addtocart', ['id' => $product->id] ) }}"><i class="fa fa-shopping-cart"> Add</i></a>
                                                
                                </div>


                            </div>
                        </div>
                    </td>
                    
  
                    <?php
                
            }
            echo'</tr>';                
            echo'</table>';
        }
        }
    }
    ?>
                   
<hr>
<hr>

@endsection


