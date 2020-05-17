<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
            $data_mahasiswa = \App\Mahasiswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_mahasiswa = \App\Mahasiswa::all();
        }
        return view('mahasiswa.index',['data_mahasiswa' => $data_mahasiswa]);
    }

    public function create(Request $request)
    {
        \App\Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('sukses','Data Berhasil Di Masukkan');
    }

    public function edit($id)
    {
        $mahasiswa = \App\mahasiswa::find($id);
        return view('mahasiswa/edit',['mahasiswa'=>$mahasiswa]);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = \App\mahasiswa::find($id);
        $mahasiswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $mahasiswa->avatar =$request->file('avatar')->getClientOriginalName();
            $mahasiswa->save();
        }
        return redirect('/mahasiswa')->with('sukses','Data Berhasil Di Update');
        
    }

    public function delete($id)
    {
        $mahasiswa = \App\mahasiswa::find($id);
        $mahasiswa->delete($mahasiswa);
        return redirect('/mahasiswa')->with('sukses','Data Berhasil Di Hapus');
    }

    public function profile($id)
    {
        $mahasiswa = \App\Mahasiswa::find($id);
        return view('mahasiswa.profile',['mahasiswa' => $mahasiswa]);
    }
}
