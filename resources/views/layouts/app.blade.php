<!DOCTYPE html>
<html lang="zh-TW">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Snoopy 官方商店</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link
    href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@400;600&family=Noto+Sans+TC:wght@300;400;500&display=swap"
    rel="stylesheet">

  <style>
  :root {
    --cream: #fdf6ee;
    --warm-brown: #7a5c44;
    --dark-brown: #3e2c1e;
    --light-brown: #c9a882;
    --accent: #d4886a;
    --text-main: #3e2c1e;
    --text-soft: #8c7060;
    --border: #e8d8c8;
    --white: #fffdf9;
  }

  * {
    box-sizing: border-box;
  }

  body {
    font-family: 'Noto Sans TC', sans-serif;
    color: var(--text-main);
    background-color: var(--cream);
    margin: 0;
  }

  /* ══════════════════════════════════════
           STICKY HEADER  (4 layers)
        ══════════════════════════════════════ */
  #site-header {
    position: sticky;
    top: 0;
    z-index: 1000;
    width: 100%;
  }

  /* ── Layer 1 : Announcement ── */
  .announcement-bar {
    background-color: var(--dark-brown);
    color: #f0e4d4;
    font-size: 12px;
    text-align: center;
    padding: 8px 16px;
    letter-spacing: 0.5px;
    line-height: 1.6;
  }

  /* ── Layer 2 : Utility bar ── */
  .utility-bar {
    background-color: var(--warm-brown);
    padding: 7px 28px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 0;
  }

  .search-form {
    display: flex;
    align-items: center;
    border: 1px solid rgba(255, 255, 255, 0.35);
    border-radius: 3px;
    overflow: hidden;
    margin-right: 10px;
  }

  .search-form input {
    background: transparent;
    border: none;
    outline: none;
    color: #fff;
    font-size: 13px;
    padding: 5px 12px;
    width: 180px;
    font-family: 'Noto Sans TC', sans-serif;
  }

  .search-form input::placeholder {
    color: rgba(255, 255, 255, 0.55);
  }

  .search-form button {
    background: transparent;
    border: none;
    border-left: 1px solid rgba(255, 255, 255, 0.35);
    color: rgba(255, 255, 255, 0.8);
    padding: 5px 11px;
    cursor: pointer;
    transition: color 0.2s;
  }

  .search-form button:hover {
    color: #fff;
  }

  .utility-link {
    display: flex;
    align-items: center;
    gap: 5px;
    color: rgba(255, 255, 255, 0.85);
    text-decoration: none;
    font-size: 13px;
    padding: 5px 16px;
    border-left: 1px solid rgba(255, 255, 255, 0.2);
    transition: color 0.2s;
    white-space: nowrap;
    background: none;
    cursor: pointer;
    font-family: 'Noto Sans TC', sans-serif;
  }

  .utility-link:hover {
    color: #fff;
  }

  .utility-link i {
    font-size: 14px;
  }

  .admin-utility-link {
    color: #ffd4b8 !important;
  }

  .cart-count {
    background: var(--accent);
    color: #fff;
    border-radius: 50%;
    width: 18px;
    height: 18px;
    font-size: 11px;
    font-weight: 700;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }

  /* ── Layer 3 : Logo bar ── */
  .logo-bar {
    background-color: var(--white);
    border-bottom: 1px solid var(--border);
    text-align: center;
    padding: 16px 0 12px;
  }

  .logo-bar img {
    max-height: 72px;
    width: auto;
  }

  /* ── Layer 4 : Main navbar ── */
  .main-navbar {
    background-color: var(--white);
    border-bottom: 1px solid var(--border);
  }

  .main-navbar .navbar-nav {
    width: 100%;
    justify-content: center;
  }

  .main-navbar .nav-link {
    color: var(--text-main) !important;
    font-size: 13.5px;
    font-weight: 500;
    letter-spacing: 0.5px;
    padding: 13px 16px !important;
    transition: color 0.2s;
    white-space: nowrap;
  }

  .main-navbar .nav-link:hover,
  .main-navbar .nav-item.show>.nav-link {
    color: var(--accent) !important;
  }

  .main-navbar .dropdown-menu {
    background-color: var(--white);
    border: 1px solid var(--border);
    border-top: 2px solid var(--warm-brown);
    border-radius: 0 0 8px 8px;
    box-shadow: 0 8px 24px rgba(62, 44, 30, 0.12);
    padding: 8px 0;
    min-width: 150px;
  }

  .main-navbar .dropdown-item {
    font-size: 13px;
    color: var(--text-main);
    padding: 9px 20px;
    transition: background-color 0.15s;
  }

  .main-navbar .dropdown-item:hover {
    background-color: var(--cream);
    color: var(--accent);
  }

  .main-navbar .navbar-toggler {
    border-color: var(--border);
    margin-left: auto;
  }

  /* ── Mobile search ── */
  .mobile-search {
    background-color: var(--cream);
    border-bottom: 1px solid var(--border);
    padding: 8px 16px;
  }

  .mobile-search .form-control {
    border-color: var(--border);
    border-radius: 3px;
    font-size: 13px;
    background: var(--white);
  }

  /* ══════════════════════════════════════
           PAGE CONTENT
        ══════════════════════════════════════ */
  .carousel-item img {
    max-height: 520px;
    object-fit: cover;
    width: 100%;
  }

  .main-content {
    padding: 50px 0;
  }

  footer {
    background: var(--dark-brown);
    color: var(--light-brown);
    text-align: center;
    font-size: 12px;
    letter-spacing: 1px;
    padding: 28px 16px;
    margin-top: 60px;
  }
  </style>
