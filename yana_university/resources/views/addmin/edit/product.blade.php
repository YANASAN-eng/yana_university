@extends('layouts.frame')

@section('title', '商品編集画面')

@section('style')
<link rel="stylesheet" href="{{ asset('css/form/style.css') }}">
@endsection

@section('form')
<form id="form" action="{{ route('addmin.edit.product.execution') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row-item">
        <div class="column1">
            <label for="name">名前</label>
        </div>
        <div class="column2">
            <input type="text" id="name" name="name" value="{{ $errors->has('name') ? old('name') : $product->name }}">
        </div>
        @if ($errors->has('name'))
            <div class="column3">
                <span class="error_message">{{ $errors->first('name') }}</span>
            </div>
        @endif
    </div>
    <div class="row-item">
        <div class="column1">
            <label for="price">値段</label>
        </div>
        <div class="column2">
            <input type="number" id="price" name="price" value="{{ $errors->has('price') ? old('price') : $product->price }}">
        </div>
        @if ($errors->has('price'))
            <div class="column3">
                <span class="error_message">{{ $errors->first('price') }}</span>
            </div>
        @endif
    </div>
    <div class="row-item">
        <div class="column1">
            <label for="product_image">商品画像</label>
        </div>
        <div class="column2">
            <input type="file" id="product_image" name="product_image" value="{{ $errors->has('product_image') ? old('product_image') : $product->product_image }}">
        </div>
        @if ($errors->has('prodcut_image'))
            <div class="column3">
                <span class="error_message">{{ $errors->first('product_image') }}</span>
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