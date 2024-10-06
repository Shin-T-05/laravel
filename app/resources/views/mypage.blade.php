@extends('layouts.layout')
@section('content')
<div class = "d-flex align-items-center justify-content-center">
<a class="nav-link" href="{{ route('histories.index', ['view' => 'purchases']) }}">{{ __('購入一覧') }}</a>
<a class="nav-link" href="{{ route('goods.index') }}">{{ __('いいね一覧') }}</a>
<a class="nav-link" href="{{route('edit')}}">{{ __('編集') }}</a>
<a class="nav-link" href="{{route('withdrawal')}}">{{ __('退会') }}</a>
</div>
@endsection