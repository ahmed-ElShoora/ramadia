@extends('layout.admin')

@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <h5 class="mb-4">الاعدادات</h5>

                    <div class="card mb-4">
                        <div class="card-body">
                                <form method="POST" action="{{Route('setting.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">اللوجو</h5>
                                            <input name="old_logo" type="text" value="{{$data_logo}}" hidden required>
                                            <input type="file" id="image_phone" name="logo" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">اللوجو فالهيدر</h5>
                                            <input name="old_logo_nav" type="text" value="{{$data_logo_nav}}" hidden required>
                                            <input type="file" id="image_phone" name="logo_nav" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">رقم الهاتف</h5>
                                            <input name="phone" required value="{{$phone}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">ايميل</h5>
                                            <input name="email" required value="{{$email}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">تويتر</h5>
                                            <input name="twiter" type="url" required value="{{$twiter}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">فيسبوك</h5>
                                            <input name="facebook" type="url" required value="{{$facebook}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">انستجرام</h5>
                                            <input name="instagram" type="url" required value="{{$instagram}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">سناب شات</h5>
                                            <input name="snapchat" type="url" required value="{{$snapchat}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">تيك توك</h5>
                                            <input name="tiktok" type="url" required value="{{$tiktok}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">سياسة الخصوصية بالعربي</h5>
                                            <textarea id="summernote" name="privacy_ar" required class="form-control">{{$privacy_ar}}</textarea>
                                        </div>
                                    </div>
                                    <div class="tooltip-label-right">
                                        <div class="error-l-100 position-relative form-group">
                                            <h5 class="">سياسة الخصوصية بالانجليزي</h5>
                                            <textarea id="summernote2" name="privacy_en" required class="form-control">{{$privacy_en}}</textarea>
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

@section('script')


    <script>
      $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
      $('#summernote2').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>

@endsection
