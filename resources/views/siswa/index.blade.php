@extends('templates.siswa')

@section('content')
@php
  use App\Models\DataSiswaAfirmasi;
  use App\Models\DataSiswaPrestasi;
  use App\Models\DataSiswaZonasi;
  use App\Models\DataSiswaPindahan;

  $dataPendaftaran = null;

  $idPendaftaran = auth()->user()->noPendaftaran;
  if (auth()->user()->jalur === 'afirmasi') {
    $dataPendaftaran = DataSiswaAfirmasi::find($idPendaftaran); 
  }
  if (auth()->user()->jalur === 'prestasi') {
    $dataPendaftaran = DataSiswaPrestasi::find($idPendaftaran); 
  }
  if (auth()->user()->jalur === 'zonasi') {
    $dataPendaftaran = DataSiswaZonasi::find($idPendaftaran); 
  }
  if (auth()->user()->jalur === 'pindahan') {
    $dataPendaftaran = DataSiswaPindahan::find($idPendaftaran); 
  }
      
@endphp
<div class="container-xl">
    <br>
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Informasi Siswa</h3>
      </div>
      <div class="card-body">
        <div class="row row-cols-6 g-3">
            <div class="col">
                @if ($dataPendaftaran && $dataPendaftaran->foto)
                    <!-- Photo -->
                    <div class="img-responsive img-responsive-1x1 rounded border" style="background-image: url({{ asset("storage/" . $dataPendaftaran->foto) }})"></div>
                @else
                    <div class="img-responsive img-responsive-1x1 rounded border" style="background-color: #eee;"></div>
                @endif
            </div>
        </div>
        <br>
        @if ($dataPendaftaran)
          <div class="datagrid">
            <div class="datagrid-item">
              <div class="datagrid-title">Nomor Pendaftaran</div>
              <div class="datagrid-content">{{ $dataPendaftaran->id }}</div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">Nama Siswa</div>
              <div class="datagrid-content">{{ $dataPendaftaran->Nama_Siswa }}</div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">Jenis Kelamin</div>
              <div class="datagrid-content">{{ $dataPendaftaran->Jenis_Kelamin }}</div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">Tempat Lahir</div>
              <div class="datagrid-content">{{ $dataPendaftaran->Tempat_Lahir }}</div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">Tanggal Lahir</div>
              <div class="datagrid-content">{{ $dataPendaftaran->Tanggal_Lahir }}</div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">NISN</div>
              <div class="datagrid-content">{{ $dataPendaftaran->NISN }}</div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">Agama</div>
              <div class="datagrid-content">{{ $dataPendaftaran->Agama }}</div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">Provinsi</div>
              <div class="datagrid-content">{{ $dataPendaftaran->Alamat_Provinsi_Siswa }}</div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">Kabupaten</div>
              <div class="datagrid-content">{{ $dataPendaftaran->Alamat_Kabupaten_Siswa }}</div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">Kecamatan</div>
              <div class="datagrid-content">{{ $dataPendaftaran->Alamat_Kecamatan_Siswa }}</div>
            </div>
            <div class="datagrid-item">
              <div class="datagrid-title">Desa</div>
              <div class="datagrid-content">{{ $dataPendaftaran->Alamat_Desa_Siswa }}</div>
            </div>
          </div>
        @else 
        <div class="datagrid">
          <div class="datagrid-item">
            <div class="datagrid-title">Nomor Pendaftaran</div>
            <div class="datagrid-content">-</div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">Nama Siswa</div>
            <div class="datagrid-content">-</div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">Jenis Kelamin</div>
            <div class="datagrid-content">-</div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">Tempat Lahir</div>
            <div class="datagrid-content">-</div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">Tanggal Lahir</div>
            <div class="datagrid-content">-</div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">NISN</div>
            <div class="datagrid-content">-</div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">Agama</div>
            <div class="datagrid-content">–</div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">Provinsi</div>
            <div class="datagrid-content">–</div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">Kabupaten</div>
            <div class="datagrid-content">–</div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">Kecamatan</div>
            <div class="datagrid-content">–</div>
          </div>
          <div class="datagrid-item">
            <div class="datagrid-title">Desa</div>
            <div class="datagrid-content">–</div>
          </div>
        </div>
        @endif
      </div>
    </div>
</div>
@endsection
