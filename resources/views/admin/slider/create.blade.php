@extends('layout.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">انشاء سلايدر جديد</h5>

                    <div class="card mb-4">
                        <div class="card-body">
                                <form method="POST" action="{{URL('create-slider')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">الصورة</h5>
                                            <input type="file" required id="image_phone" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">العنوان عربي</h5>
                                            <input name="title_ar" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">العنوان انجليزي</h5>
                                            <input name="title_en" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">النص عربي</h5>
                                            <input name="desc_ar" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">النص انجليزي</h5>
                                            <input name="desc_en" class="form-control">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
