@extends('layout.admin')

@section('content')
<main>
    <div class="container-fluid disable-text-selection">
        

        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card" style="overflow: auto">
                <div class="card-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <h1>الكوبونات</h1>
                        </div>
        
                        <div class="separator mb-5"></div>
                    </div>
                    <form method="POST" action="{{URL('/create-cobon')}}">
                        @csrf
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>الكوبون</label>
                                <input name="symbol" required id="Name" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>نسبة الخصم</label>
                                <input name="persent" required id="Name" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="tooltip-label-right">
                            <div class="error-l-100 position-relative form-group">
                                <label>عدد مرات الاستخدام</label>
                                <input name="uses" required id="Name" type="number" class="form-control">
                            </div>
                        </div>
                        <button class="btn btn-primary mt-5" type="submit">تاكيد</button>
                    </form>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">الكود</th>
                            <th scope="col" class="text-center">النسبة</th>
                            <th scope="col" class="text-center">عدد مرات الاستخدام</th>
                            <th scope="col" class="text-center">عرض المستخدمين</th>
                            <th scope="col" class="text-center">حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr>
                                <td class="text-center">{{$data->symbol}}</td>
                                <td class="text-center">{{$data->persent}}</td>
                                <td class="text-center">{{$data->uses}}</td>
                                <td class="text-center"><a href="{{URL('/get-data-cobon-'.$data->id)}}" class="btn btn-sm btn-outline-primary">عرض</a></td>
                                <td class="text-center"><a href="{{URL('/delete-cobon-'.$data->id)}}" class="btn btn-sm btn-outline-danger">حذف</a></td>
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
