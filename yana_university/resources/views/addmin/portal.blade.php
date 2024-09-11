@extends('layouts.frame')

@section('title', '管理画面')

@section('contents')
<div class="transitions">
    <div class="item">
        <a href="{{ route('addmin.user') }}">ユーザー管理画面</a>
    </div>
    <div class="item">
        <a href="{{ route('addmin.product') }}">商品</a>
    </div>
    <div class="item">
        <a href="">本</a>
    </div>
    <div class="item">
        <a href="">章</a>
    </div>
    <div class="item">
    </div>
    <div class="item">
    </div>
</div>
@endsection