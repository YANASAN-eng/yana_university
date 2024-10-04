@extends('layouts.frame')

@section('title', '講義管理画面')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite(['resources/js/app.js'])
@endsection

@section('contents')
<div id="app">
<lecture-component></lecture-component>
</div
@endsection