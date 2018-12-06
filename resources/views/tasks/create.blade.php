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
                    <h1 class="text-white">اضافة مهمة جديده</h1>
                    <p class="text-white mt-0 mb-5">من هنا يمكنك اضافة مهمه جديده</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0">اضافة مهمه</h3>
                    </div>
                    <div class="table-responsive">
                        <form action="{{ route('tasks.store') }}" method="post">
                            {{ csrf_field() }}
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
                                    <td><input type="text" name="name" class="form-control"></td>
                                    <td><input type="number" name="price" class="form-control"></td>
                                    <td><input type="text" name="measure" class="form-control"></td>
                                    <td><select name="job_id" class="form-control">
                                            @foreach($jobs as $job)
                                                <option value="{{ $job->id }}"> {{ $job->category->name . ' > ' . $job->name }} </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                </tbody>
                           </table>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-default"> اضافة </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection