@extends('templates.admin')
@php
    $title = "Akses Pengguna"; 
@endphp
@section('content')
<div class="container-xl">
    <div class="col-12">
        <br>
        <div class="card">
            <form action="{{route('pengguna.update', $user->id)}}" method="post" class="card">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h3 class="card-title">Edit Akses Pengguna</h3>
                </div>
                <div class="card-body">
                    <div class="col-xl">
                        <div class="row">
                        <div class="col-md-6 col-xl-12">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input disabled type="text" class="form-control 
                                    @error('name')
                                        is-invalid
                                    @enderror" 
                                    name="name" placeholder="Masukkan name" value="{{$user->name}}">
                                    @error('nama_lengkap')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input disabled type="email" class="form-control
                                    @error('email')
                                        is-invalid
                                    @enderror" 
                                    name="email" placeholder="Masukkan email" value="{{$user->email}}">
                                    @error('email')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Role</div>
                                <select name="role" class="form-select form-control
                                    @error('role')
                                        is-invalid
                                    @enderror">
                                <option value="siswa">siswa</option>
                                <option value="admin">admin</option>
                                </select>
                                @error('role')
                                        <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                    <div class="card-footer">
                        <div class="d-flex">
                        <input type="submit" value="Update" class="btn btn-primary ms-auto">
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>
@endsection