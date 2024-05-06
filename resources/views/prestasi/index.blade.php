@extends('templates.admin')
@php
    $title = "Data PPDB Jalur Prestasi SMP Cempaka Tahun Ajaran 2024/2025"; 
@endphp
@section('content')
<div class="table-responsive">
    <table
class="table table-vcenter card-table">
      <thead>
        <tr>
          <th>Foto</th>
          <th>No Pendaftaran</th>
          <th>Nama Lengkap Siswa</th>
          <th>Asal Sekolah</th>
          <th>Jenis Kelamin</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>NISN</th>
          <th>Agama</th>
          <th>Provinsi</th>
          <th>Kabupaten</th>
          <th>Kecamatan</th>
          <th>Desa</th>
          <th>Nama Ayah</th>
          <th>Pendidikan</th>
          <th>Pekerjaan</th>
          <th>penghasilan</th>
          <th>Provinsi</th>
          <th>Kabupaten</th>
          <th>Kecamatan</th>
          <th>Desa</th>
          <th>Nama Ibu</th>
          <th>Pendidikan</th>
          <th>Pekerjaan</th>
          <th>penghasilan</th>
          <th>Provinsi</th>
          <th>Kabupaten</th>
          <th>Kecamatan</th>
          <th>Desa</th>
          <th>Nama Wali</th>
          <th>Pendidikan</th>
          <th>Pekerjaan</th>
          <th>penghasilan</th>
          <th>Provinsi</th>
          <th>Kabupaten</th>
          <th>Kecamatan</th>
          <th>Desa</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data_siswa_prestasi as $siswa_prestasi)
        <tr>
          <td>
            <img src="{{asset("storage/". $siswa_prestasi->foto)}}" alt="{{$siswa_prestasi->Nama_Siswa}}">
          </td>
            <td>{{$siswa_prestasi->id}}</td>
            <td>{{$siswa_prestasi->Nama_Siswa}}</td>
            <td>{{$siswa_prestasi->Asal_Sekolah}}</td>
            <td>{{$siswa_prestasi->Jenis_Kelamin}}</td>
            <td>{{$siswa_prestasi->Tempat_Lahir}}</td>
            <td>{{$siswa_prestasi->Tanggal_Lahir}}</td>
            <td>{{$siswa_prestasi->NISN}}</td>
            <td>{{$siswa_prestasi->Agama}}</td>
            <td>{{$siswa_prestasi->Alamat_Provinsi_Siswa}}</td>
            <td>{{$siswa_prestasi->Alamat_Kabupaten_Siswa}}</td>
            <td>{{$siswa_prestasi->Alamat_Kecamatan_Siswa}}</td>
            <td>{{$siswa_prestasi->Alamat_Desa_Siswa}}</td>
            <td>{{$siswa_prestasi->Nama_Ayah_Kandung}}</td>
            <td>{{$siswa_prestasi->Pendidikan_Terakhir_Ayah}}</td>
            <td>{{$siswa_prestasi->Pekerjaan_Ayah}}</td>
            <td>{{$siswa_prestasi->Penghasilan_Ayah}}</td>
            <td>{{$siswa_prestasi->Alamat_Provinsi_Ayah}}</td>
            <td>{{$siswa_prestasi->Alamat_Kabupaten_Ayah}}</td>
            <td>{{$siswa_prestasi->Alamat_Kecamatan_Ayah}}</td>
            <td>{{$siswa_prestasi->Alamat_Desa_Ayah}}</td>
            <td>{{$siswa_prestasi->Nama_Ibu_Kandung}}</td>
            <td>{{$siswa_prestasi->Pendidikan_Terakhir_Ibu}}</td>
            <td>{{$siswa_prestasi->Pekerjaan_Ibu}}</td>
            <td>{{$siswa_prestasi->Penghasilan_Ibu}}</td>
            <td>{{$siswa_prestasi->Alamat_Provinsi_Ibu}}</td>
            <td>{{$siswa_prestasi->Alamat_Kabupaten_Ibu}}</td>
            <td>{{$siswa_prestasi->Alamat_Kecamatan_Ibu}}</td>
            <td>{{$siswa_prestasi->Alamat_Desa_Ibu}}</td>
            <td>{{$siswa_prestasi->Nama_Wali_Murid}}</td>
            <td>{{$siswa_prestasi->Pendidikan_Terakhir_Wali}}</td>
            <td>{{$siswa_prestasi->Pekerjaan_Wali}}</td>
            <td>{{$siswa_prestasi->Penghasilan_Wali}}</td>
            <td>{{$siswa_prestasi->Alamat_Provinsi_Wali}}</td>
            <td>{{$siswa_prestasi->Alamat_Kabupaten_Wali}}</td>
            <td>{{$siswa_prestasi->Alamat_Kecamatan_Wali}}</td>
            <td>{{$siswa_prestasi->Alamat_Desa_Wali}}</td>
          </tr>            
        @endforeach
      </tbody>
    </table>
  </div>
@endsection