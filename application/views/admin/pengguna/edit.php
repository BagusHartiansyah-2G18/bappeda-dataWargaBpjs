<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
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
                <h3 class="card-title">Data Pengguna</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?=form_open('admin/pengguna/edit_info', array('id'=>'user_info'), array('id'=>$users->id))?>
                <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="<?=$users->username?>">
                    <small class="help-block"></small>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="first_name">No. Handphone</label>
                        <input type="text" name="nohp" class="form-control" value="<?=$users->nohp?>">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="last_name">Email</label>
                        <input type="email" name="email" class="form-control" value="<?=$users->email?>">
                        <small class="help-block"></small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?=$users->alamat?>">
                    <small class="help-block"></small>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" id="btn-info" class="btn btn-info">Simpan</button>
                </div>
                <?=form_close()?>
            </div>
            <!-- /.card -->


          </div>

          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Samsat</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?=form_open('admin/pengguna/edit_samsat', array('id'=>'user_level'), array('id'=>$users->id))?>
                <div class="card-body">
                <div class="form-group">
                    <label for="level">Samsat</label>
                    <select id="level" name="samsat" class="form-control select2" style="width: 100%!important">
                        <option value="">Pilih Samsat</option>
                        <?php foreach ($samsat as $row) : ?>
                            <option <?=$users->id_samsat===$row->id ? "selected" : ""?> value="<?=$row->id?>"><?=$row->nama?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="help-block"></small>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" id="btn-level" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
            <!-- /.card -->


          </div>

          
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Ubah Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?=form_open('admin/pengguna/change_password', array('id'=>'change_password'), array('id'=>$users->id))?>
              <input type="hidden" name="username" class="form-control" value="<?=$users->username?>">
                <div class="card-body">
                <div class="form-group">
                    <label for="old">Password Lama</label>
                    <input type="password" placeholder="Password Lama" name="old" class="form-control">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="new">Password Baru</label>
                    <input type="password" placeholder="Password Baru" name="new" class="form-control">
                    <small class="help-block"></small>
                </div>
                <div class="form-group">
                    <label for="new_confirm">Konfirmasi Password</label>
                    <input type="password" placeholder="Konfirmasi Password Baru" name="new_confirm" class="form-control">
                    <small class="help-block"></small>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" id="btn-pass" class="btn btn-flat btn-warning">Ganti Password</button>
                </div>
              </form>
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

  <script src="<?=base_url()?>assets/dist/js/app/master/pengguna/edit.js"></script>


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
