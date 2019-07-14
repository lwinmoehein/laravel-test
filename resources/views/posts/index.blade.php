@extends('layout.app')

@section('content')
 
@if (count($posts)>0)
    @foreach ($posts as $post )
        <div class='well'>
        <a href="posts/{{$post->id}}">{{$post->title}} </a>
        <small>{{$post->created_at}}</small>
        </div>
       
    @endforeach
    {{$posts->links()}}
@else
    <div class="well">
        No posts found
    </div>
@endif

@endsection