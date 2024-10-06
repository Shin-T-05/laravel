@extends('layouts.layout')

@section('content')
<div class="container mt-4">
    <h2>売上管理画面</h2>

    {{-- 売上履歴の表示 --}}
    <h3>売上履歴</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>商品名</th>
                <th>数量</th>
                <th>金額</th>
                <th>日付</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalSalesAmount = 0; // 合計金額を初期化
            @endphp

            @foreach($history as $record)
                <tr>
                    <td>{{ $record->itemname }}</td>
                    <td>{{ $record->quantity }}</td>
                    <td>{{ $record->total }}円</td>
                    <td>{{ $record->created_at ? $record->created_at->format('Y-m-d') : '未定義' }}</td>
                </tr>
                @php
                    $totalSalesAmount += $record->total; // 各レコードの金額を加算
                @endphp
            @endforeach
        </tbody>
    </table>

    {{-- 合計金額の表示 --}}
    <div class="mt-3">
        <strong>売上合計: {{ $totalSalesAmount }}円</strong>
    </div>

    {{-- カートの内容を表示 --}}
    <h3>カート内の商品</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>商品名</th>
                <th>数量</th>
                <th>単価</th>
                <th>金額</th>
            </tr>
        </thead>
        <tbody>
            @if(empty($cart)) {{-- カートが空の場合のチェック --}}
                <tr>
                    <td colspan="4" class="text-center">カートは空です。</td>
                </tr>
            @else
                @foreach($cart as $item)
                    <tr>
                        <td>{{ $item['itemname'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ $item['amount'] }}円</td>
                        <td>{{ $item['amount'] * $item['quantity'] }}円</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3" class="text-right"><strong>カート合計:</strong></td>
                    <td><strong>
                        {{ array_sum(array_map(function($item) { return $item['amount'] * $item['quantity']; }, $cart)) }}円
                    </strong></td>
                </tr>
            @endif
        </tbody>
    </table>

    {{-- 事業者用トップ画面に戻るボタン --}}
    <div class="mt-4">
        <a href="{{ route('business-top') }}" class="btn btn-primary">事業者用トップ画面に戻る</a>
    </div>
</div>
@endsection
