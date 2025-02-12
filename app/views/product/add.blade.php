@extends('layout.main')

@section('content')

<form action="{{ route('store-product') }}" method="post" enctype="multipart/form-data">
    <label for="name">Tên Cầu Thủ</label>
    <br>
    <input type="text" name="name" placeholder="tên">
    <br>
    <label for="avatar">Hình Ảnh</label>
    <br>
    <input type="text" name="avatar" placeholder="url ảnh">
    <br>
    <button type="submit" name="add">Thêm</button>
</form>


    
@endsection

