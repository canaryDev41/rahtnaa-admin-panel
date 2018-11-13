<?php

namespace App\Http\Controllers;

use App\City;
use App\Job;
use App\Order;
use App\User;
use App\Worker;
use FarhanWazir\GoogleMaps\GMaps;

class DashboardController extends Controller
{
    public function index(){

        $workers = Worker::count();
        $users = User::count();
        $jobs = Job::count();
        $orders = Order::count();
        $cities = City::count();

        $config['center'] = '15.565660,32.550490';
        $config['zoom'] = 'auto';
        $config['map_height'] = '400px';

        $gmap = new GMaps();

        $gmap->initialize($config);

        $marker['position'] = '15.565660,32.550490';
        $marker['infowindow_content'] = '...';
        $marker['animation'] = 'BOUNCE';
        $gmap->add_marker($marker);

        $marker['position'] = '15.577052, 32.568404';
        $marker['infowindow_content'] = '...';
        $marker['animation'] = 'BOUNCE';
        $gmap->add_marker($marker);

        $marker['position'] = '15.607754, 32.563790';
        $marker['infowindow_content'] = '';

        $marker['animation'] = 'BOUNCE';
        $gmap->add_marker($marker);

        $map = $gmap->create_map();

        return view('dashboard.index')->with([
            'workers' => $workers,
            'users' => $users,
            'jobs' => $jobs,
            'orders' => $orders,
            'cities' => $cities,
            'map' => $map,
        ]);
    }

    /**
     * @return mixed
     */
    public function prepareMap(){

    }
}
