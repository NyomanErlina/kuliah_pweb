@extends('layout/mainku')

@section('title', 'Home User') 

@section('content') 


<div class="card">
<p>Hallo, {{@session('name')}}. Apakabar?</p>

            <h2>* Email kamu : {{Session::get('email')}}</h2>
            <h2>* Status Login : {{Session::get('login')}}</h2>
</div>



@endsection