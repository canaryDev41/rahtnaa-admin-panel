@extends('partials.master')

@section('head')
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css"/>
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
                    <h3 class="display-2 text-white"> ربط الطلب: #{{ $order->id }} بعامله </h3>
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
                        <h6 class="heading-small text-muted mb-4"></h6>
                        <div class="pl-lg-4">

                            <div class="row">
                                <div class="col-3">
                                    <p class="title">الوظيفة</p>
                                    <span class="text-muted">{{ $order->job->category->name }}
                                        > {{ $order->job->name }}</span>
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
                                <div class="col-lg-12">
                                    <p class="title">تفاصيل الطلب</p>
                                </div>
                                <div class="col-lg-12">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>المهمه</th>
                                            <th>الكميه</th>
                                            <th>الصنف</th>
                                            <th>الوحده</th>
                                            <th>السعر</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @foreach($order->tasks as $task)
                                            <tr>
                                                <td>{{ $task->job ?? '--' }}</td>
                                                <td>{{ $task->quantity ?? '--' }}</td>
                                                <td>{{ $task->name ?? '--' }}</td>
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
                                <div class="col-lg-12 border-right">
                                    <form action="{{ route('orders.associate', $order) }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="mb-4">
                                            <span class="title pull-right">معلومات العامله</span>
                                        </div>

                                        <div class="row">

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="small" for="">المدينه</label>
                                                    <select name="city_id" id="city_id" class="form-control" required
                                                            onchange="city_changed()">
                                                        <option id="0">غير محدد</option>
                                                        @foreach($cities as $city)
                                                            <option id="{{ $city->id }}">{{ $city->name  }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="small" for="">الوظيفة</label>
                                                    <select name="job_id" id="job_id" class="form-control" required
                                                            onchange="job_changed()">
                                                        <option id="0">غير محدد</option>
                                                    @foreach($jobs as $job)
                                                            <option id="{{ $job->id }}">{{ $job->category->name }}
                                                                > {{ $job->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="small" for="input-username">اسم
                                                        العامله</label>
                                                    <select name="worker_id" id="select2" class="form-control" required>
                                                        <option value=""></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <label for="new">
                                                            <input class="inline" type="radio" id="new" name="status" value="1" checked>
                                                            جديد
                                                        </label>
                                                    </div>

                                                    <div class="form-check">
                                                        <label for="canceled">
                                                            <input class="inline" type="radio" id="canceled" name="status" value="0">
                                                            ملغي
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="submit" value="ربط الطلب" class="btn btn-primary">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>

                        <hr>

                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
    </div>

@endsection

@section('js-section')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script type="text/javascript">

        $('#select2').select2();

        function city_changed() {
            $("#select2 option").remove();
            let city_id = $('#city_id').find('option:selected').attr('id');
//            console.log(city_id);
            $.get('/dashboard/city_changed/' + city_id, function (data) {
                console.log(data);
            })
        }

        function job_changed() {
            $("#select2 option").remove();
            let job_id = $('#job_id').find('option:selected').attr('id');
            console.log(job_id);
            $.get('/dashboard/job_changed/' + job_id, function (data) {
                // Parse the returned json data
                $.each(data, function (i, d) {
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                    $('#select2').append('<option value="' + d.id + '">' + d.phone + ' < ' + d.name + '</option>');
                });
            })
        }

    </script>
@endsection