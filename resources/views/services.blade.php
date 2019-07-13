@extends('layout.app')

@section('content')
   <h1>{{$data['title']}}</h1>
       @if (count($data['services'])>0)
           <ul class="list-group">
                @foreach ($data['services'] as $item)
                <li class="list-group-item">{{$item}}</li>
                @endforeach
           </ul>
       @endif
       
@endsection