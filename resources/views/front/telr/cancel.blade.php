<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ramadia">
    <link rel="icon" type="image/x-icon" href="{{asset('/web/images/icon.ico')}}">
    <title>Ramadia</title>
    <!-- Main Css File -->
    <link rel="stylesheet" href="{{asset('/web/css/main.css')}}">
    <!-- Footer Css File -->
    <link rel="stylesheet" href="{{asset('/web/css/footer.css')}}">
    <!-- Render All Elements Normally -->
    <link rel="stylesheet" href="{{asset('/web/css/normalize.css')}}">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="{{asset('/web/css/all.min.css')}}">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{asset('/web/css/swiper-bundle.min.css')}}"/>
    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Start Header   -->
    <div class="header">
        <div class="container">
            <div class="links">
                <div class="icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="mobile">
                    <div class="header-mobile">
                        <span class="close-mob"><i class="fa-sharp fa-solid fa-arrow-right-long"></i></span>
                    </div>
                    <ul class="links-header-mob"></ul>
                </div>
                <ul class="links-header"></ul>
            </div>
        </div>
    </div>
    <!-- End Header  -->
    <!-- Start Landing  -->
    <div class="landing">
        <div class="container" style="

    display: flex;
    justify-content: center;
    height: 100vh;
    align-items: flex-start;
    padding-top: 120px;

    ">
            <div class="message" style="
            color: #000;
            padding: 20px;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 1px;
            background: #bcbebf;
            border-radius: 15px;
            border: 1px solid #6b6363;
        ">
                <p id="text_alert"></p>
            </div>
        </div>
    </div>
    <!-- End Landing  -->
    <!-- Main Template JS File -->
    <script src="{{asset('/web/javascript/app.js')}}"></script>
    <!-- Swiper JS -->
    <script src="{{asset('/web/javascript/swiper-bundle.esm.browser.min.js')}}"></script>
    <script>
        let textAlert = document.querySelector("#text_alert")
        textAlert.textContent = `${lang == "ar"? "تم الغاء عملية الدفع":"Payment Canceled"}`
    </script>
</body>
</html>