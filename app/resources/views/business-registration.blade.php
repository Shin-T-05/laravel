@extends('layouts.layout')

@section('content')
<form action="{{ route('items.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="itemname">名前入力欄</label>
        <input type="text" class="form-control" name="itemname" id="itemname" value="{{ old('itemname') }}" required>
    </div>

    <div class="form-group">
        <label for="amount">金額欄</label>
        <input type="number" class="form-control" name="amount" id="amount" value="{{ old('amount') }}" required>
    </div>

    <div class="form-group">
        <label for="sentence">商品説明文</label>
        <input type="text" class="form-control" name="sentence" id="sentence" value="{{ old('sentence') }}" required>
    </div>

    <div class="form-group">
        <label for="image">画像ファイル</label>
        <input type="file" name="image" class="form-control" id="image" required>
    </div>

    <button type="submit" class="btn btn-primary mt-3">登録する</button>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
        @if(session('image'))
            <div class="mt-3">
                <img src="{{ asset('storage/' . session('image')) }}" alt="Uploaded Image" class="img-fluid">
            </div>
        @endif
    @endif

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>
@endsection
