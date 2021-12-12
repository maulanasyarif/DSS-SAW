@extends('admin.layouts.app')
@section('title', 'Index')

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Hasil SPK</h4>
            @include('message')
            <div class="row">
                <a class="btn btn-outline-primary btn-rounded mt-7 ml-3 mb-2" href="{{ route('cetak')}}"><i
                        data-feather="printer"></i>PDF</a>
                <form action="{{ route('deleteHasil')}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger btn-rounded mt-7 mb-2 ml-2"><i data-feather="trash-2"
                            type="submit"></i>Reset</button>
                </form>
            </div>
            <table id="example1" class="table table-striped table-bordered table">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> NIS </th>
                        <th> Nama Siswa </th>
                        <th> Total </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($hasil as $h)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $h->nis }}</td>
                        <td>{{ $h->nama_siswa }}</td>
                        <td>{{ $h->total }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th> No </th>
                        <th> NIS </th>
                        <th> Nama Siswa </th>
                        <th> Total </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
</div>

@endsection