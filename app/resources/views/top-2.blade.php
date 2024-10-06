@extends('layouts.layout')

@section('content')
<div class="all">
    <div class="container">
        <form action="{{ route('users.index') }}" method="GET">
            @csrf
            <!-- 金額フィルタ -->
            <div class="d-flex align-items-center justify-content-center">
                <label for="price_min">{{ __('金額') }}</label>
                <div class="kagen">
                    <input type="number" name="price_min" id="price_min" placeholder="最低金額">
                </div>
                〜
                <div class="jogen">
                    <input type="number" name="price_max" id="price_max" placeholder="最高金額">
                </div>
            </div>
            <!-- 商品名フィルタ -->
            <div class="d-flex align-items-center justify-content-center">
                <label for="product_name">{{ __('商品名') }}</label>
                <div class="textbox">
                    <input type='text' class='form-control' name='product_name' id="product_name">
                </div>
            </div>
            <!-- 商品情報フィルタ -->
            <div class="d-flex align-items-center justify-content-center">
                <label for="product_info">{{ __('商品情報') }}</label>
                <div class="textbox">
                    <input type='text' class='form-control' name='product_info' id="product_info">
                </div>
            </div>
            <!-- 検索ボタン -->
            <div class="d-flex align-items-center justify-content-center">
                <input type="submit" value="🔍">
            </div>
        </form>
    </div>

    <div class="d-flex align-items-center justify-content-center">
        <div class="item-list">
            @if(isset($items) && $items->isEmpty())
                <p>該当する商品が見つかりませんでした。</p>
            @else
                @foreach($items as $item)
                    <div class="item">
                        <p>{{ $item->itemname }}</p>
                        <p>{{ $item->amount }}</p>
                        <p>{{ $item->sentence }}</p>
                        @if($item->image)
                        <img src="{{ asset('storage/' . $item['image']) }}" alt="商品画像" style="width: 100px; height: auto;">
                        @endif
                        <div>
                            <a href="{{ route('items.show', $item->id) }}" class="btn btn-primary">詳細へ</a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

