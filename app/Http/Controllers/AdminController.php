<?php

namespace App\Http\Controllers;
use App\Models\DataSiswaAfirmasi;
use App\Models\DataSiswaPindahan;
use App\Models\DataSiswaPrestasi;
use App\Models\DataSiswaZonasi;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $jumlahAfirmasi = DataSiswaAfirmasi::count();
        $jumlahPrestasi = DataSiswaPrestasi::count();
        $jumlahZonasi = DataSiswaZonasi::count();
        $jumlahPindahan = DataSiswaPindahan::count();
        return view("admin.index",[
            'data_siswa_afirmasi' => DataSiswaAfirmasi::get(),
            'data_siswa_prestasi' => DataSiswaPrestasi::get(),
            'data_siswa_zonasi' => DataSiswaZonasi::get(),
            'data_siswa_pindahan' => DataSiswaPindahan::get(),
            'jumlah_afirmasi' => $jumlahAfirmasi,
            'jumlah_pindahan'=> $jumlahPindahan,
            'jumlah_zonasi'=> $jumlahZonasi,
            'jumlah_prestasi'=> $jumlahPrestasi
        ]);
    }
}
