@extends('layout.admin')

@section('content')
<main>
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <div class="mb-2">
                    <h1>قائمة المشتركين</h1>
                    <a href="{{URL('/cobon-'.$id)}}" class="btn btn-sm btn-outline-danger">استخراج</a>

                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card" style="overflow: auto">
                <div class="card-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <h1>مستخدمي الكوبون</h1>
                        </div>
        
                        <div class="separator mb-5"></div>
                    </div>
                    
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">اسم الايفنت</th>
                            <th scope="col" class="text-center">اسم المستخدم</th>
                            <th scope="col" class="text-center">الايميل</th>
                            <th scope="col" class="text-center">رقم الهاتف</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td class="text-center">{{$data->name_event}}</td>
                                <td class="text-center">{{$data->name}}</td>
                                <td class="text-center">{{$data->email}}</td>
                                <td class="text-center">{{$data->phone}}</td>
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
