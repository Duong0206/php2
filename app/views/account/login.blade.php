@extends('layout.main')

@section('content')
    <div class="container">

        
        <form action="{{ route('login') }}" method="POST" role="form">
            <legend>Đăng Nhập</legend>

            <div class="form-group">
                <label for="">Tên đăng nhập</label>
                <input type="text" class="form-control" id="" name="username">
            </div>

            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" id="" name="password">
            </div>

            <button type="submit" name="login" class="btn btn-primary">Đăng Nhập</button>
            <br>
            <br>
            Chưa có tài khoản? Vui lòng
            <a class="" href="{{ route('register') }}">Đăng Ký</a>
        </form>
        




    </div>
@endsection