@extends('layout.app')
@section('content')

@if (!(Auth::user()==null))
@include('dashboard')
@else
<div class="jumbotron text-center">
    <p> Welcom to laravel test</p>
    <p>
    <a class="btn btn-primary btn-lg" href="login">Login</a>
    <a class="btn btn-success btn-lg" href="login">Register</a>
    </p>
    </div>
@endif

@endsection('content')
    
