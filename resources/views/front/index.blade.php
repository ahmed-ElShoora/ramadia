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
        <!-- Start About  -->
        <div class="about" id="home">
            <div class="container">
            </div>
        </div>
        <!-- End About  -->
        <!-- Start Slider  -->
        <div class="slider">
            <div class="container">
                <div class="slider-contact">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper"></div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider  -->
        <!-- Start Events  -->
        <div class="events" id="events">
            <div class="container">
            </div>
        </div>
        <!-- End Events  -->
        <!-- Start Popup  -->
        <div class="popup">
            <div>
            <div class="popup-content"></div>
                
            </div>
        </div>
        <!-- End Popup  -->
        <!-- Start Footer  -->
        <footer>
            <div class="container">
                <div class="social"></div>
                <img src="{{asset('/web/images/footerImg.png')}}" alt="footer">
            </div>
        </footer>
        <!-- End Footer  -->
    </div>
    <div id="hide_token">
        @csrf
    </div>
    <!-- End Landing  -->
    <!-- Main Template JS File -->
    <script src="{{asset('/web/javascript/app.js')}}"></script>
    <!-- Swiper JS -->
    <script src="{{asset('/web/javascript/swiper-bundle.esm.browser.min.js')}}"></script>
    <script>
        
    </script>
</body>
</html>