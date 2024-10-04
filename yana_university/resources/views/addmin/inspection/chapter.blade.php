@extends('layouts.frame')

@section('title', '章管理画面')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite(['resources/js/app.js'])
@endsection

@section('contents')
<div id="app">
<input type="hidden" name="fields" id="fields" value="{{ $fields }}">
<chapter-component></part-component>
</div
@endsection