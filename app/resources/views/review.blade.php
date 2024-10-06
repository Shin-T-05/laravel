@extends('layouts.layout')

@section('content')
    <h2>レビュー投稿  {{ $item->name }}</h2> <!-- アイテム名を表示 -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('reviews.store') }}" method="post">
        @csrf

        <label for="title">タイトル</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />

        <label for="comment" class="mt-2">コメント</label>
        <textarea class="form-control" id="comment" name="comment">{{ old('comment') }}</textarea>

        <input type="hidden" name="item_id" value="{{ $item->id }}" /> {{-- item_id を隠しフィールドで渡す --}}

        <button type="submit" class="btn btn-primary mt-3">レビューを投稿</button>
    </form>

    <div class="containers mt-4">
        <a class="nav-link" href="{{ route('mypage') }}">{{ __('マイページに戻る') }}</a>
    </div>
@endsection
