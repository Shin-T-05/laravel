@extends('layouts.layout')

@section('content')
<main class="py-4">
    <div class="col-md-5 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class='text-center'>ユーザー情報</h4>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $message)
                            <p>{{ $message }}</p>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route('users.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')  <!-- PUTメソッドを指定 -->

                    <!-- ユーザー名 -->
                    <label for='name'>ユーザー名</label>
                    <input type='text' class='form-control' name='name' id='name' value="{{ old('name', $user->name) }}"/>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- メールアドレス -->
                    <label for='email' class='mt-2'>メールアドレス</label>
                    <input type='email' class='form-control' name='email' id='email' value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- 電話番号 -->
                    <label for='tel' class='mt-2'>電話番号</label>
                    <input type='text' class='form-control' name='tel' id='tel' value="{{ old('tel', $user->tel) }}">
                    @error('tel')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- 郵便番号 -->
                    <label for='post' class='mt-2'>郵便番号</label>
                    <input type='text' class='form-control' name='post' id='post' value="{{ old('post', $user->post) }}">
                    @error('post')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- 住所 -->
                    <label for='address' class='mt-2'>住所</label>
                    <input type='text' class='form-control' name='address' id='address' value="{{ old('address', $user->address) }}">
                    @error('address')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- パスワード -->
                    <label for='password' class='mt-2'>パスワード</label>
                    <input type='password' class='form-control' name='password' id='password' value="{{ old('password') }}">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <!-- 更新ボタン -->
                    <div class='row justify-content-center'>
                        <button type='submit' class='btn btn-primary w-25 mt-3'>更新</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
