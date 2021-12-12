@extends('admin.layouts.app')
@section('title', 'Data Jurusan')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
    <div class="card-body">
      <h4 class="card-title">Jurusan</h4>
      @include('message')
        <a class="btn  btn-outline-secondary mt-7 col-md-3 mb-3" href="/admin/jurusan/tambahjurusan">
        <i data-feather="plus"></i>Create</a>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Jurusan</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                       @foreach ($jurusan as $data)
                        <tr>
                          <td>{{ $data->nama_jurusan }}</td>
                          <form action="/admin/jurusan/deletejurusan/{{$data->id}}" method="post">
                          @csrf
                          @method('delete')
                          <td>
                            <a href="/admin/jurusan/editjurusan/edit/{{$data->id}}" class="btn btn-outline-warning btn-square"><i data-feather="edit"></i></a>
                            <button class="btn btn-outline-danger btn-square" onclick="hapusData()"><i data-feather="trash-2"></i></button>
                          </td>
                          </form>
                        </tr>
                       @endforeach
                      </tbody>
                   </table>
                   <div class="d-flex justify-content-end">
                    <div>
                      {{$jurusan->links('pagination::bootstrap-4')}}
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