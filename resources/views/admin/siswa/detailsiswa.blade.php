@extends('admin.layouts.app')
@section('title', 'Detail Siswa')

@section('content')

<div class="col">
    <div class="row">
        <div class="col mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="e-profile">
                        <div class="row">
                            <div class="col-12 col-sm-auto mb-3">
                                <div class="mx-auto" style="width: 140px;">
                                    <div class="d-flex justify-content-center align-items-center rounded">
                                        <a href="{{asset('assets/media/image/user/pp.jpeg')}}"
                                            class="image-popup-gallery-item">
                                            <img class="img-thumbnail mt-4"
                                                src="{{asset('assets/media/image/user/pp.jpeg')}}"></img>
                                    </div>
                                </div>
                            </div>
                            <!-- /div col-12 -->
                            <div class=" col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                <div class="text-center text-sm-left mb-3 mb-sm-0 py-3">
                                    <h4 class="pt-sm-2 pb-1 mb-2 text-nowrap">{{$siswa->nama_siswa}}</h4>
                                    <p class="mt-2 mb-3">{{$siswa->nis}}</p>
                                    <p class="mb-2">{{ $siswa->kelas}}</p>
                                </div>
                            </div>
                            <!-- /div col d-flex -->
                        </div>
                        <!-- /div row -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a href="" class="active nav-link">Personal Info</a></li>
                        </ul>
                        <div class="tab-content pt-3">
                            <div class="tab-pane active">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tempat, tanggal Lahir</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>: {{$siswa->tempat_lahir}}, {{$siswa->tanggal_lahir}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>: {{$siswa->jenis_kelamin}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nomor HP</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>: {{$siswa->nomor_hp}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Alamat</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>: {{$siswa->alamat}}</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Tahun Ajaran</label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>: {{$siswa->tapel}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a type="submit" class="btn btn-outline-info mr-2" href="/admin/siswa"><i
                                    data-feather="chevrons-left"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection