@extends('layouts.layout')
@section('content')
<div class = "container">
    <div>パスワード再設定</div>
</div>
<label for='comment' class='mt-2'>新しいパスワード</label>
<textarea class='form-control' name='comment'>{{ old('comment') }}</textarea>
<label for='comment' class='mt-2'>新しいパスワード確認</label>
<textarea class='form-control' name='comment'>{{ old('comment') }}</textarea>
<div class = "containers">
<a href="{{ route('password-complete')}}">
    <button type = "button">送信</button>
</a>
</div>
@endsection