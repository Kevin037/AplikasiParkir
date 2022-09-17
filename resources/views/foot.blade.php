
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/sparklines/sparkline.js"></script>
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="js/adminlte.js"></script>
<script src="js/demo.js"></script>
<script src="js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.2.2/dist/sweetalert2.all.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
<script src="plugins/moment/moment.min.js"></script>
 <script src="plugins/daterangepicker/daterangepicker.js"></script> 
<script
src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js">
</script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="js/jam.js"></script>

@include('sweetalert::alert')
<script>
  (function() {
      'use strict';
      window.addEventListener('load', function() {
          var forms = document.getElementsByClassName('needs-validation');
          var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                      event.preventDefault();
                      event.stopPropagation();
                  }
                  form.classList.add('was-validated');
              }, false);
          });
      }, false);
  })();

</script>
<script type="text/javascript">
$(function () {
  $('.select2').select2()
   $('#reservationdate').datetimepicker({
        format: 'L'
    });
  });

  </script>

<script>
    function hapus_blok(id){
    Swal.fire({
    title: 'Yakin?',
    text: "Apakah anda ingin menghapus blok",
    imageWidth: 170,
    imageHeight: 230,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location = "/hapus-blok"+id,
      Swal.fire(
        'Blok Dihapus!',
        'Sedang Proses',
        'warning'
      )
    }
    })
      };

    function hapus_slot(id){
    Swal.fire({
    title: 'Yakin?',
    text: "Apakah anda ingin menghapus slot",
    imageWidth: 170,
    imageHeight: 230,
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, hapus'
    }).then((result) => {
    if (result.isConfirmed) {
      window.location = "/hapus-slot"+id,
      Swal.fire(
        'Slot Dihapus!',
        'Sedang Proses',
        'warning'
      )
    }
    })
      };
</script>

<script>
  // $(".btn_slot").click(function(){
  function btn_detail_slot(id_blok){
    event.preventDefault();
    jQuery.noConflict();     
            $.ajax({
                    url : "/detail-slot"+id_blok,
                    dataType : 'json',
                    success: function(data){ 
                        var data_tabel="";
                        var nama_status="";
                        var no=1;
                        for (let i = 0; i < data.length; i++) {
                          if (data[i].status == 1) {
                            nama_status = "<p class='text-success'>Kosong</p>";
                          }else{
                            nama_status = "<p class='text-danger'>Penuh</p>";
                          }
                          data_tabel+="<tr><td>"+no+"</td><td>"+data[i].nama+"</td><td>"+nama_status+"</td></tr>";
                          no+=1;
                        }
                        $('#tabel_detail_slot').html(data_tabel);
                        window.$('#modal_detail_slot').modal("show");
                    }
                });
		}
</script>