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

    <categories inline-template :initial-categories='{{$categories->toJson()}}'>
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
                                <tr v-for="(category,key) in categories">
                                    <td scope="row" v-text="category.name"></td>
                                    <td v-text="category.jobs.length"></td>
                                    <td>
                                        <a @click="toggleActivation(category)"
                                           class="btn text-white btn-sm mr-0"
                                           :class="category.status ? 'btn-warning' : 'btn-success' ">

                                            <i class="fa fa-ban" v-if="category.status"></i>
                                            <i class="fa fa-check" v-else></i>
                                            <span v-text="category.status ? 'تعطيل' : 'تفعيل' "></span>

                                        </a>

                                        <a @click="confirm(category)" class="btn btn-danger btn-sm text-white"> <i
                                                    class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
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
    </categories>

@endsection