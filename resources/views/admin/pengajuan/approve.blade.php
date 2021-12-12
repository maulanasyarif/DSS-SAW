@extends('admin.layouts.app')
@section('title', 'Data Pengajuan Approve')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Approve</h4>
            @include('message')
            <table id="example1" class="table table-striped table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> NIS </th>
                        <th> Nama </th>
                        <th> Jenis Pengajuan </th>
                        <th> Bukti </th>
                        <th> Kelas </th>
                        <th> Nomor HP </th>
                        <th colspan="2"> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($approve as $a)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$a->nis}}</td>
                        <td>{{$a->nama_siswa}}</td>
                        <td>{{$a->JenisPengajuan->keterangan}}</td>
                        <td>
                            <a class="btn btn-outline-primary" href="{{asset('file_siswa/'.$a->file)}}"
                                target="_blank">Lihat</a>
                        </td>
                        <td>{{$a->kelas}}</td>
                        <td>{{$a->nomor_hp}}</td>
                        <form action="{{route ('delete.approve', $a->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <td>
                                <button type="submit" id="declined" class="btn btn-danger btn-sm">Delete
                                </button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th> No </th>
                        <th> NIS </th>
                        <th> Nama </th>
                        <th> Jenis Pengajuan </th>
                        <th> Bukti </th>
                        <th> Kelas </th>
                        <th> Keterangan </th>
                        <th> Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#example1').DataTable();
});

function hapusData() {
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
    swal({
            title: "Are you sure to deleted?",
            text: "Data will be lost permanently!",
            icon: "error",
            buttons: {
                cancel: true,
                confirm: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "",
                    closeModal: true
                }
            }
        })
        .then((isConfirm) => {
            if (isConfirm) {
                form.submit(); // submitting the form when user press yes
            } else {
                swal("Canceled", "Data will not be deleted", "error");
            }
        });
}
</script>

@endsection