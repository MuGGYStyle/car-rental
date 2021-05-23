<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        $new_count = Order::where('status', '=', 'new')->count();
        $verified_count = Order::where('status', '=', 'verified')->count();
        $handed_count = Order::where('status', '=', 'handed')->count();
        $received_count = Order::where('status', '=', 'received')->count();
        return view('admin.index', ['orders' => $orders, 'new_count' => $new_count, 'verified_count' => $verified_count, 'handed_count' => $handed_count, 'received_count' => $received_count]);
    }

    public function changeStatus($id, $status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();

        return redirect('/admin');
    }

    public function orderDestroy($id)
    {
        if (Order::destroy($id))
		{
			return response()->json([
				'title' => 'Deleted!',
				'body' => '',
				'orderId' => $id
			]);
		} else {
			return response()->json([
				'title' => 'Failed!',
				'body' => '',
				'orderId' => ''
			]);
		}
    }
}
