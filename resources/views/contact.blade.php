@extends('layouts.app')
@section('content')
   <h1>contact page</h1>

    @if(count($pepole))
        <ul>
        @foreach($pepole as $person)
            <li>{{$person}}</li>
            @endforeach
        </ul>
    @endif
@stop

@section('footer')

@stop