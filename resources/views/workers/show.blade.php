@extends('partials.master')
<style type="text/css">
    .gallery {
        -webkit-column-count: 3;
        -moz-column-count: 3;
        column-count: 3;
        -webkit-column-width: 33%;
        -moz-column-width: 33%;
        column-width: 33%;
    }

    .gallery .pics {
        -webkit-transition: all 350ms ease;
        transition: all 350ms ease;
    }

    .gallery .animation {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
    }

    @media (max-width: 450px) {
        .gallery {
            -webkit-column-count: 1;
            -moz-column-count: 1;
            column-count: 1;
            -webkit-column-width: 100%;
            -moz-column-width: 100%;
            column-width: 100%;
        }
    }

    @media (max-width: 400px) {
        .btn.filter {
            padding-left: 1.1rem;
            padding-right: 1.1rem;
        }
    }

    * {
        box-sizing: border-box;
    }

    .container {
        position: relative;
        width: 50%;
        max-width: 300px;
    }

    .image {
        display: block;
        width: 100%;
        height: auto;
    }

    .overlay {
        position: absolute;
        bottom: 0;
        background: rgb(0, 0, 0);
        background: rgba(0, 0, 0, 0.5);
        width: 88%;
        transition: .5s ease;
        opacity: 0;
        color: white;
        font-size: 20px;
        padding: 20px;
        text-align: center;
    }

    .container:hover .overlay {
        opacity: 1;
    }

</style>
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
                                    <img src="http://rahtnaa-sd.com:8000/v2/uploads/{{ $worker->image }}"
                                         class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        {{--<div class="d-flex justify-content-between">--}}
                        {{--<a href="" class="btn btn-sm btn-info mr-4">اثبات الهويه</a>--}}
                        {{--<a href="#" class="btn btn-sm btn-default float-right">رسالة</a>--}}
                        {{--</div>--}}
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
                                        <a class="" href="{{ route('orders.index', ['workerID' => $worker->id]) }}">الطلبات</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="center">
                                <div>
                                    <i class="fa fa-calendar"></i>
                                    <span class="">تاريخ الانضمام</span> :
                                    <span class=""> {{ $worker->created_at }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="h5 mt-4">
                                <h3>الوظائف</h3>
                                <i class="ni business_briefcase-24 mr-2"></i>
                                <ul class="list-group list-unstyled">
                                    @forelse($worker->jobs as $job)
                                        <li>
                                            <span class="badge badge-default">{{ $job->category->name }} <i
                                                        class="fa fa-arrow-left"></i> {{ $job->name }}</span>
                                        </li>
                                    @empty
                                        <p class="alert alert-default mt-3"><i class="fa fa-exclamation"></i> ليس لديها
                                            اي وظيفه حاليا! </p>
                                    @endforelse
                                </ul>
                                <a href="" class="btn btn-default btn-sm" data-toggle="modal"
                                   data-target="#associateJob">توظيف</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="associateJob" tabindex="-1" role="dialog" aria-labelledby="associateJob"
                 aria-hidden="true">
                <form action="{{ route('workers.associateJob', $worker) }}" method="post">
                    {{ csrf_field() }}
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="associateJob">توظيف العامله!</h5>
                            </div>
                            <div class="modal-body">
                                <div class="col-lg-8">
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                <button type="submit" class="btn btn-primary">حفظ !</button>
                            </div>
                        </div>
                    </div>
                </form>
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
                                                   value="{{ $worker->phone }}">
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
        </div>

        <div class="row">
            <div class="col-xl-8 mt-3">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <span class="title">معرض الأعمال</span>

                        <!-- Grid row -->
                        <div class="gallery mt-3" id="gallery">

                        @forelse($galleries as $key => $gallery)
                            <!-- Grid column -->
                                <div class="container">
                                    <img class="image"
                                         src="http://rahtnaa-sd.com:8000/v2/uploads/{{ $gallery->image }}"
                                         alt="...">
                                    <div class="overlay">{{ $gallery->job->name }}</div>
                                </div>
                                <!-- Grid column -->
                            @empty
                                <script>
                                    document.getElementById("gallery").classList.remove("gallery");
                                </script>
                                <p class="alert alert-default mt-3"><i class="fa fa-exclamation"></i> عفوا هذه العامله
                                    لم تضف شيء الى اعمالها بعد!</p>
                            @endforelse

                        </div>
                        <!-- Grid row -->
                    </div>
                </div>
            </div>

            <div class="col-xl-4 mt-3" style="float: left;">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <span class="title">اثبات الشخصيه</span>
                        <a class="btn btn-default btn-sm float-left text-white" data-toggle="modal"
                           data-target="#uploadIdModal">إضافة اثبات شخصيه</a>
                        @if($worker->national_id_image)
                            <a class="btn btn-outline-default btn-sm float-left"
                               href={{ asset($worker->national_image_id) }}
                               target="_blank">استعراض</a>
                        <img src="{{ asset($worker->national_id_image) }}" class="mt-2" width="100%" alt="Generic placeholder image">
                        @else
                            <p class="alert alert-default mt-3"><i class="fa fa-exclamation"></i> عفوا هذه العامله لم
                                تضف اثبات الشخصيه بعد!</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="uploadIdModal" tabindex="-1" role="dialog" aria-labelledby="uploadIdModal"
                 aria-hidden="true">
                <form action="{{ route('workers.upload', $worker) }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="uploadIdModal">اضافة اثبات شخصية</h5>
                            </div>
                            <div class="modal-body">
                                <label for="">
                                    اختر الصورة المطلوب رفعها
                                    <input type="file" required name="national_id_image" class="form-control form-control-alternative mt-1">
                                </label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                                <button type="submit" class="btn btn-primary">حفظ !</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
@endsection