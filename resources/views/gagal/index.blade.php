@extends('templates.siswa')
@php
    $title = "Hasil Pengumuman";
@endphp
@section('content')
<div class='container-xl'>
  <div class="page page-center">
    <div class="alert alert-important alert-danger alert-dismissible" role="alert">
      <div class="d-flex">
        <div>
          <!-- Download SVG icon from http://tabler-icons.io/i/alert-circle -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path><path d="M12 8v4"></path><path d="M12 16h.01"></path></svg>
        </div>
        <div>
          MAAF, ANDA DINYATAKAN GAGAL
        </div>
      </div>
      <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
  </div>
  <div class="container container-tight py-4">
    <div class="card-body text-center">
      <div class="mb-4">
        <h2 class="card-title">MAAF, ANDA DINYATAKAN GAGAL</h2>
      </div>
    </div>
  </div>
</div>
    
@endsection