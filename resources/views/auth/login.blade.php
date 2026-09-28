<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - KABASA Parking System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background:
                radial-gradient(
                    circle at 10% 20%,
                    rgba(220, 38, 38, 0.12),
                    transparent 28%
                ),
                radial-gradient(
                    circle at 90% 80%,
                    rgba(153, 27, 27, 0.10),
                    transparent 30%
                ),
                #050505;
            color: white;
        }

        /* ================================
           BACKGROUND
        ================================= */

        .page-bg {
            position: fixed;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .glow-one {
            position: absolute;
            width: 350px;
            height: 350px;
            top: -150px;
            left: -100px;
            background: rgba(220, 38, 38, 0.08);
            filter: blur(100px);
            border-radius: 50%;
        }

        .glow-two {
            position: absolute;
            width: 300px;
            height: 300px;
            right: -100px;
            bottom: -100px;
            background: rgba(153, 27, 27, 0.10);
            filter: blur(100px);
            border-radius: 50%;
        }

        /* ================================
           MAIN CONTAINER
        ================================= */

        .login-wrapper {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .login-box {
            position: relative;
            width: 100%;
            max-width: 1050px;
            min-height: 620px;

            display: grid;
            grid-template-columns: 1fr 1fr;

            overflow: hidden;

            background: rgba(12, 12, 12, 0.94);

            border: 1px solid rgba(255, 255, 255, 0.08);

            border-radius: 28px;

            box-shadow:
                0 30px 100px rgba(0, 0, 0, 0.75),
                0 0 80px rgba(220, 38, 38, 0.06);
        }

        /* ================================
           LEFT SIDE
        ================================= */

        .brand-side {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            padding: 55px;

            background:
                linear-gradient(
                    145deg,
                    #111111,
                    #080808 60%,
                    #050505
                );

            border-right: 1px solid rgba(255, 255, 255, 0.06);
        }

        .brand-side::after {
            content: "";
            position: absolute;

            width: 260px;
            height: 260px;

            right: -120px;
            bottom: -120px;

            border: 1px solid rgba(220, 38, 38, 0.15);

            border-radius: 50%;
        }

        .brand-top {
            position: relative;
            z-index: 2;
        }

        .logo-row {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .logo {
            width: 48px;
            height: 48px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: #ef4444;

            color: white;

            font-size: 21px;
            font-weight: 900;

            box-shadow:
                0 10px 30px rgba(239, 68, 68, 0.20);
        }

        .logo-name {
            font-size: 18px;
            font-weight: 900;
            letter-spacing: 0.08em;
        }

        .logo-subtitle {
            margin-top: 2px;

            font-size: 9px;
            font-weight: 700;

            letter-spacing: 0.35em;

            color: #ef4444;
        }

        .brand-content {
            position: relative;
            z-index: 2;

            max-width: 420px;
        }

        .small-line {
            display: flex;
            align-items: center;
            gap: 10px;

            margin-bottom: 20px;
        }

        .small-line span:first-child {
            width: 35px;
            height: 2px;

            background: #ef4444;
        }

        .small-line span:last-child {
            font-size: 9px;
            font-weight: 800;

            letter-spacing: 0.35em;

            color: #ef4444;
        }

        .brand-title {
            margin: 0;

            font-size: clamp(40px, 5vw, 62px);

            line-height: 0.98;

            font-weight: 900;

            letter-spacing: -0.04em;
        }

        .brand-title span {
            color: #ef4444;
        }

        .brand-text {
            margin-top: 25px;

            max-width: 360px;

            color: #888;

            font-size: 13px;
            line-height: 1.8;
        }

        .brand-bottom {
            position: relative;
            z-index: 2;

            display: flex;
            align-items: center;
            gap: 12px;

            color: #666;

            font-size: 11px;
        }

        .online-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;

            background: #ef4444;

            box-shadow: 0 0 12px rgba(239, 68, 68, 0.8);
        }

        /* ================================
           RIGHT SIDE
        ================================= */

        .form-side {
            display: flex;
            align-items: center;
            justify-content: center;

            padding: 55px;
            background: #0a0a0a;
        }

        .form-container {
            width: 100%;
            max-width: 390px;
        }

        .form-header {
            margin-bottom: 35px;
        }

        .form-label-top {
            margin-bottom: 9px;

            color: #ef4444;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 0.3em;
            text-transform: uppercase;
        }

        .form-title {
            margin: 0;

            color: white;

            font-size: 34px;
            font-weight: 900;

            letter-spacing: -0.03em;
        }

        .form-description {
            margin-top: 10px;

            color: #666;

            font-size: 13px;
            line-height: 1.7;
        }

        /* ================================
           ERROR
        ================================= */

        .error-box {
            margin-bottom: 22px;

            padding: 13px 15px;

            border: 1px solid rgba(239, 68, 68, 0.25);

            border-radius: 12px;

            background: rgba(127, 29, 29, 0.12);

            color: #fca5a5;

            font-size: 12px;
        }

        .error-title {
            margin-bottom: 3px;

            color: #f87171;

            font-weight: 800;
        }

        /* ================================
           INPUT
        ================================= */

        .input-group {
            margin-bottom: 20px;
        }

        .input-label {
            display: block;

            margin-bottom: 9px;

            color: #b5b5b5;

            font-size: 12px;
            font-weight: 700;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;

            top: 50%;
            left: 15px;

            transform: translateY(-50%);

            color: #666;

            font-size: 15px;

            pointer-events: none;
        }

        .login-input {
            width: 100%;

            height: 50px;

            padding: 0 45px;

            border: 1px solid #242424;

            border-radius: 12px;

            outline: none;

            background: #111111;

            color: white;

            font-size: 13px;

            transition: 0.25s ease;
        }

        .login-input::placeholder {
            color: #4f4f4f;
        }

        .login-input:focus {
            border-color: #ef4444;

            background: #121212;

            box-shadow:
                0 0 0 3px rgba(239, 68, 68, 0.08);
        }

        .password-button {
            position: absolute;

            top: 50%;
            right: 14px;

            transform: translateY(-50%);

            border: none;

            background: transparent;

            color: #666;

            cursor: pointer;

            font-size: 14px;
        }

        .password-button:hover {
            color: #ef4444;
        }

        /* ================================
           REMEMBER
        ================================= */

        .remember-row {
            display: flex;
            align-items: center;

            margin: 3px 0 25px;
        }

        .remember-row label {
            display: flex;
            align-items: center;
            gap: 9px;

            color: #666;

            font-size: 12px;

            cursor: pointer;
        }

        .remember-checkbox {
            width: 14px;
            height: 14px;

            accent-color: #ef4444;
        }

        /* ================================
           BUTTON
        ================================= */

        .login-button {
            width: 100%;
            height: 50px;

            border: none;
            border-radius: 12px;

            background: #ef4444;

            color: white;

            font-size: 13px;
            font-weight: 800;

            cursor: pointer;

            transition: 0.25s ease;

            box-shadow:
                0 10px 25px rgba(239, 68, 68, 0.14);
        }

        .login-button:hover {
            background: #dc2626;

            transform: translateY(-2px);

            box-shadow:
                0 15px 35px rgba(239, 68, 68, 0.22);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* ================================
           FOOTER
        ================================= */

        .form-footer {
            margin-top: 35px;

            padding-top: 20px;

            border-top: 1px solid #1c1c1c;

            text-align: center;

            color: #444;

            font-size: 10px;
        }

        .form-footer span {
            color: #ef4444;
        }

        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 850px) {

            .login-box {
                grid-template-columns: 1fr;

                max-width: 500px;
            }

            .brand-side {
                display: none;
            }

            .form-side {
                min-height: 620px;

                padding: 40px 30px;
            }
        }

        @media (max-width: 480px) {

            .login-wrapper {
                padding: 15px;
            }

            .login-box {
                border-radius: 20px;
            }

            .form-side {
                padding: 35px 22px;
            }

            .form-title {
                font-size: 29px;
            }
        }
    </style>
</head>


<body>

    <div class="page-bg">
        <div class="glow-one"></div>
        <div class="glow-two"></div>
    </div>


    <main class="login-wrapper">

        <div class="login-box">

            <!-- =========================================
                 LEFT : BRANDING
            ========================================== -->

            <section class="brand-side">

                <div class="brand-top">

                    <div class="logo-row">

                        <div class="logo">
                            K
                        </div>

                        <div>
                            <div class="logo-name">
                                KABASA
                            </div>

                            <div class="logo-subtitle">
                                PARKING SYSTEM
                            </div>
                        </div>

                    </div>

                </div>


                <div class="brand-content">

                    <div class="small-line">

                        <span></span>

                        <span>
                            SMART PARKING
                        </span>

                    </div>


                    <h1 class="brand-title">
                        Park<br>
                        <span>Smarter.</span>
                    </h1>


                    <p class="brand-text">
                        Sistem informasi parkir KABASA untuk
                        mengelola kendaraan, pengguna,
                        transaksi, dan area parkir dengan
                        lebih cepat dan terstruktur.
                    </p>

                </div>


                <div class="brand-bottom">

                    <span class="online-dot"></span>

                    <span>
                        KABASA Parking System • 2026
                    </span>

                </div>

            </section>


            <!-- =========================================
                 RIGHT : LOGIN
            ========================================== -->

            <section class="form-side">

                <div class="form-container">

                    <div class="form-header">

                        <div class="form-label-top">
                            Welcome back
                        </div>

                        <h2 class="form-title">
                            Masuk ke sistem
                        </h2>

                        <p class="form-description">
                            Gunakan username atau nama lengkap
                            dan password untuk melanjutkan.
                        </p>

                    </div>


                    <!-- ERROR -->

                    @if(session('error'))

                        <div class="error-box">

                            <div class="error-title">
                                Login gagal
                            </div>

                            <div>
                                {{ session('error') }}
                            </div>

                        </div>

                    @endif


                    <!-- FORM -->

                    <form
                        action="{{ route('login') }}"
                        method="POST"
                    >

                        @csrf


                        <!-- USERNAME -->

                        <div class="input-group">

                            <label
                                for="username"
                                class="input-label"
                            >
                                Username / Nama Lengkap
                            </label>

                            <div class="input-wrapper">

                                <span class="input-icon">
                                    👤
                                </span>

                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    value="{{ old('username') }}"
                                    placeholder="Masukkan username atau nama"
                                    autocomplete="username"
                                    required
                                    class="login-input"
                                >

                            </div>


                            @error('username')

                                <p class="mt-2 text-xs text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        <!-- PASSWORD -->

                        <div class="input-group">

                            <label
                                for="password"
                                class="input-label"
                            >
                                Password
                            </label>

                            <div class="input-wrapper">

                                <span class="input-icon">
                                    🔒
                                </span>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    placeholder="Masukkan password"
                                    autocomplete="current-password"
                                    required
                                    class="login-input"
                                >


                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    class="password-button"
                                >
                                    <span id="passwordIcon">
                                        👁️
                                    </span>
                                </button>

                            </div>


                            @error('password')

                                <p class="mt-2 text-xs text-red-500">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        <!-- REMEMBER -->

                        <div class="remember-row">

                            <label>

                                <input
                                    type="checkbox"
                                    name="remember"
                                    class="remember-checkbox"
                                >

                                <span>
                                    Ingat saya
                                </span>

                            </label>

                        </div>


                        <!-- BUTTON -->

                        <button
                            type="submit"
                            class="login-button"
                        >
                            Masuk ke Sistem
                        </button>

                    </form>


                    <!-- FOOTER -->

                    <div class="form-footer">

                        © {{ date('Y') }}
                        <span>KABASA</span>
                        Parking System

                    </div>

                </div>

            </section>

        </div>

    </main>


    <script>

        function togglePassword() {

            const password =
                document.getElementById('password');

            const icon =
                document.getElementById('passwordIcon');


            if (password.type === 'password') {

                password.type = 'text';

                icon.textContent = '🙈';

            } else {

                password.type = 'password';

                icon.textContent = '👁️';

            }

        }

    </script>

</body>

</html>