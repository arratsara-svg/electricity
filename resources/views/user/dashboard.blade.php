<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>تسجيل الدخول - رقم الاشتراك</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
    * { box-sizing: border-box; }
    body {
      margin: 0; padding: 0;
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
    .login-box input, .login-box button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: none;
      border-radius: 8px;
      font-size: 16px;
    }
    .login-box input {
      background-color: rgba(255, 255, 255, 0.8);
    }
    .login-box button {
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
    }
    .login-box button:hover {
      background-color: #45a049;
    }
    #error {
      color: #ffcccc;
      font-size: 14px;
    }
     .bottom-buttons {
  position: fixed;
  bottom: 30px;
  left: 20px;
  display: flex;
  flex-direction: column; /* ✅ يخلي الأزرار تحت بعض */
  gap: 10px;
}

.bottom-buttons button {
  padding: 10px 40px;
  background-color: #53af4c;
  border: none;
  border-radius: 8px;
  color: white;
  font-size: 15px;
  cursor: pointer;
  box-shadow: 0 0 6px rgba(0,0,0,0.2);
  transition: 0.3s;
}

.bottom-buttons button:hover {
  background-color: #b5e59e;
}
  </style>
</head>
<body>
  <div class="header-logos">
    <img src="{{ asset('assets/logo-right.png') }}" alt="شعار أيمن">
    <img src="{{ asset('assets/logo-left.png') }}" alt="شعار أيسر">
  </div>

  <div class="login-container">
    <div class="login-box">
      <h2>الرجاء إدخال رقم الاشتراك</h2>

      <form method="POST" id="subscriptionForm">
        @csrf
        <input type="text" name="subscription_number" placeholder="رقم الاشتراك" value="{{ $subscriptionNumber ?? '' }}" required>
        <button type="submit" formaction="{{ route('subscription.check') }}">دخول</button>
        <button type="submit" formaction="{{ route('admin.search') }}">عرض البيانات</button>
      </form>

      @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
      @endif
    </div>
    <div class="bottom-buttons">
  <a href="{{ route('user.account') }}">
    <button>حسابي</button>
  </a>
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">تسجيل خروج</button>
  </form>
</div>
  </div>
</body>
</html>
