@extends('layouts.master')


@section('custom_head')
<link href="{{ asset('css/admin_dashboard.css') }}" rel="stylesheet" type="text/css" />
@endsection



@section('title')
<title> Admin's Dashbord </title>
@endsection


        @include('layouts.header')


        <hr><hr><hr>
        <div align='center'>
            <h1> Admin {{Auth()->user()->name }}'s Dashbord </h1>
            <h3> Users </h3>
        </div>

        <table class='col-10' align='center'>
            <tr>
                <th class='first'> Id </th> 
                <th> First Name </th> 
                <th> Last Name </th>
                <th> Email </th>            
                <th> Phone </th> 
                <th> Address </th>
                <th> Member Since </th>
                <th> Status </th>
                <th> View Orders </th>
                <th> Edit Info </th>
                <th> Delete User </th>
                <th> Ban User </th>
            </tr>
            @foreach($customers as $customer)
            <tr>
                <td> {{ $customer->id }} </td>
                <td> {{ $customer->fname }} </td>
                <td> {{ $customer->lname }} </td>
                <td> {{ $customer->email }} </td>
                <td> {{ $customer->phone }} </td>
                <td> {{ $customer->address }} </td>
                <td> {{ $customer->created_at->diffForHumans() }} </td>
                <?php
                $customer->ban ? $status = 'banned' : $status = 'normal';
                ?>
                <td> {{ $status }} </td>
                <td> <a href="{{route('customer.viewOrders',$customer)}}"><button class="btn btn-success" type="submit">View Orders</button></a></td>

                <td> <a href="../customer/{{$customer->id}}/edit"
                        class="btn btn-dark" type="submit">Edit Info</a></td>
                <td> <form action="{{ route('customer.destroy', $customer->id)}}" method="post"> 
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete User</button>
                    </form>
                </td>

                <td>                              
                    @if($customer->ban)                 

                    <form method="post"
                          action="{{route('customer.unban',$customer->id)}}">
                        @method('PATCH')
                        {{ csrf_field() }}
                        <button  class="btn btn-success" type="submit">Unban User</button>

                    </form>
                    @else
                    <form method="post"
                          action="{{route('customer.ban',$customer->id)}}">
                        @method('PATCH')
                        {{ csrf_field() }}
                        <button  class="btn btn-danger" type="submit">Ban User </button>

                    </form>

                    @endif
                </td>
            </tr>
            @endforeach



        </table>
        <hr>
        <div align='center'>
            <h3>Products</h3>
        </div>

        

        <table class='col-10' align='center'>
            <tr>
                <th class='first'> Id </th> 
                <th> Name </th> 
                <th> Description </th>
                <th> Qty </th>            
                <th> Price </th>
                <th> Photo </th>
                <th> Product Created </th>
                <th> Category # </th>
                <th> Status </th>
                <th> Product View </th>
                <th> Edit Product    </th>
                <th> Delete Product </th>

            </tr>
            @foreach($products as $product) 
            <tr>
                <td> {{ $product->id }} </td>
                <td> {{ $product->name }} </td>
                <td> {{ $product->description }} </td>
                <td> {{ $product->qty }} </td>
                <td> {{ $product->price . " $"}} </td>
                <td> <img class="product" height="100" width="100" src="{{url('uploads/'.$product->filename)}}" > </td>
                <td> {{ $product->created_at->diffForHumans() }} </td>
                
                <td> {{ $product->getCatName($product) }}</td>
                <?php
                $product->visible ? $visibility = 'visible' : $visibility = 'hidden';
                ?>

                <td> {{ $visibility }} </td>
                <td> <a href="{{ route('product.show', $product->id)}}" class="btn btn-dark">View Product</a></td>
                <td>  <a href="{{ route('product.edit', $product->id)}}" class="btn btn-dark">Edit Product</a>  </td>
                <td>  <form action="{{ route('product.destroy', $product->id)}}" method="post"> 
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach

</table>
 <a href="{{route('product.create')}}"><h5 align='center'> Add a New Product</h4></a>
 <hr>



        <div align='center'>
            <h3> Categories</h3>
        </div>

       <table class='col-5' align='center'>
            <tr>
                <th> Id </th> 
                <th> Name </th> 
                <th> status </th>
                <th> Category Created </th>
                <th> Edit Category </th>
                <th> Delete Cat </th>
            </tr>

            @foreach($categories as $category)
            <tr>
                <td> {{ $category->id }} </td>
                <td> {{ $category->name }} </td>
                
                <?php
                $category->visible ? $cvisibility = 'visible' : $cvisibility = 'hidden';
                ?>

                <td> {{ $cvisibility }} </td>
                <td> {{ $category->created_at->diffForHumans() }} </td>
                <td>  <a href="{{ route('category.edit', $category->id)}}" class="btn btn-dark">Edit category</a>  </td>
                <td>  <form action="{{ route('category.destroy', $category->id)}}" method="post"> 
                        {{ csrf_field() }}
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </form>
                </td>

            </tr>
            @endforeach

            </table>
            <a href="{{route('category.create')}}"><h5 align='center'> Create a New Category</h3></a>
 <hr>

    </body>
</html>      
