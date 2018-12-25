@extends('partials.master')

@section('body')
    <new-order inline-template :initial-categories="{{ $categories }}" :initial-cities="{{ $cities }}">
        <div>    <!-- Header -->
            <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center">
                <!-- Mask -->
                <span class="mask bg-gradient-default opacity-8"></span>
                <!-- Header container -->
                <div class="container-fluid d-flex align-items-center">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <h3 class="display-2 text-white">انشاء طلب جديد</h3>
                            <p class="small"></p>
                            <p class="text-white mt-0 mb-5">من هنا يمكنك انشاء طلب جديد</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page content -->
            <div class="container-fluid mt--7">
                <div class="row">
                    <div class="col-xl-12 order-xl-1">
                        <div class="card bg-secondary shadow">

                            <form action="" method="post">
                                @csrf
                                <div class="card-header bg-white border-0">
                                    <div class="row align-items-center">
                                        <div class="col-8">
                                            <h3 class="mb-2">بيانات الطلب الاساسيه</h3>
                                        </div>
                                        <div class="col-4 text-left">
                                            <button type="button" class="btn btn-primary"
                                                    data-toggle="modal" data-target="#cartModel">
                                                <span class="badge badge-info text-white">@{{ cart.length }}</span> سلة
                                                التسوق
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="cartModel" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">سلة التسوق</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-hover" v-if="cart.length">
                                                        <tr>
                                                            <th width="65">المهمه</th>
                                                            <th width="10">السعر</th>
                                                            <th width="10">الكميه</th>
                                                            <th width="15%">الضبط</th>
                                                        </tr>
                                                        <tbody>
                                                        <tr v-for="(item, index) in cart">
                                                            <td>@{{ item.name }}</td>
                                                            <td>@{{ item.price }} ج.س</td>
                                                            <td>@{{ item.quantity }}</td>
                                                            <td class="text-center">
                                                                <i class="btn btn-success btn-sm fa fa-plus mr-0"
                                                                   style="cursor: pointer"
                                                                   @click="increaseQuantity(item)"></i>
                                                                <i class="btn btn-danger btn-sm fa fa-trash mr-0"
                                                                   style="cursor: pointer"
                                                                   @click="deleteItem(index)"></i>
                                                                <i class="btn btn-warning btn-sm fa fa-minus"
                                                                   style="cursor: pointer"
                                                                   @click="decreaseQuantity(item)"></i>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th>الصافي</th>
                                                            <td></td>
                                                            <th>@{{ cartTotal }}</th>
                                                            <td></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="alert alert-primary alert-dismissible fade show"
                                                         role="alert" v-else="cart.length">
                                                        <span class="alert-inner--text"><strong> عفوا ! </strong>  سلة التسوق فارغة</span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" v-if="cart.length"
                                                            @click="cart=[]">
                                                        تفريغ السلة !
                                                    </button>
                                                    <button type="button" @click="submitOrder" class="btn btn-primary"
                                                            v-if="cart.length" data-dismiss="modal">
                                                        تأكيد الطلب!
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">المدينة</label>
                                                <select class="form-control" v-model="city" @change="getUsers(city)">
                                                    <option v-for="(city, index) in cities" :value="city.id"
                                                            v-text="city.name"></option>
                                                </select>
                                            </div>
                                        </div>

                                            <div class="col-3" v-if="city">
                                                <div class="form-group">
                                                    <label for="">المستخدمة : الاسم</label>
                                                    <v-select class="form-control"
                                                              dir="rtl"
                                                              v-model="user"
                                                              label="name"
                                                              :options="users"></v-select>
                                                </div>
                                            </div>
                                            <div class="col-3" v-if="city">
                                                <div class="form-group">
                                                    <label for="">المستخدمه : رقم الهاتف</label>
                                                    <v-select class="form-control"
                                                              dir="rtl"
                                                              v-model="user"
                                                              label="phone"
                                                              :options="users"></v-select>
                                                </div>
                                            </div>

                                        <div class="col-3" v-if="city">
                                            <div class="form-group">
                                                <label for="">العامله : الاسم</label>
                                                <v-select class="form-control"
                                                          dir="rtl"
                                                          v-model="worker"
                                                          label="name"
                                                          :options="workers"></v-select>
                                            </div>
                                        </div>
                                        <div class="col-3" v-if="city">
                                            <div class="form-group">
                                                <label for="">العامه : رقم الهاتف</label>
                                                <v-select class="form-control"
                                                          dir="rtl"
                                                          v-model="worker"
                                                          label="phone"
                                                          :options="workers"></v-select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">تاريخ البدايه</label>
                                                <input type="date" v-model="start_date" class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="">التصنيف</label>
                                                <select v-model="category"
                                                        @change="tasks=[]"
                                                        class="form-control">
                                                    <option v-for="(category, index) in categories" :value="category"
                                                            v-text="category.name"></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6" v-if=category>
                                            <div class="form-group">
                                                <label for="">الباقة</label>
                                                <select v-model="job" class="form-control"
                                                        @change="getTasks(job)"
                                                >
                                                    <option v-for="(job, index) in category.jobs" :value="job"
                                                            v-text="job.name"></option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" v-model="query" class="form-control"
                                                       v-if="job" placeholder="بحث ..."></div>
                                        </div>

                                    </div>

                                </div>


                                <div class="card-header" style="background: #f1f1f1">
                                    <div class="row" v-if="job">

                                        <div class="container">
                                            <div class="row justify-content-center">
                                                <div class="col col-lg-12">
                                                    <div class="row row-grid">
                                                        <div v-for="(task, index) in filteredTasks"
                                                             class="col-lg-3 mb-4">
                                                            <div class="card card-lift--hover shadow">
                                                                <div class="card-body py-3">
                                                                    <span class="text-primary text-uppercase">
                                                                        @{{ task.name }}
                                                                    </span>
                                                                    <p class="description mt-3">

                                                                    </p>
                                                                    <div>
                                                                        <span class="badge badge-primary badge-default"> @{{ task.price }}
                                                                            ج.س </span>
                                                                        <span class="badge badge-primary badge-primary">@{{ task.measure }}</span>
                                                                    </div>
                                                                    <div class="mt-3 text-center">
                                                                        <a
                                                                                v-if="taskExistInCart(task)"
                                                                                @click="increaseQuantity(task, index)"
                                                                        ><i
                                                                                    class="fa fa-plus-circle text-default"
                                                                                    style="cursor: pointer"></i></a>
                                                                        <a v-if="!taskExistInCart(task)"
                                                                           class="btn btn-default btn-sm text-white mr-0"
                                                                           @click="addToCart(task)">
                                                                            أضف الى السلة
                                                                        </a>
                                                                        <span class="badge badge-dark"
                                                                              v-else="taskExistInCart(task)">
                                                                                @{{ task.quantity }}
                                                                            </span>
                                                                        <a
                                                                                v-if="taskExistInCart(task)"
                                                                                @click="decreaseQuantity(task)"
                                                                        ><i class="fa fa-minus-circle text-default"
                                                                            style="cursor: pointer"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
            </div>
        </div>
    </new-order>
@stop