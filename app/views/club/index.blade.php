
@extends('layout.main')

@section('content')
    <h1>Danh sách câu lạc bộ</h1>
    <a href="{{ route('add-club') }}" class="btn btn-success">Thêm mới CLB</a>
    <br>
    <br>
    <table border="1" class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>Mã CLB</th>
            <th>Tên câu lạc bộ</th>
            <th>Hành động</th>
        </tr>
        @foreach ($clubs as $club)
        <tr>
            <td>{{ $club->id }}</td>
            <td>{{ $club->club_id }}</td>
            <td><a href="{{ route('detail-club/'. $club->id) }}">{{ $club->club_name }}</a></td>
            <td>
                <a href="{{ route('edit-club/'. $club->id) }}" class="btn btn-warning">Sửa</a>
                <a href="{{ route('destroy-club/'. $club->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</a>
            </td>
        </tr>
        @endforeach
    </table>

    <h2>Cầu thủ tự do</h3>

    <table border="1" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Avatar</th>
                    <th>Vị Trí</th>
                    <th>Bàn Thắng</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nullPlayers as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        @if(!empty($item->avatar))
                            <img src="{{ $item->avatar }}" alt="{{ $item->name }}" style="width: 150px">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $item->position }}</td>
                    <td>{{ $item->number_of_goal }}</td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('detail-player/'. $item->id) }}">Sửa</a>
                        <a class="btn btn-danger" href="{{ route('destroy/'. $item->id) }}" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


@endsection