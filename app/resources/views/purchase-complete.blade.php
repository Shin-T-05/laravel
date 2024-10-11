<!-- resources/views/purchase/complete.blade.php -->
@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>購入完了</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <p>ご購入ありがとうございます！</p>
</div>
<a class="nav-link" href="http://127.0.0.1/items">{{ __('トップに戻る') }}</a>
@endsection
