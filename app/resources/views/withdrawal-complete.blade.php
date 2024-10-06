@extends('layouts.layout')
@section('content')
<div class = "d-flex align-items-center justify-content-center">
    退会完了しました。
</div>
<div class = "d-flex align-items-center justify-content-center">
<form action="{{ route('users.destroy', $user->id) }}" method="post">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id">
        <button type="submit" class='btn btn-secondary' style = "background-color:red">ログイン画面に戻る</button>
</form>
</div>
@endsection