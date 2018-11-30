@extends ('layouts.master')


@section ('content')

<h3 align = 'center'> {{ $customer->fname .'\'s orders' }} </h3>



<br>


@if(count($orders) == 0)
<h3 align='center'> No Orders for this customer </h3>
@else
<table>
    <tr>
        <th> id </th>
        <th> pdct </th>
        <th> qty</th>
    </tr>



    @foreach( $orders as $order => $i )
    <br>
        <tr>
            <td>
                {{'Order Id:' . $i[0]->order_id }}
            </td>
        </tr>
        <tr>
            <td>
                 Product Id
            </td>
            <td>
                    Qty
            </td>


        @foreach( $i as $row)
            <tr>

                <td> {{ $row->product_id}}
                <td>{{ $row->qty}}
            </tr>
        @endforeach
        
    @endforeach

</table>
@endif
@endsection
