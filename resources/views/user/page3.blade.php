<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>نتائج القراءة - تقاس الطاقة</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding-top: 120px;
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
    .results-box {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      padding: 30px;
      width: 90%;
      max-width: 700px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
      color: white;
      text-align: center;
    }
    .results-box h2 {
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: rgba(255,255,255,0.2);
      border-radius: 10px;
      overflow: hidden;
      transition: all 0.3s ease;
    }
    th, td {
      padding: 12px;
      border: 1px solid rgba(255,255,255,0.3);
      text-align: center;
      font-size: 16px;
      color: white;
      transition: background 0.3s ease;
    }
    th {
      background-color: rgba(0,0,0,0.3);
    }
    tr:nth-child(even) {
      background-color: rgba(255,255,255,0.1);
    }
    tr:hover {
      background-color: rgba(255, 255, 255, 0.25);
    }
    .back-button {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #28a745;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .back-button:hover {
      background-color: #218838;
    }
    .success-message {
      color: #4caf50;
      margin-bottom: 15px;
      font-size: 16px;
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
    <img src="{{ asset('assets/logo-right.png') }}" alt="الشعار الأيمن">
    <img src="{{ asset('assets/logo-left.png') }}" alt="الشعار الأيسر">
  </div>

  <div class="results-box">
    <h2>نتائج قراءة العدادات</h2>

    @if(session('success'))
      <p class="success-message">{{ session('success') }}</p>
    @endif

    <table>
      <thead>
        <tr>
          <th>فرق ١٨٠ (Z1)</th>
          <th>فرق ٢٨٠ (U1)</th>
          <th>القراءة الحالية ١٨٠</th>
          <th>القراءة الحالية ٢٨٠</th>
          <th>الفاتورة النهائية</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $Z1 ?? '--' }}</td>
          <td>{{ $U1 ?? '--' }}</td>
          <td>{{ $newReading->current_180 ?? '--' }}</td>
          <td>{{ $newReading->current_280 ?? '--' }}</td>
          <td>{{ $amountDue ?? '--' }}</td>
        </tr>
      </tbody>
    </table>

    <button class="back-button" onclick="history.back()">رجوع</button>
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
</body>
</html>