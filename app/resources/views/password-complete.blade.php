@extends('layouts.layout')
@section('content')
<div class = "d-flex align-items-center justify-content-center">
    <div>パスワード再設定完了しました。</div>
</div>
<div class = "d-flex align-items-center justify-content-center">
<a href="{{ route('login')}}">
<button type="submit" class="btn btn-primary">{{ __('ログイン画面に戻る') }}</button>
</a>
</div>
@endsection