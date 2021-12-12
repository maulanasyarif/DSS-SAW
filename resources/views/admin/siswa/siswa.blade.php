@extends('admin.layouts.app')
@section('title', 'Data Siswa')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Siswa</h4>
            @include('message')
            <a class="btn btn-outline-secondary btn-lg mt-7 col-md-3 mb-3" href="/admin/siswa/tambahsiswa">
                <i data-feather="user-plus"></i></a>
            <button type="button" class="btn btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
                <i data-feather="file"></i>IMPORT EXCEL
            </button>

            <!-- Import Excel -->
            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form method="post" action="/admin/siswa/import_excel" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                            </div>
                            <div class="modal-body">

                                {{ csrf_field() }}

                                <label>Pilih file excel</label>
                                <div class="form-group">
                                    <input type="file" name="file" required="required">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <table id="example1" class="table table-striped table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> NIS </th>
                        <th> Nama </th>
                        <th> Kelas </th>
                        <th> Alamat </th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($siswa as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>{{ $data->nama_siswa }}</td>
                        <td>{{ $data->kelas }}</td>
                        <td>{{ $data->alamat }}</td>
                        <form action="/admin/siswa/deletesiswa/{{$data->id}}" method="post">
                            @csrf
                            @method('delete')
                            <td>
                                <a href="/admin/siswa/detailsiswa/{{$data->id}}"
                                    class="btn btn-outline-success btn-rounded"><i data-feather="eye"></i></a>
                                <a href="/admin/siswa/editsiswa/edit/{{$data->id}}"
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
                        <th> NIS </th>
                        <th> Nama </th>
                        <th> Kelas </th>
                        <th> Alamat </th>
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