@extends('layout.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">تعديل سلايدر جديد</h5>

                    <div class="card mb-4">
                        <div class="card-body">
                                <form method="POST" action="{{URL('edite-slider')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input name="id" type="text" value="{{$data->id}}" hidden required>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">الصورة</h5>
                                            <input name="old_image" type="text" value="{{$data->image}}" hidden required>
                                            <input type="file" id="image_phone" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">العنوان عربي</h5>
                                            <input name="title_ar" value="{{$data->title_ar}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">العنوان انجليزي</h5>
                                            <input name="title_en" value="{{$data->title_en}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">النص عربي</h5>
                                            <input name="desc_ar" value="{{$data->desc_ar}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">النص انجليزي</h5>
                                            <input name="desc_en" value="{{$data->desc_en}}" class="form-control">
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
