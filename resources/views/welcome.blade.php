<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>تسجيل الدخول - تقاس الطاقة</title>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">

  <style>
    * { box-sizing: border-box; }
    html { scroll-behavior: smooth; }
    body {
      margin: 0;
      padding: 0;
      font-family: 'Cairo', sans-serif;
      background-image: url('{{ asset("assets/power-tower.png") }}');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      height: 100vh;
      display: flex;
      flex-direction: row;
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

    .sidebar {
      width: 260px;
      background: rgba(0, 0, 0, 0.6);
      backdrop-filter: blur(10px);
      padding: 30px 20px;
      height: 100vh;
      animation: slideInRight 1s ease forwards;
      opacity: 0;
      margin-right: auto;
    }

    .sidebar h3 {
      margin-bottom: 20px;
      font-size: 20px;
      color: #ffd700;
    }

    .sidebar a {
      display: block;
      margin: 10px 0;
      padding: 10px 15px;
      border-radius: 10px;
      color: white;
      text-decoration: none;
      transition: background 0.3s, transform 0.3s;
      position: relative;
    }

    .sidebar a:hover {
      background-color: rgba(255, 255, 255, 0.1);
      transform: translateX(-5px);
      color: #00ffd5;
      box-shadow: 0 0 10px rgba(0, 255, 213, 0.4);
    }

    .sub-links {
      margin-right: 20px;
      display: none;
      flex-direction: column;
    }

    .sub-links a {
      font-size: 14px;
    }

    .sidebar a.toggle:after {
      content: "▼";
      font-size: 10px;
      position: absolute;
      left: 10px;
      top: 50%;
      transform: translateY(-50%);
    }

    .main-content {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 20px;
      opacity: 0;
      animation: fadeInUp 1.5s ease forwards;
      animation-delay: 0.8s;
    }

    .main-content h1 {
      font-size: 40px;
      color: #ffe600;
      margin-bottom: 10px;
      text-shadow: 1px 1px 5px black;
    }

    .main-content h3 {
      font-size: 22px;
      color: #ffffff;
      margin-bottom: 40px;
      text-shadow: 1px 1px 3px black;
    }

    .main-content h2 {
      font-size: 26px;
      color: #00ffd5;
      margin-top: 60px;
      text-shadow: 2px 2px 6px black;
    }

    @media (max-width: 768px) {
      .sidebar { display: none; }
      .main-content h1 { font-size: 28px; }
      .main-content h3, .main-content h2 { font-size: 18px; }
    }

    @keyframes fadeInUp {
      0% { opacity: 0; transform: translateY(30px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideInRight {
      0% { opacity: 0; transform: translateX(100px); }
      100% { opacity: 1; transform: translateX(0); }
    }

    @keyframes fadeInDown {
      0% { opacity: 0; transform: translateY(-30px); }
      100% { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <!-- ✅ الشعارات على يسار الشاشة -->
  <div class="header-logos">
    <img src="{{ asset('assets/logo-left.png') }}" alt="الشعار الأيسر">
    <img src="{{ asset('assets/logo-right.png') }}" alt="الشعار الأيمن" class="logo-right">
  </div>
  <!-- ✅ الشريط الجانبي -->
  <div class="sidebar" id="sidebar">
    <h3>القائمة</h3>
    <a href="{{ route('login') }}">تسجيل الدخول</a>
    <a href="{{ route('about') }}">تعريف المشروع</a>
    <a href="#" class="toggle" onclick="toggleSubLinks()">فوائد المشروع</a>
    <div class="sub-links" id="benefitsSubLinks">
      <a href="{{ route('investment-return') }}">- المردود المادي من الاستثمار</a>
      <a href="{{ route('environmental-benefits') }}">- الفوائد العائدة على البيئة</a>
    </div>
    <a href="{{ route('stakeholders') }}">الجهات المعنية</a>
    <a href="{{ route('licenses') }}">التراخيص</a>
    <a href="{{ route('workflow') }}">آلية العمل</a>
    <a href="{{ route('invoice') }}"> الفاتورة الشخصية لمنزلك</a>
    <a href="{{ route('invoice2') }}">تفاصيل الشرائح القانونية</a>
  </div>

  <!-- ✅ المحتوى الرئيسي -->
  <div class="main-content" id="mainContent">
    <h1>وزارة الطاقة</h1>
    <h3>المؤسسة العامة لنقل وتوزيع الكهرباء بسوريا</h3>
    <h1>نظام إلكتروني متكامل لحساب فواتير الطاقة وإدارة الاشتراكات للمعامل والمنازل في سوريا</h1>
    <h2>سوريا الجديدة - آفاق الاستثمار الكبرى في مجالات الطاقة المتجددة</h2>
  </div>

  <script>
    window.addEventListener('DOMContentLoaded', () => {
      document.getElementById('sidebar').style.opacity = '1';
      document.getElementById('mainContent').style.opacity = '1';
    });

    function toggleSubLinks() {
      const subLinks = document.getElementById('benefitsSubLinks');
      subLinks.style.display = (subLinks.style.display === 'flex') ? 'none' : 'flex';
    }
  </script>

</body>
</html>