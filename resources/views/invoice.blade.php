<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>تسجيل الدخول / التسجيل</title>
<style>
    body {
        background: url('/assets/bg.png') no-repeat center center fixed;
        background-size: cover;
        font-family: Tahoma, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .auth-box {
        width: 350px;
        background: rgba(255, 255, 255, 0.15);
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.5);
        backdrop-filter: blur(10px);
        color: #fff;
        text-align: center;
        position: relative;
        transition: 0.3s;
    }

    h2 {
        margin-bottom: 20px;
        color: white;
        text-shadow: 0 0 5px black;
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid rgba(255,255,255,0.5);
        border-radius: 6px;
        background: rgba(255,255,255,0.3);
        color: #fff;
    }

    input::placeholder { color: rgba(255,255,255,0.7); }

    button {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: none;
        border-radius: 6px;
        background: rgba(11, 116, 225, 0.8);
        color: white;
        cursor: pointer;
    }

    button:hover {
        background: rgba(9, 91, 176, 0.8);
    }

    .switch-btn {
        background: rgba(0,0,0,0.4);
    }

    .hidden { display: none; }

</style>
</head>
<body>

<div class="auth-box">

    <!-- Login Form -->
    <div id="login-form">
        <h2>تسجيل الدخول</h2>

        @if ($errors->any())
            <div class="error" style="color:red">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ url('/login/user') }}" method="POST">
            @csrf
            <input type="email" name="email_user" placeholder="الإيميل" required>
            <input type="password" name="password_user" placeholder="الباسوورد" required>
            <button type="submit">دخول</button>
        </form>

        <button class="switch-btn" onclick="showRegister()">إنشاء حساب جديد</button>
    </div>

    <!-- Register Form -->
    <div id="register-form" class="hidden">
        <h2>تسجيل حساب جديد</h2>

        <form action="{{ url('/register') }}" method="POST">
            @csrf
            <input type="text" name="name_user" placeholder="الاسم" required>
            <input type="email" name="email_user" placeholder="الإيميل" required>
            <input type="password" name="password_user" placeholder="الباسوورد" required>
            <input type="number" name="subscription_id" placeholder="Subscription ID (اختياري)">
            <button type="submit">تسجيل</button>
        </form>

        <button class="switch-btn" onclick="showLogin()">الرجوع لتسجيل الدخول</button>
    </div>

    <!-- زر الرجوع -->
        <!-- تسجيل خروج / رجوع للخلف -->
<button  type="button" class="back-button" onclick="window.location='{{ route('welcome') }}'">
    رجوع 
</button>

</div>

<script>
    function showRegister() {
        document.getElementById('login-form').classList.add('hidden');
        document.getElementById('register-form').classList.remove('hidden');
    }
    function showLogin() {
        document.getElementById('register-form').classList.add('hidden');
        document.getElementById('login-form').classList.remove('hidden');
    }
</script>

</body>
</html>