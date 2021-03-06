@extends('partials.master')

@section('map-section')
    {!! $map['js'] !!}
@endsection

@section('body')
        <div>    <!-- Header -->
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
                                            <div class="col-2">
                                                <p class="title">الوظيفة</p>
                                                <span class="text-muted">{{ $order->job->name }}</span>
                                            </div>
                                            <div class="col-2">
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
                                            <div class="col-4">
                                                <p class="title">الحاله</p>

                                                <!-- Small button groups (default and split) -->
                                                <div class="btn-group">
                                                    <button class="btn btn-default btn-sm" type="button">
                                                        {{ $order->status() }}
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a href="{{ route('orders.status', [$order, 1]) }}" class="dropdown-item small">جديد / تحت المعالجه </a>
                                                        <a href="{{ route('orders.status', [$order, 0]) }}" class="dropdown-item small">ملغي</a>

                                                        {{--TODO more and more handel to more and more bugs in code--}}
                                                        @if($order->status !== 2 and $order->worker_id)
                                                            <a href="{{ route('orders.status', [$order, 2]) }}" class="dropdown-item small">اكتمل</a>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-4">
                                                    <span class="title pull-right">معلومات العميل</span>

                                                    <span class="pull-left" style="float: left;">
                                                <a class="btn btn-outline-default btn-sm"
                                                   href="{{ route('users.show', $order->user->id) }}">استعراض</a>
                                        </span>

                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="small" for="input-username">اسم
                                                                العميل</label>
                                                            <input type="text" id="input-username"
                                                                   class="form-control form-control-alternative"
                                                                   readonly
                                                                   value="{{ $order->user->name ?? '---' }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="small">رقم
                                                                الجوال</label>
                                                            <input type="text"
                                                                   class="form-control form-control-alternative"
                                                                   readonly
                                                                   value="{{ $order->user->phone ?? '---' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="small">المدينه</label>
                                                            <input type="text"
                                                                   class="form-control form-control-alternative"
                                                                   readonly
                                                                   value="{{ $order->user->city->name ?? '---' }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-6 border-right">
                                                <div class="mb-4">
                                                    <span class="title pull-right">معلومات العامله</span>

                                                    @if($order->worker)
                                                        <span class="pull-left" style="float: left;">
                                                        <a class="btn btn-outline-default btn-sm"
                                                   href="{{ route('workers.show', $order->worker->id) }}">استعراض</a>
                                                        </span>
                                                    @endif
                                                        <span class="pull-left" style="float: left;">
                                                        <a class="btn btn-outline-default btn-sm ml-3"
                                                           href="{{ route('orders.prepareAssociate', $order) }}">ربط الطلب بعامله</a>
                                                        </span>

                                                    @if($order->worker_id != null)
                                                        <span class="pull-left" style="float: left;">
                                                        <a class="btn btn-outline-default btn-sm ml-3"
                                                           href="{{ route('orders.dissociateWorker', $order) }}">فك إرتباط الطلب بالعاملة</a>
                                                        </span>
                                                        @endif
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="small" for="input-username">اسم
                                                                العامله</label>
                                                            <input type="text" id="input-username"
                                                                   class="form-control form-control-alternative"
                                                                   readonly
                                                                   value="{{ $order->worker->name ?? '---' }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="small">رقم
                                                                الجوال</label>
                                                            <input type="text"
                                                                   class="form-control form-control-alternative"
                                                                   readonly
                                                                   value="{{ $order->worker->phone ?? '---' }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="small" for="">المدينه</label>
                                                            <input type="text"
                                                                   class="form-control form-control-alternative"
                                                                   readonly
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
                                                    <tr>
                                                        <th>المهمه</th>
                                                        <th>الصنف</th>
                                                        <th>الكميه</th>
                                                        <th>الوحده</th>
                                                        <th>السعر</th>
                                                    </tr>

                                                    <tbody>
                                                    @foreach($order->tasks as $task)
                                                        <tr>
                                                            <td>{{ $task->job ?? '--' }}</td>
                                                            <td>{{ $task->name ?? '--' }}</td>
                                                            <td>{{ $task->quantity ?? '--' }}</td>
                                                            <td>{{ $task->measure ?? '--' }}</td>
                                                            <td>{{ $task->price ?? '--' }}</td>
                                                        </tr>
                                                    @endforeach
                                                    <tr style="background-color: #eee">
                                                        <td class="border-0">المجموع</td>
                                                        <td class="border-0"></td>
                                                        <td class="border-0"></td>
                                                        <td class="border-0"></td>
                                                        <td>{{ $order->total }} ج.س</td>
                                                    </tr>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p class="title">ملاحظات على الطلب</p>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="card">
                                                    @if($order->note)
                                                        <div class="card-body" style="background: #ffeaa7;">
                                                            <p>{{ $order->note }}</p>
                                                        </div>
                                                        @else
                                                        <div class="alert alert-info">عفوا لا توجد اي ملاحظات على هذا الطلب</div>
                                                    @endif
                                                </div>
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
            </div>
        </div>
@stop