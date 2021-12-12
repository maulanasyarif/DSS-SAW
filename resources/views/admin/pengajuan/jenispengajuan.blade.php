@extends('admin.layouts.app')
@section('title', 'Jenis Pengajuan')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Jenis Pengajuan</h4>
            @include('message')
            <a class="btn btn-outline-secondary mt-7 col-md-3 mb-3" href="{{ route('create.jenisPengajuan')}}">
                <i data-feather="plus"></i>Create</a>
            <table id="example1" class="table table-striped table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Jenis Pengajuan </th>
                        <th> Keterangan </th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jenispengajuan as $p)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$p->keterangan}}</td>
                        <td>{{$p->biaya}}</td>
                        <form action="/admin/deleteJenisPengajuan/{{$p->id}}" method="post">
                            @csrf
                            @method('delete')
                            <td>
                                <a href="/admin/pengajuan/editJenisPengajuan/edit/{{$p->id}}"
                                    class="btn btn-outline-warning btn-rounded"><i data-feather="edit"></i></a>
                                <button class="btn btn-outline-danger btn-rounded" onclick="hapusData()"><i
                                        data-feather="trash-2"></i></button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th> No </th>
                        <th> Jenis Pengajuan </th>
                        <th> Keterangan </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script>
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