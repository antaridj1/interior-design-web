<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Laporan;
use App\Models\Order;
use App\Models\Portfolio;
use App\Models\TypeInterior;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(roleController('admin')){
            $jumlah_masuk = Order::where('status', 0)->count();
            $jumlah_diproses = Order::where('status', 1)->count();
            $jumlah_selesai = Order::where('status', 2)->count();
            $orders = Order::whereDate('created_at', Carbon::today())->get();
            return view('home', compact('jumlah_masuk' ,'jumlah_diproses', 'jumlah_selesai','orders'));
        } else {
            $jumlah_diproses = Order::where('employee_id', Auth::id())->where('status', 1)->count();
            $jumlah_selesai = Order::where('employee_id', Auth::id())->where('status', 2)->count();
            $order = Order::where('employee_id',Auth::id())->latest()->take(1)->first();
            return view('home', compact('jumlah_diproses', 'jumlah_selesai','order'));
        }
    }

    public function landingPage(){
        $type_interiors = TypeInterior::all();
        $portfolios = Portfolio::all();
        $company = Company::first();
        return view('landing-page', compact('type_interiors', 'portfolios', 'company'));
    }
}
