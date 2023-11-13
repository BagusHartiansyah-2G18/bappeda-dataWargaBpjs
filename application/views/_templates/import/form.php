<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery-1.2.3.js"></script>
<script type="text/javascript">
$(document).ready(function() {

  $('#myForm').submit(function() {
    $.ajax({
      type: 'POST',
      url: $(this).attr('action'),
      data: $(this).serialize(),
      beforeSend: function(){
        // Show image container
        $("#loader").show();
       },
      success: function(data) {
        $('#muncul').html(data);
      },
      complete:function(data){
        // Hide image container
        $("#loader").hide();
       }
    })
    return false;
  });
})
</script>

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
                        <?php echo $this->session->flashdata("k");?>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- general form elements -->
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Import Data Warga</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?=form_open_multipart('server/import/excel', array('id'=>'user_info'))?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="first_name">Kecamatan</label>
                                                <select name="kecamatan" id="kecamatan" class="form-control select2" style="width: 100%!important">
                                                <option value="">Semua Kecamatan </option>
                                                <?php foreach ($kecamatan as $row) : ?>
                                                <option value="<?=$row->id_kecamatan?>"><?=$row->nama_kecamatan?></option>   
                                                <?php endforeach; ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="first_name">Desa/Kelurahan</label>
                                                <select name="kelurahan" id="kelurahan" class="form-control select2" style="width: 100%!important">
                                                    <option value="">Semua Desa/Kelurahan </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="first_name">Kategori Import</label>
                                                <select name="kategori" id="kategori" class="form-control select2" style="width: 100%!important">
                                                    <option value="0">Data Awal</option>
                                                    <option value="1">Data Akhir</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="first_name">File Upload</label>
                                                <input type="file" name="upload" class="form-control">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <input type="checkbox" name="hapus"> * Hapus data yang sudah ada
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- /.card-body -->   
                                </div>
                                <!-- /.card -->
                            </div>

                            <!-- KETERANGAN -->
                            <div class="col-md-5"> 
                                <!-- PRODUCT LIST -->
                                <div class="box box-success">
                                    <div class="alert alert-warning alert-dismissible">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      <h5><i class="icon fas fa-exclamation-triangle"></i> Keterangan !</h5>
                                      <b>Download Contoh File Import : </b><a href="<?php echo base_url(); ?>/contoh-import-absensi.xlsx" target="_blank" download><i class"fa fa-download"></i> Download Here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="simpan" class="btn btn-info"><i class="nav-icon fas fa-save"></i> Simpan</button>
                    </div>
                    <?=form_close()?>
                </div>
            </div>
        </div>
    </div>
</section>
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