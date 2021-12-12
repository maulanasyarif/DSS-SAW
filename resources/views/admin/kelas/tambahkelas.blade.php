@extends('admin.layouts.app')
@section('title', 'Tambah Kelas')

@section('content')

<div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Kelas</h4>
                    <form class="form-sample" action="/admin/kelas/tambahkelas/store" method="post">
                    @csrf
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Kelas</label>
                            <div class="col-sm-6">
                            <select class="form-control" name="kelas">
                                <option value="">-- Pilih Kelas</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                              </select>
                              @error('kelas')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Jurusan</label>
                            <div class="col-sm-6">
                            <select class="form-control" name="jurusan_id">
                                <option value="">-- Pilih Jurusan</option>
                                @foreach ($jurusan as $jrsn)
                                <option value="{{$jrsn->id}}">{{$jrsn->nama_jurusan}}</option>
                                @endforeach
                              </select>
                              @error('jurusan_id')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Kode Kelas</label>
                            <div class="col-sm-6">
                              <input type="text" name="kode_kelas" class="form-control" />
                              @error('kode_kelas')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
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