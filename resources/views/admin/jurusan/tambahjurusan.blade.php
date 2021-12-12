@extends('admin.layouts.app')
@section('title', 'Tambah Jurusan')

@section('content')

<div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Jurusan</h4>
                    <form class="form-sample" action="/admin/jurusan/tambahjurusan/store" method="post">
                    @csrf
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Jurusan</label>
                            <div class="col-sm-6">
                              <input type="text" name="nama_jurusan" class="form-control" />
                              @error('nama_jurusan')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-outline-success mr-2"><i data-feather="check-square"></i></button>
                      <a type="submit"class="btn btn-outline-info mr-2" href="/admin/jurusan"><i data-feather="chevrons-left"></i></a>
                    </form>
                  </div>
                </div>
              </div>

@endsection