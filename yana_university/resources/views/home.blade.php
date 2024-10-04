@extends('.layouts.frame')

@section('title', 'トップページ')

@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('css/home/style.css') }}">
@vite(['resources/js/app.js'])

@endsection

@section('contents')
<div class="introduction-title-wrapper">
    <h1 class="introduction-tile">ホームページだよ</h1>
</div>
<div id="app">
<home-component></home-component>
</div>

@endsection