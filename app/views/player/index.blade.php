@extends('layout.main')

@section('content')
    <a class="btn btn-success" href="{{ route('add-player') }}">Thêm Cầu Thủ</a>
    <br>
    <br>
    <table border="1" class="table table-striped table-bordered table-hover">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Avatar</th>
            <th>Vị Trí</th>
            <th>Bàn Thắng</th>
            <th>Hành Động</th>
        </tr>
        @foreach($players as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item->name }}</td>
            <td><img src="{{ $item->avatar }}" alt="" style="width: 150px"></td>
            <td>{{ $item->position }}</td>
            <td>{{ $item->number_of_goal }}</td>
            <td>
                <a class="btn btn-warning" href="{{ route('detail-player/'. $item->id) }}">Sửa</a>
                <a class="btn btn-danger" href="{{ route('destroy/'. $item->id) }}" onclick="return confirm('bạn có chắc chắn muốn xóa?')" >Xoá</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection