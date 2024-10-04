@extends('layouts.commonPortal')

@section('title', '節管理画面')

@section('items')
<div class="item">
    <a href="{{ route('addmin.inspection.section') }}">節一覧</a>
</div>
<div class="item">
    <a href="{{ route('addmin.registration.section') }}">節登録</a>
</div>
@endsection