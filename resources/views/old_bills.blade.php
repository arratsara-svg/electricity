<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<title>فواتير سابقة</title>

<style>
    body {
        background: url('/assets/77.jpg') no-repeat center center fixed;
        background-size: cover;
        font-family: Tahoma, sans-serif;
        padding: 40px;
        direction: rtl;
        text-align: center;
        margin: 0;
    }

    .table-box {
        width: 80%;
        margin: auto;
        padding: 25px;
        border-radius: 15px;

        /* الشفافية + البلور */
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);

        /* ظل خفيف */
        box-shadow: 0 0 20px rgba(0,0,0,0.5);
        color: white;
    }

    h2 {
        margin-bottom: 20px;
        color: #ffffff;
        text-shadow: 0 0 5px #000;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        background: rgba(255,255,255,0.1);
        border-radius: 10px;
        overflow: hidden;
        color: #fff;
    }

    table th, table td {
        padding: 15px;
        border-bottom: 1px solid rgba(255,255,255,0.3);
        font-size: 15px;
    }

    table th {
        background: rgba(11,116,225,0.8);
        color: white;
    }

    tr:hover {
        background: rgba(255,255,255,0.2);
    }

    .back-btn {
        margin-top: 25px;
        display: inline-block;
        padding: 10px 20px;
        background: rgba(11,116,225,0.9);
        color: white;
        border-radius: 6px;
        text-decoration: none;
        text-shadow: 0 0 5px black;
    }

    .back-btn:hover {
        background: rgba(9,91,176,0.9);
    }

</style>

</head>
<body>

<div class="table-box">

    <h2>جميع الفواتير السابقة للمستخدم</h2>

    @if($bills->count() > 0)

    <table>
        <tr>
            <th>#</th>
            <th>التاريخ</th>
            <th>القراءة القديمة</th>
            <th>القراءة الجديدة</th>
            <th>الفرق</th>
            <th>المبلغ المستحق (ل.س)</th>
        </tr>

        @foreach($bills as $index => $bill)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $bill->date }}</td>
            <td>{{ $bill->old_180 }}</td>
            <td>{{ $bill->new_180 }}</td>
            <td>{{ $bill->new_180 - $bill->old_180 }}</td>
            <td>{{ number_format($bill->amount_due) }}</td>
        </tr>
        @endforeach

    </table>

    @else

        <p style="color: white; font-size: 18px;">لا توجد فواتير سابقة لهذا المستخدم.</p>

    @endif

    <a class="back-btn" href="/home1">رجوع للصفحة الرئيسية</a>

</div>

</body>
</html>