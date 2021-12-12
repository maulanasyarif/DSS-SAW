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
            <a class="py-2" href="{{ route('siswa.home') }}">
                <img src="{{ asset('/images/logo/logo2.png') }}" width="30" height="30">
            </a>
            <a class="py-2 d-md-inline-block justify-content-endtext-white" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </nav>


    <div class="container py-5">
        <div class="d-flex justify-content-center">
            <div class="card text-center border-dark mb-3 shadow bg-white" style="width: 45rem; height: auto;">
                <div class="a">
                    <div class="card-body shadow">
                        <h5 class="card-title mb-5">Form Pengajuan Potongan Biaya SPP</h5>
                        @include('message')
                        <form method="POST" action="{{route('siswa.pdf.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <div class="col">
                                        <input type="hidden" class="form-control" name="siswa_id"
                                            value="{{ Auth::guard('siswa')->user()->id }}">
                                        <input type="text" class="form-control is-valid" name="nis"
                                            value="{{ Auth::guard('siswa')->user()->nis }}" placeholder="NIS Siswa"
                                            readonly="readonly">
                                        @error('nis')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control is-valid"
                                            value="{{ Auth::guard('siswa')->user()->nama_siswa }}" name="nama_siswa"
                                            readonly="readonly">
                                        @error('nama_siswa')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <select class="form-control" id="exampleFormControlSelect1"
                                            name="jenispengajuan_id">
                                            <option value="">-- Pilih Pengajuan</option>
                                            @foreach ($JenisPengajuan as $k)
                                            <option value="{{$k->id}}"> {{$k->keterangan}} </option>
                                            @endforeach
                                        </select>
                                        @error('jenis_pengajuan')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control is-valid"
                                            value="{{ Auth::guard('siswa')->user()->kelas }}" name="kelas"
                                            readonly="readonly">
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
                                        @error('filepdf')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="nomor_hp"
                                                value="{{ old('nomor_hp') }}"
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

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card text-center border-dark mb-3 shadow bg-dark" style="width: 45rem; height: 20rem;">
                <div class="card-body shadow">
                    <h5 class="card-title text-white mb-5">Hasil Sistem Pendukung Keputusan</h5>
                    <p class="card-text text-white mb-5">Selamat datang di website yang menyediakan hasil dari sistem
                        pendukung keputusan
                        penerima
                        potongan biaya pendidikan. <br><br>
                        Silahkan <strong>{{ Auth::guard('siswa')->user()->nama_siswa }}</strong> download pdf untuk
                        mengecek
                        hasil akhir
                        dari sistem kami.</p>
                    <a class="btn btn-outline-primary btn-rounded mt-7 col-md-2 mb-2"
                        href="{{ route('siswa.cetak')}}">PDF</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>