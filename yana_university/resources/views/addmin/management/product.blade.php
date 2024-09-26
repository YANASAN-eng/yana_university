@extends('layouts.commonPortal')

@section('title', '商品管理ページ')

@section('introductionTitle', '商品管理ページ')

@section('items')
<div class="item">
    <a href="{{ route('addmin.inspection.product') }}">商品一覧</a>
</div>
<div class="item">
    <a href="{{ route('addmin.registration.product') }}">商品登録</a>
</div>
@endsection