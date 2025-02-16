@extends('layout.main')

@section('content')

<form action="{{ route('update-product/'.$product->id) }}" method="post" enctype="multipart/form-data">
    <label for="name">Tên Cầu Thủ</label>
    <br>
    <input type="text" name="name" placeholder="tên" value="{{ $product->name }}">
    <br>
    <label for="avatar">Hình Ảnh</label>
    <br>
    <input type="text" name="avatar" placeholder="url ảnh" value="{{ $product->avatar }}">
    <br>
    <button type="submit" name="update">Sửa</button>
</form>


    
@endsection

