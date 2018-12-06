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
                    <h1 class="text-white">إدراه المهام</h1>
                    <p class="text-white mt-0 mb-5">من هنا يمكنك إداره جميع المهام</p>
                    <a class="btn btn-block btn-info" href="{{ route('tasks.create') }}">
                    إضافة مهمة جديده
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">إداره المهام</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>السعر</th>
                                <th>المقياس</th>
                                <th class="flexed-td">
التصنيف
                                    <i class="fa fa-arrow-left"></i>
الباقة
                                </th>
                                <th>الضبط</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->price }}</td>
                                    <td>{{ $task->measure }}</td>
                                    <td class="flexed-td">
                                        {{ $task->job->category->name }}
                                        <i class="fa fa-arrow-left"></i>
                                        {{ $task->job->name }}
                                    </td>
                                    <td>
                                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-default btn-sm">
                                            <span class="icon-btn"><i class="fa fa-edit"></i></span>

                                        </a>
                                        <form action="{{ route('tasks.destroy', $task) }}" style="display: inline" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}

                                            <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            {{ $tasks->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection