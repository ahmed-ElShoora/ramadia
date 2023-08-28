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
    <div style="display: none" id="pri_ar">
        {!!$data_ar!!}
    </div>
    <div style="display: none" id="pri_en">
        {!!$data_en!!}
    </div>
    <!-- Start Landing  -->
    <div class="landing" style="
    height: 100vh;
">
        <div class="msg"></div>
        <div class="privacy" style="
    padding-bottom: 30px;
    height: 70%;
">
            <div class="container" style="height: 100%;">
                <div class="content">
                    <div class="privacy_info" style="padding:0 30px;height: 100%;overflow: auto;">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Landing  -->
    <!-- Main Template JS File -->
    <script src="{{asset('/web/javascript/app.js')}}"></script>
    <!-- Swiper JS -->
    <script src="{{asset('/web/javascript/swiper-bundle.esm.browser.min.js')}}"></script>
    <script>
        let privacy = document.querySelector(".privacy .content .privacy_info")
        let privacy_ar = document.querySelector("#pri_ar")
        let privacy_en = document.querySelector("#pri_en")
        if(lang == "ar"){
            privacy.innerHTML =  privacy_ar.innerHTML
        }else{
            privacy.innerHTML =  privacy_en.innerHTML
        }
           

    </script>
</body>
</html>