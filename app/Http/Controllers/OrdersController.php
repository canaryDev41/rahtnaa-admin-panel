<?php

namespace App\Http\Controllers;

use App\Order;
use FarhanWazir\GoogleMaps\Facades\GMapsFacade;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){

        if (\request()->has('status')){
            switch (\request('status')){
                case 'new':
                    $orders = Order::orderBy('id', 'DESC')->where('status', 1)->paginate(10);
                    break;

                case 'done':
                    $orders = Order::orderBy('id', 'DESC')->where('status', 2)->paginate(10);
                    break;

                case 'canceled':
                    $orders = Order::orderBy('id', 'DESC')->where('status', 0)->paginate(10);
                    break;
            }
        }else{
            $orders = Order::orderBy('id', 'DESC')->paginate(10);
        }

        return view('orders.index')->with([
            'orders' => $orders
        ]);

    }

    public function show(Order $order){

        $order = $order->load('user', 'worker', 'job');

        $position = $order->lat .','. $order->lng;
        $config['center'] = $position;
        $config['zoom'] = '16';
        $config['map_height'] = '400px';

        GMapsFacade::initialize($config);

        $marker['position'] = $position;
        $marker['infowindow_content'] = 'موقع صاحب الطلب';
        $marker['animation'] = 'BOUNCE';

        GMapsFacade::add_marker($marker);

        $map = GMapsFacade::create_map();

        return view('orders.show')->with(['map' => $map, 'order' => $order]);

    }
}
