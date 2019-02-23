@extends('partials.master')

@section('body')

    <users inline-template :initial-users='{{ $users->toJson() }}'>

        <div>
            <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
                 style="min-height: 300px;">
                <!-- Mask -->
                <span class="mask bg-gradient-default opacity-8"></span>
                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center">
                    <div class="row">
                        <div class="col-lg-12 col-md-10">
                            <h1 class="text-white">واجهة إدراه المستخدمات</h1>
                            <p class="text-white mt-0 mb-5">من هذه الواجهة يمكنك إدراه جميع المستخدمات</p>
                            <a type="button" class="btn btn-block btn-info" href="{{ route('users.create') }}">
                                إضافة مستخدمة جديدة
                            </a>
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
                                <div class="row mb-3">

                                    <div class="col col-md-4">
                                        <h3 class="mb-0">البحث المتقدم</h3>
                                    </div>

                                </div>

                                <form action="{{ route('users.index') }}" method="get">

                                    <div class="row">

                                        <div class="col col-md-4">
                                            <div class="form-group mb-0">
                                                <label for="">
                                                    اسم المستخدمه
                                                    <input type="text" name="name" value="{{ request('name') ?? null  }}" class="form-control form-control-alternative">
                                                </label>

                                                <label for="">
                                                    رقم هاتف المستىخدمه
                                                    <input type="text" name="phone" value="{{ request('phone') ?? null  }}" class="form-control form-control-alternative">
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col col-md-4">
                                            <div class="form-group mb-0">
                                                <label for="">
                                                    المدينة
                                                    <select name="city_id" class="form-control-alternative form-control">
                                                        <option value="">اختر المدينة من هنا</option>
                                                        @foreach($cities as $city)
                                                            <option value="{{ $city->id }}"
                                                                    @if(request('city_id') == $city->id) selected @endif>
                                                                {{ $city->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </label>

                                                <button type="submit" name="search" class="btn btn-white mr-3"><i
                                                            class="fa fa-search"></i></button>
                                                <a href="{{ route('users.index') }}" class="btn btn-white mr-2"><i
                                                            class="fa fa-ban"></i></a>

                                            </div>

                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid mt-4">

                <!-- Table -->
                <div class="row">
                    <div class="col">
                        <div class="card shadow">
                            <div class="card-header border-0">
                                <h3 class="mb-0">إداره المستخدمات</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th scope="col">الاسم</th>
                                        <th scope="col">رقم الجوال</th>
                                        <th scope="col">المدينه</th>
                                        <th scope="col">تاريخ التسجيل</th>
                                        <th scope="col">عدد الطلبات</th>
                                        <th scope="col">الضبط</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(user,key) in users">
                                        <td scope="row">
                                            <div class="media align-items-center">
                                                <a href="#" class="avatar rounded-circle">
                                                    <img alt=""
                                                         v-bind:src="'http://rahtnaa-sd.com:8000/v2/uploads/' + user.image">
                                                </a>
                                                <div class="media-body mr-2">
                                                    <span class="mb-0 text-sm" v-text="user.name"></span>
                                                </div>
                                            </div>
                                        </td>
                                        <td v-text="user.phone"></td>
                                        <td v-text="user.city.name"></td>
                                        <td v-text="user.created_at"></td>
                                        <td v-text="user.orders.length"></td>
                                        <td>
                                            <a @click="show(user)"
                                               class="btn btn-default btn-sm text-white"><i
                                                        class="fa fa-expand-arrows-alt"></i>
                                            </a>

                                            <a @click="toggleActivation(user)"
                                               class="btn text-white btn-sm mr-0"
                                               :class="user.status ? 'btn-warning' : 'btn-success' ">

                                                <i class="fa fa-ban" v-if="user.status"></i>
                                                <i class="fa fa-check" v-else></i>
                                                <span v-text="user.status ? 'تعطيل' : 'تفعيل' "></span>

                                            </a>


                                            <a @click="confirm(user)" class="btn btn-danger btn-sm text-white"> <i
                                                        class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer py-4">
                                <nav aria-label="...">
                                    {{ $users->appends($_GET)->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </users>
@endsection