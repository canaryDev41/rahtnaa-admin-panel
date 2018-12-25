@extends('partials.master')

@section('search-mobile')
    <form class="mt-4 mb-3 d-md-none" action="{{ route('orders.index')  }}" method="GET">
        <div class="input-group input-group-rounded input-group-merge">
            <input class="form-control" placeholder="ابحث" type="text" value="{{ request('search') }}"
                   name="search">
            <div class="input-group-prepend">
                <div class="btn btn-sm">
                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </form>
@stop

@section('search-form')
    <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto"
          action="{{ route('orders.index')  }}" method="GET">
        <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
                </div>
                <input class="form-control" placeholder="ابحث" type="text" value="{{ request('search') }}"
                       name="search">
            </div>
        </div>
    </form>
@stop

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
                        <h1 class="text-white">إدراه الطلبات</h1>
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