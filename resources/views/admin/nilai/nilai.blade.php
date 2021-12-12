@extends('admin.layouts.app')
@section('title', 'Data Siswa SPK')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Siswa SPK</h4>
            @include('message')
            <a class="btn btn-outline-secondary mt-7 col-md-3 mb-3" href="/admin/nilai/tambahnilai">
                <i data-feather="plus"></i>Create</a>
            <table id="example1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> NIS </th>
                        <th> Nama </th>
                        <th> Kriteria </th>
                        <th> Bobot </th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($ps as $n)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $n->approve->nis }}</td>
                        <td>{{ $n->approve->nama_siswa }}</td>
                        <td>{{ $n->penilaian->kriteria->nama_kriteria }}</td>
                        <td>{{ $n->penilaian->bobot }}</td>
                        <form action="/admin/nilai/deletenilai/{{$n->approve_id}}" method="post">
                            @csrf
                            @method('delete')
                            <td>
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
                        <th> NIS </th>
                        <th> Nama </th>
                        <th> Kriteria </th>
                        <th> Bobot </th>
                        <th> Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
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