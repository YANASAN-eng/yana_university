@extends('layouts.commonPortal')

@section('title', 'ユーザ管理画面')

@section('introductionTitle', 'ユーザー管理画面')

@section('items')
<div class="item">
    <a href="{{ route('addmin.inspection.user') }}">ユーザ一覧画面</a>
</div>
<div class="item">
    <a href="{{ route('addmin.registration.user') }}">ユーザー登録画面</a>
</div>
@endsection