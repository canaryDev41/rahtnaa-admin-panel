@extends('partials.master')

@section('body')

    <users inline-template :initial-users='{{$users->toJson()}}'>

        <div>
            <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
                 style="min-height: 300px;">
                <!-- Mask -->
                <span class="mask bg-gradient-default opacity-8"></span>
                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center">
                    <div class="row">
                        <div class="col-lg-12 col-md-10">
                            <h1 class="text-white">واجهة إدراه المستخدمين</h1>
                            <p class="text-white mt-0 mb-5">من هذه الواجهة يمكنك إدراه جميع المستخدمين</p>
                            {{--<a class="btn btn-block btn-info">--}}
                                {{--إضافة مستخدمه جديدة--}}
                            {{--</a>--}}
                        </div>
                    </div>
                </div>
            </div>

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
            {{--<input class="form-control" placeholder="الأسم الكامل" type="text" required>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="form-group">--}}
            {{--<div class="input-group input-group-alternative">--}}
            {{--<div class="input-group-prepend">--}}
            {{--<span class="input-group-text"><i--}}
            {{--class="fa fa-phone"></i></span>--}}
            {{--</div>--}}
            {{--<input class="form-control" placeholder="رقم الجوال" type="number" required>--}}
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
            {{--<input class="form-control" placeholder="البريد الإلكتروني" type="email" required>--}}
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
                                <h3 class="mb-0">إداره المستخدمات</h3>
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
                                    <tr v-for="(user,key) in users">
                                        <td scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle">
                                                    <img alt=""
                                                         v-bind:src="'http://rahtnaa-sd.com:8000/v2/uploads/' + user.image">
                                                </a>
                                                <div class="media-body mr-2">
                                                    <span class="mb-0 text-sm" v-text="user.name"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td v-text="user.phone"></td>
                                        <td v-text="user.city.name"></td>
                                        <td v-text="user.created_at"></td>
                                        <td>
                                            <a @click="show(user)"
                                               class="btn btn-default btn-sm text-white"><i
                                                        class="fa fa-expand-arrows-alt"></i>
                                            </a>

                                            <a @click="toggleActivation(user)"
                                               class="btn text-white btn-sm mr-0"
                                               :class="user.status ? 'btn-warning' : 'btn-success' ">

                                                <i class="fa fa-ban" v-if="user.status"></i>
                                                <i class="fa fa-check" v-else></i>
                                                <span v-text="user.status ? 'تعطيل' : 'تفعيل' "></span>

                                            </a>


                                            <a @click="confirm(user)" class="btn btn-danger btn-sm text-white"> <i
                                                        class="fa fa-trash"></i> </a>
                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer py-4">
                                <nav aria-label="...">
                                    {{ $users->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </users>
@endsection