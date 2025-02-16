@extends('layout.main')

@section('content')

@if(isset($_SESSION['errors']) && isset($_GET['msg']))
<ul>
    @foreach($_SESSION['errors'] as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

@if(isset($_SESSION['success']) && isset($_GET['msg']))
    <span >{{ $_SESSION['success'] }}</span>
@endif
    <a href="{{ route('add-product') }}">Thêm</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Avatar</th>
            <th>Action</th>
        </tr>
        @foreach($products as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td><img src="{{ $item->avatar }}" alt="" style="width: 150px"></td>
            <td>
                <a href="{{ route('detail-product/'. $item->id) }}">Sửa</a>
                <a href="{{ route('destroy/'. $item->id) }}">Xoá</a>
            </td>

        </tr>
        @endforeach
    </table>
@endsection