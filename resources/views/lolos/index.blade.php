@extends('templates.siswa')
@php
    $title = "Hasil Pengumuman";
@endphp
@section('content')
<div class='container-xl'>
  <div class="page page-center">
      <div class="alert alert-important alert-success alert-dismissible" role="alert">
          <div class="d-flex">
            <div>
              <!-- Download SVG icon from http://tabler-icons.io/i/check -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 12l5 5l10 -10"></path></svg>
            </div>
            <div>
              SELAMAT ANDA DINYATAKAN LOLOS
            </div>
          </div>
          <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
      <div class="container container-tight py-4">
          <div class="card-body text-center">
            <div class="mb-4">
              <h2 class="card-title">SELAMAT ANDA DINYATAKAN LOLOS</h2>
            </div>
          </div>
      </div>
  </div>
</div>
    
@endsection