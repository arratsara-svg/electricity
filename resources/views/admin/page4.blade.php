<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل الدخول - تقاس الطاقة</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
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
        }
        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-box input, .login-box select {
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
            text-align: center;
            margin-top: 10px;
            color: red;
            font-size: 14px;
        }
        .success-message {
            color: green;
            text-align: center;
            margin-top: 10px;
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

    <div class="header-logos">
        <img src="{{ asset('assets/logo-right.png') }}" alt="الشعار الأيمن">
        <img src="{{ asset('assets/logo-left.png') }}" alt="الشعار الأيسر">
    </div>

    <div class="login-container">
        <div class="login-box">
            <h2>تسجيل مستخدم جديد</h2>

            @if(session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif

            @if ($errors->any())
                <div id="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('users.store') }}">
                @csrf
                <input type="text" name="name" placeholder="اسم المستخدم" required>
                <input type="text" name="job_identity_number" placeholder="رقم الهوية الوظيفية">
                <input type="text" name="institution_center" placeholder="مركز المؤسسة">
                <input type="password" name="password" placeholder="كلمة المرور" required>

                <select name="usertype" required>
                    <option value="">اختر نوع المستخدم</option>
                    <option value="admin">admin</option>
                    <option value="employee">user</option>
                </select>

                <button type="submit">حفظ</button>
            </form>
            {{-- زر الرجوع --}}
            <button class="back-button" onclick="history.back()">رجوع</button>
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