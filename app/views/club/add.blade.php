@extends('layout.main')

@section('content')
    <form action="{{ route('store-club') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="club_id">Mã câu lạc bộ</label>
            <input type="text" name="club_id" class="form-control" id="club_id" required>
        </div>
        <div class="form-group">
            <label for="club_name">Tên câu lạc bộ</label>
            <input type="text" name="club_name" class="form-control" id="club_name" required>
        </div>
        <button type="submit" name="add" class="btn btn-primary">Thêm</button>
    </form>
@endsection
