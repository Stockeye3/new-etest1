@extends('layouts.master')


@section('content')
<br>
<br>
<br>
<h1 align='center'> OoOoPs, It appears that your account is banned
if you think that this is a mistake please the customer support department </h1>
<h3 align='center'> You will be redirected to the login page </h3>
@endsection

<script> setTimeout(function(){window.location="customer/login"}, 5000); </script>
