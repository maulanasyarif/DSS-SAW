@extends('admin.layouts.app')
@section('title', 'Edit Persyaratan')

@section('content')

<div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Persyaratan</h4>
                    <form class="form-sample" action="/admin/nilai/editnilai/edit/{{$penilaian_siswa->id}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-5">
                        <div class="form-group row">
                            <label class="col-sm-5 col-form-label mb-3">Nama Siswa</label>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group row">
                          <input type="text" class="form-control" name="siswa_id" value="{{ $penilaian_siswa->siswa_id }}" readonly="readonly" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-5">
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
                      <a type="submit" class="btn btn-outline-info mr-2" href="/admin/nilai"><i data-feather="chevrons-left"></i></a>
                    </form>
                  </div>
                </div>
              </div>
@endsection