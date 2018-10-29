@extends('partials.master')

@section('body')
    <workers inline-template>
        <div>
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
                            <a href="{{ route('workers.create') }}" class="btn btn-xs btn-default right"><i
                                        class="fa fa-plus"></i> اضافة عامل جديد</a>
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
                                            <td>
                                                <div class="avatar-container">
                                                    <avatar inline class="ml-2"
                                                            :size="30"
                                                            src="data:image/png;base64,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"
                                                            alt=""></avatar>
                                                    {{ $worker->name }}
                                                </div>
                                                </td>
                                            <td>{{ $worker->city->name }}</td>
                                            <td>{{ $worker->phone }}</td>
                                            <td>{{ $worker->email }}</td>
                                            <td>{{ $worker->status ? 'فعال' : 'غير فعال' }}</td>
                                            <td>
                                                <a href="{{ route('workers.show', $worker->id) }}"
                                                   class="btn btn-default">استعراض</a>
                                                <a href="{{ route('workers.edit', $worker->id) }}"
                                                   class="btn btn-success">تعديل</a>
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
        </div>
    </workers>    <!-- /.row -->
    <!-- /.row -->

@endsection