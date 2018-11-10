<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>راحتنا - لوحة التحكم: تسجيل الدخول</title>
    <!-- Favicon -->
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{asset('fonts/nucleoIcons/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('fonts/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!-- Argon CSS -->
    <!--<link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">-->
    <!--Argon rtl CSS-->
    <link type="text/css" href="{{asset('css/argon-rtl.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('css/app.css')}}" rel="stylesheet">
</head>

<body class="bg-default">
<div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white">مرحبا!</h1>
                        <p class="text-lead text-light">راحتنا - تسجيل الدخول الى لوحه التحكم</p>
                        @if(session()->has('message'))
                            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-inner--text"><strong>تنبيه!</strong> {{ session()->get('message') }}</span>

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                 xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>الرجاء ادخال البريد الاكتروني و كلمة المرور</small>
                        </div>
                        <form action="{{ route('admin.login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group mb-3">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="البريد الإلكتروني" type="email"
                                           name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="كلمة المرور" type="password"
                                           name="password" required>
                                </div>
                            </div>
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                <label class="custom-control-label" for=" customCheckLogin">
                                    <span class="text-muted">تذكرني</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">تسجيل الدخول</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <a href="#" class="text-light">
                            <small>نسيت كلمة المرور؟</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="py-5">
    <div class="container">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6">
                <div class="copyright text-center text-xl-left text-muted">
                    &copy; {{ date('Y') }} <a href="https://canarydev41.github.io/" class="font-weight-bold ml-1"
                                              target="_blank">canaryDev41</a>
                </div>
            </div>

        </div>
    </div>
</footer>
<!-- Argon Scripts -->
<script src="{{asset('js/app.js')}}"></script>
<!-- Core -->
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('js/argon.js')}}"></script>
</body>

</html>