<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\StyleInterior;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:web');
        if (Auth::user() === null){
            session()->put('auth', 'warning');
            session()->put('message','Anda harus login terlebih dahulu');
            return view('auth.login');
        }

    }

    public function index(Request $request)
    {   
        $orders_sent = Order::where('user_id', Auth::id())->where('status',0)->get();
        $orders_ongoing = Order::where('user_id', Auth::id())->where('status',1)->get();
        $orders = Order::where('user_id', Auth::id())->get();
        return view('order-user.index', compact('orders_sent','orders_ongoing','orders'));
    }

    public function create()
    {   
        $styles = StyleInterior::all();
        return view('order-user.create', compact('styles'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'type_interior_id' => 'required',
            'isRenovation' => 'required',
            'needs' => 'required',
            'location' => 'required',
            'started_month' => 'required',
        ]);

        $month = Carbon::parse($request->started_month)->toDateString();

        $styles = (array)$request->style_interior;
        Order::create([
            'user_id' => Auth::id(),
            'type_interior_id' => $request->type_interior_id,
            'isRenovation' => $request->isRenovation,
            'needs' => $request->needs,
            'location' => $request->location,
            'room_size' => $request->room_size,
            'style_interior' => $styles,
            'budget' => $request->budget,
            'started_month' => $month,
            'detail' => $request->detail
        ]);

        return redirect('order-user/create')
        ->with('status','success')
        ->with('message','Formulir telah dikirim');
    }

    
    public function printNota(Order $order){
        return view('order.nota', compact('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect('order-user')
            ->with('status','success')
            ->with('message','order berhasil terhapus');
    }

    public function uploadBuktiBayar(Request $request, Order $order){
        $request->validate([
            'bukti_bayar' => 'required',
        ]);

        if($request->file('bukti_bayar')){
            $image_path = $request->file('bukti_bayar')->store('image', 'public');
        }

        $order->update([
            'bukti_bayar' => $image_path,
        ]);

        return redirect('order-user')
            ->with('status','success')
            ->with('message','Bukti Pembayaran Berhasil Diupload');
    }
}
