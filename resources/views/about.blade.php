<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تعريف المشروع - تقاس الطاقة</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Cairo', sans-serif;
      background-image: url('assets/power-tower2.jpg'); /* نفس الخلفية */
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

    .about-box {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      padding: 40px;
      max-width: 800px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 20px rgba(0,0,0,0.4);
      animation: fadeInUp 1.5s ease forwards;
      opacity: 0;
      transform: translateY(30px);
    }

    .about-box h1 {
      font-size: 32px;
      color: #ffe600;
      margin-bottom: 20px;
      text-shadow: 1px 1px 5px black;
    }

    .about-box p {
      font-size: 20px;
      line-height: 1.9;
      color: #ffffff;
      text-shadow: 1px 1px 4px rgba(0,0,0,0.4);
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
      .about-box {
        padding: 20px;
      }

      .about-box h1 {
        font-size: 26px;
      }

      .about-box p {
        font-size: 16px;
      }
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

  <!-- ✅ الشعارات في يسار الصفحة -->
  <div class="header-logos">
    <img src="assets/logo-left.png" alt="شعار أيسر">
    <img src="assets/logo-right.png" alt="شعار أيمن">
  </div>

  <!-- ✅ صندوق تعريف المشروع -->
  <div class="content-wrapper">
    <div class="about-box" id="aboutBox">
      <h1>تعريف المشروع</h1>
      <p>
        المشروع هو عبارة عن فرصة استثمارية تتيح للقطاع الخاص الاستفادة من مشاريع الطاقة التي بدورها تعزز القوة الاستثمارية الوظيفية وتقلل من أعباء ضخ الكهرباء التي تعاني منها مؤسسة الكهرباء. وهو مجال عالمي رائد في الدول المتقدمة للاستفادة من جميع الموارد الطبيعية وجعلها مورداً يعزز القوة الاقتصادية في البلاد.
      </p>
      <button class="back-button" onclick="history.back()">رجوع</button>
    </div>
        
  </div>

  <!-- ✅ JavaScript لتفعيل الأنيميشن عند تحميل الصفحة -->
  <script>
    window.addEventListener('load', () => {
      const box = document.getElementById('aboutBox');
      box.style.opacity = '1';
      box.style.transform = 'translateY(0)';
    });
  </script>

</body>
</html>