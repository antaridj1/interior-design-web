<?php

namespace App\Http\Controllers;

use App\Models\TypeInterior;
use Illuminate\Http\Request;

class TypeInteriorController extends Controller
{
    public function index()
    {
        $type_interiors = TypeInterior::all();
        return view('type-interior.index', compact('type_interiors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type-interior.create');
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
            'description' => 'required'
        ]);
        
        TypeInterior::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('employee/type-interior')
            ->with('status','success')
            ->with('message','Data berhasil ditambah');
    }

    public function show(TypeInterior $type_interior)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeInterior  $type_interior
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeInterior $type_interior)
    {
        return view('type-interior.edit',compact('type_interior'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeInterior  $type_interior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeInterior $type_interior)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $type_interior->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect('employee/type-interior')
            ->with('status','success')
            ->with('message','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeInterior  $type_interior
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypeInterior $type_interior)
    {
        $type_interior->delete();

        return redirect('employee/type-interior')
            ->with('status','success')
            ->with('message','Data berhasil dihapus');
    }
}
