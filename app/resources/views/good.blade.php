@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>{{ __('いいねした商品一覧') }}</h1>

    <div class="item-list">
        @if($likedItems->isEmpty())
            <p>{{ __('いいねした商品はありません。') }}</p>
        @else
            @foreach($likedItems as $item)
                <div class="item">
                    <p>{{ $item->itemname }}</p>
                    <p>{{ $item->amount }}</p>
                    <p>{{ $item->sentence }}</p>
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="商品画像" style="width: 100px; height: auto;">
                    @endif
                    <div>
                        <a href="{{ route('items.show', $item->id) }}" class="btn btn-primary">{{ __('詳細へ') }}</a>
                    </div>
                    <p class="favorite-marke">
                        @if($good_model->good_exist(Auth::user()->id, $item->id))
                            <a class="js-like-toggle loved" href="" data-itemid="{{ $item->id }}">
                                <i class="fas fa-heart"></i>
                            </a>
                        @else
                            <a class="js-like-toggle" href="" data-itemid="{{ $item->id }}">
                                <i class="fas fa-heart"></i>
                            </a>
                        @endif
                        <span class="goodsCount">{{ $item->goods_count }}</span>
                    </p>
                </div>
            @endforeach
        @endif
    </div>

    <div class="d-flex align-items-center justify-content-center">
        <a class="nav-link" href="{{ route('mypage') }}">{{ __('マイページ') }}</a>
    </div>
</div>
@endsection
