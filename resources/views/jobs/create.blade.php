@extends('partials.master')

@section('body')

    <div class="container bootstrap snippet">
        <div class="row">
            <h3>
                إضافة وظيفه جديده
            </h3>
        </div>
        <hr>
        <div class="row">
            <form action="{{ route('jobs.store') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}

                <div class="col-sm-9">

                    <div class="tab-content">
                        <div class="tab-pane active" id="home">
                            <hr>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="name"><h4>الاسم</h4></label>
                                    <input type="text" class="form-control" name="name" id="name" required
                                           placeholder="اسم الوظيفه هنا ...">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="category">
                                        <h4>التصنيف</h4>
                                    </label>
                                    <select class="form-control" required name="category_id" id="category">
                                        <option value="">الرجاء اختيار التصنيف ...</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="image">
                                        <h4>صورة تعريفيه</h4>
                                    </label>
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="status"><h4>الحالة</h4></label>
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