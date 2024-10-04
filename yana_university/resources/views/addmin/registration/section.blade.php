@extends('layouts.frame')

@section('title', '節登録画面')

@section('style')
<link rel="stylesheet" href="{{ asset('css/form/style.css') }}">
@endsection

@section('introduction')
<h1>節を登録するのだ</h1>
@endsection
@section('contents')
<div class="">
    <ul>
        <li><a href="{{ route('addmin.registration.lecture') }}">講義登録はこちら</a></li>
        <li><a href="{{ route('addmin.registration.field') }}">分野登録はこちら</a></li>
        <li><a href="{{ route('addmin.registration.chapter') }}">章録はこちら</a></li>
    </ul>
</div>
@endsection

@section('form')
<form id="form" action="{{ route('addmin.registration.section.execution') }}" method="post" enctype="multichapter/form-data">
    @csrf
    <div class="row-item">
        <div class="column1">
            <label for="lecture">講義選択</label>
        </div>
        <div class="column2">
            <select name="lecture_id" id="lecture-id">
                <option>講義を選択するのだ</option>
                @foreach ($lectures as $lecture)
                    <option value="{{ $lecture->id }}">{{ $lecture->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row-item">
        <div class="column1">
            <label for="field-id">分野選択</label>
        </div>
        <div class="column2">
            <select name="field_id" id="field-id">
            </select>
        </div>
    </div>
    <div class="row-item">
        <div class="column_1">
            <label for="chapter-id">章選択</label>
        </div>
        <div class="column_2">
            <select name="chapter_id" id="chapter-id"></select>
        </div>
    <div class="row-item">
        <div class="column_1">
            <label for="name">節名</label>
        </div>
        <div class="column_2">
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        @if ($errors->has('name'))
            <div class="column_3">
                <span class="error-message">{{ $errors->first('name') }}</span>
            </div>
        @endif
    </div>
    <div class="row-item">
        <div class="column_1">
            <label for="url">url</label>
        </div>
        <div class="column_2">
            <input type="text" id="url" name="url">
        </div>
    </div>
    <div class="button_wrapper">
        <input type="submit" value="登録">
        <button class="back" type="button">戻る</button>
    </div>
</form>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/addmin/edit/section/main.js') }}"></script>
@endsection