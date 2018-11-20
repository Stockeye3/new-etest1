@extends ('layouts.master')


@section ('content')

<h3 align = 'center'> {{ $customer->fname .'\'s orders' }} </h3>



<br>

<h3> sorna hon </h3>


@foreach($orders as $order)
{{ $order['1']['id']}}

<h5> {{'Order ID:' . $order->id}} </h5>

<table>
<tr>

<th> Product </th>
<th> Qty </th>

</tr>
</table>

@endforeach


@endsection