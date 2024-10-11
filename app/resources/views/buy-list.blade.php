@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>購入履歴</h2>

    {{-- 購入履歴の表示 --}}
    <h3>購入した商品一覧</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>商品画像</th> {{-- 画像の列を追加 --}}
                <th>商品名</th>
                <th>数量</th>
                <th>金額</th>
                <th>日付</th>
                <th>アクション</th> {{-- アクション列を追加 --}}
            </tr>
        </thead>
        <tbody>
            @php
                $totalPurchaseAmount = 0; // 合計金額を初期化
            @endphp

            @foreach($purchases as $purchase)
                <tr>
                    <td>
                        @if($purchase->item->image) {{-- $purchaseからアイテムの画像を取得 --}}
                            <img src="{{ asset('storage/' . $purchase->item->image) }}" alt="商品画像" style="width: 100px; height: auto;">
                        @endif
                    </td>
                    <td>{{ $purchase->itemname }}</td>
                    <td>{{ $purchase->quantity }}</td>
                    <td>{{ $purchase->total }}円</td>
                    <td>{{ $purchase->created_at ? $purchase->created_at->format('Y-m-d') : '未定義' }}</td>
                    <td>
                        {{-- レビューを書くリンクを追加 --}}
                        <a href="{{ route('reviews.create', ['itemId' => $purchase->item_id]) }}" class="btn btn-primary">レビューを投稿</a>
                    </td>
                </tr>
                @php
                    $totalPurchaseAmount += $purchase->total; // 各レコードの金額を加算
                @endphp
            @endforeach
        </tbody>
    </table>

    {{-- 合計金額の表示 --}}
    <div class="mt-3">
        <strong>購入合計: {{ $totalPurchaseAmount }}円</strong>
    </div>
</div>
@endsection
