<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @include('layout.style')
</head>
<body>
    <div class="container">

        <header>
            <div class="header-main d-flex justify-content-between align-items-center">
                <!-- thêm logo ở Đây -->
                <div class="logo">
                    <a href="{{ route('/') }}">NewsSport</a>
                </div>

                <ul class="menu">
                    @if(isset($_SESSION['auth']))
                        <li><a href="{{ route('club') }}">Quản Lý Danh Mục</a></li>
                        <li><a href="{{ route('list-player') }}">Quản Lý Sản Phẩm</a></li>
                    @endif
                </ul>
                <ul class="menu">
                    @if(isset($_SESSION['auth']))
                        <li><a href="{{ route('logout') }}">Đăng xuất ({{ $_SESSION['auth']['name'] }})</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                        <li><a href="{{ route('register') }}">Đăng ký</a></li>
                    @endif
                </ul>
            </div>
        </header>

        <section class="content">
            @if(isset($_SESSION['errors']))
            <br>
                <div class="alert alert-danger">
                    @php
                        $errors = $_SESSION['errors'];
                        if(!is_array($errors)){
                            $errors = [$errors];
                        }
                    @endphp

                    @foreach($errors as $error)
                        <p>{{ $error }}</p>
                    @endforeach

                    @php unset($_SESSION['errors']); @endphp
                </div>
            @endif

            @if(isset($_SESSION['success']) && isset($_GET['msg']))
                <div class="alert alert-success">
                    <span>{{ $_SESSION['success'] }}</span>
                </div>
            <br>
            @endif
            
            @yield('content')
        </section>

        <footer>
            <span>
                FPT Polytechnic
            </span>
        </footer>
    </div>
</body>
</html>