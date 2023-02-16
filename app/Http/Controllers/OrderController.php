<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
            return view('order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'judul' => 'required',
            'detail' => 'required',
        ]);

        Order::create([
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'detail' => $request->detail,
            'user_id' => Auth::id()
        ]);

        return redirect('order')
            ->with('status','success')
            ->with('message','order berhasil terkirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $pegawais = User::where('role','pegawai')->get();
        $order = Order::find($id);
        return view('order.show',compact('order','pegawais'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'kategori' => 'required',
            'judul' => 'required',
            'detail' => 'required',
        ]);

        $order->update([
            'kategori' => $request->kategori,
            'judul' => $request->judul,
            'detail' => $request->detail,
        ]);

        return redirect('order')
            ->with('status','success')
            ->with('message','order berhasil terupdate');
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

        return redirect('order')
            ->with('status','success')
            ->with('message','order berhasil terhapus');
    }

}
