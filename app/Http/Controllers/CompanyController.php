<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::first();
        return view('company.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $company = Company::first();
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'telp' => 'required',
            'email' => 'required',
            'description' => 'required',
            'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg,ico',
            'favicon' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
            'jumbotron' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        $image_logo = $request->file('logo')->store('image', 'public');
        $image_favicon = $request->file('favicon')->store('image', 'public');
        $image_jumbotron = $request->file('jumbotron')->store('image', 'public');

        $company->update([
            'name' => $request->name,
            'address' => $request->address,
            'telp' => $request->telp,
            'email' => $request->email,
            'description' => $request->description,
            'logo' => $image_logo,
            'favicon' => $image_favicon,
            'jumbotron' => $image_jumbotron,
        ]);
    }
}
