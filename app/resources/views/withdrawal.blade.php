@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center justify-content-center">
    <div class="alert alert-danger text-center" style="width: 100%; max-width: 600px;">
        <i class="fas fa-exclamation-triangle" style="font-size: 24px;"></i>
        <strong>本当に退会しますか？</strong>
    </div>
</div>
<div class="d-flex align-items-center justify-content-center">
    <a class="nav-link" href="{{ route('withdrawal-complete') }}">
        <i class="fas fa-user-times"></i> {{ __('退会する') }}
    </a>
    <a class="nav-link" href="{{ route('mypage') }}">
        <i class="fas fa-arrow-left"></i> {{ __('戻る') }}
    </a>
</div>
@endsection
