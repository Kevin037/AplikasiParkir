@extends('main')
@section('judul')
      <title>Parkir - Ketersediaan Blok & Slot</title>
@endsection
@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Ketersediaan Blok & Slot</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Ketersediaan Blok & slot</li>
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
                      <th>Blok</th>
                      <th>Status</th>
                      <th>Tindakan</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1 ?>
                      @foreach($data as $data)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $data['nama']}}</td>
                      @if ($data[0] == 0)
                          <td><p class="text-danger">Penuh</p></td>
                      @else
                      <td>Sisa {{ $data[0] }} slot</td>
                      @endif
                      <input type="hidden" id="id_blok" value="{{ $data['id'] }}">
                      <td><a class="btn btn-light" onclick="btn_detail_slot({{ $data['id'] }})" ><i class="fa fa-search"></i> Detail Slot</a></td>
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
  <div class="modal fade" id="modal_detail_slot" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Data Ketersediaan slot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
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
                                <th>Slot</th>
                                <th>Status</th>
                              </tr>
                              </thead>
                              <tbody id="tabel_detail_slot">
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

