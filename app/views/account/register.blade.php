@extends('layout.main')

@section('content')
    <div class="container"> 
        <form action="{{ route('register') }}" method="POST" role="form">
            <legend>Đăng Ký</legend>
        
            <div class="form-group">
                <label for="">Họ tên</label>
                <input type="text" class="form-control" id="" name="name" value="{{ $_SESSION['old']['name']}}">
            </div>

            <div class="form-group">
                <label for="">Tên đăng nhập</label>
                <input type="text" class="form-control" id="" name="username" value="{{ $_SESSION['old']['username'] }}">
            </div>

            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="password" class="form-control" id="" name="password">
            </div>

            <div class="form-group">
                <label for="">Nhập Lại Mật Khẩu</label>
                <input type="password" class="form-control" id="" name="re_password">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="" name="email" value="{{ $_SESSION['old']['email'] }}">
            </div>

            <button type="submit" name="register" class="btn btn-primary">Đăng Ký</button>
        </form>
    </div>

@endsection