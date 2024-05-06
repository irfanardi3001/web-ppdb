@extends('templates.siswa')
@php
    $title = "PPDB Jalur Prestasi SMP Cempaka Tahun Ajaran 2024/2025";
@endphp
@section('content')
<div class="container-xl">
    <div class="col-12">
        <br>
        <div class="card">
            <form action="{{route('prestasi.create')}}" method="post" class="card">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Formulir Pendaftaran Siswa Jalur Prestasi</h3>
                </div>
                <div class="card-body">
                    <br>
                    <div class="col-xl">
                        <div class="row">
                        <div class="col-md-6 col-xl-12">
                            <h4 class="card-title">Biodata Siswa</h4>
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control 
                                    @error('nama_lengkap')
                                        is-invalid
                                    @enderror" 
                                    name="nama_lengkap" placeholder="Masukkan nama lengkap" value="{{old('nama_lengkap')}}">
                                    @error('nama_lengkap')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Asal Sekolah</label>
                                <input type="text" class="form-control
                                    @error('asal_sekolah')
                                        is-invalid
                                    @enderror" 
                                    name="asal_sekolah" placeholder="Masukkan asal sekolah" value="{{old('asal_sekolah')}}">
                                    @error('asal_sekolah')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Jenis Kelamin</div>
                                <div>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="Laki-Laki" checked>
                                    <span class="form-check- label">Laki-Laki</span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="Perempuan" name="jenis_kelamin" >
                                    <span class="form-check-label">Perempuan</span>
                                </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control
                                    @error('tempat_lahir')
                                        is-invalid
                                    @enderror" 
                                    name="tempat_lahir" placeholder="Masukkan tempat lahir" value="{{old('tempat_lahir')}}">
                                    @error('tempat_lahir')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <div class="input-icon">
                                <input type = 'date' class="form-control mb-2 form-control
                                    @error('tanggal_lahir')
                                        is-invalid
                                    @enderror" 
                                    name="tanggal_lahir" value="{{old('tanggal_lahir')}}" placeholder="Masukkan tanggal lahir" id="datepicker-icon"/>
                                    @error('tanggal_lahir')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
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
                                <div class="form-label">Agama</div>
                                <select name="agama" class="form-select form-control
                                    @error('agama')
                                        is-invalid
                                    @enderror"
                                    
                                >
                                <option disabled selected>Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Khonghucu">Khonghucu</option>
                                </select>
                                @error('agama')
                                        <span class="invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <h4 class="card-title">Alamat Siswa</h4>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label" for="provinsi">Provinsi</label>
                                <div class="col-md-9">
                                    <?php
                                        $provinces = new App\Http\Controllers\DependantDropdownController;
                                        $provinces= $provinces->provinces();
                                        ?>
                                    <select class="form-control
                                        @error('provinsi_siswa')
                                            is-invalid
                                        @enderror"
                                        name="provinsi_siswa" id="provinsi1" required>
                                        <option disabled selected>Pilih Provinsi</option>
                                        @foreach ($provinces as $item)
                                            <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                                        @endforeach
                                    </select>
                                        @error('provinsi_siswa')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label" for="kota">Kabupaten / Kota</label>
                                <div class="col-md-9">
                                    <select class="form-control
                                        @error('kota_siswa')
                                            is-invalid
                                        @enderror"
                                        name="kota_siswa" id="kota" required>
                                        <option disabled selected>Pilih Kabupaten/Kota</option>
                                    </select>
                                    @error('kota_siswa')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label" for="kecamatan">Kecamatan</label>
                                <div class="col-md-9">
                                    <select class="form-control
                                        @error('kecamatan_siswa')
                                            is-invalid
                                        @enderror"
                                        name="kecamatan_siswa" id="kecamatan" required>
                                        <option disabled selected>Pilih Kecamatan</option>
                                    </select>
                                        @error('kecamatan_siswa')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3 col-form-label" for="desa">Desa</label>
                                <div class="col-md-9">
                                    <select class="form-control
                                        @error('desa_siswa')
                                            is-invalid
                                        @enderror"
                                        name="desa_siswa" id="desa" required>
                                        <option disabled selected>Pilih Desa/Kelurahan</option>
                                    </select>
                                        @error('desa_siswa')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                    <div class="card-header">
                        <h3 class="card-title">Data Ayah Kandung</h3>
                    </div>
                    <div class="card-body">
                        <br>
                        <div class="col-xl">
                            <div class="row">
                            <div class="col-md-6 col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama Ayah Kandung</label>
                                    <input type="text" class="form-control
                                    @error('nama_ayah_kandung')
                                        is-invalid
                                    @enderror"
                                    name="nama_ayah_kandung" value="{{old('nama_ayah_kandung')}}" placeholder="Masukkan nama ayah kandung">
                                    @error('nama_ayah_kandung')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Pendidikan Terakhir</div>
                                    <select name="pendidikan_ayah" class="form-select form-control
                                        @error('pendidikan_ayah')
                                            is-invalid
                                        @enderror"
                                        >
                                        <option disabled selected>Pilih Pendidikan</option>
                                        <option value="SD">SD</option>
                                        <option value="SLTP">SLTP</option>
                                        <option value="SLTA">SLTA</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Sarjana">Sarjana</option>
                                        <option value="Magister">Magister</option>
                                        <option value="Doktoral">Doktoral</option>
                                    </select>
                                        @error('pendidikan_ayah')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control
                                        @error('pekerjaan_ayah')
                                                is-invalid
                                        @enderror"
                                        name="pekerjaan_ayah" value="{{old('pekerjaan_ayah')}}" placeholder="Masukkan pekerjaan ayah">
                                        @error('pekerjaan_ayah')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Penghasilan</div>
                                    <select name="penghasilan_ayah" class="form-select form-control
                                        @error('penghasilan_ayah')
                                            is-invalid
                                        @enderror"
                                        >
                                        <option disabled selected>Pilih Penghasilan</option>
                                        <option value="Tidak bekerja">Tidak bekerja</option>
                                        <option value="Kurang dari Rp.500.000">Kurang dari Rp.500.000</option>
                                        <option value="Rp.500.000 s.d 1.000.000">Rp.500.000 s.d 1.000.000</option>
                                        <option value="Rp.1.000.000 s.d Rp.4.000.000">Rp.1.000.000 s.d Rp.4.000.000</option>
                                        <option value="Rp.4000.000 s.d 7.000.000">Rp.4000.000 s.d 7.000.000 </option>
                                        <option value="Diatas Rp.7.000.000">Diatas Rp.7.000.000</option>
                                    </select>
                                        @error('penghasilan_ayah')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                                <h4 class="card-title">Alamat ayah kandung</h4>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="provinsi">Provinsi</label>
                                    <div class="col-md-9">
                                        <?php
                                            $provinces = new App\Http\Controllers\DependantDropdownController;
                                            $provinces= $provinces->provinces();
                                            ?>
                                        <select class="form-control
                                            @error('provinsi_ayah')
                                                is-invalid
                                            @enderror"
                                            name="provinsi_ayah" id="provinsi2" required>
                                            <option disabled selected>Pilih Provinsi</option>
                                            @foreach ($provinces as $item)
                                                <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                            @error('provinsi_ayah')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="kota">Kabupaten / Kota</label>
                                    <div class="col-md-9">
                                        <select class="form-control
                                            @error('kota_ayah')
                                                is-invalid
                                            @enderror"
                                            name="kota_ayah" id="kota1" required>
                                            <option disabled selected>Pilih Kabupaten/Kota</option>
                                        </select>
                                            @error('kota_ayah')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="kecamatan">Kecamatan</label>
                                    <div class="col-md-9">
                                        <select class="form-control
                                            @error('kecamatan_ayah')
                                                is-invalid
                                            @enderror"
                                            name="kecamatan_ayah" id="kecamatan1" required>
                                            <option disabled selected>Pilih Kecamatan</option>
                                        </select>
                                            @error('kecamatan_ayah')
                                                 <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="desa">Desa</label>
                                    <div class="col-md-9">
                                        <select class="form-control
                                            @error('desa_ayah')
                                                is-invalid
                                            @enderror"
                                            name="desa_ayah" id="desa1" required>
                                            <option disabled selected>Pilih Desa/Kelurahan</option>
                                        </select>
                                            @error('desa_ayah')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title">Data Ibu Kandung</h3>
                    </div>
                    <div class="card-body">
                        <br>
                        <div class="col-xl">
                            <div class="row">
                            <div class="col-md-6 col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama Ibu Kandung</label>
                                    <input type="text" class="form-control
                                        @error('nama_ibu_kandung')
                                            is-invalid
                                        @enderror"
                                        name="nama_ibu_kandung" value="{{old('nama_ibu_kandung')}}" placeholder="Masukkan nama ibu kandung">
                                        @error('nama_ibu_kandung')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Pendidikan Terakhir</div>
                                    <select name="pendidikan_ibu" class="form-select
                                        @error('pendidikan_ibu')
                                            is-invalid
                                        @enderror"
                                        >
                                        <option disabled selected>Pilih Pendidikan</option>
                                        <option value="SD">SD</option>
                                        <option value="SLTP">SLTP</option>
                                        <option value="SLTA">SLTA</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Sarjana">Sarjana</option>
                                        <option value="Magister">Magister</option>
                                        <option value="Doktoral">Doktoral</option>
                                    </select>
                                        @error('pendidikan_ibu')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control
                                        @error('pekerjaan_ibu')
                                            is-invalid
                                        @enderror"
                                        name="pekerjaan_ibu" value="{{old('pekerjaan_ibu')}}" placeholder="Masukkan pekerjaan ibu">
                                        @error('pekerjaan_ibu')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Penghasilan</div>
                                    <select name="penghasilan_ibu" class="form-select form-control
                                        @error('penghasilan_ibu')
                                            is-invalid
                                        @enderror"
                                        >
                                        <option disabled selected>Pilih Penghasilan</option>
                                        <option value="Tidak bekerja">Tidak bekerja</option>
                                        <option value="Kurang dari Rp.500.000">Kurang dari Rp.500.000</option>
                                        <option value="Rp.500.000 s.d 1.000.000">Rp.500.000 s.d 1.000.000</option>
                                        <option value="Rp.1.000.000 s.d Rp.4.000.000">Rp.1.000.000 s.d Rp.4.000.000</option>
                                        <option value="Rp.4000.000 s.d 7.000.000">Rp.4000.000 s.d 7.000.000 </option>
                                        <option value="Diatas Rp.7.000.000">Diatas Rp.7.000.000</option>
                                    </select>
                                        @error('penghasilan_ibu')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                                <h4 class="card-title">Alamat ibu kandung</h4>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="provinsi">Provinsi</label>
                                    <div class="col-md-9">
                                        <?php
                                            $provinces = new App\Http\Controllers\DependantDropdownController;
                                            $provinces= $provinces->provinces();
                                            ?>
                                        <select class="form-control
                                            @error('provinsi_ibu')
                                                is-invalid
                                            @enderror"
                                            name="provinsi_ibu" id="provinsi3" required>
                                            <option disabled selected>Pilih Provinsi</option>
                                            @foreach ($provinces as $item)
                                                <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                            @error('provinsi_ibu')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="kota">Kabupaten / Kota</label>
                                    <div class="col-md-9">
                                        <select class="form-control
                                            @error('kota_ibu')
                                                is-invalid
                                            @enderror"
                                            name="kota_ibu" id="kota2" required>
                                            <option disabled selected>Pilih Kabupaten/Kota</option>
                                        </select>
                                            @error('kota_ibu')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="kecamatan">Kecamatan</label>
                                    <div class="col-md-9">
                                        <select class="form-control
                                            @error('kecamatan_ibu')
                                                is-invalid
                                            @enderror"
                                            name="kecamatan_ibu" id="kecamatan2" required>
                                            <option disabled selected>Pilih Kecamatan</option>
                                        </select>
                                            @error('kecamatan_ibu')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="desa">Desa</label>
                                    <div class="col-md-9">
                                        <select class="form-control
                                            @error('desa_ibu')
                                                is-invalid
                                            @enderror"
                                            name="desa_ibu" id="desa2" required>
                                            <option disabled selected>Pilih Desa/Kelurahan</option>
                                        </select>
                                            @error('desa_ibu')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-header">
                        <h3 class="card-title">Data Wali Murid</h3>
                    </div>
                    <div class="card-body">
                        <br>
                        <div class="col-xl">
                            <div class="row">
                            <div class="col-md-6 col-xl-12">
                                <div class="mb-3">
                                    <label class="form-label">Nama Wali Murid</label>
                                    <input type="text" class="form-control
                                        @error('nama_wali_murid')
                                            is-invalid
                                        @enderror"
                                        name="nama_wali_murid" value="{{old('nama_wali_murid')}}" placeholder="Masukkan nama wali">
                                        @error('nama_wali_murid')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Pendidikan Terakhir</div>
                                    <select name="pendidikan_wali" class="form-select form-control
                                        @error('Pendidikan_wali')
                                            is-invalid
                                        @enderror"
                                        >
                                        <option disabled selected>Pilih Pendidikan</option>
                                        <option value="SD">SD</option>
                                        <option value="SLTP">SLTP</option>
                                        <option value="SLTA">SLTA</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="Sarjana">Sarjana</option>
                                        <option value="Magister">Magister</option>
                                        <option value="Doktoral">Doktoral</option>
                                    </select>
                                        @error('pendidikan_wali')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pekerjaan</label>
                                    <input type="text" class="form-control
                                    @error('pekerjaan_wali')
                                        is-invalid
                                    @enderror"
                                    name="pekerjaan_wali" value="{{old('pekerjaan_wali')}}" placeholder="Masukkan pekerjaan wali">
                                    @error('pekerjaan_wali')
                                        <span class="invalid-feedback">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <div class="form-label">Penghasilan</div>
                                    <select name="penghasilan_wali" class="form-select form-control
                                        @error('penghasilan_wali')
                                            is-invalid
                                        @enderror" >
                                        <option disabled selected>Pilih Penghasilan</option>
                                        <option value="Tidak bekerja">Tidak bekerja</option>
                                        <option value="Kurang dari Rp.500.000">Kurang dari Rp.500.000</option>
                                        <option value="Rp.500.000 s.d 1.000.000">Rp.500.000 s.d 1.000.000</option>
                                        <option value="Rp.1.000.000 s.d Rp.4.000.000">Rp.1.000.000 s.d Rp.4.000.000</option>
                                        <option value="Rp.4000.000 s.d 7.000.000">Rp.4000.000 s.d 7.000.000 </option>
                                        <option value="Diatas Rp.7.000.000">Diatas Rp.7.000.000</option>
                                    </select>
                                        @error('penghasilan_wali')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                                <h4 class="card-title">Alamat wali</h4>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="provinsi">Provinsi</label>
                                    <div class="col-md-9">
                                        <?php
                                            $provinces = new App\Http\Controllers\DependantDropdownController;
                                            $provinces= $provinces->provinces();
                                            ?>
                                        <select class="form-control
                                            @error('nama_lengkap')
                                                is-invalid
                                            @enderror"
                                            name="provinsi_wali" id="provinsi4" required>
                                            <option disabled selected>Pilih Provinsi</option>
                                            @foreach ($provinces as $item)
                                                <option value="{{ $item->id ?? '' }}">{{ $item->name ?? '' }}</option>
                                            @endforeach
                                        </select>
                                            @error('provinsi_wali')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="kota">Kabupaten / Kota</label>
                                    <div class="col-md-9">
                                        <select class="form-control
                                            @error('kota_wali')
                                                is-invalid
                                            @enderror"
                                            name="kota_wali" id="kota3" required>
                                            <option disabled selected>Pilih Kabupaten/Kota</option>
                                        </select>
                                            @error('kota_wali')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="kecamatan">Kecamatan</label>
                                    <div class="col-md-9">
                                        <select class="form-control
                                            @error('kecamatan_wali')
                                                is-invalid
                                            @enderror"
                                            name="kecamatan_wali" id="kecamatan3" required>
                                            <option disabled selected>Pilih Kecamatan</option>
                                        </select>
                                            @error('kecamatan_wali')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="desa">Desa</label>
                                    <div class="col-md-9">
                                        <select class="form-control
                                        @error('desa_wali')
                                            is-invalid
                                        @enderror"
                                        name="desa_wali" id="desa3" required>
                                            <option disabled selected>Pilih Desa/Kelurahan</option>
                                        </select>
                                        @error('desa_wali')
                                            <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex">
                        <input type="submit" value="Kirim" class="btn btn-primary ms-auto">
                        </div>
                    </div>
                </div>
            </form>
    </div>
    <div class="page-body">
        <div class="container-xl">
          <div class="row row-cards">
            <div class="col-md-6 col-xl-12">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title">Berkas Pendaftaran</h3>
                  <form class="dropzone" id="dropzone-1" action="./" autocomplete="off" novalidate>
                    <div class="fallback">
                      <input name="file" type="file"  />
                    </div>
                    <div class="dz-message">
                      <h3 class="dropzone-msg-title">Upload Transkrip Nilai Raport</h3>
                      <span class="dropzone-msg-desc">Transkrip nilai raport kelas 5 dan 6 semester 1 terlegalisir. Upload dalam .pdf</span>
                    </div>
                  </form>
                  <form class="dropzone" id="dropzone-2" action="./" autocomplete="off" novalidate>
                    <div class="fallback">
                      <input name="file" type="file"  />
                    </div>
                    <div class="dz-message">
                      <h3 class="dropzone-msg-title">Upload Kartu Tanda Siswa</h3>
                      <span class="dropzone-msg-desc">Upload dalam .pdf/.jpg/.png</span>
                    </div>
                  </form>
                  <form class="dropzone" id="dropzone-3" action="./" autocomplete="off" novalidate>
                    <div class="fallback">
                      <input name="file" type="file"  />
                    </div>
                    <div class="dz-message">
                      <h3 class="dropzone-msg-title">Upload Surat Keterangan Lulus</h3>
                      <span class="dropzone-msg-desc">Upload dalam .pdf</span>
                    </div>
                  </form>
                  <form class="dropzone" id="dropzone-4" action="./" autocomplete="off" novalidate>
                    <div class="fallback">
                      <input name="file" type="file"  />
                    </div>
                    <div class="dz-message">
                      <h3 class="dropzone-msg-title">Piagam/Sertifikat Kejuaraan</h3>
                      <span class="dropzone-msg-desc">Upload dalam .pdf</span>
                    </div>
                  </form>
                  <form class="dropzone" id="dropzone-5" action="./" autocomplete="off" novalidate>
                    <div class="fallback">
                      <input name="file" type="file"  />
                    </div>
                    <div class="dz-message">
                      <h3 class="dropzone-msg-title">Upload Surat Pernyataan Keaslian Dokumen</h3>
                      <span class="dropzone-msg-desc">Upload dalam .pdf</span>
                    </div>
                  </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex">
                    <button type="submit" class="btn btn-primary ms-auto">Kirim</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<script>
    function onChangeSelect(url, id, name) {
        // send ajax request to get the cities of the selected province and append to the select tag
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id: id
            },
            success: function (data) {
                $('#' + name).empty();
                $('#' + name).append('<option>==Pilih Salah Satu==</option>');

                $.each(data, function (key, value) {
                    $('#' + name).append('<option value="' + key + '">' + value + '</option>');
                });
            },
            error: function (xhr, status, error) {
            console.error(xhr.responseText); // Tambahkan ini untuk melihat pesan kesalahan dari server
        }
        });
    }
    $(function () {
        $('#provinsi1').on('change', function () {
            onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota');
        });
        $('#provinsi2').on('change', function () {
            onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota1');
        });
        $('#provinsi3').on('change', function () {
            onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota2');
        });
        $('#provinsi4').on('change', function () {
            onChangeSelect('{{ route("cities") }}', $(this).val(), 'kota3');
        });
        $('#kota').on('change', function () {
            onChangeSelect('{{ route("districts") }}', $(this).val(), 'kecamatan');
        })
        $('#kota1').on('change', function () {
            onChangeSelect('{{ route("districts") }}', $(this).val(), 'kecamatan1');
        })
        $('#kota2').on('change', function () {
            onChangeSelect('{{ route("districts") }}', $(this).val(), 'kecamatan2');
        })
        $('#kota3').on('change', function () {
            onChangeSelect('{{ route("districts") }}', $(this).val(), 'kecamatan3');
        })
        $('#kecamatan').on('change', function () {
            onChangeSelect('{{ route("villages") }}', $(this).val(), 'desa');
        })
        $('#kecamatan1').on('change', function () {
            onChangeSelect('{{ route("villages") }}', $(this).val(), 'desa1');
        })
        $('#kecamatan2').on('change', function () {
            onChangeSelect('{{ route("villages") }}', $(this).val(), 'desa2');
        })
        $('#kecamatan3').on('change', function () {
            onChangeSelect('{{ route("villages") }}', $(this).val(), 'desa3');
        })
    });
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
      new Dropzone("#dropzone-1")
      new Dropzone("#dropzone-2")
      new Dropzone("#dropzone-3")
      new Dropzone("#dropzone-4")
      new Dropzone("#dropzone-5")
    })
</script>
@endsection