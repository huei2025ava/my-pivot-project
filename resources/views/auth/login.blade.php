<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>登入 · Snoopy Official Store</title>

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
            radial-gradient(ellipse at 20% 50%, rgba(212, 136, 106, 0.08) 0%, transparent 60%),
            radial-gradient(ellipse at 80% 20%, rgba(122, 92, 68, 0.07) 0%, transparent 50%);
    }

    .login-wrapper {
        width: 100%;
        max-width: 920px;
        margin: 40px 20px;
    }

    .login-card {
        background: var(--white);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(62, 44, 30, 0.14);
        display: flex;
        min-height: 560px;
    }

    /* ── Left panel ── */
    .login-left {
        flex: 1;
        background-color: var(--dark-brown);
        background-image: url("{{ asset('image/olaf.png') }}");
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 40px;
    }

    .login-left::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(30, 18, 8, 0.6) 0%, transparent 60%);
    }

    .login-left-text {
        position: relative;
        z-index: 1;
    }

    .login-left-text .brand {
        font-family: 'Noto Serif TC', serif;
        font-size: 22px;
        color: #f0e4d4;
        letter-spacing: 3px;
        margin-bottom: 8px;
    }

    .login-left-text .tagline {
        font-size: 12px;
        color: var(--light-brown);
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    /* ── Right panel ── */
    .login-right {
        flex: 1;
        padding: 56px 48px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

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
        margin-bottom: 20px;
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

    .remember-row {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 28px;
    }

    .remember-row input[type="checkbox"] {
        width: 16px;
        height: 16px;
        accent-color: var(--warm-brown);
        cursor: pointer;
    }

    .remember-row label {
        font-size: 13px;
        color: var(--text-soft);
        cursor: pointer;
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

    .btn-login {
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

    .btn-login:hover {
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
        margin-top: 24px;
        display: flex;
        justify-content: space-between;
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
        .login-left {
            display: none;
        }

        .login-right {
            padding: 40px 28px;
        }
    }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="login-card">

            <!-- Left: image panel -->
            <div class="login-left">
                <div class="login-left-text">
                    <p class="brand">Snoopy Store</p>
                    <p class="tagline">Official Licensed Products</p>
                </div>
            </div>

            <!-- Right: form -->
            <div class="login-right">
                <p class="form-eyebrow">Welcome back</p>
                <h1 class="form-heading">歡迎回來 🐾</h1>

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    @if ($errors->any())
                    <div class="error-box">{{ $errors->first() }}</div>
                    @endif

                    <div>
                        <label class="field-label">電子郵件</label>
                        <div class="field-wrap">
                            <i class="fas fa-envelope"></i>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-input"
                                placeholder="your@email.com">
                        </div>
                    </div>

                    <div>
                        <label class="field-label">密碼</label>
                        <div class="field-wrap">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" required class="form-input" placeholder="••••••••">
                        </div>
                    </div>

                    <div class="remember-row">
                        <input type="checkbox" id="customCheck">
                        <label for="customCheck">記住我</label>
                    </div>

                    <button type="submit" class="btn-login">登入</button>
                </form>

                <div class="divider"><span>或</span></div>

                <a href="index.html" class="btn-social">
                    <i class="fab fa-google" style="color:#DB4437;"></i> 使用 Google 登入
                </a>
                <a href="index.html" class="btn-social">
                    <i class="fab fa-facebook-f" style="color:#1877F2;"></i> 使用 Facebook 登入
                </a>

                <div class="form-links">
                    <a href="forgot-password.html">忘記密碼？</a>
                    <a href="{{ route('register') }}">還沒有帳號？立即註冊</a>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('home') }}" class="back-home-link">
                        <i class="fas fa-arrow-left"></i> 回到商店首頁
                    </a>
                </div>
            </div>

        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>