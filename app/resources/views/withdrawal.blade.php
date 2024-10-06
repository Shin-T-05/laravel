@extends('layouts.layout')
@section('content')
<div class = "d-flex align-items-center justify-content-center">
    本当に退会しますか？
</div>
<div class = "d-flex align-items-center justify-content-center">
<a class="nav-link" href="{{ route('withdrawal-complete') }}">{{ __('退会する') }}</a>
<a class="nav-link" href="{{ route('mypage') }}">{{ __('戻る') }}</a>
</div>

@endsection