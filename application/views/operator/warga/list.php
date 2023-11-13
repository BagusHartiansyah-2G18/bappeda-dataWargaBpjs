<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1><?php echo $judul;?></h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?php echo $subjudul;?></li>
            </ol>
        </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<section class="content">
      <div class="container-fluid">
       
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Aplikasi Data Warga</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="mt-3 mb-4">
                <div class="row">
                  <?php if($this->session->userdata('admin_nama') == 'Admin') {?>
                  <div class="form-group col-sm-2">
                      <button type="button" onclick="reload_ajax()" class="btn btn-info"><i class="fa fa-recycle"></i> Reload</button>
                  </div>
                  <div class="form-group col-sm-3">
                      <select id="kecamatan" name="kecamatan" class="form-control select2" style="width: 100%!important">
                          <option value="">Pilih Kecamatan </option>
                          <?php foreach ($kecamatan as $row) : ?>
                          <option value="<?=$row->id_kecamatan?>"><?=$row->nama_kecamatan?></option>   
                          <?php endforeach; ?>
                      </select>
                  </div>

                  <div class="form-group col-sm-3">
                      <select name="kelurahan" id="kelurahan" class="form-control select2" style="width: 100%!important">
                          <option value="">Pilih Desa/Kelurahan </option>
                      </select>
                  </div>
                <?php } else { ?>
                  <div class="form-group col-sm-4">
                      <button type="button" onclick="reload_ajax()" class="btn btn-info"><i class="fa fa-recycle"></i> Reload</button>
                      <input type="hidden" value="" id="kecamatan">
                      <input type="hidden" value="" id="kelurahan">
                  </div>
                <?php } ?> 
                </div>
              </div>
              <?php echo $this->session->flashdata("k");?>
                <table id="userTable" class="display dataTable table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th class="text-center">NIK Kepala </th>
                          <th class="text-center">Nama Kepala </th>
                          <th class="text-center">Alamat </th>
                          <th class="text-center">RT </th>
                          <th class="text-center">RW </th>
                          <th class="text-center">Aksi </th>
                      </tr>
                  </thead>
                  
                </table>
              </div>
              <!-- /.card-body -->

              
            </div>
            <!-- /.card -->
          </div>
        </div>

  </div>

  <!-- Script -->
  <script type="text/javascript">
  $(document).ready(function(){
      var userDataTable = $('#userTable').DataTable({
          'processing': true,
          'serverSide': true,
          'serverMethod': 'post',
          //'searching': false, // Remove default Search Control
          'ajax': {
            'url':'<?=base_url()?>server/warga/getWargaList',
            'data': function(data){
                data.kecamatanID = $('#kecamatan').val();
                data.kelurahanID = $('#kelurahan').val();
            }
          },
          'columns': [
            { data: 'nik_kepala' },
            { data: 'nama_kepala' },
            { data: 'alamat' },
            { data: 'rt' },
            { data: 'rw' },
            {
              data: "nik_id", "data": null, "orderable": true, "searchable": false, "width": '80px', "className": 'center',
              "render": function(data, type, row) {
                
                var btn = "<a href=\"<?php echo base_url() ?>server/warga/kk/"+data["nik_kepala"]+"\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Panggil\" class=\"btn btn-sm btn-flat bg-blue\"><i class=\"fa fa-user\"></i> Daftar Warga Dalam KK</a>";
                return btn;
              } 
            }, 
          ]
      });

      $('#kecamatan,#kelurahan').change(function(){
        userDataTable.draw();
      });
  });
  </script>

  <script>
    $(document).ready(function(){
        $('#kecamatan').change(function(){
            var kecamatan_id = $('#kecamatan').val();
            if(kecamatan_id != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>server/eksport/fetch_state",
                    method:"POST",
                    data:{kecamatan_id:kecamatan_id},
                    success:function(data)
                    {
                        $('#kelurahan').html(data);
                    }
                });
            }
            else
            {
                $('#kelurahan').html('<option value="">Pilih Desa/Kelurahan</option>');
            }
        });
    });
    </script>