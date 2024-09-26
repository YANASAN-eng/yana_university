@extends('.layouts.frame')

@section('title', 'トップページ')

@section('style')
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