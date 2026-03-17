<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>حسابي - تقاس الطاقة</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      margin: 0;
      padding: 0;
      font-family: 'Cairo', sans-serif;
      background-image: url('{{ asset("assets/account.jpg") }}');
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
    .account-container {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
    }
    .account-box {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      padding: 30px;
      width: 400px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 15px rgba(0,0,0,0.3);
      color: white;
      margin-top: 100px;
      text-align: center;
    }
    .account-box h2 {
      margin-bottom: 20px;
    }
    .account-box label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      text-align: right;
    }
    .account-box input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: none;
      border-radius: 8px;
      background-color: rgba(255, 255, 255, 0.8);
      font-size: 16px;
    }
    .account-box button {
      width: 100%;
      padding: 12px;
      background-color: #4caaaf;
      border: none;
      border-radius: 8px;
      color: white;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
    }
    .account-box button:hover {
      background-color: #3903b7;
    }
    .success-message {
      background-color: rgba(0, 128, 0, 0.7);
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 15px;
      color: white;
      font-weight: bold;
    }
    .back-button {
      background-color: #888888;
    }
    .back-button:hover {
      background-color: #555555;
    }
  </style>
</head>
<body>
  <!-- الشعارات العلوية -->
  <div class="header-logos">
    <img src="{{ asset('assets/logo-right.png') }}" alt="الشعار الأيمن">
    <img src="{{ asset('assets/logo-left.png') }}" alt="الشعار الأيسر">
  </div>

  <!-- صندوق الحساب -->
  <div class="account-container">
    <div class="account-box">
      <h2>معلومات حسابي</h2>

      <!-- رسالة نجاح -->
      @if(session('success'))
        <div class="success-message">
          تم حفظ البيانات بنجاح!
        </div>
      @endif

      <form action="{{ route('user.account.update') }}" method="POST">
        @csrf
        @method('PUT')

        <label>الاسم</label>
        <input type="text" name="name" value="{{ $user->name }}" required>

        <label>رقم الهوية الوظيفية</label>
        <input type="text" name="job_identity_number" value="{{ $user->job_identity_number }}">

        <label>المركز</label>
        <input type="text" name="institution_center" value="{{ $user->institution_center }}">

        <label>كلمة المرور</label>
        <input type="password" name="password" placeholder="اتركها فارغة إذا لا تريد التغيير">

        <button type="submit">حفظ التعديلات</button>
      </form>

      <!-- زر الرجوع -->
      <button class="back-button" onclick="history.back()">رجوع</button>
    </div>
  </div>
</body>
</html>