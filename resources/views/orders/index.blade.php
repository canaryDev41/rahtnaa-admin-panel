@extends('partials.master')

@section('body')

    <div>

        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
             style="min-height: 300px;">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>
            <!-- Header container -->
            <div class="container-fluid d-flex align-items-center">
                <div class="row">
                    <div class="col-lg-12 col-md-10">
                        <h1 class="text-white">إداره الطلبات</h1>
                        <p class="text-white mt-0 mb-5">من هنا يمكنك إداره جميع الطلبات</p>

                        <a type="button" class="btn btn-block btn-info" href="{{ route('orders.create') }}">
                            إنشاء طلب جديد
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="container-fluid mt--7">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row mb-3">

                                <div class="col col-md-4">
                                    <h3 class="mb-0">البحث المتقدم</h3>
                                </div>

                            </div>

                            <form action="{{ route('orders.index') }}" method="get">

                                <div class="row">

                                    <div class="col col-md-4">
                                        <div class="form-group mb-0">
                                            <label for="">
                                                اسم المستخدمه
                                                <input type="text" name="userName" value="{{ request('userName') ?? null  }}" class="form-control form-control-alternative">
                                            </label>

                                            <label for="">
                                                رقم هاتف المستخدمه
                                                <input type="text" name="userPhone" value="{{ request('userPhone') ?? null  }}" class="form-control form-control-alternative">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col col-md-4">
                                        <div class="form-group mb-0">
                                            <label for="">
                                                اسم العامله
                                                <input type="text" name="workerName"
                                                       value="{{ request('workerName') ?? null }}"
                                                       class="form-control form-control-alternative">
                                            </label>

                                            <label for="">
                                                رقم جوال العامله
                                                <input type="text" name="workerPhone" value="{{ request('workerPhone') ?? null }}" class="form-control form-control-alternative">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col col-md-4">
                                        <div class="form-group mb-0">
                                            <label for="">
                                                التصنيف - الباقة
                                                <select name="job_id" class="form-control-alternative form-control">
                                                    <option value="">اختار الوظيفه من هنا</option>
                                                    @foreach($jobs as $job)
                                                        <option value="{{ $job->id }}"
                                                                @if(request('job_id') == $job->id) selected @endif>
                                                            {{ $job->category->name }} - {{ $job->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </label>

                                            <button type="submit" name="search" class="btn btn-white mr-3"><i
                                                        class="fa fa-search"></i></button>
                                            <a href="{{ route('orders.index') }}" class="btn btn-white mr-2"><i
                                                        class="fa fa-ban"></i></a>

                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-4">
            <!-- Table -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row">

                                <div class="col col-md-4">
                                    <h3 class="mb-0">إداره الطلبات</h3>
                                </div>

                                <div class="col col-md-4">
                                    <p class="">حالة الطلب</p>
                                    <ul class="list-inline small">
                                        <li class="list-inline-item"><i style="color: #333" class="fa fa-circle"></i>
                                            <a href="orders">الكل</a>
                                        </li>

                                        <li class="list-inline-item"><i style="color: #00bcd4" class="fa fa-circle"></i>
                                            <a href="{{ route('orders.index', ['status' => 'new']) }}">جديد</a>
                                        </li>
                                        <li class="list-inline-item"><i style="color: #f44336" class="fa fa-circle"></i>
                                            <a href="{{ route('orders.index', ['status' => 'cancelled']) }}"> ملغي</a>
                                        </li>
                                        <li class="list-inline-item"><i style="color: #4caf50" class="fa fa-circle"></i>
                                            <a href="{{ route('orders.index', ['status' => 'done']) }}"> اكتمل</a>

                                        </li>
                                    </ul>
                                </div>

                                <div class="col col-md-4">
                                    <p class="">زمن الطلب</p>
                                    <ul class="list-inline small">
                                        <li class="list-inline-item"><i style="color: #333" class="fa fa-circle"></i>
                                            <a href="orders">الكل</a>
                                        </li>

                                        <li class="list-inline-item"><i style="color: #00bcd4" class="fa fa-check"></i>
                                            <a href="{{ route('orders.index', ['date' => 'today']) }}">اليوم</a>
                                        </li>
                                        <li class="list-inline-item"><i style="color: #f44336"
                                                                        class="fa fa-arrow-left"></i>

                                            <a href="{{ route('orders.index', ['date' => 'yesterday']) }}">الامس</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover align-items-center">
                                <tr>
                                    <th scope="col" class="flexed-td">
                                        التصنيف
                                        <i class="fa fa-arrow-left"></i>
                                        الباقة
                                    </th>
                                    <th scope="col">اسم العميل</th>
                                    <th scope="col">اسم العامله</th>
                                    <th scope="col">التكلفه</th>
                                    <th scope="col">التاريخ</th>
                                    <th scope="col">الضبط</th>
                                </tr>
                                <tbody>

                                @foreach($orders as $order)
                                    <tr>
                                        <td scope="row" class="flexed-td">

                                            <i style="color: {{ $order->statusColor() }}"
                                               class="fa fa-circle"></i> {{ $order->job->category->name }} <i
                                                    class="fa fa-arrow-left"></i> {{ $order->job->name }}

                                            @if($order->status == 1)
                                                <a href="{{ route('orders.status', [$order, 0]) }}"
                                                   title="إلغاء الطلب"
                                                   class="btn btn-outline-default btn-sm"><i class="fa fa-ban"></i></a>
                                            @elseif($order->status == 0 and $order->worker_id == null)
                                                <a href="{{ route('orders.status', [$order, 1]) }}"
                                                   title="اعادة إرسال"
                                                   class="btn btn-outline-default btn-sm"><i class="fa fa-sync"></i></a>
                                                <span></span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $order->user->name ?? '---' }}
                                        </td>
                                        <td>
                                            {{ $order->worker->name ?? '---' }}
                                        </td>
                                        <td>
                                            {{ $order->total }} ج.س
                                        </td>
                                        <td>
                                            {{ $order->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <a href="{{ route('orders.show', $order) }}" class="btn btn-default btn-sm">استعراض </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                {{ $orders->appends($_GET)->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection