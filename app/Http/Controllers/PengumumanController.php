<?php

namespace App\Http\Controllers;

use App\Models\DataPengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index(){
        
        return view("pengumuman.index");
    }
    public function show(Request $request){
        $NomorPendaftar = $request->nomor_pendaftaran;
        $dataPengumuman = DataPengumuman::find($NomorPendaftar);

        if ($dataPengumuman) {
            return view('lolos.index');
            } else {
            return view('gagal.index');
            }
    }
    public function store(Request $request){
        $this->validate($request,[
            "nomor"=> ["required"],
            "nama_lengkap"=> ["required"],
            "nisn"=> ["required"],
            "jalur"=> ["required"],
        ]);
        $diterima = new DataPengumuman();
        $diterima->id_pendaftaran = $request->nomor;
        $diterima->nama_siswa = $request->nama_lengkap;
        $diterima->nisn = $request->nisn;
        $diterima->jalur = $request->jalur;
        $diterima->save();
        return redirect()->route('admin.index')->with('success', 'Siswa telah diterima');

    }

    public function create(){
        return view('pengumuman.create');

    }

    public function edit($id){

    }

    public function update(Request $request, $id){
        $this->validate($request,[
            "nomor"=> ["required"],
            "nama_lengkap"=> ["required"],
            "nisn"=> ["required"],
            "jalur"=> ["required"],
        ]);
        $diterima = new DataPengumuman();
        $diterima->id_pendaftaran = $request->nomor;
        $diterima->nama_siswa = $request->nama_lengkap;
        $diterima->nisn = $request->nisn;
        $diterima->jalur = $request->jalur;
        $diterima->save();
        return redirect()->route('admin.index')->with('success', 'Siswa telah diterima');
    }
    public function destroy($id){

    }
}
