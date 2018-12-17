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
                    <h3 class="display-2 text-white">إضافة عامله جديده</h3>
                    <p class="text-white mt-0 mb-5"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">

        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">الملف الشخصي</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    @if (isset($errors) && $errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('workers.store') }}" method="post">
                        @csrf
                        <h6 class="heading-small text-muted mb-4"></h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">الاسم</label>
                                        <input type="text" id="input-username"
                                               required
                                               class="form-control form-control-alternative" name="name">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">رقم الجوال</label>
                                        <input type="text" maxlength="10" id="input-first-name"
                                               name="phone"
                                               required
                                               class="form-control form-control-alternative">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="cities">المدينه</label>
                                        <select name="city_id" required class="form-control form-control-alternative"
                                                id="cities">
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="cities">حالة الحساب</label>
                                        <div class="form-check">
                                            <label for="active">
                                                <input type="radio" checked id="active" name="status" value="1">
                                                فعال
                                            </label>
                                        </div>

                                        <div class="form-check">
                                            <label for="inactive">
                                                <input type="radio" id="inactive" name="status" value="0">
                                                غير فعال
                                            </label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="cities">الوظائف</label>
                                        @foreach($jobs as $key => $job)
                                            <div class="form-check">
                                                <label for="{{ $job->id }}">
                                                    <input class="inline" type="checkbox" id="{{ $job->id }}" name="jobs[]" value="{{ $job->id }}">
                                                    {{ $job->category->name }} > {{ $job->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <input type="submit" value="حفظ" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
@endsection