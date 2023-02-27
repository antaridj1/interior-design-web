<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArchitectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $architects = Employee::where('isAdmin',0)->get();
        return view('architect.index', compact('architects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('architect.create');
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
            'name' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        Employee::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'isAdmin' => 0
        ]);

        return redirect('employee/architect')
            ->with('status','success')
            ->with('message','Architect berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $architect
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $architect)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $architect
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $architect)
    {
        return view('architect.edit',compact('architect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $architect
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $architect)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);

        $architect->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);

        return redirect('employee/architect')
            ->with('status','success')
            ->with('message','Architect berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $architect
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $architect)
    {
        $architect->update([
            'email' => Str::random(8).'@gmail.com'
        ]);
        $architect->delete();

        return redirect('employee/architect')
            ->with('status','success')
            ->with('message','Akun berhasil dihapus');
    }
}
