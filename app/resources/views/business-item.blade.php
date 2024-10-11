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
            <th scope='col'>操作</th> <!-- 編集と非表示の列を追加 -->
        </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        @if($item->likes == 0) <!-- 非表示でない商品だけ表示 -->
        <tr>
            <th scope='row'>{{ $item['itemname'] }}</th>
            <td>{{ $item['amount'] }}</td>
            <td>{{ $item['sentence'] }}</td>
            <td>
                <img src="{{ asset('storage/' . $item['image']) }}" alt="商品画像" style="width: 100px; height: auto;">
            </td>
            <td>
                <!-- 編集リンク -->
                <a class="nav-link" href="{{ route('items.edit', $item['id']) }}">{{ __('編集') }}</a>
                
                <!-- 非表示ボタン -->
                <form action="{{ route('hide', $item->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-warning">非表示</button>
                </form>
            </td>
        </tr>
        @endif
    @endforeach
    </tbody>
</table>

<div class="d-flex align-items-center justify-content-center">
    <a class="nav-link" href="{{ route('business-top') }}">
        <i class="fas fa-arrow-circle-left"></i> {{ __('事業者トップに戻る') }} <!-- 戻るアイコン -->
    </a>
</div>
@endsection

