<?php

namespace App\Http\Controllers;

use App\City;
use App\Job;
use App\Order;
use App\User;
use App\Worker;
use FarhanWazir\GoogleMaps\Facades\GMapsFacade;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index(){

        $orders = request('search') ? Order::search(request('search'))->orderBy('id', 'DESC')->paginate(10) : Order::orderBy('id', 'DESC')->paginate(10);
        
        if (request()->has('search')){
            
        }

        if (request()->has('status')){
            switch (request('status')){
                case 'new':
                    $orders = Order::orderBy('id', 'DESC')->where('status', 1)->paginate(10);
                    break;

                case 'done':
                    $orders = Order::orderBy('id', 'DESC')->where('status', 2)->paginate(10);
                    break;

                case 'cancelled':
                    $orders = Order::orderBy('id', 'DESC')->where('status', 0)->paginate(10);
                    break;
            }
        }elseif (request()->has('date')) {
            switch (request('date')) {
                case 'today':
                    $orders = Order::today()->orderBy('id', 'DESC')->paginate(10);
                    break;

                case 'yesterday':
                    $orders = Order::yesterday()->orderBy('id', 'DESC')->paginate(10);
                    break;
            }
        }elseif(request()->has('userID')){

            $user = User::find(request('userID'));
            if ($user){
                $orders = Order::where('user_id', $user->id)->orderBy('id', 'DESC')->paginate(10);
            }

        }elseif (request()->has('workerID')){
            $worker = Worker::find(request('workerID'));
            if ($worker){
                $orders = Order::where('worker_id', $worker->id)->orderBy('id', 'DESC')->paginate(10);
            }
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

        $config['places'] = TRUE;
        $config['placesLocation'] = $order->lat .','. $order->lng;
        $config['placesRadius'] = 200;

//        $config['directions'] = false;
//        $config['directionsStart'] = '15.565760, 32.517937';
//        $config['directionsEnd'] = '15.579741, 32.535823';
//        $config['directionsDivID'] = 'directionsDiv';

        GMapsFacade::initialize($config);

        $marker['position'] = $position;
        $marker['infowindow_content'] = 'موقع صاحب الطلب';
        $marker['animation'] = 'BOUNCE';

        GMapsFacade::add_marker($marker);

        $map = GMapsFacade::create_map();

        return view('orders.show')->with(['map' => $map, 'order' => $order]);

    }

    public function cancelOrder(Order $order){

        $order->status = 0;
        $order->update();

        return back();
    }

    public function prepareAssociate(Order $order){

        $workers = Worker::all();
        $cities = City::all();
        $jobs = Job::all();

        return view('orders.associate')->with([
            'workers' => $workers,
            'cities' => $cities,
            'jobs' => $jobs,
            'order' => $order,
        ]);

    }

    public function associate(Request $request, Order $order){

        $orderID = $order->id;
        $worker = Worker::find($request->get('worker_id'));

        $order->update([
            'worker_id' => $worker->id,
            'status' => $request->get('status')
        ]);

        return redirect()->route('orders.show', $orderID);
    }
}
