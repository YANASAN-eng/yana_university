@extends('layouts.frame')

@section('title', '会話チャット')

@section('style')
<link rel="stylesheet" href="{{ asset('css/chat/style.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite(['resources/js/app.js'])
@endsection

@section('contents')
<div id="app">
<chat-component></chat-component>
</div>
@endsection