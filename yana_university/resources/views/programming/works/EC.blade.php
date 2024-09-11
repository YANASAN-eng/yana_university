@extends('layouts.frame')

@section('模擬的ECサイト')

@section('style')
<link rel="stylesheet" href="{{ asset('css/product/style.css') }}">
@vite(['resources/js/app.js'])
@endsection

@section('introduction')
<!-- TODO:イントロ部分はマガジン実装 -->
@endsection

@section('contents')
<!-- 商品表示 -->
<div id="app">
    <prodcut-show-component></product-show-component>
</div>
@endsection