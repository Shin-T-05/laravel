@extends('layouts.layout')

@section('content')
<div class="d-flex align-items-center justify-content-center">
    <a class="nav-link" href="{{ route('carts.store') }}">
        <i class="fas fa-shopping-cart"></i> {{ __('カート画面') }}
    </a>
    <a class="nav-link" href="{{ route('mypage') }}">
        <i class="fas fa-user"></i> {{ __('マイページ') }}
    </a>
</div>
<div class="all">
    <div class="container">
        <form action="{{ route('items.index') }}" method="GET">
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
                <p>商品情報を入力してください。</p>
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
                            <a href="{{ route('reviews.show', $item->id) }}" class="btn btn-primary">詳細へ</a>
                        </div>
                        <p class="favorite-marke">
                            @if(Auth::check() && $good_model->good_exist(Auth::user()->id, $item->id))
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
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(function () {
        var like = $('.js-like-toggle'); // いいねボタンを選択
        var likeItemId; // いいねを付けるアイテムのIDを保存する変数

        like.on('click', function (e) { // いいねボタンがクリックされたときのイベントリスナー
            e.preventDefault(); // デフォルトのリンク動作を防ぐ
            var $this = $(this); // クリックされた要素をjQueryオブジェクトとして保存
            likeItemId = $this.data('itemid'); // data属性からアイテムIDを取得

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRFトークンをヘッダーに追加
                },
                url: '/ajaxlike',  // AJAXリクエストを送信するURL
                type: 'POST', // リクエストのタイプ（POST）
                data: {
                    'item_id': likeItemId // コントローラーに渡すパラメーター
                },
            })
            .done(function (data) { // AJAXリクエストが成功した場合の処理
                $this.toggleClass('loved'); // lovedクラスを追加または削除
                $this.next('.goodsCount').html(data.itemGoodsCount); // いいね数を更新
            })
            .fail(function (data, xhr, err) { // AJAXリクエストが失敗した場合の処理
                console.log('エラー'); // エラーメッセージを表示
                console.log(err); // エラー内容を表示
                console.log(xhr); // XMLHttpRequestオブジェクトを表示
            });
            return false; // デフォルトのフォーム送信を防ぐ
        });
    });
</script>
