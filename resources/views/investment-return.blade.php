<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>مردود مادي من الاستثمار - تقاس الطاقة</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

  <style>
    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      margin: 0;
      padding: 0;
      font-family: 'Cairo', sans-serif;
      background-image: url('{{ asset("assets/power-tower2.jpg") }}');
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

    .investment-box {
      background: rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      padding: 40px;
      max-width: 900px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 20px rgba(0,0,0,0.4);
      animation: fadeInUp 1.5s ease forwards;
      opacity: 0;
      transform: translateY(30px);
    }

    .investment-box h1 {
      font-size: 32px;
      color: #ffe600;
      margin-bottom: 20px;
      text-shadow: 1px 1px 5px black;
    }

    .investment-box p {
      font-size: 20px;
      line-height: 1.9;
      color: #ffffff;
      text-shadow: 1px 1px 4px rgba(0,0,0,0.4);
      margin-bottom: 20px;
    }

    .highlight {
      color: #00ffd5;
      font-weight: bold;
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
      .investment-box {
        padding: 20px;
      }
      .investment-box h1 {
        font-size: 26px;
      }
      .investment-box p {
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

  <!-- ✅ الشعارات -->
  <div class="header-logos">
    <img src="{{ asset('assets/logo-left.png') }}" alt="شعار أيسر">
    <img src="{{ asset('assets/logo-right.png') }}" alt="شعار أيمن">
  </div>

  <!-- ✅ محتوى الصفحة -->
  <div class="content-wrapper">
    <div class="investment-box" id="investmentBox">
      <h1>مردود مادي من الاستثمار</h1>

      <p>
        تكمن الفائدة في كمية الكهرباء التي سوف يوفرها المشروع وسوف يقوم المصنع باستهلاكها.
        وبذلك تكون الفائدة العظمى على المنتج الصناعي حيث أنه سيوفر من كمية الطاقة اللازمة لإنتاجه.
      </p>

      <p>
        مثال عملي على أرض الواقع: استخدام ألواح طاقة شمسية من نوع
        <span class="highlight">Jinko 585W InType 16 Paspar</span> يوفر سنوياً في المناخ السوري المعتدل
        <span class="highlight">900kW</span> سنوياً، وهذا الرقم قابل للزيادة والنقصان بنسبة
        <span class="highlight">10%</span>.
      </p>

      <p>
        ولنفترض أن المشروع قدرته الاقتصادية <span class="highlight">1MGW</span> ويتكون من
        <span class="highlight">1800 لاقط شمسي</span> من هذا النوع، وبالتالي:
        <br><br>
        <span class="highlight">1800 × 900 = 1,620,000 kW سنوياً</span>.
        <br><br>
        على السعر الذي حددته وزارة الطاقة:
        <br><br>
        <span class="highlight">1,620,000 × 1400 = 2,268,000,000 مليون ليرة سورية</span>.
      </p>
            <button class="back-button" onclick="history.back()">رجوع</button>
    </div>
  </div>
  <!-- ✅ JavaScript لتفعيل الأنيميشن -->
  <script>
    window.addEventListener('load', () => {
      const box = document.getElementById('investmentBox');
      box.style.opacity = '1';
      box.style.transform = 'translateY(0)';
    });
  </script>

</body>
</html>