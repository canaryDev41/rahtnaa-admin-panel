@extends('partials.master')

@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {


            var readURL = function (input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function () {
                readURL(this);
            });
        });
    </script>
@endsection

@section('body')

    <div class="container bootstrap snippet">
        <div class="row">
            <h3>
الملف الشخصي:
            {{ $worker->user->name }}
            </h3>

            <p>city: {{ $worker->user->name }}</p>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3"><!--left col-->


                <div class="text-center">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-thumbnail"
                         alt="avatar">
                    <h6>تغيير الصورة الشخصيه ...</h6>
                    <input type="file" class="text-center center-block file-upload">
                </div>
                </hr><br>


                <div class="panel panel-default">
                    <div class="panel-heading">حالة المستخدم </div>
                    <div class="panel-body">
                        @php
                            echo $worker->user->status ? '<i class="fa fa-check"></i> فعال' : '<i class="fa fa-ban"></i> غير فعال';
                        @endphp
                    </div>
                </div>


                <ul class="list-group">
                    <li class="list-group-item text-muted">الأنشطه</li>
                    <li class="list-group-item text-left"><span class="pull-right"><strong>معرض الأعمال</strong></span> 125
                    </li>
                    <li class="list-group-item text-left"><span class="pull-right"><strong>التقييم</strong></span> 13</li>
                    <li class="list-group-item text-left"><span class="pull-right"><strong>الوظائف</strong></span> 37</li>
                    <li class="list-group-item text-left"><span class="pull-right"><strong>الطلبات</strong></span> 78
                    </li>
                </ul>

            </div><!--/col-3-->
            <div class="col-sm-9">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">البيانات الأساسية</a></li>
                    <li><a data-toggle="tab" href="#messages">التقييم والبلاغات</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="form" action="##" method="post" id="registrationForm">
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="name"><h4>الاسم</h4></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           placeholder="اسم العامل هنا ...">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="city">
                                        <h4>المدينة</h4>
                                    </label>
                                    <select class="form-control" name="city" id="city">
                                        <option value="1">الخرطوم</option>
                                        <option value="2">امدرمان</option>
                                        <option value="3">بحري</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="phone"><h4>رقم الجوال</h4></label>
                                    <input type="number" class="form-control" name="phone" id="phone"
                                           placeholder="رقم الجوال هنا ...">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email"><h4>البريد الإلكتروني</h4></label>
                                    <input type="text" class="form-control" name="email" id="email"
                                           placeholder="البريد الإلكتروني هنا ..." title="enter your mobile number if any.">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-primary" type="submit">
                                   حفظ!
                                        <i class="fa fa-save"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <hr>

                    </div><!--/tab-pane-->
                    <div class="tab-pane" id="messages">

                        <h2></h2>

                    </div><!--/tab-pane-->

                </div><!--/tab-pane-->
            </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->

@endsection