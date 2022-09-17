@extends('main')
@section('judul')
        <title>Parkir - Edit Blok</title>
@endsection

@section('isi')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perubahan Data Blok</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Edit Blok</li>
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
            <div class="card">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Ubah Blok</h5>
                    </div>
                    <div class="modal-body">
                    @foreach ($data as $data)
                    
                    <form action="/update-jenis-kendaraan{{ $data->id }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
                    @csrf
                                <div class="position-relative form-group">
                                    <label>Nama</label>
                                    <input name="nama" type="text" value="{{ $data->jenis }}" class="form-control"  required>
                                <div class="invalid-feedback">
                                        Masukkan nama blok !
                                    </div>
                                </div>

                                <div class="position-relative form-group">
                                    <label>Tarif</label>
                                    <input name="tarif" type="number" value="{{ $data->tarif }}" class="form-control"  required>
                                <div class="invalid-feedback">
                                        Masukkan tarif !
                                    </div>
                                </div>
                        <center><button type="submit" class="btn btn-primary mb-3">Simpan</button></center>
                    </form>
                    @endforeach
                </div>
                </div>
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
@endsection


@section('fot_dinamis')
</body>
</html>
@endsection

