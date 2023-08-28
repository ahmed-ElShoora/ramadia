@extends('layout.admin')


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h5 class="mb-4">تعديل حدث جديد</h5>
                    <div class="card mb-4">
                        <div class="card-body">
                        <form method="post" action="{{URL('/events-edit')}}" enctype="multipart/form-data">
                            @csrf
                            <input hidden name="id" value="{{$event->id}}">
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">الصورة الرئيسية</h5>
                                    <input hidden name="old_image" value="{{$event->master_image}}">
                                    <input type="file" id="image_phone" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">الصور فالسلايدر</h5>
                                    <input type="file" multiple="multiple" id="image_phone" name="images[]" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">العنوان عربي</h5>
                                    <input name="title_ar" value="{{$event->title_ar}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">العنوان انجليزي</h5>
                                    <input name="title_en" value="{{$event->title_en}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">النص عربي</h5>
                                    <textarea name="desc_ar" id="summernote" class="form-control" required>{{$event->desc_ar}}</textarea>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">النص انجليزي</h5>
                                    <textarea name="desc_en" id="summernote2" class="form-control" required>{{$event->desc_en}}</textarea>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">لون الخلفية</h5>
                                    <input name="color_background" value="{{$event->color_background}}" type="color" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">لون الزر</h5>
                                    <input name="color_button" value="{{$event->color_button}}" type="color" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">سعر التذكره العادية</h5>
                                    <input name="price_normal" value="{{$event->price_normal}}" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">vip سعر التذكره </h5>
                                    <input name="price_vip" value="{{$event->price_vip}}" type="number" class="form-control" required>
                                </div>
                            </div>




                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">عدد افراد احتساب الجروب</h5>
                                    <input name="groub_num" value="{{$event->groub_num}}" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">سعر التذكره العادية للجروب</h5>
                                    <input name="groub_price_normal" value="{{$event->groub_price_normal}}" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">vip سعر التذكره للجروب</h5>
                                    <input name="groub_price_vip" value="{{$event->groub_price_vip}}" type="number" class="form-control" required>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class=""> سعر التذكرة للاطفال</h5>
                                    <input name="price_baby" value="{{$event->price_baby}}" type="number" class="form-control" required>
                                </div>
                            </div>

                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">عدد مقاعد التذكره العادية</h5>
                                    <input name="chair_normal" value="{{$event->chair_normal}}" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">vipعدد مقاعد التذكره ال</h5>
                                    <input name="chair_vip" value="{{$event->chair_vip}}" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>طريقة ارسال التذاكر</label>
                                    <select name="type_send" required class="form-control">
                                      <option value="phone"
                                      @if($event->phone_send == true && $event->email_send == false)
                                        selected
                                      @endif
                                      >رسالة نصية</option>
                                      <option value="email"
                                      @if($event->phone_send == false && $event->email_send == true)
                                        selected
                                      @endif
                                      >عبر الايميل</option>
                                      <option value="phone_email" 
                                      @if($event->phone_send == true && $event->email_send == true)
                                        selected
                                      @endif
                                      >الاثنين معا</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>هل تود اي تصل التذكره فور الشراء</label>
                                    <select name="send_with_buy" required class="form-control">
                                      <option value="true"
                                      @if($event->send_with_buy == true)
                                        selected
                                      @endif
                                      >نعم</option>
                                      <option value="false"
                                      @if($event->send_with_buy == false)
                                        selected
                                      @endif
                                      >لا</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">موعد ظهور الحدث</h5>
                                    <input name="show_date" value="{{$event->show_date}}" type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">موعد بدأ الحدث</h5>
                                    <input name="start_date" value="{{$event->start_date}}" type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">موعد انتهاء الحدث</h5>
                                    <input name="end_date" value="{{$event->end_date}}" type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">موعد اعادة ارسال التذاكر (يجب اختار الموعد قبل الايفينت ب 24 ساعه بحد اقصي)</h5>
                                    <input name="resend_date" value="{{$event->resend_date}}" type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">رابط الموقع</h5>
                                    <input name="locate" value="{{$event->locate}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>هل تود اي تصل الموقع فور الشراء</label>
                                    <select name="send_locate_with_buy" required class="form-control">
                                        <option value="true"
                                        @if($event->send_locate_with_buy == true)
                                          selected
                                        @endif
                                        >نعم</option>
                                        <option value="false"
                                        @if($event->send_locate_with_buy == false)
                                          selected
                                        @endif
                                        >لا</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">موعد اعادة ارسال الموقع (يجب اختار الموعد قبل الايفينت ب 24 ساعه بحد اقصي)</h5>
                                    <input name="resend_locate_date" value="{{$event->resend_locate_date}}" type="date" class="form-control" required>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>عرض زر الحجز</label>
                                    <select name="hide" required class="form-control">
                                        <option value="1"
                                        @if($event->hide == true)
                                          selected
                                        @endif
                                        >نعم</option>
                                        <option value="0"
                                        @if($event->hide == false)
                                          selected
                                        @endif
                                        >لا</option>
                                    </select>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">الكتابة لو كان الزر في حالة ايقاف</h5>
                                    <h5 class="">عربي</h5>
                                    <input name="text_hide_ar" value="{{$event->text_hide_ar}}" class="form-control">
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">الكتابة لو كان الزر في حالة ايقاف</h5>
                                    <h5 class="">انجليزي</h5>
                                    <input name="text_hide_en" value="{{$event->text_hide_en}}" class="form-control">
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
