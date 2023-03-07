<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(Request $request)
    {   
        $orders_sent = Order::where('user_id', Auth::id())->where('status',0)->get();
        $orders_ongoing = Order::where('user_id', Auth::id())->where('status',1)->get();
        $orders = Order::where('user_id', Auth::id())->get();
        return view('project', compact('orders_sent','orders_ongoing','orders'));
    }

}
