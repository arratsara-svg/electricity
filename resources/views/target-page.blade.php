<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>نتيجة قراءة 180</title>

<style>
    body {
        background: url('/assets/33.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: Tahoma, sans-serif;
        margin: 0;
        padding: 50px 0;
        display: flex;
        justify-content: center;
    }

    .table-box {
        width: 450px;
        padding: 25px;
        border-radius: 15px;

        /* الشفافية والبلور */
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(12px);

        box-shadow: 0 4px 25px rgba(0,0,0,0.4);
        text-align: center;
        color: #fff;
    }

    h2 {
        margin-bottom: 20px;
        color: #ffffff;
        text-shadow: 0 0 5px #000;
        font-size: 24px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        background: rgba(255,255,255,0.15);
        border-radius: 10px;
        overflow: hidden;
        color: #fff;
    }

    table th, table td {
        padding: 12px;
        border-bottom: 1px solid rgba(255,255,255,0.3);
    }

    table th {
        background: rgba(11, 116, 225, 0.8);
        color: white;
    }

    table tr:hover {
        background: rgba(255,255,255,0.2);
    }

    .amount {
        font-size: 22px;
        font-weight: bold;
        color: #00ff7f;
        margin-top: 20px;
        text-shadow: 0 0 5px #000;
    }

    .btn {
        display: block;
        margin-top: 25px;
        padding: 12px;
        background: rgba(11,116,225,0.9);
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        text-shadow: 0 0 4px black;
    }

    .btn:hover {
        background: rgba(9,91,176,0.9);
    }
</style>

</head>
<body>

<div class="table-box">

    <h2>تفاصيل قراءة العداد</h2>

    <table>
        <tr>
            <th>رقم الاشتراك</th>
            <td>{{ $subscription_id }}</td>
        </tr>

        <tr>
            <th>القراءة القديمة</th>
            <td>{{ $old_180 }}</td>
        </tr>

        <tr>
            <th>القراءة الجديدة</th>
            <td>{{ $new_180 }}</td>
        </tr>

        <tr>
            <th>الفرق</th>
            <td>{{ $difference }}</td>
        </tr>

        <tr>
            <th>تاريخ القراءة</th>
            <td>{{ $date }}</td>
        </tr>
    </table>

    <div class="amount">
        المبلغ المستحق: {{ number_format($amount_due) }} ل.س
    </div>

    <a href="{{ route('home1') }}" class="btn">رجوع للصفحة الرئيسية</a>

</div>

</body>
</html>