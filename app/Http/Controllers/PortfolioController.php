<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\TypeInterior;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_interiors = TypeInterior::all();
        return view('portfolio.create', compact('type_interiors'));
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
            'type_interior_id' => 'required',
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'description' => 'required'
        ]);

        $image_path = $request->file('image')->store('image', 'public');

        Portfolio::create([
            'type_interior_id' => $request->type_interior_id,
            'name' => $request->name,
            'image' => $image_path,
            'description' => $request->description
        ]);

        return redirect('employee/portfolio')
            ->with('status','success')
            ->with('message','Data berhasil ditambah');
    }


    public function edit(Portfolio $portfolio)
    {
        $type_interiors = TypeInterior::all();
        return view('portfolio.edit', compact('portfolio','type_interiors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'type_interior_id' => 'required',
            'name' => 'required',
            'description' => 'required'
        ]);

        if($request->file('image')){
            $image_path = $request->file('image')->store('image', 'public');
        } else {
            $image_path = $portfolio->image;
        }

        $portfolio->update([
            'type_interior_id' => $request->type_interior_id,
            'name' => $request->name,
            'image' => $image_path,
            'description' => $request->description
        ]);

        return redirect('employee/portfolio')
            ->with('status','success')
            ->with('message','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return redirect('employee/portfolio')
            ->with('status','success')
            ->with('message','Data berhasil dihapus');
    }
}
