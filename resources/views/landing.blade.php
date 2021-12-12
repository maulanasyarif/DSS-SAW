<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Home Siswa</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/product/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('landingpage/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('landingpage/product.css')}}" rel="stylesheet">
</head>

<style>
div .a {
    background-image: linear-gradient(to right, rgb(22, 160, 133), rgba(12, 246, 184));
}
</style>

<body>

    <nav class="site-header sticky-top py-1">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="/">
                <img src="{{ asset('/images/logo/logo2.png') }}" width="30" height="30">
            </a>
            <div class="justify-content-end">
                <a class="py-2 d-md-inline-block justify-content-endtext-white" href="/login">Login</a>
                <a class="py-2 d-md-inline-block justify-content-endtext-white" href="{{ route('siswa.login')}}">
                    Login Siswa</a>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="d-flex justify-content-center">
            <div class="card text-center border-dark mb-3 shadow bg-white" style="width: 45rem; height: auto;">
                <div class="a">
                    <div class="card-body shadow">
                        <h5 class="card-title mb-5">Form Pengajuan Potongan Biaya SPP</h5>
                        @include('message')
                        <form method="POST" action="{{route('pdf.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="text" class="form-control" name="nis" value="{{ old('nis') }}"
                                            placeholder="NIS Siswa">
                                        @error('nis')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" value="{{ old('nama_siswa') }}"
                                            name="nama_siswa" placeholder="Nama Siswa">
                                        @error('nama_siswa')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            name="jenis_pengajuan">
                                            <option value="">-- Pilih Pengajuan</option>
                                            <option value="prestasi">Prestasi</option>
                                            <option value="keuangan">Keuangan</option>
                                        </select>
                                        @error('jenis_pengajuan')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" value="{{ old('kelas') }}" name="kelas"
                                            placeholder="Kelas">
                                        @error('kelas')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <label for="bukti">Upload Bukti</label>
                                    </div>
                                    <div class="col">
                                        {{ csrf_field() }}
                                        <input type="file" name="filepdf">
                                        @error('file')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="input-group">
                                            <input class="form-control" name="nomor_hp" value="{{ old('keterangan') }}"
                                                placeholder="Isikan nomor hp siswa"></input>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">Sumbit</button>
                                    </div>
                                </div>
                                <strong class="mt-3">Silahkan isi form diatas dengan benar, jika pilih prestasi upload
                                    file
                                    bukti (sertifikat), jika keuangan silahkan upload SKTM (Surat Keterangan Tidak
                                    Mampu) file wajib dalam bentuk PDF.</strong>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>