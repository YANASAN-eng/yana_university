@extends('layouts.commonPortal')

@section('title', '管理者画面')

@section('introductionTitle', '管理者画面')

@section("items")
<div class="item">
    <a href="{{ route('addmin.user') }}">ユーザー管理画面</a>
</div>
<div class="item">
    <a href="{{ route('addmin.product') }}">商品</a>
</div>
<div class="item">
    <a href="{{ route('home') }}">戻る</a>
</div>
@endsection