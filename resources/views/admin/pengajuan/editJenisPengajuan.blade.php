@extends('admin.layouts.app')
@section('title', 'Edit Jenis Pengajuan')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Jenis Pengajuan</h4>
            <form class="form-sample" action="/admin/pengajuan/editJenisPengajuan/edit/{{$JenisPengajuan->id}}"
                method="post">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Jenis Pengajuan</label>
                            <div class="col-sm-6">
                                <input type="text" name="keterangan" class="form-control"
                                    value="{{$JenisPengajuan->keterangan}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Keterangan</label>
                            <div class="col-sm-6">
                                <input type="text" name="biaya" class="form-control"
                                    value="{{$JenisPengajuan->biaya}}" />
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