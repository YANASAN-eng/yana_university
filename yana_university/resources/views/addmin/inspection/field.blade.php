@extends('layouts.frame')

@section('title', '分野管理画面')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite(['resources/js/app.js'])
@endsection

@section('contents')
<div id="app">
<input type="hidden" id="lectures" name="lectures" value="{{ $lectures }}">
<field-component></field-component>
</div
@endsection