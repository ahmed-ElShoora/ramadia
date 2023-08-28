
@extends('layout.active')


@section('content')
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <h5 class="mb-4">تحديث حالة</h5>


                    <div class="card mb-4">
                        <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-center">الاسم</th>
                                        <th scope="col" class="text-center">نوع التذكره</th>
                                        <th scope="col" class="text-center">عرض</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($datas as $data)
                                            <tr>
                                                <td class="text-center">{{$data->name}}</td>
                                                <td class="text-center">
                                                    @if($data->type == 'normal')
                                                        Standard
                                                    @else
                                                        {{$data->type}}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                        <a href="{{URL('/qr-'.$data->id)}}" class="btn btn-sm btn-outline-primary">عرض</a>
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
        </div>
    </main>
@endsection
