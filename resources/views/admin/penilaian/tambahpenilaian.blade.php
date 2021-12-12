@extends('admin.layouts.app')
@section('title', 'Tambah Penilaian')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Penilaian</h4>
            <form class="form-sample" action="/admin/penilaian/tambahpenilaian/store" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Nama Kriteria</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="kriteria_id">
                                    <option value="">-- Pilih Kriteria</option>
                                    @foreach ($kriteria as $k)
                                    <option value="{{$k->id}}"> {{$k->nama_kriteria}} </option>
                                    @endforeach
                                </select>
                                @error('kriteria_id')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Keterangan</label>
                            <div class="col-sm-6">
                                <input type="text" name="keterangan" class="form-control" />
                                @error('keterangan')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Masukan Bobot</label>
                            <div class="col-sm-6">
                                <input type="number" step="1" min="1" max="5" name="bobot" class="form-control" />
                                @error('bobot')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success mr-2"><i data-feather="check-square"></i></button>
                <a type="submit" class="btn btn-outline-info mr-2" href="/admin/penilaian"><i
                        data-feather="chevrons-left"></i></a>
            </form>
        </div>
    </div>
</div>

@endsection