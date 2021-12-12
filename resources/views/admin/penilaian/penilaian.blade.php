@extends('admin.layouts.app')
@section('title', 'Data Penilaian')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Penilaian</h4>
            @include('message')
            <a class="btn btn-outline-secondary mt-7 col-md-3 mb-3" href="/admin/penilaian/tambahpenilaian">
                <i data-feather="plus"></i>Create</a>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama Kriteria</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Bobot</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penilaian->sortBy('bobot') as $p)
                        <tr>
                            <td>{{ $p->kriteria->nama_kriteria }}</td>
                            <td>{{ $p->keterangan }}</td>
                            <td>{{ $p->bobot }}</td>
                            <form action="/admin/penilaian/deletepenilaian/{{$p->id}}" method="post">
                                @csrf
                                @method('delete')
                                <td>
                                    <a href="/admin/penilaian/editpenilaian/edit/{{$p->id}}"
                                        class="btn btn-outline-warning btn-square"><i data-feather="edit"></i></a>
                                    <button class="btn btn-outline-danger btn-square" onclick="hapusData()"><i
                                            data-feather="trash-2"></i></button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    <div>
                        {{$penilaian->links('pagination::bootstrap-4')}}
                    </div>
                </div>
            </div>
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