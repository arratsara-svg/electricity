<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>آلية العمل</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * { box-sizing: border-box; }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Cairo', sans-serif;
      background-image: url('{{ asset("assets/background.jpg") }}'); /* صورة الخلفية */
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      min-height: 100vh;
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: start;
      padding-top: 80px;
    }

    .overlay {
      background-color: rgba(0, 0, 0, 0.6);
      padding: 40px 30px;
      border-radius: 15px;
      width: 85%;
      max-width: 850px;
      text-align: center;
      animation: fadeInUp 1.5s ease;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
    }

    h1 {
      font-size: 34px;
      color: #ffe600;
      margin-bottom: 25px;
      text-shadow: 1px 1px 5px black;
    }

    p {
      font-size: 20px;
      line-height: 1.8;
      text-align: justify;
    }

    .image-section {
      margin-top: 40px;
      animation: fadeIn 2s ease;
    }

    .image-section img {
      max-width: 100%;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.4);
    }

    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(40px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @media (max-width: 768px) {
      h1 { font-size: 26px; }
      p { font-size: 16px; }
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

  <div class="overlay">
    <h1>آلية العمل</h1>
    <p>
      تقوم لواقط الطاقة الشمسية الموصولة مع نظام <strong>ongrade</strong> المرتبط مع الشبكة العامة للكهرباء
      بضخ الطاقة الشمسية المولدة من لواقط الطاقة في الشبكة العامة. حيث يتم الربط بعداد ثنائي المدخل
      يقوم بقياس كمية الكهرباء الداخلة من الشبكة العامة إلى المشروع وكمية الكهرباء التي تم ضخها من لواقط الطاقة الشمسية إلى الشبكة العامة.
      <br><br>
      ويتم حساب كمية الطاقة الداخلة والخارجة عبر الموقع الإلكتروني الخاص بمؤسسة الكهرباء
      <strong>(نظام إلكتروني متكامل لحساب فواتير الطاقة وإدارة الاشتراكات للمعامل والمنازل في سوريا)</strong>، عبر موظف يقوم بأخذ التأشيرة من العدادات الذكية
      وإدخالها إلى الموقع ليقوم الموقع بحساب الفاتورة النهائية التي يستحق دفعها.
    </p>

    <div class="image-section">
      <img src="{{ asset('assets/workflow-diagram.jpg') }}" alt="آلية العمل">
    </div>
          <button class="back-button" onclick="history.back()">رجوع</button>
  </div>

</body>
</html>