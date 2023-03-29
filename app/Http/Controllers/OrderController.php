<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Nota;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(roleController('admin')){
            if($request->status){
                $orders = Order::where('status', $request->status)->get();
            } elseif($request->filter === 'today'){
                $orders = Order::whereDate('created_at', Carbon::today())->get();
            } elseif ($request->filter !== 'today' && !$request->status) {
                 $orders = Order::all();
            }
        } else {
            if($request->status){
                $orders = Order::where('employee_id', Auth::id())->where('status', $request->status)->get();
            } elseif($request->filter === 'today'){
                $orders = Order::where('employee_id', Auth::id())->whereDate('created_at', Carbon::today())->get();
            } elseif ($request->filter !== 'today' && !$request->status) {
                 $orders = Order::where('employee_id', Auth::id())->get();
            }
        }
       
        return view('order.index', compact('orders'));
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
        $month = Carbon::parse($request->started_month)->toDateString();
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Str::random(8),
        ]);
        Order::create([
            'user_id' => $user->id,
            'employee_id' => 1,
            'type' => $request->type,
            'isRenovation' => $request->isRenovation,
            'needs' => $request->needs,
            'location' => $request->location,
            'room_size' => $request->room_size,
            'interior_style_id' => $request->interior_style_id,
            'budget' => $request->budget,
            'started_month' => $month,
            'detail' => $request->detail
        ]);

        return redirect('employee/order')
        ->with('status','success')
        ->with('message','Order telah dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $order = Order::find($id);
        $architects = Employee::where('isAdmin',false)->get();
        return view('order.show',compact('order', 'architects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $notas = null;
        $nota = Nota::where('order_id',$order->id);
        if($nota->count() > 0){
            $notas = $nota->get();
        }
        return view('order.edit',compact('order', 'notas'));
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
        if($order->status == IS_TERKIRIM){
            $order->update([
                'detail' => $request->detail,
            ]);
        } else {
            $request->validate([
                'results' => 'image|mimes:jpg,png,jpeg,gif,svg',
                'progress' => 'required|numeric|min:0|max:100',
            ]);

            if($request->file('results')){
                $image_path = $request->file('results')->store('image', 'public');
            } else {
                $image_path = $order->results;
            }
            $progress = $request->progress > $order->progress? true : false;
            $order->update([
                'detail' => $request->detail,
                'progress' => $request->progress,
                'documents' => $request->documents,
                'results' => $image_path
            ]);
           
            if($progress === true){
                $to = User::where('id',$order->user->id)->value('email');
                
                $details = [
                    'title' => 'Progress Interior Telah Diupdate',
                    'body' => 'Progress interior Anda sudah diupdate menjadi '.$request->progress.'%.'
                ];
                Mail::to($to)->send(new \App\Mail\SendEmail($details));
                
            }

            if($order->progress == 100){
                $order->update([
                    'status' => IS_SELESAI_DIPROSES
                ]);
            }
        }

        if(roleController('admin')){
            $nota = Nota::where('order_id',$order->id);
        
            if($nota->count() > 0){
                $nota->delete();
            }

            if(collect($request->name)->count() > 0){
                $names = collect($request->name);
                $qtys = collect($request->qty);
                $prices = collect($request->price);
                $totals = collect($request->total);

                foreach ($names as $key => $name) {
                    Nota::create([
                        'order_id' => $order->id,
                        'name' => $name,
                        'qty' => $qtys[$key],
                        'price' => $prices[$key],
                        'total' => $totals[$key],
                    ]);
                }

                $order->update([
                    'subtotal' => $request->subtotal
                ]);
            }
        }

        return redirect('employee/order')
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

        return back()
            ->with('status','success')
            ->with('message','order berhasil terhapus');
    }

    public function updateStatus(Request $request, Order $order){
        if ($request->status == IS_DIPROSES){
            $request->validate([
                'architect_id' => 'required',
            ]);

            $order->update([
                'status' => IS_DIPROSES,
                'employee_id' => $request->architect_id,
            ]);

            // Employee::where('id', $request->architect_id)->update([
            //     'status' => false
            // ]);

        } elseif($request->status == IS_SELESAI_DIPROSES){
            $order->update([
                'status' => IS_SELESAI_DIPROSES,
            ]);

        }
        return back()
            ->with('status','success')
            ->with('message','Status order berhasil diupdate');
    }

    public function printNota(Order $order){
        return view('order.nota', compact('order'));
    }

}
