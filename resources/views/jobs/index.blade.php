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
                    <h1 class="text-white">إدراه الوظائف</h1>
                    <p class="text-white mt-0 mb-5">من هنا يمكنك إداره جميع الوظائف</p>
                </div>
            </div>
        </div>
    </div>

    <jobs inline-template :initial-jobs='{{ $jobs->toJson() }}'>

        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <h3 class="mb-0">إداره الوظائف</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush" v-if="jobs" key="jobs">
                                <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>التصنيف</th>
                                    <th>المهام</th>
                                    <th>العمال</th>
                                    <th>الضبط</th>
                                </tr>
                                </thead>
                                <tbody v-if="jobs" >

                                    <tr v-for="(job,key) in jobs" :key="key">
                                        <td v-text="job.name"></td>
                                        <td v-text="job.category.name"></td>
                                        <td v-text="job.tasks.length"></td>
                                        <td v-text="job.workers.length"></td>
                                        <td>
                                            <a href="" class="btn btn-success btn-sm">
                                                <span class="icon-btn"><i class="fa fa-expand"></i></span></a>
                                            <a href="" class="btn btn-default btn-sm">
                                                <span class="icon-btn"><i class="fa fa-edit"></i></span>

                                            </a>
                                            <a @click="confirm(job)" class="btn btn-danger btn-sm mr-2 text-white">
                                                <span class="icon-btn"><i class="fa fa-trash"></i> </span>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                {{ $jobs->links() }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </jobs>

@endsection