<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تسجيل الدخول - تقاس الطاقة</title>
  <style>
    * {
      box-sizing: border-box;
    }
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
    }
    .login-box h2 {
      text-align: center;
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
      background-color: #4CAF50;
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
    #error {
      text-align: center;
      margin-top: 10px;
      color: #ffcccc;
      font-size: 14px;
    }
    .back-button {
    background-color: #4CAF50; /* أخضر */
    color: white; /* لون الخط */
    border: none; /* إزالة الحدود الافتراضية */
    padding: 10px 20px; /* مساحة داخلية للزر */
    border-radius: 8px; /* حواف مستديرة */
    font-size: 16px; /* حجم الخط */
    cursor: pointer; /* شكل المؤشر عند المرور */
    transition: background-color 0.3s ease, transform 0.2s ease; /* تأثير ناعم */
}

/* تأثير عند المرور على الزر */
.back-button:hover {
    background-color: #45a049; /* أخضر أغمق قليلاً */
    transform: scale(1.05); /* تكبير خفيف */
}

/* تأثير عند الضغط على الزر */
.back-button:active {
    transform: scale(0.98); /* تصغير خفيف عند الضغط */
}
  </style>
</head>
<body>

  <!-- الشعارات -->
  <div class="header-logos">
    <img src="{{ asset('assets/logo-right.png') }}" alt="الشعار الأيمن">
    <img src="{{ asset('assets/logo-left.png') }}" alt="الشعار الأيسر">
  </div>

  <!-- صندوق تسجيل الدخول -->
  <div class="login-container">
    <div class="login-box">
      <h2>تسجيل الدخول</h2>

      {{-- عرض أخطاء الدخول --}}
      @if($errors->any())
        <p id="error">{{ $errors->first() }}</p>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="text" name="job_identity_number" placeholder="رقم الهوية الوظيفية" value="{{ old('job_identity_number') }}" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <button type="submit">دخول</button>
      
    <button type="button" class="back-button" onclick="window.location='{{ route('welcome') }}'">
        رجوع
    </button>
      </form>
    </div>
  </div>

</body>
</html>