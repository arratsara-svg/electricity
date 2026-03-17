<!DOCTYPE html>
<html lang="ar">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>إدخال بيانات الاشتراك</title>

<style>
    body {
        background: url('/assets/bg.png') no-repeat center center fixed;
        background-size: cover;
        font-family: Tahoma, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .form-box {
        width: 380px;
        background: rgba(255,255,255,0.15);
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.5);
        backdrop-filter: blur(10px);
        color: white;
        text-align: center;
    }

    input, button, .btn-link {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border-radius: 6px;
    }

    input {
        border: 1px solid rgba(255,255,255,0.5);
        background: rgba(255,255,255,0.3);
        color: white;
    }

    button, .btn-link {
        border: none;
        background: rgba(11,116,225,0.8);
        color: white;
        cursor: pointer;
        display: block;
        text-align: center;
        text-decoration: none;
    }

    button:hover, .btn-link:hover {
        background: rgba(9,91,176,0.8);
    }
</style>

</head>
<body>

<div class="form-box">

<h2>إدخال بيانات الاشتراك</h2>

<form id="mainForm" action="{{ route('save-180') }}" method="POST">
    @csrf

    <input type="number" name="subscription_id" value="{{ $subscription_id }}" readonly>

    <input type="number" id="input180" name="new_180" placeholder="ادخل قراءة 180">
    
    <input type="date" id="inputDate" name="date_input">

    <!-- حفظ القراءة -->
    <button type="submit" onclick="return validateSave()" name="action" value="save">
        حفظ القراءة
    </button>

    <!-- فواتير سابقة -->
    <a class="btn-link" href="{{ route('old-bills', ['subscription_id' => $subscription_id]) }}">
        فواتير سابقة
    </a>

    <!-- تسجيل خروج / رجوع للخلف -->
<button  type="button" class="back-button" onclick="window.location='{{ route('invoice') }}'">
    تسجيل خروج
</button>
</form>

</div>

<script>
function validateSave() {
    let reading = document.getElementById('input180').value;
    let date = document.getElementById('inputDate').value;

    if (reading === "" || date === "") {
        alert("الرجاء إدخال قراءة 180 والتاريخ قبل الحفظ.");
        return false; 
    }
    return true; 
}
</script>

</body>
</html>