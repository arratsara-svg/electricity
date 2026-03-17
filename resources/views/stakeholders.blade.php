<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>الجهات المعنية - تقاس الطاقة</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      margin: 0;
      padding: 0;
      font-family: 'Cairo', sans-serif;
      background-image: url('{{ asset("assets/stackholders.jpg") }}');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      color: white;
      overflow-x: hidden;
    }

    .header-logos {
      position: absolute;
      top: 20px;
      left: 20px;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      gap: 20px;
      z-index: 10;
      animation: fadeInDown 1.2s ease forwards;
    }

    .header-logos img {
      width: 90px;
      height: 90px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 0 8px rgba(0,0,0,0.3);
    }

    .content-wrapper {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 60px 30px;
      text-align: center;
    }

    .entity-box {
      background: rgba(20, 20, 60, 0.3);
      border-radius: 20px;
      padding: 40px;
      max-width: 900px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 25px rgba(0,0,0,0.4);
      animation: fadeInUp 1.5s ease forwards;
      opacity: 0;
      transform: translateY(30px);
    }

    .entity-box h1 {
      font-size: 32px;
      color: #a4dfff;
      margin-bottom: 25px;
      text-shadow: 1px 1px 5px black;
    }

    .entity-box ul {
      text-align: right;
      padding-right: 20px;
      font-size: 20px;
      line-height: 2;
      color: #ffffff;
    }

    .entity-box ul li {
      margin-bottom: 15px;
      position: relative;
      padding-right: 28px;
    }

    .entity-box ul li::before {
      content: "🏢";
      position: absolute;
      right: 0;
      top: 0;
    }

    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(30px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInDown {
      0% { opacity: 0; transform: translateY(-30px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
      .entity-box { padding: 20px; }
      .entity-box h1 { font-size: 26px; }
      .entity-box ul { font-size: 16px; }
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

  <!-- شعارات -->
  <div class="header-logos">
    <img src="{{ asset('assets/logo-left.png') }}" alt="شعار يسار">
    <img src="{{ asset('assets/logo-right.png') }}" alt="شعار يمين">
  </div>

  <!-- محتوى -->
  <div class="content-wrapper">
    <div class="entity-box" id="entityBox">
      <h1>الجهات المعنية بالمشروع</h1>
      <ul>
        <li>وزارة الطاقة</li>
        <li>المؤسسة العامة للكهرباء</li>
        <li>المستثمرون</li>
        <li>مزودو خدمات العدادات الذكية</li>
        <li>شركات مختصة بتنفيذ مشاريع الطاقة</li>
        <li>مراكز دراسات الجدوى الاقتصادية</li>
        <li>شركات المتابعة والصيانة الفنية</li>
      </ul>
            <button class="back-button" onclick="history.back()">رجوع</button>
    </div>
  </div>

  <script>
    window.addEventListener('load', () => {
      const box = document.getElementById('entityBox');
      box.style.opacity = '1';
      box.style.transform = 'translateY(0)';
    });
  </script>

</body>
</html>