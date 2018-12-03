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
                    <h1 class="text-white">تعديل المهام</h1>
                    <p class="text-white mt-0 mb-5">من هنا يمكنك تعديل مهمه معينه</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">تعديل المهام</h3>
                    </div>
                    <div class="table-responsive">
                        <form action="{{ route('tasks.update', $task) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <table class="table align-items-center table-flush">
                                <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>السعر</th>
                                    <th>المقياس</th>
                                    <th>الباقة</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><input type="text" name="name" value="{{ $task->name }}" class="form-control"></td>
                                    <td><input type="number" name="price" value="{{ $task->price }}" class="form-control"></td>
                                    <td><input type="text" name="measure" value="{{ $task->measure }}" class="form-control"></td>
                                    <td><select name="job_id" class="form-control">
                                            @foreach($jobs as $job)
                                                <option value="{{ $job->id }}"
                                                        @if($job->id == $task->job_id) selected @endif>{{ $job->category->name . ' > ' . $job->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                </tbody>
                           </table>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-default"> تعديل</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection