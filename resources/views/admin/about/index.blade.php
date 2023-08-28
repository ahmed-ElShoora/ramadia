@extends('layout.admin')

@section('content')
<main>
    <div class="container-fluid disable-text-selection">
        

        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card" style="overflow: auto">
                <div class="card-body">
                    <div class="mb-2">
                        <h1>من نحن</h1>
                        <img src="{{asset('/'.$image)}}" height="100px" width="100px">
                        <form method="POST" enctype="multipart/form-data" action="{{Route('about-us.store')}}">
                            @csrf
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">الصوره </h5>
                                    <input name="old_image" type="text" value="{{$image}}" hidden required>
                                    <input type="file" id="image_phone" name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">النص عربي</h5>
                                    <textarea name="desc_ar" required class="form-control">{{$desc_ar}}</textarea>
                                </div>
                            </div>
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <h5 class="">النص انجليزي</h5>
                                    
                                    <textarea name="desc_en" required class="form-control">{{$desc_en}}</textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
                        </form>
                    </div>
                    <center><a class="btn btn-primary mt-5" href="{{URL('/create-slider')}}">انشاء سلايدر</a></center>
                
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">العنوان</th>
                            <th scope="col" class="text-center">تعديل</th>
                            <th scope="col" class="text-center">حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td class="text-center">{{$data->title_ar}}</td>
                                <td class="text-center"><a href="{{URL('/edite-slider-'.$data->id)}}" class="btn btn-sm btn-outline-primary">تعديل</a></td>
                                <td class="text-center"><a href="{{URL('/delete-slider-'.$data->id)}}" class="btn btn-sm btn-outline-danger">حذف</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>{{$datas->links()}}</tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>



    </div>
</main>
@endsection
