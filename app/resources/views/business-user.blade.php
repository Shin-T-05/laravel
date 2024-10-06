@extends('layouts.layout')
@section('content')
<div class = "d-flex align-items-center justify-content-center">
    <div>ユーザー一覧</div>
</div>

<table class='table'>
    <thead>
        <tr>
            <th scope='col'>ユーザー名</th>
            <th scope='col'>メールアドレス</th>
            <th scope='col'>電話番号</th>
        </tr>
    </thead>
    <tbody>
    <!-- ここに収入を表示する --><!--id→income-->
    @foreach($users as $user)
        <tr>
            <th scope='col'>{{$user['name']}}</th>
            <th scope='col'>{{$user['email']}}</th>
            <th scope='col'>{{$user['tel']}}</th>
        </tr>
    @endforeach
    </tbody>
</table>

<div class = "d-flex align-items-center justify-content-center">
<a class="nav-link" href="{{ route('business-top') }}">{{ __('事業者トップに戻る') }}</a>
</div>
@endsection