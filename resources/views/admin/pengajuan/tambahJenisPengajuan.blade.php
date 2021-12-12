@extends('admin.layouts.app')
@section('title', 'Tambah Jenis Pengajuan')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Jenis Pengajuan</h4>
            <form class="form-sample" action="{{ route('store.jenisPengajuan')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Jenis Pengajuan</label>
                            <div class="col-sm-6">
                                <input type="text" name="keterangan" class="form-control" />
                                @error('keterangan')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Keterangan</label>
                            <div class="col-sm-6">
                                <input type="text" name="biaya" class="form-control" />
                                @error('biaya')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success mr-2"><i data-feather="check-square"></i></button>
                <a type="submit" class="btn btn-outline-info mr-2" href="/admin/jenispengajuan"><i
                        data-feather="chevrons-left"></i></a>
            </form>
        </div>
    </div>
</div>

@endsection