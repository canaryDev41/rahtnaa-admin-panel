@extends('partials.master')

@section('body')
    <jobs inline-template>

        <div>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">إدارة الوظائف</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ضبط الوظائف
                            <a href="{{ route('jobs.create') }}" class="btn btn-xs btn-default right"><i
                                        class="fa fa-plus"></i> اضافة وظيفة جديده</a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                    <tr>
                                        <th>الاسم</th>
                                        <th>التصنيف</th>
                                        <th>المهام</th>
                                        <th>العمال</th>
                                        <th>الضبط</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($jobs as $job)
                                        <tr>
                                            <td>{{ $job->name }}</td>
                                            <td>{{ $job->category->name }}</td>
                                            <td>{{ $job->tasks->count() }}</td>
                                            <td>{{ $job->workers->count() }}</td>
                                            <td>
                                                <a href="" class="btn btn-default">استعراض</a>
                                                <a href="" class="btn btn-success">تعديل</a>
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

    </jobs>    <!-- /.row -->
    <!-- /.row -->

@endsection