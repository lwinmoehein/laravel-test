@extends('layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Posts</div>

                <div class="card-body alert">
                        <a href="posts/create" class="btn btn-success">Create Post</a>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif    
                    @if (count($posts)>0)
                    @foreach ($posts as $post )
                        <div class='well'>
                        <a href="posts/{{$post->id}}">{{$post->title}} </a>
                        <small>{{$post->created_at}}</small>

                        
                        </div>
                        <a href="posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
    {{ Form::open(['action' => ['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) }}
    
            <input name="_method" type="hidden" value="DELETE">
        
       {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
       
   {!!Form::close() !!}
                    @endforeach
                @else
                    <div class="well">
                        No posts found
                    </div>
                @endif    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
