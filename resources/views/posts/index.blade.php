@extends('layout.app')

@section('content')
 
@if (count($posts)>0)
    @foreach ($posts as $post )
        <div class='well'>
        <a href="posts/{{$post->id}}">{{$post->title}} </a>
        <small>{{$post->created_at}}</small>
        {{--  @if (Auth::user()->id==$post->user_id)
        <a href="posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
        {{ Form::open(['action' => ['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) }}
        
                <input name="_method" type="hidden" value="DELETE">
            
           {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
           
       {!!Form::close() !!}
        @endif  --}}
    </div>

    @endforeach
    {{$posts->links()}}
@else
    <div class="well">
        No posts found
    </div>
@endif

@endsection