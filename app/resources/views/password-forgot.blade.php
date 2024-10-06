@extends('layouts.layout')
@section('content')
<div class = "container">
    <div>パスワード再設定</div>
</div>
<label for='comment' class='mt-2'>メールアドレス入力</label>
<textarea class='form-control' name='comment'>{{ old('comment') }}</textarea>
<div class = "containers">
<a href="{{ route('users.index1')}}">
    <button type = "button">送信</button>
</a>
</div>
@endsection