@extends('layout.app')
@section('content')
<a href="../posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <div>
        {{$post->body}}
    </div>
    <small>Written at {{$post->created_at}}</small>

@endsection