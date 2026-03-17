<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>صفحة المستخدم - تقاس الطاقة</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Cairo', sans-serif;
            background-image: url('{{ asset("assets/background.jpg") }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .header-logos {
      width: 100%;
      display: flex;
      justify-content: space-between;
      padding: 20px 40px;
      position: absolute;
      top: 0;
      left: 0;
      z-index: 10;
    }

     .header-logos img {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 0 8px rgba(0,0,0,0.3);
    }
        .login-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .login-box {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 30px;
            width: 320px;
            backdrop-filter: blur(10px);
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
            color: white;
            margin-top: 100px;
            text-align: center;
        }
        .login-box input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.8);
            font-size: 16px;
        }
        .login-box button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .login-box button:hover { background-color: #45a049; }
        .error-message {
            text-align: center;
            margin-top: 10px;
            color: #ffcccc;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- الشعارات -->
    <div class="header-logos">
        <img src="{{ asset('assets/logo-right.png') }}" alt="الشعار الأيمن">
        <img src="{{ asset('assets/logo-left.png') }}" alt="الشعار الأيسر">
    </div>

    <!-- صندوق الإدخال -->
    <div class="login-container">
        <div class="login-box">
            <form method="POST" action="{{ route('user.search') }}">
                @csrf
                <input type="text" name="subscription_number" placeholder="رقم الاشتراك" value="{{ $subscriptionNumber ?? '' }}" required>
                <button type="submit">عرض البيانات</button>
                  {{-- زر الرجوع --}}
            <button class="back-button" onclick="history.back()">رجوع</button>
            </form>

            <a href="{{ route('user.page6') }}">
                <button>إضافة اشتراك</button>
            </a>

            @if(isset($subscription) && !$subscription)
                <p class="error-message">رقم الاشتراك غير موجود.</p>
            @endif
        </div>
    </div>
</body>
</html>
