@extends('layouts.layout')
@section('content')
<div class = "welcome"></div>
<div class = "container">
    <div class = "d-flex align-items-center justify-content-center">
    <a class="nav-link" href="">{{ __('カート画面') }}</a>
    <a class="nav-link" href="{{ route('mypage') }}">{{ __('マイページ') }}</a>
    </div>
<form action="" method="POST">
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
            <div class="item">
                <p></p>
                <p></p>
                <div>
                    <a href="" class="btn btn-primary">詳細へ</a>
                </div>
            </div>
    </div>
</div>

@endsection