@extends('layout.app')
@section('content')
<a href="../posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <div>
        {{$post->body}}
    </div>
    <small>Written at {{$post->created_at}}</small>
    <hr>
    <a href="../posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
    {{ Form::open(['action' => ['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) }}
    
            <input name="_method" type="hidden" value="DELETE">
        
       {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
       
   {!!Form::close() !!}
</hr>
@endsection