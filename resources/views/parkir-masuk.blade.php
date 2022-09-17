@extends('main')
@section('judul')
      <title>Parkir - Parkir Masuk</title>
@endsection
@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parkir masuk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Parkir masuk</li>
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
            <button type="button" class="btn btn-primary mb-3"  data-toggle="modal" data-target="#form_parkir_masuk">+ Tambah Parkir</button>
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
                      <th>No Parkir</th>
                      <th>Slot</th>
                      <th>Blok</th>
                      <th>No kendaraan</th>
                      <th>Jenis Kendaraan</th>
                      <th>Jam masuk</th>
                      <th>Tindakan</th>
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
                      <td><a class="btn btn-success" href="/selesai-parkir{{ $data['id'] }}"><i class="fa fa-check"></i> Selesai</a></td>
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
  <div class="modal fade" id="form_parkir_masuk" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Parkir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<form action="/tambah-parkir" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
            @csrf
            <div class="position-relative form-group">
                <label>No Kendaraan</label>
                <input name="no_kendaraan" type="text" class="form-control"  required>
              <div class="invalid-feedback">
                      Masukkan No kendaraan !
                  </div>
              </div>

              <div class="position-relative form-group">
                <label>Merk</label>
                <input name="merk" type="text" class="form-control"  required>
              <div class="invalid-feedback">
                      Masukkan merk !
                  </div>
              </div>

              <div class="position-relative form-group">
                <label>Pilih Jenis Kendaraan</label>
                <select class="form-control select2" name="jenis_id" id="" required>
                    <option value="">-- Pilih Jenis --</option>
                    @foreach ($jenis as $jenis)
                        <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Pilih jenis !
                </div>
                </div>
                
              <div class="position-relative form-group">
                <label>Pilih Slot</label>
                <select class="form-control select2" name="slot_id" id="" required>
                    <option value="">-- Pilih Slot --</option>
                    @foreach ($slot as $slot)
                        <option value="{{ $slot['id'] }}">{{ $slot['nama'] }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Pilih slot !
                </div>
                </div>
             <center><button type="submit" class="btn btn-primary mb-3">Simpan</button></center>
			</form>
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

