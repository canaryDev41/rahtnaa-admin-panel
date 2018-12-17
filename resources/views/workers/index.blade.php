@extends('partials.master')

@section('search-mobile')
    <form class="mt-4 mb-3 d-md-none" action="{{ route('workers.index')  }}" method="GET">
        <div class="input-group input-group-rounded input-group-merge">
            <input class="form-control" placeholder="ابحث" type="text" value="{{ request('search') }}"
                   name="search">
            <div class="input-group-prepend">
                <div class="btn btn-sm">
                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </form>
@stop

@section('search-form')
    <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto"
          action="{{ route('workers.index')  }}" method="GET">
        <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                </div>
                <input class="form-control" placeholder="ابحث" type="text" value="{{ request('search') }}"
                       name="search">
            </div>
        </div>
    </form>
@stop

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
                    <a type="button" class="btn btn-block btn-info" href="{{ route('workers.create') }}">
                        إضافة عامله جديدة
                    </a>
                </div>
            </div>
        </div>
    </div>

    <workers inline-template :initial-workers='{{$workers->toJson()}}'>
        <div class="container-fluid mt--7">

        <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row">
                                <div class="col col-md-8">
                                    <span class="title">إداره العاملات</span>
                                </div>

                                <div class="col col-md-4">
                                    <ul class="list-inline small">
                                        <li class="list-inline-item"><i style="color: #333" class="fa fa-circle"></i>
                                            <a href="{{ route('workers.index') }}">الكل</a>
                                        </li>

                                        <li class="list-inline-item"><i style="color: #057841" class="fa fa-chart-line"></i>
                                            <a href="{{ route('workers.index', ['orders' => 'max']) }}">صاحبة اكثر طلبات</a>
                                        </li>
                                        <li class="list-inline-item"><i style="color: #dbb43a" class="fa fa-chart-line"></i>
                                            <a href="{{ route('workers.index', ['orders' => 'min']) }}"> صاحبة اقل طلبات</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">الاسم</th>
                                    <th scope="col">رقم الجوال</th>
                                    <th scope="col">المدينه</th>
                                    <th scope="col">الطلبات</th>
                                    <th scope="col">تاريخ التسجيل</th>
                                    <th scope="col">الضبط</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(worker,key) in workers">
                                    <td scope="row">
                                        <div class="media align-items-center">
                                            <a href="#" class="avatar rounded-circle">
                                                <img alt=""
                                                     v-bind:src="'http://rahtnaa-sd.com:8000/v2/uploads/' + worker.image">
                                            </a>
                                            <div class="media-body mr-2">
                                                <span class="mb-0 text-sm" v-text="worker.name"></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td v-text="worker.phone"></td>
                                    <td v-text="worker.city.name"></td>
                                    <td v-text="worker.orders.length"></td>
                                    <td v-text="worker.created_at"></td>
                                    <td>
                                        <a @click="show(worker)"
                                           class="btn btn-default btn-sm text-white"><i
                                                    class="fa fa-expand-arrows-alt"></i>
                                        </a>

                                        <a @click="toggleActivation(worker)"
                                           class="btn text-white btn-sm mr-0"
                                           :class="worker.status ? 'btn-warning' : 'btn-success' ">

                                            <i class="fa fa-ban" v-if="worker.status"></i>
                                            <i class="fa fa-check" v-else></i>
                                            <span v-text="worker.status ? 'تعطيل' : 'تفعيل' "></span>

                                        </a>

                                        <a @click="confirm(worker)" class="btn btn-danger btn-sm text-white"> <i
                                                    class="fa fa-trash"></i> </a>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                {{  $workers->appends($_GET)->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </workers>
@endsection