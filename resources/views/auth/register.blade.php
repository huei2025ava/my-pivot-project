<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>註冊 · Snoopy Official Store</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@400;600&family=Lato:wght@300;400;700&display=swap"
        rel="stylesheet">

    <style>
    :root {
        --cream: #fdf6ee;
        --warm-brown: #7a5c44;
        --dark-brown: #3e2c1e;
        --light-brown: #c9a882;
        --accent: #d4886a;
        --text-soft: #8c7060;
        --border: #e8d8c8;
        --white: #fffdf9;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        min-height: 100vh;
        background-color: var(--cream);
        font-family: 'Lato', 'Noto Serif TC', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        background-image:
            radial-gradient(ellipse at 80% 50%, rgba(212, 136, 106, 0.08) 0%, transparent 60%),
            radial-gradient(ellipse at 20% 20%, rgba(122, 92, 68, 0.07) 0%, transparent 50%);
    }

    .register-wrapper {
        width: 100%;
        max-width: 920px;
        margin: 40px 20px;
    }

    .register-card {
        background: var(--white);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(62, 44, 30, 0.14);
        display: flex;
        min-height: 600px;
    }

    /* ── Left form panel ── */
    .register-left {
        flex: 1.2;
        padding: 52px 48px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* ── Right decorative panel ── */
    .register-right {
        flex: 0.8;
        background-color: var(--dark-brown);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 48px 36px;
        text-align: center;
    }

    .register-right .deco-circle {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.06);
        border: 1px solid rgba(201, 168, 130, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 64px;
        margin-bottom: 32px;
    }

    .register-right .panel-title {
        font-family: 'Noto Serif TC', serif;
        font-size: 20px;
        color: #f0e4d4;
        letter-spacing: 2px;
        margin-bottom: 12px;
    }

    .register-right .panel-sub {
        font-size: 12px;
        color: var(--light-brown);
        letter-spacing: 1.5px;
        line-height: 1.8;
    }

    .register-right .panel-link {
        display: inline-block;
        margin-top: 32px;
        border: 1px solid rgba(201, 168, 130, 0.5);
        color: var(--light-brown);
        border-radius: 24px;
        font-size: 12px;
        letter-spacing: 1px;
        padding: 10px 28px;
        text-decoration: none;
        transition: all 0.2s;
    }

    .register-right .panel-link:hover {
        background: rgba(201, 168, 130, 0.15);
        color: #f0e4d4;
    }

    /* ── Form styles ── */
    .form-eyebrow {
        font-size: 11px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--accent);
        margin-bottom: 10px;
    }

    .form-heading {
        font-family: 'Noto Serif TC', serif;
        font-size: 26px;
        font-weight: 600;
        color: var(--dark-brown);
        margin-bottom: 32px;
    }

    .field-label {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: var(--text-soft);
        display: block;
        margin-bottom: 8px;
    }

    .field-wrap {
        position: relative;
        margin-bottom: 18px;
    }

    .field-wrap i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--light-brown);
        font-size: 14px;
    }

    .form-input {
        width: 100%;
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 13px 16px 13px 42px;
        font-size: 14px;
        background: var(--cream);
        color: var(--dark-brown);
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-input:focus {
        border-color: var(--warm-brown);
        box-shadow: 0 0 0 3px rgba(122, 92, 68, 0.1);
    }

    .password-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-bottom: 0;
    }

    .password-row .field-wrap {
        margin-bottom: 18px;
    }

    .error-box {
        background: #fdf0ee;
        border: 1px solid #f0bfb4;
        border-radius: 10px;
        color: #9b3322;
        font-size: 13px;
        padding: 10px 14px;
        margin-bottom: 20px;
    }

    .error-box ul {
        margin: 0;
        padding-left: 16px;
    }

    .error-box li {
        margin-bottom: 2px;
    }

    .btn-register {
        width: 100%;
        background-color: var(--dark-brown);
        color: #fff;
        border: none;
        border-radius: 30px;
        font-size: 14px;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 14px;
        cursor: pointer;
        transition: background-color 0.2s, transform 0.15s;
        margin-bottom: 20px;
    }

    .btn-register:hover {
        background-color: var(--accent);
        transform: translateY(-1px);
    }

    .divider {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 16px;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--border);
    }

    .divider span {
        font-size: 11px;
        color: var(--text-soft);
        letter-spacing: 1px;
        text-transform: uppercase;
    }

    .btn-social {
        width: 100%;
        border-radius: 30px;
        font-size: 13px;
        padding: 11px;
        border: 1px solid var(--border);
        background: #fff;
        color: var(--text-soft);
        cursor: pointer;
        transition: background-color 0.2s, border-color 0.2s;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
    }

    .btn-social:hover {
        background: var(--cream);
        border-color: var(--warm-brown);
        color: var(--dark-brown);
    }

    .form-links {
        margin-top: 16px;
        text-align: center;
    }

    .form-links a {
        font-size: 12px;
        color: var(--text-soft);
        text-decoration: none;
        letter-spacing: 0.5px;
        transition: color 0.2s;
    }

    .form-links a:hover {
        color: var(--accent);
    }

    .back-home-link {
        font-size: 12px;
        color: var(--text-soft);
        text-decoration: none;
        letter-spacing: 0.5px;
        transition: color 0.2s;
        opacity: 0.7;
    }

    .back-home-link:hover {
        color: var(--warm-brown);
        opacity: 1;
    }

    .back-home-link i {
        font-size: 10px;
        margin-right: 2px;
    }

    @media (max-width: 700px) {
        .register-right {
            display: none;
        }

        .register-left {
            padding: 40px 28px;
        }
    }

    @media (max-width: 480px) {
        .password-row {
            grid-template-columns: 1fr;
        }
    }
    </style>
