<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <style>
    /* 為了模擬圖中的深色背景 */
    .top-bar {
        background-color: #222;
        padding: 10px 20px;
        color: white;
    }

    .search-input {
        background: transparent;
        border: 1px solid #666;
        color: white;
        border-radius: 5px;
        padding: 5px 15px;
        width: 300px;
    }

    .top-bar a {
        color: white;
        text-decoration: none;
        margin-left: 20px;
        font-size: 14px;
    }

    .cart-badge {
        background-color: #8b6e4b;
        /* 棕色圓圈 */
        color: white;
        border-radius: 50%;
        padding: 2px 6px;
        font-size: 12px;
    }

    .card {
        border: 0px;
        color: lightslategray;
    }
    </style>
</head>

<body>
    <div class="top-bar d-none d-lg-flex align-items-center">
        <div class="ms-auto d-flex align-items-center">
            <div class="position-relative">
                <input type="text" class="search-input" placeholder="搜尋商品" />
                <i class="fas fa-search position-absolute" style="right: 10px; top: 10px; color: #ccc"></i>
            </div>
            <a href="#"><i class="fas fa-envelope me-1"></i> 客服中心</a>
            <a href="#"><i class="fas fa-user me-1"></i> 登入/註冊頁</a>
            <a href="#">
                <i class="fas fa-shopping-cart me-1"></i> 購物車
                <span class="cart-badge">0</span>
            </a>
        </div>
    </div>

    <div class="text-center">
        <a href="{{ route('home') }}">
            <img src="{{ asset('image/logo.png') }}" alt="" />
        </a>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">首頁</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            展覽/活動商品專區
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">70週年紀念限定</a></li>
                            <li><a class="dropdown-item" href="#">文博會</a></li>
                            <li><a class="dropdown-item" href="#">甜點世界</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            女裝
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">短袖上衣</a></li>
                            <li><a class="dropdown-item" href="#">長袖上衣</a></li>
                            <li><a class="dropdown-item" href="#">長褲</a></li>
                            <li><a class="dropdown-item" href="#">短褲</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            男裝
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">短袖上衣</a></li>
                            <li><a class="dropdown-item" href="#">長袖上衣</a></li>
                            <li><a class="dropdown-item" href="#">長褲</a></li>
                            <li><a class="dropdown-item" href="#">短褲</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            童裝
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">短袖上衣</a></li>
                            <li><a class="dropdown-item" href="#">長袖上衣</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            配件
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">包款/皮夾</a></li>
                            <li><a class="dropdown-item" href="#">帽子/其他配件</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            週邊商品
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">手機殼</a></li>
                            <li><a class="dropdown-item" href="#">玩偶/抱枕</a></li>
                            <li><a class="dropdown-item" href="#">生活用品</a></li>
                            <li><a class="dropdown-item" href="#">居家用品</a></li>
                            <li><a class="dropdown-item" href="#">餐具</a></li>
                            <li><a class="dropdown-item" href="#">療癒小物</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">門市資訊</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid d-lg-none py-2 border-bottom shadow-sm bg-white">
        <div class="position-relative">
            <input type="text" class="form-control rounded-1" placeholder="搜尋商品" />
            <i class="fas fa-search position-absolute" style="right: 15px; top: 10px; color: #ccc"></i>
        </div>
    </div>

    <div class="carousel">
        @yield('carousel')
    </div>

    <div class="container" style="padding: 50px;">
        @yield('content') {{-- 這裡會填入各頁面的內容 --}}
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>