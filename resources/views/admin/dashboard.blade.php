<!-- resources/views/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>صفحة الأدمن - تقاس الطاقة</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Cairo', sans-serif;
      background-image: url('{{ asset("assets/background admin.jpg")  }}');
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

    .login-box h2 {
      margin-bottom: 20px;
    }

    .login-box button {
      width: 100%;
      padding: 10px;
      background-color: #4caaaf;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
    }

    .login-box button:hover {
      background-color: #3903b7;
    }

    #error {
      margin-top: 10px;
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
  background-color: #4caaaf;
  border: none;
  border-radius: 8px;
  color: white;
  font-size: 15px;
  cursor: pointer;
  box-shadow: 0 0 6px rgba(0,0,0,0.2);
  transition: 0.3s;
}

.bottom-buttons button:hover {
  background-color: #3903b7;
}
  </style>
</head>
<body>

  <!-- الشعارات العلوية -->
  <div class="header-logos">
    <img src="{{ asset('assets/logo-right.png')  }}" alt="الشعار الأيمن">
    <img src="{{asset('assets/logo-left.png')  }}" alt="الشعار الأيسر">
  </div>

  <!-- صندوق الأدمن -->
  <div class="login-container">
    <div class="login-box">
      <h2>صفحة الأدمن</h2>
      <a  href="{{ route('admin.page2') }}">
        <button>
          الانتقال لجرد حساب
        </button>
      </a>

      <a  href="{{ route('admin.page3') }}">
        <button>
          الانتقال لتعديل سعر الكهرباء
        </button>
        </a>
      <a  href="{{ route('admin.page4') }}">
        <button >
          تسجيل مستخدم جديد
        </button>
        
         </a>
      <p id="error"></p>
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

  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>