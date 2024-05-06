@extends('templates.admin')
@php
    $title = "Siswa Diterima";
@endphp
@section('content')
<div class="container-xl">
    <div class="col-12">
        <br>
        <div class="card">
            <form action="{{route('pengumuman.create')}}" method="post" class="card">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h3 class="card-title">Tambah Peserta Didik Baru</h3>
                </div>
                <div class="card-body">
                    <div class="col-xl">
                        <div class="row">
                        <div class="col-md-6 col-xl-12">
                            <div class="mb-3">
                                <label class="form-label">No. Pendaftaran</label>
                                <input type="text" class="form-control 
                                    @error('nomor')
                                        is-invalid
                                    @enderror" 
                                    name="nomor" placeholder="Masukkan nomor pendaftran" value="{{old('nomor')}}">
                                    @error('nomor')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control 
                                    @error('nama_lengkap')
                                        is-invalid
                                    @enderror" 
                                    name="nama_lengkap" placeholder="Masukkan nama siswa" value="{{old('nama_lengkap')}}">
                                    @error('nama_lengkap')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">NISN</label>
                                <input type="text" class="form-control 
                                    @error('nisn')
                                        is-invalid
                                    @enderror" 
                                    name="nisn" placeholder="Masukkan NISN" value="{{old('nisn')}}">
                                    @error('nisn')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jalur penerimaan</label>
                                <input type="text" class="form-control 
                                    @error('jalur')
                                        is-invalid
                                    @enderror" 
                                    name="jalur" placeholder="Jalur penerimaan" value="{{old('jalur')}}">
                                    @error('jalur')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                            </div>
                            
                        </div>
                        </div>
                    </div>
                </div>
                    <div class="card-footer">
                        <div class="d-flex">
                        <input type="submit" value="Tambah" class="btn btn-primary ms-auto">
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection