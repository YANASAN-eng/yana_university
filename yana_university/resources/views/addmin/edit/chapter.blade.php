@extends('layouts.frame')

@section('title', '章集画面')

@section('style')
<link rel="stylesheet" href="{{ asset('css/form/style.css') }}">
@endsection

@section('form')
<form id="form" action="{{ route('addmin.edit.chapter.execution') }}" method="POST" enctype="multichapter/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $chapter->id }}">
    <div class="row-item">
        <div class="column1">
            <label for="lecture-id">講義選択</label>
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
            <select name="field_id" id="field-id"></select>
        </div>
        @if ($errors->has('field_id'))
            <div class="column3">
                <span class="error_message">{{ $errors->first('field_id') }}</span>
            </div>
        @endif
    </div>
    <div class="row-item">
        <div class="column1">
            <label for="name">名前</label>
        </div>
        <div class="column2">
            <input type="text" id="name" name="name" value="{{ $errors->has('name') ? old('name') : $chapter->name }}">
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
            <input type="text" id="url" name="url" value="{{ $errors->has('url') ? old('url') : $chapter->url }}">
        </div>
        @if ($errors->has('url'))
            <div class="column3">
                <span class="error_message">{{ $errors->first('url') }}</span>
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

@section('script')
<script type="text/javascript" src="{{ asset('js/addmin/edit/chapter/main.js') }}"></script>
@endsection