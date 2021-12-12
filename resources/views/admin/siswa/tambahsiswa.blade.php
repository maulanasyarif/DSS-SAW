@extends('admin.layouts.app')
@section('title', 'Tambah Siswa')

@section('content')


<div class="content-wrapper">
    <div class="row" id="proBanner">
        <div class="col-12">
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Data Siswa</h4>
                <form class="form-sample" method="POST" action="/admin/siswa/tambahsiswa/store"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">NIS</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="text" name="nis" class="form-control" value="{{ old('nis') }}">
                                    @error('nis')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nama</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nama_siswa" class="form-control"
                                        value="{{ old('nama_siswa') }}">
                                    @error('nama_siswa')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tempat Lahir</label>
                                <div class="col-sm-8">
                                    <input type="text" name="tempat_lahir" class="form-control"
                                        value="{{ old('tempat_lahir') }}">
                                    @error('tempat_lahir')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="tanggal_lahir" placeholder="dd/mm/yyyy"
                                        type="date" value="{{ old('tanggal_lahir') }}" />
                                    @error('tanggal_lahir')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="">-- Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" name="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan" name="Perempuan">Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tahun Ajaran</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="tapel" type="text" value="{{ old('tapel') }}" />
                                    @error('tapel')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Kelas</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="kelas" type="text" value="{{ old('kelas') }}" />
                                    @error('kelas')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Password </label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" />
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" />
                                    @error('alamat')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Nomor HP</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nomor_hp" class="form-control"
                                        value="{{ old('nomor_hp') }}" />
                                    @error('nomor_hp')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success mr-2"><i
                            data-feather="check-square"></i></button>
                    <a type="submit" class="btn btn-outline-info mr-2" href="/admin/siswa"><i
                            data-feather="chevrons-left"></i></a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection