@extends('layouts.frame');

@section('title', '地図なのだ')

@section('style')
@vite(['resources/js/app.js'])
@endsection
@section('contents')
<div id="app">
    <map-component></map-component>
</div>
@endsection