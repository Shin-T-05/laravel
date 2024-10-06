@extends('layouts.layout')
@section('content')
<div class = "container">
    <div>管理者ページトップ</div>
</div>
<div class = "d-flex align-items-center justify-content-center">
    <a class="nav-link" href="{{route('business-user')}}">{{ __('ユーザー一覧') }}</a>
    <a class="nav-link" href="{{route('business-registration')}}">{{ __('商品登録') }}</a>
    <a class="nav-link" href="{{route('business-item')}}">{{ __('商品一覧') }}</a>
    <a class="nav-link" href="{{ route('histories.index') }}">{{ __('売上管理') }}</a>
</div>
@endsection