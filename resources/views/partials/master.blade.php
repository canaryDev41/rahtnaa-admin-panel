<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="rahtnaa admin panel">
    <meta name="author" content="rahtnaa-sd.com">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>راحتنا - لوحة التحكم</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('fonts/nucleoIcons/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <!--<link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">-->
    <!--Argon rtl CSS-->
    {{--    <link type="text/css" href="{{asset('css/argon.css')}}" rel="stylesheet">--}}
    <link type="text/css" href="{{asset('css/app.css')}}" rel="stylesheet">

    <style type="text/css">
        .flexed-td {
            display: flex;
            justify-content: space-between;
        }
    </style>
    @yield('head')
    @yield('map-section')
</head>

<body>
<!-- Sidenav -->
<div id="app">
    <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
        <div class="container-fluid"> <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                    aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button> <!-- Brand --> <a class="navbar-brand pt-0"
                                                                                       href="{{ route('dashboard.index') }}">
                {{--<img--}}
                {{--src="" class="navbar-brand-img" alt="..."> </a> <!-- User -->--}}
                <ul class="nav align-items-center d-md-none">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <div class="media align-items-center">
                          <span class="avatar avatar-sm rounded-circle">
                            <img alt="" src="https://image.flaticon.com/icons/png/512/236/236832.png">
                          </span>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Collapse header -->
                    <div class="navbar-collapse-header d-md-none">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="{{ route('dashboard.index') }}">
                                    <img src="">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse"
                                        data-target="#sidenav-collapse-main" aria-controls="sidenav-main"
                                        aria-expanded="false"
                                        aria-label="Toggle sidenav">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Form mobile search -->

                    @yield('search-mobile')

                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item @if(Route::currentRouteNamed('dashboard.index')) active @endif">
                            <a class="nav-link" href="{{ route('dashboard.index') }}">
                                <i class="ni ni-tv-2 text-primary"></i> اللوحة الرئسية
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteNamed('workers.index')) active @endif">
                            <a class="nav-link" href="{{ route('workers.index') }}">
                                <i class="ni ni-planet text-blue"></i> العمال
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteNamed('users.index')) active @endif">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <i class="ni ni-single-02 text-yellow"></i> المستخدمات
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cities.index') }}">
                                <i class="ni ni-pin-3 text-orange"></i> المدن
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteNamed('categories.index')) active @endif">
                            <a class="nav-link" href="{{ route('categories.index') }}">
                                <i class="ni ni-basket text-yellow"></i> التصنيفات
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteNamed('jobs.index')) active @endif">
                            <a class="nav-link" href="{{ route('jobs.index') }}">
                                <i class="ni ni-bullet-list-67 text-red"></i> الأعمال
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteNamed('tasks.index')) active @endif">
                            <a class="nav-link" href="{{ route('tasks.index') }}">
                                <i class="ni ni-key-25 text-info"></i> المهام
                            </a>
                        </li>
                        <li class="nav-item @if(Route::currentRouteNamed('orders.index')) active @endif">
                            <a class="nav-link" href="{{ route('orders.index') }}">
                                <i class="ni ni-bag-17 text-pink"></i> الطلبات
                            </a>
                        </li>
                    </ul>
                </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content">
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
                   href="{{ route('dashboard.index') }}">اللوحه
                    الرئسية</a>
                <!-- Form -->

                @yield('search-form')

                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt=""
                       src="https://image.flaticon.com/icons/png/512/236/236832.png">
                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <a href="" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>الحساب الشخصي</span>
                            </a>
                            <a href="" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>الأعدادات</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('admin.logout') }}" class="dropdown-item">
                                <i class="ni ni-user-run"></i>
                                <span>تسجيل خروج</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Header -->

        {{--page content--}}
        @yield('body')

    </div>

    <audio id="audio" src="{{ asset('audio/definite.mp3') }}" preload="auto"></audio>
    <flash message=""></flash>

</div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
<script src="http://rahtnaa-sd.com:8000/socket.io/socket.io.js"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('js/argon.js')}}"></script>

@yield('js-section')

<script>

    const socket = io.connect('http://rahtnaa-sd.com:8000');

    socket.on('orders.new.fetch', function ({order_id}) {

        document.getElementById('audio').play();

        Notification.requestPermission(permission => {
            let notification = new Notification('طلب جديد!', {
                body: `طلب بالرقم ${order_id}`, // content for the alert
                icon:'https://freeiconshop.com/wp-content/uploads/edd/notification-flat.png'
            });

            // link to page on clicking the notification
            notification.onclick = () => {
                window.open(window.location = "/dashboard/orders/" + order_id);
            };
        });
        flash(`طلب جديد رقم #${order_id}`, 'danger', function () {
            window.location = "/dashboard/orders/" + order_id
        });

    });

</script>

</body>

</html>