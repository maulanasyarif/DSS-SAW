@extends('admin.layouts.app')
@section('title', 'Edit Siswa')

@section('content')

<div class="content-wrapper">
    <div class="row" id="proBanner">
        <div class="col-12">
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Data Siswa</h4>
                <form class="form-sample" method="POST" action="/admin/siswa/editsiswa/edit/{{$siswa->id}}"
                    enctype="multipart/form-data">
                    <input type="hidden" name="id" value="{{$siswa->id}}">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">NIS</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    <input type="text" name="nis" class="form-control" value="{{ $siswa->nis }}">
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
                                        value="{{ $siswa->nama_siswa }}">
                                    @error('nama siswa')
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
                                        value="{{ $siswa->tempat_lahir }}">
                                    @error('tempat lahir')
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
                                        type="date" value="{{ $siswa->tanggal_lahir }}" />
                                    @error('tanggal lahir')
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
                                        <option value="" disabled selected class="bg-success">-- Pilih Jenis Kelamin
                                        </option>
                                        <option value="Laki-laki"
                                            {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : null }}>Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : null }}>Perempuan
                                        </option>
                                    </select>
                                    @error('jenis kelamin')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Tahun Ajaran</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name="tapel" placeholder="tahun ajaran" type="text"
                                        value="{{ $siswa->tapel }}" />
                                    @error('tahun ajaran')
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
                                    <input class="form-control" name="kelas" placeholder="kelas" type="text"
                                        value="{{ $siswa->kelas }}" />
                                    @error('kelas')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Password</label>
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
                                    <input type="text" name="alamat" class="form-control"
                                        value="{{ $siswa->alamat }}" />
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
                                        value="{{ $siswa->nomor_hp }}" />
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