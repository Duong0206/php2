@extends('layout.main')

@section('content')

<div class="container">
    <form action="{{ route('store-player') }}" method="POST" role="form">
        @csrf
        <legend>Thêm Cầu Thử</legend>

        <div class="form-group">
            <label for="">Tên Cầu Thủ</label>
            <input type="text" name="name" class="form-control" id="" placeholder="nhập tên cầu thủ">
        </div>

        <div class="form-group">
            <label for="">Hình Ảnh</label>
            <input type="text" name="avatar" class="form-control" id="" placeholder="url hình ảnh">
        </div>

        <div class="form-group">
            <label for="">Câu lạc bộ</label>
            <select name="club_id" class="form-control" id="club_id">
                @foreach ($clubs as $club)
                    <option value="{{ $club->club_id }}">{{ $club->club_name }}</option>
                @endforeach
            </select>
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
        
        <button type="submit" class="btn btn-primary" name="add">Submit</button>
    </form>
</div>

    
@endsection

