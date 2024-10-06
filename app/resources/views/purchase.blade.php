@extends('layouts.layout')

@section('content')
<form action="{{ route('users.store') }}" method="POST"> 
    @csrf 

    <div class="form-group">
        <label for="name">氏名</label> 
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"> 
    </div> 

    <div class="form-group"> 
        <label for="phone">電話番号</label> 
        <input type="text" class="form-control" id="tel" name="tel" value="{{ old('tel') }}"> 
    </div> 

    <div class="form-group">
        <label for="postal_code">郵便番号</label> 
        <input type="text" class="form-control" id="post" name="post" value="{{ old('post') }}"> 
    </div> 

    <div class="form-group"> 
        <label for="address">住所</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"> 
    </div> 

    <button type="submit" class="btn btn-primary">購入する</button> 
</form> 

@endsection
