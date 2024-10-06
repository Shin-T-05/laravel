@extends('layouts.layout')
@section('content')
<div class="d-flex align-items-center justify-content-center">
    <div>登録した商品一覧</div>
</div>

<table class='table'>
    <thead>
        <tr>
            <th scope='col'>商品名</th>
            <th scope='col'>値段</th>
            <th scope='col'>説明文</th>
            <th scope='col'>画像</th>
        </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr>
            <th scope='row'>{{$item['itemname']}}</th>
            <td>{{$item['amount']}}</td>
            <td>{{$item['sentence']}}</td>
            <td>
                <img src="{{ asset('storage/' . $item['image']) }}" alt="商品画像" style="width: 100px; height: auto;">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="d-flex align-items-center justify-content-center">
    <a class="nav-link" href="{{ route('business-top') }}">{{ __('事業者トップに戻る') }}</a>
</div>
@endsection
