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
                    <h1 class="text-white">إدراه المدن</h1>
                    <p class="text-white mt-0 mb-5">من هنا يمكنك إداره جميع المدن</p>
                </div>
            </div>
        </div>
    </div>

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <h3 class="mb-0">إداره المدن</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>عدد العمال</th>
                                    <th>عدد المستخدمين</th>
                                    <th></th>
                                    <th>الضبط</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{ $city->name }}</td>
                                        <td>{{ $city->workers->count() }}</td>
                                        <td>{{ $city->users->count() }}</td>
                                        <td>{{ $city->name }}</td>
                                        <td>
                                            <a href="" class="btn btn-success btn-sm">
                                                <span class="icon-btn"><i class="fa fa-expand"></i></span></a>
                                            <a href="" class="btn btn-default btn-sm">
                                                <span class="icon-btn"><i class="fa fa-edit"></i></span>

                                            </a>
                                            <a class="btn btn-danger btn-sm mr-2 text-white">
                                                <span class="icon-btn"><i class="fa fa-trash"></i> </span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection