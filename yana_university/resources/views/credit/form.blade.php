@extends('layouts.frame')

@section('title', 'デモ')

@section('style')

@endsection

@section('form')
<form action="{{ route('stripe.charge') }}" method="POST">
    @csrf
    <script 
        src="https://checkout.stripe.com/checkout.js"
        class="stripe-button"
        data-key="{{ config('services.stripe.key') }}"  <!-- 公開可能キー -->
        data-amount="1000"
        data-name="お支払い画面"
        data-label="payment"
        data-description="現在はデモ画面です"
        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
        data-locale="auto"
        data-currency="JPY"
    >
    </script>
</form>
@endsection
