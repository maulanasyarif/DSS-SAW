@extends('admin.layouts.app')
@section('title', 'Edit Jurusan')

@section('content')
<div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12">
              </div>
            </div>
        <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Jurusan</h4>
                    <form class="form-sample" action="/admin/jurusan/editjurusan/edit/{{$jurusan->id}}" method="post">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-8">
                          <div class="form-group row">
                            <label class="col-sm-5 col-form-label">Jurusan</label>
                            <div class="col-sm-6">
                            <input type="text" name="nama_jurusan" class="form-control" value="{{$jurusan->nama_jurusan}}" />
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
            </div>
@endsection