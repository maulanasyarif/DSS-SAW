@extends('admin.layouts.app')
@section('title', 'Data Kelas')

@section('content')
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              <div class="col-12">
              </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Kelas</h4>
                    @include('message')
                    <a class="btn btn-outline-secondary mt-7 col-md-3 mb-3" href="/admin/kelas/tambahkelas">
                    <i data-feather="plus"></i>Create</a>
                    <table class="table table-hover"><br>
                      <thead>
                        <tr>
                          <th>Kelas</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                      <?php $no=1; ?>
                       @foreach ($kelas as $kls)
                          <tr>
                            <td>{{$kls->kelas}} {{ $kls->jurusan->nama_jurusan}} {{$kls->kode_kelas}}</td>
                            <form action="/admin/kelas/deletekelas/{{$kls->id}}" method="post">
                              @csrf
                              @method('delete')
                              <td>
                                <a href="/admin/kelas/editkelas/edit/{{$kls->id}}" class="btn btn-outline-warning btn-square"><i data-feather="edit"></i></a>
                                <button class="btn btn-outline-danger btn-square" onclick="hapusData()"><i data-feather="trash-2"></i></button>
                              </td>
                            </form>
                          </tr>
                       @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-sm-end">
                          <div>
                            {{$kelas->links('pagination::bootstrap-4')}}
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