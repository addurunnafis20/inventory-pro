<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Inventory Pro</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            background: #080f20;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
            color: #172033;
        }

        .login-wrapper {
            width: 100%;
            max-width: 1050px;
            min-height: 620px;
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            background: #ffffff;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 30px 100px rgba(0,0,0,.35);
        }

        .login-left {
            position: relative;
            padding: 55px;
            background:
                radial-gradient(circle at 80% 15%, rgba(35,190,190,.25), transparent 35%),
                linear-gradient(145deg, #10254b, #071226);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            font-weight: 800;
            font-size: 20px;
        }

        .brand-icon {
            width: 45px;
            height: 45px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            background: #16b8b0;
            color: #06202e;
            font-size: 22px;
        }

        .hero {
            position: relative;
            z-index: 2;
        }

        .hero-label {
            color: #42d5cb;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 3px;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 39px;
            line-height: 1.3;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero p {
            color: #aebdd2;
            font-size: 14px;
            line-height: 1.9;
            max-width: 360px;
        }

        .hero-decoration {
            position: absolute;
            width: 300px;
            height: 300px;
            border: 1px solid rgba(255,255,255,.09);
            border-radius: 50%;
            right: -120px;
            bottom: -100px;
            box-shadow: 0 0 0 35px rgba(255,255,255,.025),
                        0 0 0 75px rgba(255,255,255,.02);
        }

        .left-footer {
            position: relative;
            z-index: 2;
            font-size: 11px;
            color: #8295b2;
        }

        .login-right {
            padding: 65px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .welcome {
            margin-bottom: 35px;
        }

        .welcome span {
            color: #12a9a5;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .welcome h2 {
            font-size: 29px;
            margin-top: 12px;
            color: #12213a;
            font-weight: 800;
        }

        .welcome p {
            color: #8993a4;
            font-size: 13px;
            margin-top: 10px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #344054;
        }

        .input-box {
            position: relative;
        }

        .input-box input {
            width: 100%;
            height: 54px;
            border: 1px solid #e2e8f0;
            background: #f8fafc;
            border-radius: 12px;
            padding: 0 17px;
            font-family: inherit;
            font-size: 13px;
            outline: none;
            transition: .25s;
        }

        .input-box input:focus {
            border-color: #16b8b0;
            background: white;
            box-shadow: 0 0 0 4px rgba(22,184,176,.10);
        }

        .login-button {
            width: 100%;
            height: 55px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(110deg, #087f91, #16b8b0);
            color: white;
            font-family: inherit;
            font-weight: 800;
            font-size: 14px;
            cursor: pointer;
            transition: .25s;
            box-shadow: 0 8px 20px rgba(22,184,176,.22);
        }

        .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(22,184,176,.30);
        }

        .login-note {
            margin-top: 28px;
            padding: 15px;
            background: #f0faf9;
            border-radius: 11px;
            color: #63817f;
            font-size: 11px;
            line-height: 1.7;
        }

        .error-message {
            background: #fff0f0;
            color: #c03939;
            padding: 12px;
            border-radius: 10px;
            font-size: 12px;
            margin-bottom: 20px;
        }

        @media(max-width: 750px) {
            .login-wrapper {
                grid-template-columns: 1fr;
                max-width: 450px;
            }

            .login-left {
                min-height: 230px;
                padding: 30px;
            }

            .hero {
                margin-top: 45px;
            }

            .hero h1 {
                font-size: 26px;
            }

            .left-footer {
                display: none;
            }

            .login-right {
                padding: 40px 30px;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <div class="login-left">

        <div class="brand">
            <div class="brand-icon">▦</div>
            <span>INVENTORY<span style="color:#42d5cb">.</span></span>
        </div>

        <div class="hero">
            <div class="hero-label">SMART INVENTORY SYSTEM</div>

            <h1>
                Kelola Inventaris.
                Lebih Mudah,
                Lebih Teratur.
            </h1>

            <p>
                Sistem manajemen inventaris modern untuk
                mengelola barang, memantau stok, dan
                menghasilkan laporan secara efisien.
            </p>
        </div>

        <div class="left-footer">
            © {{ date('Y') }} Inventory Management System.
            All rights reserved.
        </div>

        <div class="hero-decoration"></div>

    </div>


    <div class="login-right">

        <div class="welcome">
            <span>WELCOME BACK</span>

            <h2>Selamat Datang!</h2>

            <p>Silakan masuk untuk mengakses dashboard inventaris.</p>
        </div>

        @if ($errors->any())
            <div class="error-message">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/login" method="POST">

            @csrf

            <div class="form-group">
                <label>Username</label>

                <div class="input-box">
                    <input
                        type="text"
                        name="username"
                        placeholder="Masukkan username"
                        value="{{ old('username') }}"
                        required
                        autocomplete="username"
                    >
                </div>
            </div>

            <div class="form-group">
                <label>Password</label>

                <div class="input-box">
                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                        autocomplete="current-password"
                    >
                </div>
            </div>

            <button type="submit" class="login-button">
                Masuk ke Dashboard →
            </button>

        </form>

        <div class="login-note">
            🔒 Halaman ini dilindungi sistem autentikasi.
            Pastikan username dan password kamu benar.
        </div>

    </div>

</div>

</body>
</html>