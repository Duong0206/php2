<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('layout.style')
</head>
<body>
    <div class="container">

        <header>
            <div class="header-main">
                <ul class="menu">
                    <li><a href="">Quản Lý Danh Mục</a></li>
                    <li><a href="">Quản Lý Sản Phẩm</a></li>

                </ul>
            </div>
        </header>

        <section class="content">
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