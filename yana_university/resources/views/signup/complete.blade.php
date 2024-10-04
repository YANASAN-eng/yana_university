@extends('layouts.commonPortal')

@section("title", "ユーザ登録完了")


@section("introductionTitle", "ユーザー登録完了")
@section("items")
<div class="item">
    <a href="{{ route('login.form') }}">ログイン画面</a>
</div>
<div class="item">
    <a href="{{ route('home') }}">ホームページに戻る</a>
</div>
@endsection