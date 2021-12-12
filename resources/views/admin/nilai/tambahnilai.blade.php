@extends('admin.layouts.app')
@section('title', 'Tambah Data SPK')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Tambah Nilai</h4>
            <form class="form-sample" action="/admin/nilai/tambahnilai/store" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label mb-3">Nama Siswa</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row">
                            <select class="form-control mb-3" name="approve_id">
                                <option value="">-- Pilih</option>
                                @foreach ($approve as $a)
                                <option value="{{$a->id}}"> {{$a->nis}} | {{$a->nama_siswa}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        @foreach ($kriteria as $k)
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label mb-3" for="nilai"> {{$k->nama_kriteria}} </label>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        @foreach($peni as $key =>$value)
                        <div class="form-group row">
                            <select class="form-control mb-3 select" id="nilai" name="penilaian.id[]">
                                <option value="">-- Pilih</option>
                                @foreach($value as $penilaian =>$bobot)
                                <option value="{{$bobot['id']}}"> {{$bobot['keterangan']}} </option>
                                @endforeach
                            </select><br>
                        </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success mr-2"><i data-feather="check-square"></i></button>
                <a type="submit" class="btn btn-outline-info mr-2" href="/admin/nilai"><i
                        data-feather="chevrons-left"></i></a>
            </form>
        </div>
    </div>
</div>
@endsection