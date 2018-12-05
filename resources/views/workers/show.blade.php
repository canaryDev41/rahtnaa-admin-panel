@extends('partials.master')

@section('body')

    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h3 class="display-2 text-white">الملف الشخصي</h3>
                    <p class="text-white mt-0 mb-5">{{ $worker->name }}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="http://rahtnaa-sd.com:8000/v2/uploads/{{ $worker->image }}" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="" class="btn btn-sm btn-info mr-4">اثبات الهويه</a>
                            <a href="#" class="btn btn-sm btn-default float-right">رسالة</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading text-center">{{ $worker->jobs->count() }}</span>
                                        <span class="description">الوظائف</span>
                                    </div>
                                    <div>
                                        <span class="heading text-center">{{ $worker->orders->count() }}</span>
                                        <span class="description">الطلبات</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ $worker->name }}
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ $worker->city->name }}
                            </div>
                            <div class="h5 mt-4">
                                <h3>الوظائف</h3>
                                <i class="ni business_briefcase-24 mr-2"></i>
                                <ul class="list-group list-unstyled">
                                    @foreach($worker->jobs as $job)
                                        <li>
                                            <span class="badge badge-pill badge-default">{{ $job->name }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">الملف الشخصي</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('workers.update', $worker) }}" method="post">
                            {{ method_field('put') }}
                            @csrf
                            <h6 class="heading-small text-muted mb-4"></h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">الاسم</label>
                                            <input type="text" id="input-username"
                                                   class="form-control form-control-alternative" name="name"
                                                   value="{{ $worker->name }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">رقم الجوال</label>
                                            <input type="text" id="input-first-name"
                                                   name="phone"
                                                   class="form-control form-control-alternative"
                                                   placeholder="First name" value="{{ $worker->phone }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="cities">المدينه</label>
                                            <select name="city_id" class="form-control form-control-alternative"
                                                    id="cities">
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                            @if($worker->city_id == $city->id) selected @endif >{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="">
                                    <input type="submit" value="تحديث" class="btn btn-success btn-sm">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 order-xl-2 offset-8 mt-3">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <span class="title">اثبات الشخصيه</span>
                        <a class="btn btn-outline-default btn-sm float-left" href="http://rahtnaa-sd.com:8000/v2/uploads/{{ $worker->national_id_image }}" target="_blank">استعراض</a>
                        <img style="width: 100%" src="http://rahtnaa-sd.com:8000/v2/uploads/{{ $worker->national_id_image }}" class="img-thumbnail mt-3" alt="">

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
    </div>

@endsection