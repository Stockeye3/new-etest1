
@extends('layouts.master')

@section('title')
<title> {{$admin->name}} </title>
@endsection

@section('content')
<hr><hr><hr><hr>
<div class="container">
            <h1 align ='center'> Admin Info </h1>
            <h3><u>Name:</u> {{$admin->name}} </h3>
            <h3><u>Email:</u> {{$admin->email}} </h3>    
            <h3><u>Admin since:</u> {{$admin->created_at->diffforhumans()}} </h3>        
         
</div>
