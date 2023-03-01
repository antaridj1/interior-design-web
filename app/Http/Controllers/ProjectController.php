<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
    {   
        $orders = Order::where('user_id', Auth::id())->where('status',1)->get();
        return view('project', compact('orders'));
    }

}
