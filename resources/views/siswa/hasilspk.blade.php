<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Siswa</title>
</head>
<style>
/* Style the header */
header {
    text-align: center;
    font-size: 20px;
    color: black;
}

h3 {
    text-align: center;
    line-height: 0.5;
}

p {
    text-align: center;
    line-height: 0.5;
}

td.b {
    text-align: center;
    border: 1px solid;
    border-collapse: collapse;
}

td.x {
    width: 17%;
}

td.y {
    width: 66%;
}

td.z {
    width: 17%;
}

div.a {
    text-align: center;
}

table.a {
    width: 100%;
}

table.b {
    width: auto;
    spacing: 40px;
    margin-left: 50px;
    margin-right: auto;
}

tr.a {
    height: 200px;
}

footer {
    text-align: center;
    font-size: 17px;
    color: black;
}
</style>

<body>
    <header>
        <div class="a">
            <table>
                <tr>
                    <td class="x"><img src="{{ public_path('/images/logo/logocopsurat.jpg') }}" width="90" height="90">
                    </td>
                    <td class="y">
                        <h3>
                            <font color="blue">SMK WIRA BUANA 2</font>
                        </h3>
                        <p class="a">
                            <font size="3pt"><b>NPSN : 20268220 – NSS : 402020213136</b></font>
                        </p>
                        <p><b>TERAKREDITASI A</b></p>
                        <P class="a">
                            <font size="2pt">Teknik Otomotif (Teknik Kendaraan Ringan-Teknik Sepeda Motor)</font>
                        </P>
                        <P class="a">
                            <font size="2pt">Teknik Informatika (Rekayasa Perangkat Lunak-Teknik Komputer Jaringan)
                            </font>
                        </P>
                        <p class="a">
                            <font size="2pt">Jl. Camat Kanang RT.05 RW.07 No.13 Ds. Pabuaran Kec. BojonggedeKab. Bogor
                                Jawa Barat 16320 <br><br>
                                Telp/Fax (021) 87984656 – Email : smkwbbojonggede@gmail.com</font>
                        </p>
                    </td>
                    <td class="z"><img src="{{ public_path('/images/logo/webe.png') }}" width="90" height="90"></td>
                </tr>
            </table>
            <hr>
        </div>
    </header>
    <div class="a">
        <font size="4pt"><b>HASIL SISTEM PENDUKUNG KEPUTUSAN </b></font><br><br>
    </div>
    <font size="3pt">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores vero ratione eligendi ullam aperiam quam
        labore voluptate voluptas excepturi, dicta non beatae, mollitia deserunt rem quasi dolorum? Aperiam, earum
        voluptatem.
    </font><br><br><br>
    <font size="4pt">
        <table class="b">
            <tr class="b">
                <td>Nama</td>
                <td>:</td>
                <td>{{ Auth::guard('siswa')->user()->nama_siswa }}</td>
            </tr>
            <tr class="b">
                <td>Kelas</td>
                <td>:</td>
                <td>{{ Auth::guard('siswa')->user()->kelas }}</td>
            </tr>
            <tr class="b">
                <td>Tahun Pelajaran</td>
                <td>:</td>
                <td>{{ Auth::guard('siswa')->user()->tapel}}</td>
            </tr>
            <tr class="b">
                <td>Jenis Pengajuan</td>
                <td>:</td>
                <td><b>{{ Auth::guard('siswa')->user()->approve->jenispengajuan->keterangan}}</b></td>
            </tr>
            <tr class="b">
                <td>Keterangan</td>
                <td>:</td>
                <td><b>{{ Auth::guard('siswa')->user()->approve->jenispengajuan->biaya}}</b></td>
            </tr>
        </table><br><br><br>
    </font>
    <font size="3pt">Demikian surat ini di sampaikan, atas perhatian dan
        kerjasamanya kami
        ucapkan terima kasih.<br><br>Wassalamu'alaikum wr.wb.
    </font><br><br><br><br><br>
    <footer>
        <table class="a">
            <tr class="a">
                <td>Bogor,{{date(' d F Y')}}</td>
                <td>Bogor,{{date(' d F Y')}}</td>
            </tr>
            <tr>
                <td>Orang tua/ Wali murid</td>
                <td>Wali Kelas</td>
            </tr>
        </table>
    </footer>
</body>

</html>