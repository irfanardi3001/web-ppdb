<?php

namespace App\Http\Controllers;

use App\Models\DataSiswaPindahan;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Kabupaten;
use Laravolt\Indonesia\Models\Kecamatan;
use Laravolt\Indonesia\Models\Kelurahan;

class PindahanController extends Controller
{
    public function index(){
        return view("pindahan.index",[
            'data_siswa_pindahan' => DataSiswaPindahan::get(),
        ]);
    }
    public function create(){
        if (auth()->user()->status_pendaftaran === 'sudah_pendaftaran') {
            return redirect()->route('siswa.index')->with('error', 'Anda sudah pernah mengajukan formulir pendaftaran PPDB, silahkan tunggu pengumuman');
        }
        return view("pindahan.create");
    }
    public function store(Request $request){
        $this->validate($request,[
            "nama_lengkap"=> "required",
            "asal_sekolah"=> "required",
            "jenis_kelamin"=> "required",
            "tempat_lahir"=> "required",
            "tanggal_lahir"=> "required",
            "nisn"=> "required",
            "agama"=> "required",
            "provinsi_siswa"=> "required",
            "kota_siswa"=> "required",
            "kecamatan_siswa"=> "required",
            "desa_siswa"=> "required",
            "pendidikan_ayah"=> $request->filled("nama_ayah_kandung") ? "required" : "",
            "pekerjaan_ayah"=> $request->filled("nama_ayah_kandung") ? "required" : "",
            "penghasilan_ayah"=> $request->filled("nama_ayah_kandung") ? "required" : "",
            "provinsi_ayah"=> $request->filled("nama_ayah_kandung") ? "required" : "",
            "kota_ayah"=> $request->filled("nama_ayah_kandung") ? "required" : "",
            "kecamatan_ayah"=> $request->filled("nama_ayah_kandung") ? "required" : "",
            "desa_ayah"=> $request->filled("nama_ayah_kandung") ? "required" : "",

            "pendidikan_ibu"=> $request->filled("nama_ibu_kandung") ? "required" : "",
            "pekerjaan_ibu"=> $request->filled("nama_ibu_kandung") ? "required" : "",
            "penghasilan_ibu"=> $request->filled("nama_ibu_kandung") ? "required" : "",
            "provinsi_ibu"=> $request->filled("nama_ibu_kandung") ? "required" : "",
            "kota_ibu"=> $request->filled("nama_ibu_kandung") ? "required" : "",
            "kecamatan_ibu"=> $request->filled("nama_ibu_kandung") ? "required" : "",
            "desa_ibu"=> $request->filled("nama_ibu_kandung") ? "required" : "",

            "pendidikan_wali"=> $request->filled("nama_wali_murid") ? "required" : "",
            "pekerjaan_wali"=> $request->filled("nama_wali_murid") ? "required" : "",
            "penghasilan_wali"=> $request->filled("nama_wali_murid") ? "required" : "",
            "provinsi_wali"=> $request->filled("nama_wali_murid") ? "required" : "",
            "kota_wali"=> $request->filled("nama_wali_murid") ? "required" : "",
            "kecamatan_wali"=> $request->filled("nama_wali_murid") ? "required" : "",
            "desa_wali"=> $request->filled("nama_wali_murid") ? "required" : "",
      
             //Tolong yang ini ya, disesuaikan butuh apa
             "foto"=> ["image"],
             "raport"=> ["file"],
             "kts"=> ["image"],
             "skl"=> ["file"],
             "spkd"=> ["file"],
             "skop"=> ["file"],

            ],[
            "nama_lengkap.required"=> "Belum diisi",
            "asal_sekolah.required"=> "Belum diisi",
            "jenis_kelamin.required"=> "Belum diisi",
            "tempat_lahir.required"=> "Belum diisi",
            "tanggal_lahir.required"=> "Belum diisi",
            "nisn.required"=> "Belum diisi",
            "agama.required"=> "Belum dipilih",
            "provinsi_siswa.required"=> "Belum diisi",
            "kota_siswa.required"=> "Belum diisi",
            "kecamatan_siswa.required"=> "Belum diisi",
            "desa_siswa.required"=> "Belum diisi",
            "pendidikan_ayah"=> "Belum diisi",
            "pekerjaan_ayah"=> "Belum diisi",
            "penghasilan_ayah"=> "Belum diisi",
            "provinsi_ayah"=> "Belum diisi",
            "kota_ayah"=> "Belum diisi",
            "kecamatan_ayah"=> "Belum diisi",
            "desa_ayah"=> "Belum diisi",
            "pendidikan_ibu"=> "Belum diisi",
            "pekerjaan_ibu"=> "Belum diisi",
            "penghasilan_ibu"=> "Belum diisi",
            "provinsi_ibu"=> "Belum diisi",
            "kota_ibu"=> "Belum diisi",
            "kecamatan_ibu"=> "Belum diisi",
            "desa_ibu"=> "Belum diisi",
            "pendidikan_wali"=> "Belum diisi",
            "pekerjaan_wali"=> "Belum diisi",
            "penghasilan_wali"=> "Belum diisi",
            "provinsi_wali"=> "Belum diisi",
            "kota_wali"=> "Belum diisi",
            "kecamatan_wali"=> "Belum diisi",
            "desa_wali"=> "Belum diisi",
      
         //yang ini juga butuh apa
         "foto"=> "Belum diisi",
         "raport"=> "Belum diisi",
         "kts"=> "Belum diisi",
         "skl"=> "Belum diisi",
         "spkd"=> "Belum diisi",
         "skop"=> "Belum diisi",
     ]);

     //yang ini juga butuh apa
     $foto = null;
     $raport = null;
     $kts = null;
     $skl = null;
     $spkd = null;
     $skop = null;

     //yang ini juga butuh apa
     if($request->hasFile("foto") &&
     $request->hasfile("raport") &&
     $request->hasfile("kts") &&
     $request->hasfile("skl") &&
     $request->hasfile("spkd") &&
     $request->hasfile("skop")
     ) {
         //yang ini juga butuh apa
         $foto = $request->file("foto")->store('photos');
         $raport = $request->file('raport')->store('raport');
         $kts = $request->file('kts')->store('kts');
         $skl = $request->file('skl')->store('skl');
         $spkd = $request->file('spkd')->store('spkd');
         $skop = $request->file('skop')->store('skop');
     }

        $idProvinceSiswa = $request->provinsi_siswa;
        $province_siswa = Province::find($idProvinceSiswa);
        $idProvinceAyah = $request->provinsi_ayah;
        $province_ayah = Province::find($idProvinceAyah);
        $idProvinceIbu = $request->provinsi_ibu;
        $province_ibu = Province::find($idProvinceIbu);
        $idProvinceWali = $request->provinsi_wali;
        $province_wali = Province::find($idProvinceWali);
        
        $idCitiesSiswa = $request->kota_siswa;
        $cities_siswa = Kabupaten::find($idCitiesSiswa);
        $idCitiesAyah = $request->kota_ayah;
        $cities_ayah = Kabupaten::find($idCitiesAyah);
        $idCitiesIbu = $request->kota_ibu;
        $cities_ibu = Kabupaten::find($idCitiesIbu);
        $idCitiesWali = $request->kota_wali;
        $cities_wali = Kabupaten::find($idCitiesWali);

        $idDistrictSiswa = $request->kecamatan_siswa;
        $district_siswa = Kecamatan::find($idDistrictSiswa);
        $idDistrictAyah = $request->kecamatan_ayah;
        $district_ayah = Kecamatan::find($idDistrictAyah);
        $idDistrictIbu = $request->kecamatan_ibu;
        $district_ibu = Kecamatan::find($idDistrictIbu);
        $idDistrictWali = $request->kecamatan_wali;
        $district_wali = Kecamatan::find($idDistrictWali);

        $idVillageSiswa = $request->desa_siswa;
        $village_siswa = Kelurahan::find($idVillageSiswa);
        $idVillageAyah = $request->desa_ayah;
        $village_ayah = Kelurahan::find($idVillageAyah);
        $idVillageIbu = $request->desa_ibu;
        $village_ibu = Kelurahan::find($idVillageIbu);
        $idVillageWali = $request->desa_wali;
        $village_wali = Kelurahan::find($idVillageWali);

        
        $daftar_afirmasi = new DataSiswaPindahan();
        $daftar_afirmasi->Nama_Siswa = $request->nama_lengkap;
        $daftar_afirmasi->Asal_Sekolah = $request->asal_sekolah;
        $daftar_afirmasi->Jenis_Kelamin = $request->jenis_kelamin;
        $daftar_afirmasi->Tempat_Lahir = $request->tempat_lahir;
        $daftar_afirmasi->Tanggal_Lahir = $request->tanggal_lahir;
        $daftar_afirmasi->NISN = $request->nisn;
        $daftar_afirmasi->Agama = $request->agama;
        $daftar_afirmasi->Alamat_Provinsi_Siswa = $province_siswa->name;
        $daftar_afirmasi->Alamat_Kabupaten_Siswa = $cities_siswa->name;
        $daftar_afirmasi->Alamat_Kecamatan_Siswa = $district_siswa->name;
        $daftar_afirmasi->Alamat_Desa_Siswa = $village_siswa->name;
        $daftar_afirmasi->Nama_Ayah_Kandung = $request->nama_ayah_kandung;
        $daftar_afirmasi->Pendidikan_Terakhir_Ayah = $request->pendidikan_ayah;
        $daftar_afirmasi->Pekerjaan_Ayah = $request->pekerjaan_ayah;
        $daftar_afirmasi->Penghasilan_Ayah = $request->penghasilan_ayah;
        try{
            $daftar_afirmasi->Alamat_Provinsi_Ayah = $province_ayah->name;
            $daftar_afirmasi->Alamat_Kabupaten_Ayah = $cities_ayah->name;
            $daftar_afirmasi->Alamat_Kecamatan_Ayah = $district_ayah->name;
            $daftar_afirmasi->Alamat_Desa_Ayah = $village_ayah->name;
        } catch(\Exception $e) {
            $daftar_afirmasi->Alamat_Provinsi_Ayah = $request->provinsi_ayah;
            $daftar_afirmasi->Alamat_Kabupaten_Ayah = $request->kota_ayah;
            $daftar_afirmasi->Alamat_Kecamatan_Ayah = $request->kecamatan_ayah;
            $daftar_afirmasi->Alamat_Desa_Ayah = $request->desa_ayah;
        }
        $daftar_afirmasi->Nama_Ibu_Kandung = $request->nama_ibu_kandung;
        $daftar_afirmasi->Pendidikan_Terakhir_Ibu = $request->pendidikan_ibu;
        $daftar_afirmasi->Pekerjaan_Ibu = $request->pekerjaan_ibu;
        $daftar_afirmasi->Penghasilan_Ibu = $request->penghasilan_ibu;
        try{
            $daftar_afirmasi->Alamat_Provinsi_Ibu = $province_ibu->name;
            $daftar_afirmasi->Alamat_Kabupaten_Ibu = $cities_ibu->name;
            $daftar_afirmasi->Alamat_Kecamatan_Ibu = $district_ibu->name;
            $daftar_afirmasi->Alamat_Desa_Ibu = $village_ibu->name;
        } catch(\Exception $e){
            $daftar_afirmasi->Alamat_Provinsi_Ibu = $request->provinsi_ibu;
            $daftar_afirmasi->Alamat_Kabupaten_Ibu = $request->kota_ibu;
            $daftar_afirmasi->Alamat_Kecamatan_Ibu = $request->kecamatan_ibu;
            $daftar_afirmasi->Alamat_Desa_Ibu = $request->desa_ibu;
        }
        $daftar_afirmasi->Nama_Wali_Murid = $request->nama_wali_murid;
        $daftar_afirmasi->Pendidikan_Terakhir_Wali = $request->pendidikan_wali;
        $daftar_afirmasi->Pekerjaan_Wali = $request->pekerjaan_wali;
        $daftar_afirmasi->Penghasilan_Wali = $request->penghasilan_wali;
        try{
            $daftar_afirmasi->Alamat_Provinsi_Wali = $province_wali->name;
            $daftar_afirmasi->Alamat_Kabupaten_Wali = $cities_wali->name;
            $daftar_afirmasi->Alamat_Kecamatan_Wali = $district_wali->name;
            $daftar_afirmasi->Alamat_Desa_Wali = $village_wali->name;
        } catch (\Exception $e) {
            $daftar_afirmasi->Alamat_Provinsi_Wali = $request->provinsi_wali;
            $daftar_afirmasi->Alamat_Kabupaten_Wali = $request->kota_ibu;
            $daftar_afirmasi->Alamat_Kecamatan_Wali = $request->kecamatan_ibu;
            $daftar_afirmasi->Alamat_Desa_Wali = $request->desa_ibu;
        }
        //yang ini juga butuh apa
        $daftar_afirmasi->foto = $foto;
        $daftar_afirmasi->raport = $raport;
        $daftar_afirmasi->kts = $kts;
        $daftar_afirmasi->skl = $skl;
        $daftar_afirmasi->spkd = $spkd;
        $daftar_afirmasi->skop = $skop;

        $daftar_afirmasi->save();
        $dataPendaftaran = DataSiswaPindahan::get();
        $lastData = $dataPendaftaran->last();
        $getNomor = $lastData->id;

        auth()->user()->update([
            'status_pendaftaran' => 'sudah_pendaftaran',
            'noPendaftaran' => $getNomor,
            'jalur' => 'pindahan',
        ]);
        return redirect()->route('siswa.index')->with([
            'success' => 'Formulir pendaftaran berhasil disimpan. Silahkan tunggu pengumuman',
            'data_pendaftaran' => $dataPendaftaran,
        ]);
    }
}
