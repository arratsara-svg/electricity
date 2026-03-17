<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>تسجيل الدخول - تقاس الطاقة</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      padding: 0;
      font-family: 'Cairo', sans-serif;
      background-image: url('{{asset("assets/background.jpg") }}');
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
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
      color: white;
      margin-top: 100px;
      text-align: center;
    }
    .login-box h2 {
      margin-bottom: 20px;
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
      background-color: #4caf50;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
    }
    .login-box button:hover {
      background-color: #45a049;
    }
    .total-table-button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #2196f3;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }
    .total-table-button:hover {
      background-color: #1976d2;
    }
    #error {
      text-align: center;
      margin-top: 10px;
      color: #ffcccc;
      font-size: 14px;
    }
    /* زر الانتقال */
    .go-to-page {
      display: block;
      width: 240px;
      margin: 20px auto;
      padding: 12px 20px;
      text-align: center;
      background: #28a745;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-size: 16px;
      transition: background 0.3s ease;
    }
    .go-to-page:hover {
      background: #218838;
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

.bo
  </style>
</head>
<body>
  <div class="header-logos">
    <img src="{{ asset('assets/logo-right.png') }}" alt="الشعار الأيمن" />
    <img src="{{ asset('assets/logo-left.png') }}" alt="الشعار الأيسر" />
  </div>

  <div class="login-container">
    <div class="login-box">
      <h2>إدخال معلومات العداد</h2>
       @if ($errors->any())
        <div style="color: red; text-align:center;">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif

   
    <form method="POST" action="{{ route('meter.store') }}">
        @csrf
        <input type="hidden" name="subscription_id" value="{{ session('subscription_id') }}" />
        
        <input type="text" name="current_180" placeholder="عداد 180" required />
        <input type="text" name="current_280" placeholder="عداد 280" required />
        <input type="date" name="reading_date" required />
        
        <button type="submit">دخول</button>
    </form>

      <a href="{{ route('user.page3') }}">
        <button class="total-table-button">الفاتورة النهائي </button>
      </a>

      @if(session('error'))
        <p id="error">{{ session('error') }}</p>
      @endif

    </div>
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
</body>
</html>
