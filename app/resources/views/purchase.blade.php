@extends('layouts.layout')

@section('content')
<form action="{{ route('users.store') }}" method="POST"> 
    @csrf 

    <div class="form-group">
        <label for="name">氏名</label> 
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"> 
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div> 

    <div class="form-group"> 
        <label for="tel">電話番号</label> 
        <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel') }}"> 
        @error('tel')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div> 

    <div class="form-group">
        <label for="post">郵便番号</label> 
        <input type="text" class="form-control" id="post" name="post" value="{{ old('post') }}"> 
        @error('post')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div> 

    <div class="form-group"> 
        <label for="address">住所</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"> 
        @error('address')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div> 

    <button type="submit" class="btn btn-primary">購入する</button> 
</form> 

@endsection
