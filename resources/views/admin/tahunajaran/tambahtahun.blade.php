@extends('admin.layouts.app')
@section('title', 'Tambah Tahun Ajaran')

@section('content')

              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Tahun Ajaran</h4>
                    <form class="form-sample" action="/admin/tahunajaran/tambahtahun/store" method="post">
                    @csrf
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-6">
                              <input type="text" name="thn_ajaran" class="form-control" />
                              @error('thn_ajaran')
                                <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-outline-success mr-2"><i data-feather="check-square"></i></button>
                      <a type="submit" class="btn btn-outline-info mr-2" href="/admin/tahunajaran"><i data-feather="chevrons-left"></i></a>
                    </form>
                  </div>
                </div>
              </div>

@endsection