@extends('layout.app')

@section('content')
 <h1>Create post</h1>
 {!! Form::open(['action' => 'PostsController@store','method'=>'POST']) !!}
 
 <div class="form-group">
     {{ Form::label('title','Title')}}
     {{ Form::text('title','',['class'=>'form-control','placeholder'=>'title'])}}
 </div>
 <div class="form-group">
        {{ Form::label('body','Body')}}
        {{ Form::textarea('body','',['class'=>'form-control','placeholder'=>'Body','id'=>'article-ckeditor'])}}
    </div>
    
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    
{!!Form::close() !!}

@endsection