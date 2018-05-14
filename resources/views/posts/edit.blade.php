@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form method="post" action="/posts/{{$post->id}}">
        <input type="hidden" name="_method" value="PUT" />
        <input type="text" value="{{$post->title}}" name="title" placeholder="enter title">
        {{csrf_field()}}
        <input type="submit" name="submit" value="save">
    </form>

    <form method="post" action="/posts/{{$post->id}}">
        <input type="hidden" name="_method" value="DELETE" />
        <input type="submit" name="DELETE" value="delete">
        {{csrf_field()}}


    </form>
@endsection

