@extends('layout.admin')

@section('content')
<main>
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>التقييمات</h1>
                    <a href="{{URL('/save-data')}}" class="btn btn-sm btn-outline-danger">استخراج</a>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card" style="overflow: auto">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">الاسم</th>
                            <th scope="col" class="text-center">رقم الهاتف</th>
                            <th scope="col" class="text-center">البريد الاكتروني</th>
                            <th scope="col" class="text-center">اسم الحدث</th>
                            <th scope="col" class="text-center">نوع التذكره</th>
                            <th scope="col" class="text-center">الملاحظة</th>
                            
                            <th scope="col" class="text-center">سعر التذكره</th>
                            <th scope="col" class="text-center">تنظيم الحفلة</th>
                            <th scope="col" class="text-center">موقع الحفلة</th>
                            <th scope="col" class="text-center">تنوع الفقرات</th>
                            <th scope="col" class="text-center">الطعام</th>
                            <th scope="col" class="text-center">المنظمين</th>
                            <th scope="col" class="text-center">التقييم العام</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td class="text-center">{{$data->name}}</td>
                                <td class="text-center">{{$data->phone}}</td>
                                <td class="text-center">{{$data->email}}</td>
                                <td class="text-center">{{$data->event_name}}</td>
                                <td class="text-center">{{$data->type_ticket}}</td>
                                <td class="text-center">{{$data->note}}</td>



                                <td class="text-center">
                                    @if($data->ticket_price == '1')
                                    ضعيف
                                    @elseif($data->ticket_price == '2')
                                    متوسط
                                    @else
                                    ممتاز
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($data->organize_event == '1')
                                    ضعيف
                                    @elseif($data->organize_event == '2')
                                    متوسط
                                    @else
                                    ممتاز
                                    @endif
                                    </td>
                                <td class="text-center">
                                    @if($data->locate_event == '1')
                                    ضعيف
                                    @elseif($data->locate_event == '2')
                                    متوسط
                                    @else
                                    ممتاز
                                    @endif
                                    </td>
                                <td class="text-center">
                                    @if($data->Types_para == '1')
                                    ضعيف
                                    @elseif($data->Types_para == '2')
                                    متوسط
                                    @else
                                    ممتاز
                                    @endif
                                    </td>
                                <td class="text-center">
                                    @if($data->food == '1')
                                    ضعيف
                                    @elseif($data->food == '2')
                                    متوسط
                                    @else
                                    ممتاز
                                    @endif
                                    </td>
                                <td class="text-center">
                                    @if($data->organizer_helper == '1')
                                    ضعيف
                                    @elseif($data->organizer_helper == '2')
                                    متوسط
                                    @else
                                    ممتاز
                                    @endif
                                    </td>
                                <td class="text-center">
                                    @if($data->rate == '1')
                                    ضعيف
                                    @elseif($data->rate == '2')
                                    متوسط
                                    @else
                                    ممتاز
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
