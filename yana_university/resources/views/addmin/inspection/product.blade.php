@extends('layouts.frame')

@section('title', '商品一覧画面')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@vite(['resources/js/app.js'])
@endsection

@section('contents')
<div id="app">
    <product-component></product-component>
</div>
@endsection