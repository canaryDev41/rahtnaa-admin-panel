@extends('partials.master')

@section('map-section')
{!! $map['js'] !!}
@endsection

@section('body')

    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h3 class="display-2 text-white"> تفاصيل الطلب: #{{ $order->id }}</h3>
                    <p class="small">{{ $order->created_at }}</p>
                    <p class="text-white mt-0 mb-5"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">بيانات الطلب الاساسيه</h3>
                            </div>
                            <div class="col-4">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4"></h6>
                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-3">
                                        <p class="title">الوظيفة</p>
                                        <span class="text-muted">{{ $order->job->name }}</span>
                                    </div>
                                    <div class="col-3">
                                        <p class="title">التكلفة</p>
                                        <span class="text-muted">{{ $order->total }} ج.س</span>
                                    </div>
                                    <div class="col-2">
                                        <p class="title">تاريخ البدايه</p>
                                        <span class="text-muted">{{ $order->start_date }}</span>
                                    </div>
                                    <div class="col-2">
                                        <p class="title">تاريخ النهايه</p>
                                        <span class="text-muted">{{ $order->end_date }}</span>
                                    </div>
                                    <div class="col-2">
                                        <p class="title">الحاله</p>
                                        <span class="text-muted badge badge-info badge-pill text-black-50">{{ $order->status() }}</span>
                                    </div>
                                </div>


                                <hr>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <p class="title">معلومات العميل</p>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="small" for="input-username">اسم
                                                        العميل</label>
                                                    <input type="text" id="input-username"
                                                           class="form-control form-control-alternative" readonly
                                                           value="{{ $order->user->name ?? '---' }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="small">رقم
                                                        الجوال</label>
                                                    <input type="text"
                                                           class="form-control form-control-alternative" readonly
                                                           value="{{ $order->user->phone ?? '---' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="small">المدينه</label>
                                                    <input type="text"
                                                           class="form-control form-control-alternative" readonly
                                                           value="{{ $order->user->city->name ?? '---' }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 border-right">
                                        <p class="title">معلومات العامله</p>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="small" for="input-username">اسم
                                                        العامله</label>
                                                    <input type="text" id="input-username"
                                                           class="form-control form-control-alternative" readonly
                                                           value="{{ $order->worker->name ?? '---' }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="small">رقم
                                                        الجوال</label>
                                                    <input type="text"
                                                           class="form-control form-control-alternative" readonly
                                                           value="{{ $order->worker->phone ?? '---' }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="small" for="">المدينه</label>
                                                    <input type="text"
                                                           class="form-control form-control-alternative" readonly
                                                           value="{{ $order->worker->city->name ?? '---'}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="title">تفاصيل الطلب</p>
                                    </div>
                                    <div class="col-lg-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>المهمه</th>
                                                    <th>الكميه</th>
                                                    <th>السعر</th>
                                                    <th>الوحده</th>
                                                    <th>الاسم</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>{{ $order->tasks[0]->job ?? '--' }}</td>
                                                    <td>{{ $order->tasks[0]->quantity ?? '--' }}</td>
                                                    <td>{{ $order->tasks[0]->price ?? '--' }}</td>
                                                    <td>{{ $order->tasks[0]->measure ?? '--' }}</td>
                                                    <td>{{ $order->tasks[0]->name ?? '--' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <p class="title">متابعه الطلب عبر الخريطه</p>
                                    </div>
                                    <div class="col-lg-12">
                                        {!! $map['html'] !!}
                                        <div id="directionsDiv"></div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
    </div>

@endsection