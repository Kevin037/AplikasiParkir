@extends('main')
@section('judul')
      <title>Parkir - Jenis Kendaraan</title>
@endsection
@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Master Jenis kendaraan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Jenis kendaraan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            
          <div class="col-12">
            <button type="button" class="btn btn-primary mb-3"  data-toggle="modal" data-target="#form_jenis_kendaraan">+ Tambah</button>
            <!-- /.card -->
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover datatable">
                  
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Tarif (Rp)</th>
                      <th>Tindakan</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1 ?>
                      @foreach($data as $data)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{$data->jenis}}</td>
                      <td>{{$data->tarif}}</td>
                      <input type="hidden" id="id_blok" value="{{ $data->id }}">
                      <td><a class="btn btn-light" href="/form-edit-jenis-kendaraan{{ $data->id }}"><i class="fa fa-edit"></i></a>
                      </td>
                    </tr>
                    <?php $no++ ?>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="form_jenis_kendaraan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<form action="/tambah-jenis-kendaraan" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="row">
            <div class="form-group col-md-1">
                  <label>Nama :</label><br><br>
                  <label for="">Tarif</label>
                  
            </div>
            <div class="form-group col-md-10">
                <input type="text" class="form-control" id="tgl_izin" name="nama" required><br>
                <input type="number" class="form-control" id="" name="tarif" required>
            </div>
             <center><button type="submit" class="btn btn-primary mb-3">Simpan</button></center>
			</form>
        </div>
    </div>
    </div>
</div>
  </div>
@endsection
@section('fot_dinamis')

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

</script>
<script>
  $(function () {
 $('#reservationdate').datetimepicker({
        format: 'L'
    });
  })
</script>
</body>
</html>
@endsection

