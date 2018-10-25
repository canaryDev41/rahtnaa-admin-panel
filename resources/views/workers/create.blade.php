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
                إضافة عامل جديد
            </h3>
        </div>
        <hr>
        <div class="row">
            <form action="{{ route('workers.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="col col-md-3">
                    <div class="text-center">
                        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-thumbnail"
                             alt="avatar">
                        <h6>اضافة صورة شخصيه ...</h6>
                        <input type="file" name="image" class="text-center center-block file-upload">
                    </div>
                </div>

                <div class="col-sm-9">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home">البيانات الأساسية</a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <hr>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="name"><h4>الاسم</h4></label>
                                    <input type="text" class="form-control" name="name" id="name" required
                                           placeholder="اسم العامل هنا ...">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="password"><h4>كلمة المرور</h4></label>
                                    <input disabled type="password" class="form-control" name="password" id="password"
                                           placeholder="كلمة المرور هنا ...">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="city">
                                        <h4>المدينة</h4>
                                    </label>
                                    <select class="form-control" required name="city_id" id="city">
                                        <option value="">الرجاء اختيار المدينه ...</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
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
                                           placeholder="البريد الإلكتروني هنا ..."
                                           title="enter your mobile number if any.">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email"><h4>صورة من إثبات الشخصيه</h4></label>
                                    <input type="file" class="form-control" name="national_id_image"
                                           id="national_id_image">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email"><h4>حاله التسجيل</h4></label>
                                    <div class="form-group">
                                        <div>
                                            <input type="radio" id="active"
                                                   name="status" value="1" checked/>
                                            <label for="active">فعال</label>
                                        </div>

                                        <div>
                                            <input type="radio" id="inactive"
                                                   name="status" value="0"/>
                                            <label for="inactive">غير فعال</label>
                                        </div>
                                    </div>
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

                            <hr>

                        </div><!--/tab-pane-->

                    </div><!--/tab-pane-->
                </div><!--/tab-content-->
            </form>
        </div><!--/row-->
    </div>
@endsection