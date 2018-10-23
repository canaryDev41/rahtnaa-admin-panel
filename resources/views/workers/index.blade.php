@extends('partials.master')

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">إدارة العمال</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ضبط العمال
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>المدينة</th>
                                <th>رقم الهاتف</th>
                                <th>البريد الالكتروني</th>
                                <th>الحاله</th>
                                <th>الضبط</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($workers as $worker)
                                <tr class="">
                                    <td>{{ $worker->user->name }}</td>
                                    <td>{{ $worker->user->city }}</td>
                                    <td>{{ $worker->user->phone }}</td>
                                    <td>{{ $worker->user->email }}</td>
                                    <td>{{ $worker->user->status ? 'فعال' : 'غير فعال' }}</td>
                                    <td>
                                        <a href="{{ route('workers.show', $worker->id) }}" class="btn btn-default">استعراض</a>
                                        <a href="{{ route('workers.edit', $worker->id) }}" class="btn btn-success">تعديل</a>
                                        <a href="" class="btn btn-danger">حذف</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <!-- /.row -->

@endsection