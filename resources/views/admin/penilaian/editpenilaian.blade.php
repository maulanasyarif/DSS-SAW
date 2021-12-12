@extends('admin.layouts.app')
@section('title', 'Edit Penilaian')

@section('content')

            <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Penilaian</h4>
                    <form class="form-sample" action="/admin/penilaian/editpenilaian/edit/{{$penilaian->id}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Nama Kriteria</label>
                            <div class="col-sm-6">
                            <select class="form-control" name="kriteria_id">
                              <option value="" disabled selected class="bg-success">-- Pilih Kriteria</option>
                              @foreach ($kriteria as $k)
                                <option value="{{$k->id}}" {{ $penilaian->kriteria_id == $k->id ? 'selected' : null }}> {{$k->nama_kriteria}} </option>
                              @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Keterangan</label>
                            <div class="col-sm-6">
                              <input type="text" name="keterangan" class="form-control" value="{{$penilaian->keterangan}}"/>
                            </div>
                        </div>
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Masukan Bobot</label>
                            <div class="col-sm-6">
                              <input type="text" name="bobot" class="form-control" value="{{$penilaian->bobot}}"/>
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-outline-success mr-2"><i data-feather="check-square"></i></button>
                      <a type="submit" class="btn btn-outline-info mr-2" href="/admin/penilaian"><i data-feather="chevrons-left"></i></a>
                    </form>
                  </div>
                </div>
              </div>

@endsection