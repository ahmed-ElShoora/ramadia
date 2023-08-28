@extends('layout.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة المشتركين</h1>
                        <a href="{{URL('/export-'.$id)}}" class="btn btn-sm btn-outline-danger">استخراج</a>

                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card" style="overflow: auto">
                    <div class="card-body">
                        <form method="POST" action="{{URL('/events-subscripe-filter')}}">
                            @csrf
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الاسم</label>
                                    <input hidden name="id" value="{{$id}}">
                                    <input name="name" id="Name" type="text" class="form-control">
                                </div>
                            </div>
                            <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
                        </form>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">اسم الفعالية</th>
                                <th scope="col" class="text-center">الاسم</th>
                                <th scope="col" class="text-center">رقم الهاتف</th>
                                <th scope="col" class="text-center">البريد الاكتروني</th>
                                <th scope="col" class="text-center">الدرجة التي اختارها</th>
                                <th scope="col" class="text-center">العمر</th>
                                <th scope="col" class="text-center">المدينة</th>
                                <th scope="col" class="text-center">الموهبة لو كانت موجوده</th>
                                <th scope="col" class="text-center">عدد الاطفال</th>
                                <th scope="col" class="text-center">عدد الافراد</th>
                                <th scope="col" class="text-center">تحضير</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($datas as $data)
                                <tr>
                                    <td class="text-center">{{$data->name_event}}</td>
                                    <td class="text-center">{{$data->name}}</td>
                                    <td class="text-center">{{$data->phone}}</td>
                                    <td class="text-center">{{$data->email}}</td>
                                    <td class="text-center">{{$data->type}}</td>
                                    <td class="text-center">{{$data->age}}</td>
                                    <td class="text-center">{{$data->town}}</td>
                                    <td class="text-center">{{$data->note}}</td>
                                    <td class="text-center">{{$data->baby_num}}</td>
                                    <td class="text-center">{{$data->num_person}}</td>
                                    <td class="text-center">
                                        @if($data->status)
                                            تم تحضيرة من قبل
                                        @else
                                            <a href="{{URL('/move-status-'.$data->id)}}" class="btn btn-sm btn-outline-danger">تحضير</a>
                                        @endif
                                    </td>
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
