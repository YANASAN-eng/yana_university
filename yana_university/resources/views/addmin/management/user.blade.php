@extends('layouts.frame')

@section('title', 'ユーザ管理画面')

@section('contents')
<div class="transition-wrapper">
    <ul>
        <li><a href="{{ route('addmin.inspection.user') }}">ユーザ一覧画面</a></li>
        <li><a href="{{ route('addmin.registration.user') }}">ユーザー登録画面</a></li>
    </ul>
</div>
@endsection