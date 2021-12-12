@extends('admin.layouts.app')
@section('title', 'Edit Kriteria')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Edit Kriteria</h4>
            <form class="form-sample" action="/admin/kriteria/editkriteria/edit/{{$kriteria->id}}" method="post">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Nama Kriteria</label>
                            <div class="col-sm-6">
                                <input type="text" name="nama_kriteria" class="form-control"
                                    value="{{$kriteria->nama_kriteria}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Status</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="sifat" value="{{$kriteria->sifat}} ">
                                    <option value="" disabled selected class="bg-success">-- Pilih Sifat</option>
                                    <option value="Cost" {{ $kriteria->sifat == 'Cost' ? 'selected' : null }}>Cost
                                    </option>
                                    <option value="Benefit" {{ $kriteria->sifat == 'Benefit' ? 'selected' : null }}>
                                        Benefit</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Bobot</label>
                            <div class="col-sm-6">
                                <input type="text" name="bobot" class="form-control" value="{{$kriteria->bobot}}" />
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