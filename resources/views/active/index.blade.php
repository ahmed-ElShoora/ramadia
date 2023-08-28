@extends('layout.active')


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <h5 class="mb-4">تحديث حالة</h5>

<center><h5 class="mb-4" style="display:block;margin:auto;">{{$name}}</h5></center>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>ID</label>
                                    <input name="id" required id="Name" type="text" class="form-control input-id">
                                </div>
                            </div>
                            <button class="btn btn-primary mt-5 btn-form">تاكيد</button>
                            <hr>
                            <hr>
                            <div id="reader" width="600px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        let btn_zz = document.querySelector(".btn-form");
        btn_zz.addEventListener("click",  _=>{
            let input_zz = document.querySelector(".input-id").value;
            window.location.href = `/qr-${input_zz}`
        })
    </script>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        //console.log(`Code matched = ${decodedText}`, decodedResult);
        window.location.href = `${decodedText}`
        }

        function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: {width: 250, height: 250} },
        /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection
