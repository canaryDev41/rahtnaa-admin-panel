<?php

namespace App\Http\Controllers;

use App\Job;
use App\Order;
use App\User;
use App\Worker;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $workers = Worker::count();
        $users = User::count();
        $jobs = Job::count();
        $orders = Order::count();

        return view('dashboard.index')->with([
            'workers' => $workers,
            'users' => $users,
            '$jobs' => $jobs,
            'orders' => $orders,
        ]);
    }
}
