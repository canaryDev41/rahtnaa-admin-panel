<?php

namespace App\Http\Controllers;

use App\Order;
use FarhanWazir\GoogleMaps\Facades\GMapsFacade;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){

        $orders = Order::paginate(10);

        return view('orders.index')->with([
            'orders' => $orders
        ]);

    }

    public function show(Order $order){

        $order = $order->load('user', 'worker', 'job');

        $config['center'] = '15.565660,32.550490';
        $config['zoom'] = '16';
        $config['map_height'] = '400px';

        GMapsFacade::initialize($config);

        $marker['position'] = '0,0';
        $marker['infowindow_content'] = 'موقع صاحب الطلب';
        $marker['animation'] = 'BOUNCE';

        GMapsFacade::add_marker($marker);

        $map = GMapsFacade::create_map();

        return view('orders.show')->with(['map' => $map, 'order' => $order]);

    }
}
