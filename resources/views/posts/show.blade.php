@extends('layout.app')
@section('content')
<a href="../posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <div>
        {{$post->body}}
    </div>
    <small>Written at {{$post->created_at}}</small>
    <hr>

    @if (!Auth::guest())
        @if(Auth::user()->id==$post->user_id)
            <div class="row">
                <div class="col-md-4 col-sm-4">
                  <img style="width:100" src="https://lmh.net/laravel/public/storage/coverimages/{{$post->cover_image}}"/>
                </div>
                <div class="col-md-8 col-sm-8">
                        <a href="../posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>
                        {{ Form::open(['action' => ['PostsController@destroy',$post->id],'method'=>'POST','class'=>'pull-right']) }}
                        
                                <input name="_method" type="hidden" value="DELETE">
                            
                           {!! Form::submit('DELETE', ['class'=>'btn btn-danger']) !!}
                           
                       {!!Form::close() !!}
                </div>
            </div>

           
    
        @endif
    @endif
    
</hr>
@endsection