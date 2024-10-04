@extends('layouts.commonPortal')

@section('items')
<div class="item">
    <a href="{{ route('addmin.inspection.lecture') }}">講義一覧</a>
</div>
<div class="item">
    <a href="{{ route('addmin.registration.lecture') }}">講義登録</a>
</div>
@endsection