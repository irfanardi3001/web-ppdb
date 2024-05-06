<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_siswa_afirmasi', function(Blueprint $table){
            $table->increments('id');
            $table->string("Nama_Siswa");
            $table->string("Asal_Sekolah");
            $table->string("Jenis_Kelamin");
            $table->string("Tempat_Lahir");
            $table->date("Tanggal_Lahir");
            $table->string("NISN");
            $table->string("Agama");
            $table->string("Alamat_Provinsi_Siswa");
            $table->string("Alamat_Kabupaten/Kota_Siswa");
            $table->string("Alamat_Kecamatan_Siswa");
            $table->string("Alamat_Desa_Siswa");
            $table->string("Nama_Ayah_Kandung");
            $table->string("Pendidikan_Terakhir_Ayah");
            $table->string("Pekerjaan_Ayah");
            $table->string("Penghasilan_Ayah");
            $table->string("Alamat_Provinsi_Ayah");
            $table->string("Alamat_Kabupaten/Kota_Ayah");
            $table->string("Alamat_Kecamatan_Ayah");
            $table->string("Alamat_Desa_Ayah");
            $table->string("Nama_Ibu_Kandung");
            $table->string("Pendidikan_Terakhir_Ibu");
            $table->string("Pekerjaan_Ibu");
            $table->string("Penghasilan_Ibu");
            $table->string("Alamat_Provinsi_Ibu");
            $table->string("Alamat_Kabupaten/Kota_Ibu");
            $table->string("Alamat_Kecamatan_Ibu");
            $table->string("Alamat_Desa_Ibu");
            $table->string("Nama_Wali_Murid");
            $table->string("Pendidikan_Terakhir_Wali");
            $table->string("Pekerjaan_Wali");
            $table->string("Penghasilan_Wali");
            $table->string("Alamat_Provinsi_Wali");
            $table->string("Alamat_Kabupaten/Kota_Wali");
            $table->string("Alamat_Kecamatan_Wali");
            $table->string("Alamat_Desa_wali");
            $table->timestamps();
        });    
    }

    /**
    * Reverse the migrations.
    */
    public function down(): void
    {
        //
    }
};