</head>

<body>

  <!-- ════ STICKY HEADER ════ -->
  <div id="site-header">

    <!-- 1. Announcement -->
    <div class="announcement-bar">
      嚴防詐騙｜本公司不會透過任何名義要求核對購物資訊、銀行帳戶或信用卡等個人資訊，如接到請立即掛斷或撥打165防詐騙專線
    </div>

    <!-- 2. Utility bar -->
    <div class="utility-bar">
      <form class="search-form" action="#" method="GET">
        <input type="text" name="q" placeholder="搜尋商品" />
        <button type="submit"><i class="fas fa-search"></i></button>
      </form>

      @auth
      @if(auth()->user()->role === 'admin')
      <a href="{{ route('admin.index') }}" class="utility-link admin-utility-link">
        <i class="fas fa-cog"></i> 管理後台
      </a>
      @endif
      <span class="utility-link" style="cursor:default; border-left:1px solid rgba(255,255,255,0.2);">
        <i class="fas fa-user"></i> {{ auth()->user()->name }}
      </span>
      <form action="{{ route('logout') }}" method="POST" style="display:flex; margin:0;">
        @csrf
        <button type="submit" class="utility-link">
          <i class="fas fa-sign-out-alt"></i> 登出
        </button>
      </form>
      @else
      <a href="{{ route('login') }}" class="utility-link">
        <i class="fas fa-user"></i> 登入／註冊頁
      </a>
      @endauth

      <a href="{{ route('cart.index') }}" class="utility-link" style="text-decoration:none;">
        <i class="fas fa-shopping-bag"></i> 購物車
        <span class="cart-count">0</span>
      </a>
    </div>

    <!-- 3. Logo -->
    <div class="logo-bar">
      <a href="{{ route('home') }}">
        <img src="{{ asset('image/logo.png') }}" alt="Snoopy Store" />
      </a>
    </div>

    <!-- 4. Main navbar -->
    <nav class="main-navbar navbar navbar-expand-lg">
      <div class="container-fluid px-2">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav"
          aria-controls="mainNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">首頁</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                展覽／活動商品專區
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">70週年紀念限定</a></li>
                <li><a class="dropdown-item" href="#">文博會</a></li>
                <li><a class="dropdown-item" href="#">甜點世界</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">親子裝</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">親子套裝</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">女裝</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">短袖上衣</a></li>
                <li><a class="dropdown-item" href="#">長袖上衣</a></li>
                <li><a class="dropdown-item" href="#">長褲</a></li>
                <li><a class="dropdown-item" href="#">短褲</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">男裝</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">短袖上衣</a></li>
                <li><a class="dropdown-item" href="#">長袖上衣</a></li>
                <li><a class="dropdown-item" href="#">長褲</a></li>
                <li><a class="dropdown-item" href="#">短褲</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">童裝</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">短袖上衣</a></li>
                <li><a class="dropdown-item" href="#">長袖上衣</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">配件</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">包款／皮夾</a></li>
                <li><a class="dropdown-item" href="#">帽子／其他配件</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">週邊商品</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">手機殼</a></li>
                <li><a class="dropdown-item" href="#">玩偶／抱枕</a></li>
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

    <!-- Mobile search -->
    <div class="mobile-search d-lg-none">
      <div class="position-relative">
        <input type="text" class="form-control pe-5" placeholder="搜尋商品" />
        <i class="fas fa-search position-absolute"
          style="right:14px;top:50%;transform:translateY(-50%);color:var(--text-soft);pointer-events:none;"></i>
      </div>
    </div>

  </div>
  <!-- ════ END STICKY HEADER ════ -->


  <!-- Carousel -->
  <div>
    @yield('carousel')
  </div>

  <!-- Main content -->
  <div class="container main-content">
    @yield('content')
  </div>

  <footer>
    © 2026 Snoopy Official Store · All rights reserved
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>