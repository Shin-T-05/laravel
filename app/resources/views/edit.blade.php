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
                    
                    <label for='name'>ユーザー名</label>
                    <input type='text' class='form-control' name='name' id='name' value="{{ old('name', $user->name) }}"/>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for='email' class='mt-2'>メールアドレス</label>
                    <input type='email' class='form-control' name='email' id='email' value="{{ old('email', $user->email) }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <label for='password' class='mt-2'>パスワード</label>
                    <input type='password' class='form-control' name='password' id='password' value="{{ old('password') }}">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    <div class='row justify-content-center'>
                        <button type='submit' class='btn btn-primary w-25 mt-3'>更新</button>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
