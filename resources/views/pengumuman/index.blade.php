@extends('templates.siswa')
@php
    $title = "Pengumuman PPDB SMP Cempaka Tahun Ajaran 2024/2025";
@endphp
@section('content')
<div class="page page-center">
    <div class="container container-tight py-4">
      <form class="card card-md" action="{{route('pengumuman.search')}}" method="get" autocomplete="off" novalidate>
        <div class="card-body text-center">
          <div class="mb-4">
            <h2 class="card-title">PENGUMUMAN PPDB SMP CEMPAKA</h2>
            <p class="text-muted">Masukan nomor pendaftaran anda</p>
          </div>
          <div class="mb-4">
            <input name="nomor_pendaftaran" type="text" class="form-control" placeholder="Masukkan Nomor Pendaftaran">
          </div>
          <div>
            <input type="submit" value="Cek Pengumuman" class="btn btn-primary w-100">
            {{-- <a href="#" class="btn btn-primary w-100">
              Unlock
            </a> --}}
          </div>
        </div>
      </form>
    </div>
</div>
@endsection