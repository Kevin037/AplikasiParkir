@extends('main')
@section('judul')
      <title>Parkir - Parkir Keluar</title>
@endsection
@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parkir keluar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Parkir keluar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            
          <div class="col-12"><!-- /.card -->
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover datatable">
                  
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Parkir</th>
                      <th>Slot</th>
                      <th>Blok</th>
                      <th>No kendaraan</th>
                      <th>Jenis Kendaraan</th>
                      <th>Jam masuk</th>
                      <th>Jam keluar</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1 ?>
                      @foreach($data as $data)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $data['no_parkir'] }}</td>
                      <td>{{ $data['nama_slot'] }}</td>
                      <td>{{ $data['nama_blok'] }}</td>
                      <td>{{ $data['no_kendaraan'] }}</td>
                      <td>{{ $data['nama_jenis_kendaraan'] }}</td>
                      <td>{{ $data['jam_masuk'] }}</td>
                      <td>{{ $data['jam_keluar'] }}</td>
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

