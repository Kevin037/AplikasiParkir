@extends('main')
@section('judul')
        <title>Parkir - Home</title>
@endsection
@section('isi')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="m-0">Aplikasi Parkir</h1>
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $jumlah_blok }}</h3>

                <p>Jumlah Blok</p>
              </div>
              <div class="icon">
                <i class="ion ion-alert-circled"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $jumlah_slot }}</h3>

                <p>Jumlah Slot</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-alarm-clock"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $jumlah_transaksi_masuk }}</h3>

                <p>Parkir Masuk</p>
              </div>
              <div class="icon">
                <i class="ion ion-chatbubble-working"></i>
              </div>
            </div>
          </div>

          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $jumlah_transaksi_keluar }}</h3>

                <p>Parkir keluar</p>
              </div>
              <div class="icon">
                <i class="ion ion-chatbubble-working"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
         

          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        
        <div class="card card-default">
          <div class="card-header">
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
            <!-- /.row -->
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('fot_dinamis')
</body>
</html>
@endsection

