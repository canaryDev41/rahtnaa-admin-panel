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
                    <h1 class="text-white">واجهة إدراه الموظفين</h1>
                    <p class="text-white mt-0 mb-5">من هذه الواجهة يمكنك إدراه جميع الموظفين</p>
                    <a type="button" class="btn btn-block btn-info" href="{{ route('employees.create') }}">
                        إضافة موظف جديد
                    </a>
                </div>
            </div>
        </div>
    </div>
            <div class="container-fluid mt-4">

                <!-- Table -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <div class="row">
                                    <div class="col col-md-8">
                                        <span class="title">إداره الموظفين</span>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">رقم الجوال</th>
                                        <th scope="col">الوظيفة</th>
                                        <th scope="col">الدور</th>
                                        <th scope="col">الضبط</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle">
                                                    <img alt="" src="">
                                                </a>
                                                <div class="media-body mr-2">
                                                    <span class="mb-0 text-sm"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td ></td>
                                        <td ></td>
                                        <td ></td>
                                        <td ></td>
                                        <td>
                                            <a class="btn btn-default btn-sm text-white"><i
                                                        class="fa fa-expand-arrows-alt"></i>
                                            </a>

                                            <a class="btn text-white btn-sm mr-0">

                                                <i class="fa fa-ban"></i>
                                                <i class="fa fa-check"></i>
                                                <span></span>

                                            </a>

                                            <a class="btn btn-danger btn-sm text-white"> <i
                                                        class="fa fa-trash"></i> </a>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer py-4">
                                <nav aria-label="...">
                                    {{--{{  $workers->appends($_GET)->links() }}--}}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection