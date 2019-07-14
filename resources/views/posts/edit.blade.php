@extends('layout.app')

@section('content')
 <h1>Edit post</h1>
 {!! Form::open(['action' => ['PostsController@update',$post->id],'method'=>'POST']) !!}
 
 <div class="form-group">
     {{ Form::label('title','Title')}}
     {{ Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'title'])}}
 </div>
 <div class="form-group">
        {{ Form::label('body','Body')}}
        {{ Form::textarea('body',$post->body,['class'=>'form-control','placeholder'=>'Body','id'=>'article-ckeditor'])}}
    </div>
    <input name="_method" type="hidden" value="PUT">
    {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
    
{!!Form::close() !!}

@endsection