<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function update(Request $request){
        
        if($request->password){
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'min:8'
            ]);
            User::where('id', Auth::id())->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);
            User::where('id', Auth::id())->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        }

        return redirect('profile')
            ->with('status','success')
            ->with('message','Profil berhasil diedit');
    }
}
