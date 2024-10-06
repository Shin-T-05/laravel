@extends('layouts.layout')

@section('content')
<div class="item-detail" style="margin: 0; padding: 0;">
    <!-- 商品名の表示 -->
    <label for='item_name_id' class='mt-2' style="margin-bottom: 0;">商品名</label>
    <textarea class='form-control' id='item_name_id' name='item_name' readonly style="margin: 5px 0 !important; padding: 5px !important; height: auto !important;">{{ $item->itemname }}</textarea>
    
    <!-- 商品金額の表示 -->
    <label for='amount_id' class='mt-2' style="margin-bottom: 0;">商品金額</label>
    <textarea class='form-control' id='amount_id' name='amount' readonly style="margin: 5px 0 !important; padding: 5px !important; height: auto !important;">{{ $item->amount }}</textarea>
    
    <!-- 商品説明文の表示 -->
    <label for='sentence_id' class='mt-2' style="margin-bottom: 0;">商品説明文</label>
    <textarea class='form-control' id='sentence_id' name='sentence' readonly style="margin: 5px 0 !important; padding: 5px !important; height: auto !important;">{{ $item->sentence }}</textarea>

    <!-- 商品画像の表示（画像がある場合のみ） -->
    @if($item->image)
        <img src="{{ asset('storage/' . $item->image) }}" alt="商品画像" style="width: 200px; height: auto; margin-top: 10px;">
    @endif
</div>

<!-- 「カートに入れる」ボタン -->
<div class="d-flex align-items-center justify-content-center" style="margin-top: 10px;">
<form action="{{ route('carts.store') }}" method="POST">
    @csrf
    <input type="hidden" name="item_id" value="{{ $item->id }}">
    <button type="submit" class="btn btn-primary">カートに追加</button>
</form>
</div>

<!-- 既存のレビューの表示 -->
<div class="reviews mt-4">
    <h3>レビュー</h3>

    @if($reviews->isEmpty())
        <p>まだレビューはありません。</p>
    @else
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>タイトル</th>
                    <th scope='col'>コメント</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reviews as $review)
                    <tr>
                        <td>{{ $review->title }}</td>
                        <td>{{ $review->comment }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection
