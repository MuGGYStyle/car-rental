<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Order;
use App\CarTransmission;
use App\CarGroup;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index', [
            'start_date' => date('m/d/Y', strtotime(Carbon::now())),
            'end_date' => date('m/d/Y', strtotime(Carbon::now()->addDays(1)))
            ]);
    }

    public function getCars(Request $req)
    {
        $input = $req->all();
        if($req->filled('start_date') && $req->filled('end_date')) {
            $input['start_date'] = date('Y-m-d', strtotime($input['start_date']));
            $input['end_date'] = date('Y-m-d', strtotime($input["end_date"]));
        } else {
            $input['start_date'] = date('Y-m-d', strtotime(Carbon::now()));
            $input['end_date'] = date('Y-m-d', strtotime(Carbon::now()->addDays(1)));
        }
        $earlier = new \DateTime($input['start_date']);
        $later = new \DateTime($input['end_date']);

        $total_day = $later->diff($earlier)->format("%a");

        $car_groups = \DB::select('
        SELECT g.*, COUNT(c.id) as cars, COUNT(o.id) as orders FROM 
        car_group g 
        left join cars c on g.id=c.car_group_id 
        left join orders o on c.id=o.car_id 
        where c.id is not null and 
        (o.id is null or ((o.start_date not between ? and ?) and (o.end_date not between ? and ?) and o.start_date > ? or o.end_date < ?)) group by g.id', 
            [$input['start_date'], $input['end_date'], $input['start_date'], $input['end_date'], $input['end_date'], $input['start_date']]);
        return view('cars', [
                                'car_groups' => $car_groups, 
                                'start_date' => date('m/d/Y', strtotime($input['start_date'])), 
                                'end_date' => date('m/d/Y', strtotime($input['end_date'])),
                                'total_day' => $total_day
                            ]);
    }

    public function contact(Request $req, $id)
    {
        $input = $req->all();
        $input['start_date'] = date('Y-m-d', strtotime($input['start_date']));
        $input['end_date'] = date('Y-m-d', strtotime($input["end_date"]));
        $car_group = CarGroup::find($id);
        $earlier = new \DateTime($input['start_date']);
        $later = new \DateTime($input['end_date']);
        $total_day = $later->diff($earlier)->format("%a");
        $cars = \DB::select('
        select c.*, ct.name as transmission from cars c 
        left join car_transmission ct on ct.id=c.car_trans_id 
        left join orders o on c.id=o.car_id 
        where c.car_group_id=? and 
        (o.id is null or ((o.start_date not between ? and ?) and (o.end_date not between ? and ?) and o.start_date > ? or o.end_date < ?)) group by c.id LIMIT 1',
            [$id, $input['start_date'], $input['end_date'], $input['start_date'], $input['end_date'], $input['end_date'], $input['start_date']]
        );
        return view('contact', [
            'car' => $cars[0], 
            'car_group' => $car_group, 
            'start_date' => $input['start_date'], 
            'end_date' => $input['end_date'],
            'total_day' => $total_day
            ]);
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
