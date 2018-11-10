@extends('partials.master')

@section('body')

    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
         style="min-height: 300px;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">
                <div class="col-lg-12 col-md-10">
                    <h1 class="text-white">إدراه التصنيفات</h1>
                    <p class="text-white mt-0 mb-5">من هنا يمكنك إداره جميع التصنيفات</p>
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
                        <h3 class="mb-0">إداره التصنيفات</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">الاسم</th>
                                <th scope="col">عدد الوظائف</th>
                                <th scope="col">الضبط</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $category)
                                <tr>
                                    <td scope="row">
                                        {{ $category->name }}
                                    </td>
                                    <td>
                                        {{ $category->jobs->count() }}
                                    </td>
                                    <td>
                                        @if($category->status)
                                            <a href="" class="btn btn-warning btn-sm">تعطيل</a>
                                        @else
                                            <a href="" class="btn btn-warning btn-sm">تفعيل</a>
                                        @endif
                                        <a href="
{{--{{ route('categories.destroy', $category->id) }}--}}
                                                "
                                           class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            {{ $categories->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection