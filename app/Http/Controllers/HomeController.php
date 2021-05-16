<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Order;
use App\CarTransmission;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cars = \DB::table('cars')
                ->select(\DB::raw('cars.*, car_transmission.name as transmission_name'))
                ->leftJoin('orders','orders.car_id','=','cars.id')
                ->leftJoin('car_transmission','car_transmission.id','=','cars.car_trans_id')
                ->whereNull('orders.car_id')
                ->orWhere(function($query) {
                    $query->where('orders.status', '=', 'new');
                    $query->orWhere('orders.status', '=', 'received');
                })
                ->groupBy('cars.id')
                ->orderBy('cars.id')
                ->paginate(6);
        return view('index', ['cars' => $cars]);
    }

    public function getCars(Request $req)
    {
        if($req->filled('start_date') && $req->filled('end_date')) {
            $input = $req->all();
            $input['start_date'] = date('Y-m-d', strtotime($input['start_date']));
            $input['end_date'] = date('Y-m-d', strtotime($input["end_date"]));
            $cars = \DB::table('cars')
                ->select(\DB::raw('cars.*, car_transmission.name as transmission_name'))
                ->leftJoin('orders','orders.car_id','=','cars.id')
                ->leftJoin('car_transmission','car_transmission.id','=','cars.car_trans_id')
                ->whereNull('orders.car_id')
                ->orWhere(function($query) use ($input) {
                    $query->where('orders.end_date', '<', $input['start_date']);
                    $query->orWhere('orders.start_date', '>', $input['end_date']);
                })
                ->groupBy('cars.id')
                ->orderBy('cars.id')
                ->paginate(6);
            $queryArgs = $req->only(['start_date', 'end_date']);
            $cars->appends($queryArgs);
            return view('cars', ['cars' => $cars, 'start_date' => $input['start_date'], 'end_date' => $input['end_date']]);
        } else {
            $cars = \DB::table('cars')
                ->select(\DB::raw('cars.*, car_transmission.name as transmission_name'))
                ->leftJoin('orders','orders.car_id','=','cars.id')
                ->leftJoin('car_transmission','car_transmission.id','=','cars.car_trans_id')
                ->whereNull('orders.car_id')
                ->orWhere(function($query) {
                    $query->where('orders.status', '=', 'new');
                    $query->orWhere('orders.status', '=', 'received');
                })
                ->groupBy('cars.id')
                ->orderBy('cars.id')
                ->paginate(6);
            return view('cars', ['cars' => $cars, 'start_date' => null, 'end_date' => null]);
        }
    }

    public function contact(Request $req, $id)
    {
        $car = Car::find($id);
        if($req->filled('start_date') && $req->filled('end_date')) {
            $input = $req->all();
            return view('contact', ['car' => $car, 'start_date' => $input['start_date'], 'end_date' => $input['end_date']]);
        } else {
            return view('contact', ['car' => $car, 'start_date' => null, 'end_date' => null]);
        }
    }

    public function order(Request $request ,$id)
    {
        $input = $request->all();

        $order = new Order();
        $order->start_date = $input['start_date'];
        $order->end_date = $input['end_date'];
        $order->c_fname = $input['fname'];
        $order->c_lname = $input['lname'];
        $order->c_email = $input['email'];
        $order->c_message = $input['message'];
        $order->car_id = $id;
        $order->status = 'new';

        $order->save();

        return redirect('/')->with('status', 'Таны захиалга амжилттай бүртгэгдлээ.');
    }
}
