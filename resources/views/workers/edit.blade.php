@extends('partials.master')

@section('body')
    <profile inline-template>
        <div class="container bootstrap snippet" >
        
        <div class="row">
            <h3>
الملف الشخصي:
            {{ $worker->name }}
            </h3>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-3"><!--left col-->

                <div class="text-center">
                    <img src="{{ asset($worker->image) }}" class="avatar img-thumbnail"
                         alt="avatar">
                    <h6>تغيير الصورة الشخصيه ...</h6>
                    <input type="file" class="text-center center-block file-upload">
                </div>
                </hr>
                <br>

                <div class="panel panel-default">
                    <div class="panel-heading">حالة المستخدم </div>
                    <div class="panel-body">
                        @php
                            echo $worker->status ? '<i class="fa fa-check"></i> فعال' : '<i class="fa fa-ban"></i> غير فعال';
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
                    <li class="active"><a data-toggle="tab" href="#basics">البيانات الأساسية</a></li>
                    <li><a data-toggle="tab" href="#ratings">التقييم و التعليقات</a></li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="basics">
                        <hr>
                        <form class="form" action="##" method="post" id="registrationForm">
                            <div class="form-group">

                                <div class="col-xs-6">

                                    <label for="name"><h4>الاسم</h4></label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $worker->name }}"
                                           placeholder="اسم العامل هنا ...">
                                    <p v-text=""></p>

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="city">
                                        <h4>المدينة</h4>
                                    </label>
                                    <input type="text" class="form-control" value="{{ $worker->city->name }}">
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="phone"><h4>رقم الجوال</h4></label>
                                    <input type="number" class="form-control" name="phone" id="phone" value="{{ $worker->phone }}"
                                           placeholder="رقم الجوال هنا ...">
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="email"><h4>البريد الإلكتروني</h4></label>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ $worker->email }}"
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
                    <div class="tab-pane" id="ratings">
                        <hr>
                        <div class="col col-md-12">
                            <ul>
                                <li>test 1</li>
                                <li>test 1</li>
                                <li>test 1</li>
                            </ul>
                        </div>

                    </div><!--/tab-pane-->

                </div><!--/tab-pane-->
            </div><!--/tab-content-->

        </div><!--/col-9-->
    </div>
    </profile>

@endsection