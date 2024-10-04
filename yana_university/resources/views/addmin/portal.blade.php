@extends('layouts.commonPortal')

@section('title', '管理者画面')

@section('introductionTitle', '管理者画面')

@section("items")
<div class="item">
    <a href="{{ route('addmin.user') }}">ユーザー管理画面</a>
</div>
<div class="item">
    <a href="{{ route('addmin.product') }}">商品管理画面</a>
</div>
<div class="item">
    <a href="{{ route('addmin.lecture') }}">講義管理画面</a>
</div>
<div class="item">
    <a href="{{ route('addmin.field') }}">分野管理画面</a>
</div>
<div class="item">
    <a href="{{ route('addmin.chapter') }}">章管理画面</a>
</div>
<div class="item">
    <a href="{{ route('addmin.section') }}">節管理覧画面</a>
</div>
<div class="item">
    <a href="{{ route('home') }}">戻る</a>
</div>

@endsection