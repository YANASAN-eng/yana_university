@extends('layouts.frame')

@section('title','YANA大学イラスト創作科')

@section('introduction')
    <h1>YANA大学イラスト創作科</h1>
@endsection

@section('contents')
    <ul>
        @foreach($books as $book)
            <li style="list-style:none;"><a href="{{url($book->book_url)}}">{{$book->book_name}}</a></li>
        @endforeach
    </ul>
@endsection