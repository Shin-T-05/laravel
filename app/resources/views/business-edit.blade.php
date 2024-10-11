@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">商品情報の編集</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">登録した商品一覧</div>
                <div class="card-body">
                    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- PUTメソッドを指定して編集 -->

                        <!-- 商品名 -->
                        <div class="form-group">
                            <label for="itemname">商品名</label>
                            <input type="text" class="form-control" name="itemname" id="itemname" value="{{ old('itemname', $item->itemname) }}">
                            @error('itemname')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- 値段 -->
                        <div class="form-group">
                            <label for="amount">値段</label>
                            <input type="text" class="form-control" name="amount" id="amount" value="{{ old('amount', $item->amount) }}">
                            @error('amount')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- 説明文 -->
                        <div class="form-group">
                            <label for="sentence">説明文</label>
                            <textarea class="form-control" name="sentence" id="sentence">{{ old('sentence', $item->sentence) }}</textarea>
                            @error('sentence')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- 画像 -->
                        <div class="form-group">
                            <label for="image">商品画像</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="商品画像" style="width: 100px; height: auto;" class="mt-2">
                            @endif
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- 更新ボタン -->
                        <div class="form-group text-center mt-4">
                            <button type="submit" class="btn btn-primary">商品情報を更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
