@extends('admin.layouts.app')
@section('title', 'Tambah Kriteria')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Kriteria</h4>
            <form class="form-sample" action="/admin/kriteria/tambahkriteria/store" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Nama Kriteria</label>
                            <div class="col-sm-6">
                                <input type="text" name="nama_kriteria" class="form-control" />
                                @error('nama_kriteria')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Sifat</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="sifat">
                                    <option value="Cost">Cost</option>
                                    <option value="Benefit">Benefit</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Bobot</label>
                            <div class="col-sm-6">
                                <input type="number" step="0.10" min="0.10" max="1" name="bobot" class="form-control" />
                                @error('bobot')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success mr-2"><i data-feather="check-square"></i></button>
                <a type="submit" class="btn btn-outline-info mr-2" href="/admin/kriteria"><i
                        data-feather="chevrons-left"></i></a>
            </form>
        </div>
    </div>
</div>

@endsection