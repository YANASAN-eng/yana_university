@extends('layouts.frame')

@section('title', '商品管理ページ')

@section('contents')
<div class="url-list-wrapper">
    <ul class="url-list">
        <li class="url">
            <a href="{{ route('addmin.inspection.product') }}">商品一覧</a>
        </li>
        <li class="url">
            <a href="{{ route('addmin.registration.product') }}">商品登録</a>
        </li>
    </ul>
</div>
@endsection