<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Order;
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
        // $jumlah_terkirim = Laporan::where('status', IS_TERKIRIM)->count();
        $jumlah_diproses = Order::where('status', 1)->count();
        $jumlah_selesai = Order::where('status', 2)->count();
        $order = Order::where('employee_id',Auth::id())->latest()->take(1)->first();

        // $jumlah_selesai_diproses = Laporan::where('status', IS_SELESAI_DIPROSES)->count();

        // if(Auth::user()->role === 'unit'){
        //     $jumlah_diterima = Laporan::where('status', IS_DITERIMA)->count();
        //     $laporan = Laporan::where('user_id',Auth::id())->latest()->take(1)->first();
        //     $laporans = Laporan::where('user_id',Auth::id())->latest()->get();
        // }elseif(Auth::user()->role === 'pegawai'){
        //     $jumlah_diterima = Laporan::where('status', IS_DITERIMA)->where('user_master_id',Auth::id())->count();
        //     $laporan = Laporan::where('user_master_id',Auth::id())->latest()->take(1)->first();
        //     $laporans = Laporan::where('user_master_id',Auth::id())->orWhere('status', IS_DITERIMA)->latest()->get();
        // }else{
        //     $jumlah_diterima = Laporan::where('status', IS_DITERIMA)->count();
        //     $laporan = Laporan::where('user_master_id',Auth::id())->latest()->take(1)->first();
        //     $laporans = Laporan::latest()->get();
        // }
        

        return view('home', compact('jumlah_diproses', 'jumlah_selesai','order'));
    }
}
