@extends('admin.layouts.app')
@section('title', 'Edit Tahun Ajaran')

@section('content')
        <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Tahun Ajaran</h4>
                    <form class="form-sample" action="/admin/tahunajaran/edittahun/edit/{{$tahunajaran->id}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Tahun Ajaran</label>
                            <div class="col-sm-6">
                            <input type="text" name="thn_ajaran" class="form-control" value="{{$tahunajaran->thn_ajaran}}" />
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