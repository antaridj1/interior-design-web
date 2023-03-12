<?php

namespace App\Http\Controllers;

use App\Models\StyleInterior;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StyleInteriorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $style_interiors = StyleInterior::all();
        return view('style-interior.index', compact('style_interiors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('style-interior.create');
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'description' => 'required'
        ]);

        $image_path = $request->file('image')->store('image', 'public');

        StyleInterior::create([
            'name' => $request->name,
            'image' => $image_path,
            'description' => $request->description
        ]);

        return redirect('employee/style-interior')
            ->with('status','success')
            ->with('message','Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StyleInterior  $style_interior
     * @return \Illuminate\Http\Response
     */
    public function show(StyleInterior $style_interior)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StyleInterior  $style_interior
     * @return \Illuminate\Http\Response
     */
    public function edit(StyleInterior $style_interior)
    {
        return view('style-interior.edit',compact('style_interior'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StyleInterior  $style_interior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StyleInterior $style_interior)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        if($request->file('image')){
            $image_path = $request->file('image')->store('image', 'public');
        } else {
            $image_path = $style_interior->image;
        }

        $style_interior->update([
            'name' => $request->name,
            'image' => $image_path,
            'description' => $request->description
        ]);

        return redirect('employee/style-interior')
            ->with('status','success')
            ->with('message','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StyleInterior  $style_interior
     * @return \Illuminate\Http\Response
     */
    public function destroy(StyleInterior $style_interior)
    {
        $style_interior->delete();

        return redirect('employee/style-interior')
            ->with('status','success')
            ->with('message','Data berhasil dihapus');
    }
}
