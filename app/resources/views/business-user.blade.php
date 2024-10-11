@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center justify-content-center">
    <i class="fas fa-users"></i> {{ __('ユーザー一覧') }}
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
    @foreach($users as $user)
        <tr>
            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['tel']}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="d-flex align-items-center justify-content-center">
    <a class="nav-link" href="{{ route('business-top') }}">
        <i class="fas fa-arrow-circle-left"></i> {{ __('事業者トップに戻る') }} <!-- 戻るアイコン -->
    </a>
</div>
@endsection
