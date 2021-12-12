@extends('admin.layouts.app')
@section('title', 'Perangkingan')

@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            @include('message')
            <!-- matriks keputusan -->
            <h4 class="card-title mb-2">Matriks Keputusan</h4>
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> Nama </th>
                        @foreach($kriteria as $k)
                        <th>{{$k->nama_kriteria}} [{{$k->bobot}}]</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($approve->sortBy('id') as $s)
                    <tr id='data'>
                        <td>{{$s->nama_siswa}}</td>
                        @foreach($s->penilaian as $n)
                        <td>{{$n->bobot}}</td>
                        @endforeach
                    </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>
            <br>

            <!-- normalisai  matriks -->
            <h4 class="card-title mb-2">Normalisasi Matriks Keputusan</h4>
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> Nama </th>
                        <?php $bobot = [] ?>
                        @foreach($kriteria as $k)
                        <?php $bobot[$k->id] = $k->bobot ?>
                        <th>{{$k->nama_kriteria}}</th>
                        @endforeach
                        <th> Total </th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($approve))
                    <?php $ranking = []; ?>
                    @foreach($approve->sortBy('id') as $s)
                    <tr>
                        <td>{{ $s->nama_siswa }}</td>
                        <?php $total = 0; ?>
                        @foreach($s->penilaian as $penilaian)
                        @if($penilaian->kriteria->sifat == 'Cost')
                        <?php $normalisasi = number_format(($kode_krit[$penilaian->kriteria->id] / $penilaian->bobot), 2); ?>
                        @elseif($penilaian->kriteria->sifat == 'Benefit')
                        <?php $normalisasi = number_format(($penilaian->bobot/$kode_krit[$penilaian->kriteria->id]), 2); ?>
                        @endif
                        <?php $total = number_format($total + ($bobot[$penilaian->kriteria->id] * $normalisasi), 2); ?>
                        <td>{{ $normalisasi }}</td>
                        @endforeach
                        <td>{{ $total }}</td>
                        <?php $ranking[] = [
                                                'approve_id'      => $s->id,
                                                'nis'           => $s->nis,
                                                'nama_siswa'    => $s->nama_siswa,
                                                'total'         => $total
                                            ]; ?>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="{{(count($kriteria)+1)}}" class="text-center">Data tidak ditemukan</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <br>

            <!-- perankingan -->
            <h4 class="card-title mb-2">Perangkingan</h4>
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> NIS </th>
                        <th> Nama </th>
                        <th> Total </th>
                        <th> Ranking </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    <?php
                                usort($ranking, function ($a, $b) {
                                    return strcmp($a['total'], $b['total']);
                                });
                                $ranking = array_reverse($ranking);
                                $a = 1;
                                ?>
                    @foreach($ranking as $r)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $r['nis'] }}</td>
                        <td>{{ $r['nama_siswa'] }}</td>
                        <td>{{ $r['total'] }}</td>
                        <td>{{ $a++ }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th> No </th>
                        <th> NIS </th>
                        <th> Nama </th>
                        <th> Total </th>
                        <th> Ranking </th>
                    </tr>
                </tfoot>
            </table>
            <p class="card-title mb-2">Maka, didapat dengan peringkat nomor 1 adalah alternatif dengan nama
                <strong>{{ current($ranking)['nama_siswa'] }}</strong>
            </p>
            <form action="/admin/hasil/saveData" method="post">
                @csrf
                @foreach (array_slice($ranking, $total>0.6) as $data) <input type="hidden" name="data[]"
                    value="{{ json_encode($data, true) }}">
                @endforeach
                <button type="submit" class="btn btn-outline-success mr-2" title="Data perangkingan"
                    data-toggle="tooltip" data-placement="right">Save</button>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#example1').DataTable();
});
</script>

@endsection