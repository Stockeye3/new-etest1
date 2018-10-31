@extends('layouts.master')




@section('title')
<title> All Products </title>
@endsection

@section('content')

<div class="container">
    <h2 class="h2"> Shop </h2>
    <hr>
    <?php
    $i = 0;

    foreach ($categories as $category) {

        if ($category->visible) {

            echo('<h3> <u>'. $category->name. '</u> </h3>');
            $i++;

            echo '<table>';
            echo'<tr>';
            foreach ($products as $product) {
                if ($product->category_id == $i && $product->visible) {
                    ?>

                    <td>
                        <div class="col-md-3 col-sm-6">
                            <div class="product-grid">
                                <div class="product-image">
                                    <a href="#">
                                        <img class="pic-1" height="200" width="200" src={{$product->photo}}  " >

                                    </a>


                                </div>

                                <div class="product-content">
                                    <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                                    <div class="price"> {{ $product->price  . ' $'}} 
                                    </div>
                                    <a class="add-to-cart" href="">Add To Cart</a>
                                </div>


                            </div>
                        </div>
                    </td>
                    
                    <?php
                }
            }
            echo'<tr>';                
            echo'</table>';

        }
    }
    ?>
</div>



<hr>
<hr>
<hr>

@endsection