</head>

<body>
    <div class="register-wrapper">
        <div class="register-card">

            <!-- Left: form -->
            <div class="register-left">
                <p class="form-eyebrow">Create account</p>
                <h1 class="form-heading">免費加入會員 🐾</h1>

                @if($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <label class="field-label">姓名</label>
                    <div class="field-wrap">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" class="form-input" placeholder="請輸入姓名" value="{{ old('name') }}">
                    </div>

                    <label class="field-label">電子郵件</label>
                    <div class="field-wrap">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" class="form-input" placeholder="your@email.com"
                            value="{{ old('email') }}">
                    </div>

                    <label class="field-label">密碼</label>
                    <div class="password-row">
                        <div class="field-wrap">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" class="form-input" placeholder="密碼最少 8 碼"
                                minlength="8" required>
                        </div>
                        <div class="field-wrap">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password_confirmation" class="form-input" placeholder="再次輸入密碼">
                        </div>
                    </div>

                    <button type="submit" class="btn-register">立即註冊</button>
                </form>

                <div class="divider"><span>或</span></div>

                <a href="index.html" class="btn-social">
                    <i class="fab fa-google" style="color:#DB4437;"></i> 使用 Google 註冊
                </a>
                <a href="index.html" class="btn-social">
                    <i class="fab fa-facebook-f" style="color:#1877F2;"></i> 使用 Facebook 註冊
                </a>

                <div class="form-links">
                    <a href="{{ route('login') }}">已經有帳號了？立即登入</a>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('home') }}" class="back-home-link">
                        <i class="fas fa-arrow-left"></i> 回到商店首頁
                    </a>
                </div>
            </div>

            <!-- Right: decorative -->
            <div class="register-right d-none d-lg-flex">
                <div class="deco-circle">🐾</div>
                <p class="panel-title">Snoopy Official Store</p>
                <p class="panel-sub">
                    正版授權 · 台灣現貨<br>
                    會員專屬優惠 · 免費配送
                </p>
                <a href="{{ route('login') }}" class="panel-link">已有帳號？登入</a>
            </div>

        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>