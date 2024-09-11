@extends('.layouts.frame')

@section('title', 'トップページ')

@section('style')
@vite(['resources/js/app.js'])
@endsection

@section('contents')
<div id="app">
    <home-component></home-component>
</div>
@endsection