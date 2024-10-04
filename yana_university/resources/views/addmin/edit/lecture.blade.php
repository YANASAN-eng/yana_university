@extends('layouts.frame')

@section('title', '講義集画面')

@section('style')
<link rel="stylesheet" href="{{ asset('css/form/style.css') }}">
@endsection

@section('form')
<form id="form" action="{{ route('addmin.edit.lecture.execution') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $lecture->id }}">
    <div class="row-item">
        <div class="column1">
            <label for="name">名前</label>
        </div>
        <div class="column2">
            <input type="text" id="name" name="name" value="{{ $errors->has('name') ? old('name') : $lecture->name }}">
        </div>
        @if ($errors->has('name'))
            <div class="column3">
                <span class="error_message">{{ $errors->first('name') }}</span>
            </div>
        @endif
    </div>
    <div class="row-item">
        <div class="column1">
            <label for="url">url</label>
        </div>
        <div class="column2">
            <input type="text" id="url" name="url" value="{{ $errors->has('url') ? old('url') : $lecture->url }}">
        </div>
        @if ($errors->has('lecture'))
            <div class="column3">
                <span class="error_message">{{ $errors->first('lecture') }}</span>
            </div>
        @endif
    </div>
    <div class="row-item">
        <div class="column1">
            <label for="lecture_image">講義画像</label>
        </div>
        <div class="column2">
            <input type="file" id="product_image" name="lecture_image" value="{{ $errors->has('lecture_image') ? old('lecture_image') : $lecture->lecture_image }}">
        </div>
        @if ($errors->has('lecture_image'))
            <div class="column3">
                <span class="error_message">{{ $errors->first('lecture-image') }}</span>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="column1">
            <input type="submit" value="編集を実行">
        </div>
        <div class="column2">
            <button class="back" type="button">戻る</button>
        </div>
    </div>
</form>
@endsection