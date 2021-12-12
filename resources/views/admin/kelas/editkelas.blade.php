@extends('admin.layouts.app')
@section('title', 'Kelas')

@section('content')

<div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Kelas</h4>
                    <form class="form-sample" action="/admin/kelas/editkelas/edit/{{$kelas->id}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Kelas</label>
                            <div class="col-sm-6">
                            <select class="form-control" name="kelas" value="{{$kelas->kelas}}">
                                <option value="" disabled selected class="bg-success">-- Pilih Kelas</option>
                                <option value="X" {{ $kelas->kelas == 'X' ? 'selected' : null }}>X</option>
                                <option value="XI" {{ $kelas->kelas == 'XI' ? 'selected' : null }}>XI</option>
                                <option value="XII" {{ $kelas->kelas == 'XII' ? 'selected' : null }}>XII</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Jurusan</label>
                            <div class="col-sm-6">
                              <select class="form-control" name="jurusan_id" value="{{$kelas->jurusan_id}}">
                                <option value="" disabled selected class="bg-success">-- Pilih Jurusan</option>
                                @foreach($jurusan as $j)
                                  <option value="{{$j->id}}" {{ $kelas->jurusan_id == $j->id ? 'selected' : null }}>{{$j->nama_jurusan}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Kode Kelas</label>
                            <div class="col-sm-6">
                              <input type="text" name="kode_kelas" class="form-control" value="{{$kelas->kode_kelas}}" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-outline-success mr-2"><i data-feather="check-square"></i></button>
                      <a type="submit" class="btn btn-outline-info mr-2" href="/admin/kelas"><i data-feather="chevrons-left"></i></a>
                    </form>
                  </div>
                </div>
              </div>

@endsection