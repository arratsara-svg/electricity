<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>نتائج الاشتراك - تقاس الطاقة</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Cairo', sans-serif;
            background-image:url('{{ asset("assets/background admin.jpg")  }}');
            background-size: cover;
            background-position: center;
            min-height: 100vh;
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
        .result-table-container {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            padding: 20px;
            margin-top: 120px;
            width: 90%;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(255,255,255,0.2);
            color: black;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            color: black;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.3);
            text-align: center;
        }
        th {
            background-color: rgba(255, 255, 255, 0.2);
        }
        h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4caaaf;
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #3903b7;
        }
    </style>
</head>
<body>
    <!-- الشعارات -->
    <div class="header-logos">
        <img src="{{ asset('assets/logo-right.png') }}" alt="الشعار الأيمن">
        <img src="{{ asset('assets/logo-left.png') }}" alt="الشعار الأيسر">
    </div>

    <!-- جدول النتائج -->
    <div class="result-table-container">
        <h3>نتائج الشركة: {{ $subscription->company_name }}</h3>
        <table>
            <thead>
                <tr>
                    <th>رقم العداد</th>
                    <th>رقم الاشتراك</th>
                    <th>التاريخ</th>
                    <th>Final 180</th>
                    <th>Final 280</th>
                    <th>Amount Due</th>
                </tr>
            </thead>
            <tbody>
                            @forelse($subscription->meterInputs as $input)
    <tr>
        <td>{{ $input->id }}</td> <!-- رقم العداد -->
        <td>{{ $input->subscription_id }}</td> <!-- رقم الفوترة -->
        <td>{{ $input->reading_date }}</td> <!-- التاريخ قراءة العداد -->
        <td>{{ $input->result->final_180 ?? 'لا يوجد' }}</td> <!-- Final 180 -->
        <td>{{ $input->result->final_280 ?? 'لا يوجد' }}</td> <!-- Final 280 -->
        <td>{{ $input->result->amount_due ?? 'لا يوجد' }}</td> <!-- Amount Due -->
    </tr>
@empty
    <tr>
        <td colspan="6">لا توجد عدادات مرتبطة بهذا الاشتراك.</td>
    </tr>
@endforelse
            </tbody>
        </table>
    </div>

    <!-- زر الرجوع -->
    <button class="back-button" onclick="history.back()">رجوع</button>
</body>
</html>