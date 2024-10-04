@extends('layouts.frame')

@section('title', '節管理画面')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite(['resources/js/app.js'])
@endsection

@section('contents')
<div id="app">
<input type="hidden" id="chapters" value="{{ $chapters }}"> 
<section-component></section-component>
</div
@endsection