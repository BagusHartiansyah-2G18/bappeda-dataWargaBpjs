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
                <h3 class="card-title"><?php echo $judul;?></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php echo $this->session->flashdata("k");?>
              <div class="row">
              <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Ubah Password Operator</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?=form_open('server/warga/save_password', array('id'=>'user_info'))?>
                <div class="card-body">
                
                 <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('admin_id'); ?>">
                    <input type="text" name="nama_admin" value="<?php echo $this->session->userdata('admin_nama_lengkap'); ?>" class="form-control" required>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="new">Password Baru</label>
                    <input type="password" placeholder="Password Baru" name="new" class="form-control" required>
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="new_confirm">Konfirmasi Password Baru </label>
                    <input type="password" placeholder="Konfirmasi Password Baru" name="new_confirm" class="form-control" required>
                    <small class="help-block"></small>
                </div>

                <div class="card-footer">
                <button type="submit" id="btn-info" class="btn btn-info">Simpan</button>
                </div>
                <?=form_close()?>

            </div>
            <!-- /.card -->


          </div>




              </div>
              
              
              
              </div>
              <!-- /.card-body -->

              
            </div>
            <!-- /.card -->
          </div>
        </div>

  </div>

  <script src="<?=base_url()?>assets/dist/js/app/data/warga/edit-password.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('form#change_password').on('submit', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        
        let btn = $('#btn-pass');
        btn.attr('disabled', 'disabled').text('Process...');

        url = $(this).attr('action');
        data = $(this).serialize();
        msg = "Password anda berhasil diganti";
        submitajax(url, data, msg, btn);
    });
});
</script>
