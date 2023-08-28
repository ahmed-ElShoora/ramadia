@extends('layout.admin')

@section('content')
<main>
    <div class="container-fluid disable-text-selection">

        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card" style="overflow: auto">
                <div class="card-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <h1>اتصل بنا</h1>
                            <img src="{{asset('/'.$image)}}" height="100px" width="100px">
                            <form method="POST" enctype="multipart/form-data" action="{{Route('contact_us.store')}}">
                                @csrf
                                <div class="tooltip-label-right">
                                    <div class="error-l-100 position-relative form-group">
                                        <h5 class="">الصوره </h5>
                                        <input type="file" id="image_phone" required name="image" accept=".jpg,.jpeg,.png,.gif,.bmp,.tiff">
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
                            </form>
                        </div>
        
                        <div class="separator mb-5"></div>
                    </div>
                    <form method="POST" action="{{URL('/contact-us-filter')}}">
                        @csrf
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الاسم</label>
                                <input name="name" id="Name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>رقم الهاتف</label>
                                <input name="phone" id="Name" type="text" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
                    </form>
                    <br>
                    <div class="col-12">
                        <div class="mb-2">
                            <a href="{{URL('/extraxt-contact')}}" class="btn btn-sm btn-outline-danger">استخراج</a>
                        </div>
                    </div>
                    <br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">الاسم</th>
                            <th scope="col" class="text-center">رقم الهاتف</th>
                            <th scope="col" class="text-center">البريد الاكتروني</th>
                            <th scope="col" class="text-center">الملاحظة</th>
                            <th scope="col" class="text-center">حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td class="text-center">{{$contact->name}}</td>
                                <td class="text-center">{{$contact->phone}}</td>
                                <td class="text-center">{{$contact->email}}</td>
                                <td class="text-center">{{$contact->note}}</td>
                                <td class="text-center"><a href="{{URL('/contact-us-delete-'.$contact->id)}}" class="btn btn-sm btn-outline-danger">حذف</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>{{$contacts->links()}}</tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>



    </div>
</main>
@endsection
