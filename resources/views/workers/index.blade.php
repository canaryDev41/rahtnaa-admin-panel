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
                    <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#modal-form">
                        إضافة عامله جديدة
                    </button>
                </div>
            </div>
        </div>
    </div>

    <workers inline-template :initial-workers='{{$workers->toJson()}}'>
        <div class="container-fluid mt--7">

        {{-- TODO --}}
        {{--add new worker modal--}}
        {{--<div class="row">--}}
        {{--<div class="col-md-4">--}}

        {{--<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form"--}}
        {{--aria-hidden="true">--}}
        {{--<div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">--}}
        {{--<div class="modal-content">--}}

        {{--<div class="modal-body p-0">--}}


        {{--<div class="card bg-secondary shadow border-0">--}}
        {{--<div class="card-header bg-white pb-5">--}}
        {{--<div class="text-muted text-center mb-3">--}}
        {{--<small>إضافة عامله جديده</small>--}}
        {{--</div>--}}
        {{--<div class="btn-wrapper text-center">--}}
        {{--<small>الصوره الشخصيه:--}}
        {{--<input type="file" class="btn btn-neutral btn-icon"--}}
        {{--placeholder="الصوره الشخصيه">--}}
        {{--</small>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="card-body px-lg-5 py-lg-5">--}}
        {{--<div class="text-center text-muted mb-4">--}}
        {{--<small>البيانات الأساسيه</small>--}}
        {{--</div>--}}
        {{--<form role="form">--}}
        {{--<div class="form-group mb-3">--}}
        {{--<div class="input-group input-group-alternative">--}}
        {{--<div class="input-group-prepend">--}}
        {{--<span class="input-group-text"><i class="fa fa-user-alt"></i></span>--}}
        {{--</div>--}}
        {{--<input class="form-control" placeholder="الأسم الكامل" type="text" v-model="name" required>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--<div class="input-group input-group-alternative">--}}
        {{--<div class="input-group-prepend">--}}
        {{--<span class="input-group-text"><i--}}
        {{--class="fa fa-phone"></i></span>--}}
        {{--</div>--}}
        {{--<input class="form-control" placeholder="رقم الجوال" v-model="phone" type="number" required>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--<div class="input-group input-group-alternative">--}}
        {{--<div class="input-group-prepend">--}}
        {{--<span class="input-group-text"><i--}}
        {{--class="ni ni-email-83"></i></span>--}}
        {{--</div>--}}
        {{--<select class="form-control form-control-alternative" name="city_id" id="">--}}
        {{--<option value="">المدينه ...</option>--}}
        {{--<option value="">الخرطوم</option>--}}
        {{--<option value="">بحري</option>--}}
        {{--<option value="">امدرمان</option>--}}
        {{--</select>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="form-group">--}}
        {{--<div class="input-group input-group-alternative">--}}
        {{--<div class="input-group-prepend">--}}
        {{--<span class="input-group-text"><i--}}
        {{--class="ni ni-email-83"></i></span>--}}
        {{--</div>--}}
        {{--<input class="form-control" placeholder="البريد الإلكتروني" v-model="email" type="email" required>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="text-center">--}}
        {{--<button type="button" class="btn btn-success my-4">حفظ !</button>--}}
        {{--</div>--}}
        {{--</form>--}}
        {{--</div>--}}
        {{--</div>--}}


        {{--</div>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}


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
                                {{ $workers->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </workers>
@endsection