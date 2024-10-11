@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>カート</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($cart->count() > 0) <!-- カートのアイテム数を確認 -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>商品名</th>
                <th>価格</th>
                <th>数量</th>
                <th>小計</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item) <!-- $idを削除 -->
                <tr>
                    <td>{{ $item->item->itemname }}</td> <!-- リレーションを使って商品名を取得 -->
                    <td>{{ $item->item->amount }}円</td> <!-- リレーションを使って価格を取得 -->
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->item->amount * $item->quantity }}円</td> <!-- 小計の計算 -->
                    <td>
                        <form action="{{ route('carts.destroy', $item->id) }}" method="POST"> <!-- itemのIDを使用 -->
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-right">
        <a href="{{ route('users.show', auth()->user()->id) }}" class="btn btn-primary">購入画面へ進む</a>
    </div>
    @else
        <div class="alert alert-info">
            カートに商品がありません。
        </div>
    @endif

    <!-- トップに戻るリンクを追加 -->
    <div class="d-flex align-items-center justify-content-center mt-3">
        <a class="nav-link" href="http://127.0.0.1/items">
            <i class="fas fa-home"></i> {{ __('トップに戻る') }}
        </a>
    </div>
</div>
@endsection
