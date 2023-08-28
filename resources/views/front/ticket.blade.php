<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Ramadia">
    <link rel="icon" type="image/x-icon" href="{{asset('/web/images/icon.ico')}}">
    <title>Ramadia</title>
    <!-- Main Css File -->
    <link rel="stylesheet" href="{{asset('/web/css/main.css')}}">
    <!-- ticket Css File -->
    <link rel="stylesheet" href="{{asset('/web/css/ticket.css')}}">
    <!-- Render All Elements Normally -->
    <link rel="stylesheet" href="{{asset('/web/css/normalize.css')}}">
    <!-- Font Awesome Library -->
    <link rel="stylesheet" href="{{asset('/web/css/all.min.css')}}">
    <!-- Google Fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Start Ticket  -->
    <div class="ticket" data-url="{{asset('/qr-'.$data->id)}}">
        <div class="container">
            <div class="content">
                <div class="head col2">
                    <img src="{{asset('/web/images/logo-mob.png')}}" alt="">
                    <p>تذكرة رقم <span>{{$data->id}}</span> Ticket number</p>
                </div>
                <div class="cont col2">
                    <div class="qr"></div>
                    <div class="info ">
                        <p class="name">{{$data->name}}</p>
                        <p id="date">{{Carbon\Carbon::parse($data->created_at)->addHour(3)}}</p>
                        <p>${{$data->price}}</p>
                        <p>{{$data_event->title_ar}}</p>
                        <p>{{$data_event->title_en}}</p>
                        <div style="display: flex; width: 100%; padding: 10px; flex-wrap: wrap; grid-column: span 3; border-top: 1px solid #707070; ">
                            @if($data->group)
                            <div style="padding-bottom:5px;border-bottom:1px solid #707070;width: 100%;display: flex;align-items: center; justify-content: space-between;">
                                <span>عدد الافراد</span>
                                <span>{{$data->num_person}}</span>
                                <span>Number of people</span>
                            </div>
                            @endif
                            <div style="padding:5px 0;width: 100%;display: flex;align-items: center; justify-content: space-between;">
                                <span>عدد الاطفال</span>
                                <span>{{$data->baby_num}}</span>
                                <span>Number of children</span>
                            </div>
                        </div>
                        
                        <p class="domain"><a href="{{$data_event->locate}}">Go to event location </a></p>
                    </div>
                </div> 
                <div class="button col2">
                    <button onclick="printFile()">تحميل التذكرة / Download ticket</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Ticket  -->
    <!-- QR JS File -->
    <script src="{{asset('/web/javascript/qrcode.min.js')}}"></script>
    <script>
    let url = document.querySelector(".ticket").dataset.url
    let qr = document.querySelector(".qr")
    var qrcode = new QRCode(qr, {
    text: "{{asset('/qr-'.$data->id)}}",
    width: 80,
    height: 80,
    colorDark : "#000000",
    colorLight : "#ffffff",
    correctLevel : QRCode.CorrectLevel.H
    });
    function printFile(){
        print()
    }
    </script>
</body>
</html>