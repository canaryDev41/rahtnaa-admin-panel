@extends('partials.master')
@section('head')
    <style>
        .flexed-td {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
    </style>
@endsection
@section('body')

    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
         style="min-height: 300px;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-12 col-md-10">
                    <h1 class="text-white">إدراه الطلبات</h1>
                    <p class="text-white mt-0 mb-5">من هنا يمكنك إداره جميع الطلبات</p>
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
                                    <li class="list-inline-item"><i style="color: #f44336" class="fa fa-arrow-left"></i>

                                        <a href="{{ route('orders.index', ['date' => 'yesterday']) }}">الامس</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">الوظيفه</th>
                                <th scope="col">اسم العميل</th>
                                <th scope="col">اسم العامله</th>
                                <th scope="col">التكلفه</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col">الضبط</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($orders as $order)
                                <tr>
                                    <td scope="row" class="flexed-td">

                                        <i style="color: {{ $order->statusColor() }}"
                                           class="fa fa-circle"></i> {{ $order->job->name }}

                                        @if($order->status == 1)
                                            <a href="{{ route('orders.cancel', $order) }}"
                                               title="إلغاء الطلب"
                                               class="btn btn-outline-default btn-sm"><i class="fa fa-ban"></i></a>
                                            @else
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
    <script>
        var socket = io('http://rahtnaa-sd.com:8000');
        socket.on('orders.new.fetch', function (data) {
            console.log(data);
        });
    </script>

@endsection