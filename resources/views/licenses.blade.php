<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>أحكام وشروط الرخصة</title>
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            background-color: #000;
        }
        .full-image {
            width: 100%;
            height: 100vh;
            object-fit: contain; /* يمكنك تغييره إلى cover حسب رغبتك */
            display: block;
            margin: 0 auto;
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
    <img src="{{ asset('assets/license.jpg') }}" alt="أحكام وشروط الرخصة" class="full-image">
          <button class="back-button" onclick="history.back()">رجوع</button>
</body>
</html>