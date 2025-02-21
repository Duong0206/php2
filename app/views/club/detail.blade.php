@extends('layout.main')

@section('content')

<div class="container">
    <h2>Danh sách cầu thủ CLB: {{ $club->club_name }}</h2>
    <br>
    MÃ CLB: <strong> {{ $club->club_id }}</strong>
    <br>
    <br>
    @if(isset($players) && count($players) > 0)
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Avatar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($players as $player)
                <tr>
                    <td>{{ $player->id }}</td>
                    <td>{{ $player->name }}</td>
                    <td><img src="{{ $player->avatar }}" alt="" style="width: 150px"></td>
                    <td>
                        <a class="btn btn-warning" href="{{ route('detail-player/'. $player->id) }}">Sửa</a>
                        <a class="btn btn-danger" href="{{ route('destroy/'. $player->id) }}" onclick="return confirm('bạn có chắc chắn muốn xóa?')" >Xoá</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Không có cầu thủ nào thuộc câu lạc bộ này.</p>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            Thêm mới cầu thủ
        </div>
        <div class="card-body">
            <form action="{{ route('store-player') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Tên cầu thủ</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nhập tên cầu thủ" required>
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar (URL)</label>
                    <input type="text" name="avatar" id="avatar" class="form-control" placeholder="Nhập URL hình ảnh">
                </div>
                <div class="form-group">
                    <label for="">Vị Trí</label>
                    <select name="position" id="position" class="form-control">
                        <option value="Tiền đạo" {{ isset($player) && $player->position == 'Tiền đạo' ? 'selected' : '' }}>Tiền đạo</option>
                        <option value="Tiền vệ" {{ isset($player) && $player->position == 'Tiền vệ' ? 'selected' : '' }}>Tiền vệ</option>
                        <option value="Trung vệ" {{ isset($player) && $player->position == 'Trung vệ' ? 'selected' : '' }}>Trung vệ</option>
                        <option value="Hậu vệ" {{ isset($player) && $player->position == 'Hậu vệ' ? 'selected' : '' }}>Hậu vệ</option>
                        <option value="Thủ Môn" {{ isset($player) && $player->position == 'Thủ Môn' ? 'selected' : '' }}>Thủ Môn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Số bàn thắng</label>
                    <input type="number" name="number_of_goal" class="form-control" id="" value="{{ $player->number_of_goal }}">
                </div>
                <div class="form-group">
                    <label for="club">Club</label>
                    <input type="text" name="club_id" class="form-control" value="{{ $club->club_id }}" readonly>
                </div>
                <button type="submit" name="add" class="btn btn-success">Thêm cầu thủ</button>
            </form>
        </div>
    </div>

    <a href="{{ route('club') }}">Quay lại danh sách CLB</a>
</div>





@endsection