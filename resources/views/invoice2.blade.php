<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>معرض الصور</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body {
            background: #EEE9DD; /* لون الخلفية المطلوب */
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: "Tajawal", Arial, sans-serif;
        }

        /* الحاوية بدون أي إطار أو خلفية */
        .carousel-wrapper {
            width: 100%;
            height: 90vh;
            max-width: 1024px;
            max-height: 1280px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
        }

        .carousel-item img {
            max-width: 100%;
            max-height: 90vh;
            object-fit: contain;
            display: block;
            margin: auto;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0,0,0,0.55);
            padding: 20px;
            border-radius: 50%;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 80px;
        }

        /* زر الرجوع الأخضر */
        .back-button {
            margin-top: 20px;
            padding: 10px 28px;
            border: none;
            border-radius: 10px;
            background-color: #2e7d32;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        .back-button:hover {
            background-color: #1b5e20;
            transform: scale(1.05);
        }

    </style>
</head>
<body>

    <div class="carousel-wrapper">

        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="{{ asset('assets/invoice1.jpg') }}" alt="pic1">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('assets/invoice2.jpg') }}" alt="pic2">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('assets/invoice3.jpg') }}" alt="pic3">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('assets/invoice4.jpg') }}" alt="pic4">
                </div>

                <div class="carousel-item">
                    <img src="{{ asset('assets/invoice5.jpg') }}" alt="pic5">
                </div>
                
                <div class="carousel-item">
                    <img src="{{ asset('assets/invoice6.jpg') }}" alt="pic6">
                </div>

            </div>

            <!-- الأسهم -->
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

    </div>

    <button type="button" class="back-button" onclick="window.location='{{ route('welcome') }}'">
        رجوع
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>