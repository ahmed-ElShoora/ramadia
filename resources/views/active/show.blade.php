
@extends('layout.active')


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <h5 class="mb-4">تحديث حالة</h5>


                    <div class="card mb-4">
                        <div class="card-body">
                            @if ($status == true)
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-center">الاسم</th>
                                        <th scope="col" class="text-center">نوع التذكره</th>
                                        @if(!$data->group)
                                            <th scope="col" class="text-center">التحضير</th>
                                        @else
                                            <th scope="col" class="text-center">تحضير الكل</th>
                                            <th scope="col" class="text-center">عدد الافراد</th>
                                            <th scope="col" class="text-center">عدد الاطفال</th>
                                            <th scope="col" class="text-center">تحضير</th>
                                        @endif
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">{{$data->name}}</td>
                                            <td class="text-center">
                                                @if($data->type == 'normal')
                                                    Standard
                                                @else
                                                    {{$data->type}}
                                                @endif
                                            </td>
                                            @if(!$data->group)
                                                <td class="text-center">
                                                    @if ($data->status)
                                                        تم تحضير التذكره من قبل
                                                    @else
                                                        <a href="{{URL('/show-data-'.$data->id)}}" class="btn btn-sm btn-outline-danger">تحضير</a>
                                                    @endif
                                                </td>
                                            @else
                                                <td class="text-center">
                                                    @if ($data->status)
                                                        تم تحضير التذكره من قبل
                                                    @else
                                                        <a href="{{URL('/show-data-'.$data->id)}}" class="btn btn-sm btn-outline-danger">تحضير الكل</a>
                                                    @endif
                                                </td>
                                                <form method="post" action="{{URL('/show-data-many')}}">
                                                    @csrf
                                                    <input name="id" value="{{$data->id}}" hidden>
                                                    <td class="text-center"><input type="number" value="0" required min="0" class="form-control" max="{{$data->num_person_del}}" name="person"></td>
                                                    <td class="text-center"><input type="number" value="0" required min="0" class="form-control" max="{{$data->baby_num_del}}" name="baby"></td>
                                                    <td class="text-center">
                                                        @if ($data->status)
                                                        تم تحضير التذكره من قبل
                                                        @else
                                                            <button type="submit" class="btn btn-sm btn-outline-danger">تحضير </button>
                                                        @endif
                                                    </td>
                                                </form>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                هذه التذكره غير تابعه للايفنت الخاص بك
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
