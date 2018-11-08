@extends('partials.master')

@section('body')

    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
         style="min-height: 300px;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-12 col-md-10">
                    <h1 class="text-white">واجهة إدراه العاملات</h1>
                    <p class="text-white mt-0 mb-5">من هذه الواجهة يمكنك إدراه جميع العاملات</p>
                    <a href="#!" class="btn btn-info">إضافة عامله جديدة</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">إداره العاملات</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">الاسم</th>
                                <th scope="col">رقم الجوال</th>
                                <th scope="col">المدينه</th>
                                <th scope="col">البريد الالكتروني</th>
                                <th scope="col">التقييم</th>
                                <th scope="col">الضبط</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($workers as $worker)
                                <tr>
                                    <td scope="row">
                                        <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle">
                                                <img alt="" src="../assets/img/theme/react.jpg">
                                            </a>
                                            <div class="media-body mr-2">
                                                <span class="mb-0 text-sm">{{ $worker->name }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $worker->phone }}
                                    </td>
                                    <td>
                                        {{ $worker->city->name }}
                                    </td>
                                    <td>
                                        {{ $worker->email }}
                                    </td>
                                    <td>
                                        {{ $worker->rating }}
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-default btn-sm"><i class="fa fa-expand-arrows-alt"></i>  </a>
                                        @if($worker->status)
                                            <a href="" class="btn btn-warning btn-sm mr-0"><i class="fa fa-ban"></i>  تعطيل </a>
                                            @else
                                            <a href="" class="btn btn-success btn-sm">تفعيل</a>
                                            @endif
                                        <a href="" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <ul class="pagination justify-content-end mb-0">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">
                                        <i class="fas fa-angle-left"></i>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-right"></i>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection