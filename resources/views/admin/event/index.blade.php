@extends('layout.admin')

@section('content')
    <main>
        <div class="container-fluid disable-text-selection">
            <div class="row">
                <div class="col-12">
                    <div class="mb-2">
                        <h1>قائمة الفعليات</h1>
                        <div class="top-right-button-container">
                                    <a href="{{URL('/events-create')}}" class="btn btn-primary btn-lg top-right-button mr-1">انشاء فعالية جديده</a>
                        </div>
                    </div>

                    <div class="separator mb-5"></div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card" style="overflow: auto">
                    <div class="card-body">
                        <form method="POST" action="{{URL('/events-filter')}}">
                            @csrf
                            <div class="tooltip-label-right">
                                <div class="error-l-100 position-relative form-group">
                                    <label>الاسم</label>
                                    <input name="name" id="Name" type="text" class="form-control">
                                </div>
                            </div>
                            <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
                        </form>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col" class="text-center">اسم الفعالية</th>
                                <th scope="col" class="text-center">تاريخ بدأ الفعالية</th>
                                <th scope="col" class="text-center">تاريخ انتهاء الفعالية</th>
                                <th scope="col" class="text-center">تعديل</th>
                                <th scope="col" class="text-center">المشتركين</th>
                                <th scope="col" class="text-center">المراقبين</th>
                                <th scope="col" class="text-center">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td class="text-center">{{$event->title_ar}}</td>
                                    <td class="text-center">{{$event->start_date}}</td>
                                    <td class="text-center">{{$event->end_date}}</td>
                                    <td class="text-center"><a href="{{URL('/events-edit-'.$event->id)}}" class="btn btn-sm btn-outline-primary">تعديل</a></td>
                                    <td class="text-center"><a href="{{URL('/events-subscripe-'.$event->id)}}" class="btn btn-sm btn-outline-primary">عرض</a></td>
                                    <td class="text-center"><a href="{{URL('/qr-perosn-'.$event->id)}}" class="btn btn-sm btn-outline-primary">المراقبين</a></td>

                                    <td class="text-center"><a href="{{URL('/events-delete-'.$event->id)}}" class="btn btn-sm btn-outline-danger">حذف</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>{{$events->links()}}</tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </main>
@endsection
