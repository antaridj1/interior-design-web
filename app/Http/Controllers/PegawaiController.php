<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawais = User::where('role','pegawai')->get();
        return view('pegawai.index', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.create');
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
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'pegawai'
        ]);

        return redirect('pegawai')
            ->with('status','success')
            ->with('message','Pegawai berhasil ditambah');
    }

    public function edit(User $pegawai)
    {
        return view('pegawai.edit',compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pegawai)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $pegawai->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('pegawai')
            ->with('status','success')
            ->with('message','Pegawai berhasil diedit');
    }

    public function update_status(User $pegawai){
        if ($pegawai->status == true) {
            $pegawai->update([
                'status' => false
            ]);
        } else {
            $pegawai->update([
                'status' => true
            ]);
        }

        return redirect('pegawai')
            ->with('status','success')
            ->with('message','Status pegawai berhasil diedit');
        
    }

    public function destroy(User $pegawai){
        $pegawai->update([
            'email' => Str::random(8).'@gmail.com'
        ]);
        $pegawai->delete();

        return redirect('pegawai')
            ->with('status','success')
            ->with('message','Akun berhasil dihapus');
    }

}
