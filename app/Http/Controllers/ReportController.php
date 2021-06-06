<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(Request $req)
    {
        $input = $req->all();
        if($req->filled('start_date') && $req->filled('end_date')) {
            $input['start_date'] = date('Y-m-d', strtotime($input['start_date']));
            $input['end_date'] = date('Y-m-d', strtotime($input["end_date"]));
        } else {
            $input['start_date'] = date('Y-m-d', strtotime(Carbon::now()));
            $input['end_date'] = date('Y-m-d', strtotime(Carbon::now()));
        }
        $orders = Order::whereBetween('created_at', [$input['start_date'].' 00:00:00', $input['end_date'].' 23:59:59'])
                        ->orderBy('created_at', 'desc')->get();
        $new_count = Order::where('status', '=', 'new')
                            ->whereBetween('created_at', [$input['start_date'].' 00:00:00', $input['end_date'].' 23:59:59'])
                            ->count();
        $verified_count = Order::where('status', '=', 'verified')
                                ->whereBetween('created_at', [$input['start_date'].' 00:00:00', $input['end_date'].' 23:59:59'])
                                ->count();
        $handed_count = Order::where('status', '=', 'handed')
                                ->whereBetween('created_at', [$input['start_date'].' 00:00:00', $input['end_date'].' 23:59:59'])
                                ->count();
        $received_count = Order::where('status', '=', 'received')
                                ->whereBetween('created_at', [$input['start_date'].' 00:00:00', $input['end_date'].' 23:59:59'])
                                ->count();
        return view('admin.report.index', [
            'start_date' => date('m/d/Y', strtotime($input['start_date'])),
            'end_date' => date('m/d/Y', strtotime($input['end_date'])),
            'orders' => $orders,
            'new_count' => $new_count,
            'verified_count' => $verified_count,
            'handed_count' => $handed_count,
            'received_count' => $received_count,
            ]);
    }
}
