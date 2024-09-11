@extends('layouts.frame')

@section('title', '講義リンク')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite(['/resources/js/app.js'])
@endsection

@section('contents')
<div id="app">

</div>
@endsection