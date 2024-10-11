@extends('layouts.layout')

@section('content')
<div class="container">
    <div>事業者ページトップ</div>
</div>
<div class="d-flex align-items-center justify-content-center">
    <a class="nav-link" href="{{route('business-user')}}">
        <i class="fas fa-users"></i> {{ __('ユーザー一覧') }} <!-- ユーザー一覧アイコン -->
    </a>
    <a class="nav-link" href="{{route('business-registration')}}">
        <i class="fas fa-plus-circle"></i> {{ __('商品登録') }} <!-- 商品登録アイコン -->
    </a>
    <a class="nav-link" href="{{route('business-item')}}">
        <i class="fas fa-th-list"></i> {{ __('商品一覧') }} <!-- 商品一覧アイコン -->
    </a>
    <a class="nav-link" href="{{ route('histories.index') }}">
        <i class="fas fa-chart-line"></i> {{ __('売上管理') }} <!-- 売上管理アイコン -->
    </a>
</div>
@endsection
