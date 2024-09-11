@extends('layouts.frame')

@section('title', 'ユーザー一覧画面')

@section('style')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js'])
@endsection

@section('introduction')
<div class="introduction-title-wrapper">
    <h1 class="introduction-title">ユーザー管理者情報一覧</h1>
</div>
<div class="introduction-detail">
    <h3 class="sentense">
        このページではユーザーを管理することができるよ。また検機能も実装しているから有効に使用してね！
    </h3>
</div>
@endsection

@section('contents')
    <div id="app">
        <user-component></user-component>
    </div>
@endsection
        
        

