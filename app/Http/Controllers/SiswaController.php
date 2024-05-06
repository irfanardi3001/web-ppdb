<?php

namespace App\Http\Controllers;

use App\Models\DataSiswaAfirmasi;
use App\Models\DataSiswaPindahan;
use App\Models\DataSiswaPrestasi;
use App\Models\DataSiswaZonasi;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("siswa.index",[
            'data_siswa_afirmasi' => DataSiswaAfirmasi::get(),
            'data_siswa_prestasi' => DataSiswaPrestasi::get(),
            'data_siswa_zonasi' => DataSiswaZonasi::get(),
            'data_siswa_pindahan' => DataSiswaPindahan::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
