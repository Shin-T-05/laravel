@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center justify-content-center">
    <a class="nav-link" href="{{ route('histories.index', ['view' => 'purchases']) }}">
        <i class="fas fa-shopping-basket"></i> {{ __('購入一覧') }}
    </a>
    <a class="nav-link" href="{{ route('goods.index') }}">
        <i class="fas fa-heart"></i> {{ __('いいね一覧') }}
    </a>
    <a class="nav-link" href="{{ route('edit') }}">
        <i class="fas fa-edit"></i> {{ __('編集') }}
    </a>
    <a class="nav-link" href="{{ route('withdrawal') }}">
        <i class="fas fa-user-minus"></i> {{ __('退会') }}
    </a>
    <a class="nav-link" href="http://127.0.0.1/items">
        <i class="fas fa-home"></i> {{ __('トップに戻る') }}
    </a>
</div>
@endsection
