<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>راحتنا - تسجيل الدخول</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/rtl/bootstrap.min.css') }}" rel="stylesheet">

    <!-- not use this in ltr -->
    <link href="{{ asset('css/rtl/bootstrap.rtl.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('css/plugins/metisMenu/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('css/plugins/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/rtl/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('css/plugins/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('css/font-awesome/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">تسجيل الدخول للوحة التحكم</h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="{{ route('admin.submit') }}" method="POST">
                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="البريد الالكتروني" name="email" required type="email" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="كلمة المرور" name="password" type="password" minlength="6" required>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button class="btn btn-success btn-block" type="submit">تسجيل الدخول</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery Version 1.11.0 -->
<script src="{{ asset('js/jquery-1.11.0.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('js/metisMenu/metisMenu.min.js') }}"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('js/sb-admin-2.js') }}"></script>

</body>

</html>
