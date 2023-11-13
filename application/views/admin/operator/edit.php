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
                <h3 class="card-title">Data User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?=form_open('admin/operator/edit_info', array('id'=>'user_info'), array('id'=>$users->id))?>
                <div class="card-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="<?=$users->username?>">
                    <small class="help-block"></small>
                </div>
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?=$users->first_name?>">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?=$users->last_name?>">
                        <small class="help-block"></small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" value="<?=$users->email?>">
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
                <h3 class="card-title">Level</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?=form_open('admin/operator/edit_level', array('id'=>'user_level'), array('id'=>$users->id))?>
                <div class="card-body">
                <div class="form-group">
                    <label for="level">Level User</label>
                    <select id="level" name="level" class="form-control select2" style="width: 100%!important">
                        <option value="">Pilih Level</option>
                        <?php foreach ($groups as $row) : ?>
                            <option <?=$level->id===$row->id ? "selected" : ""?> value="<?=$row->id?>"><?=$row->name?></option>
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
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?=form_open('admin/operator/edit_status', array('id'=>'user_status'), array('id'=>$users->id))?>
                <div class="card-body">
                <div class="form-group">
                    <label>
                        <input <?=$users->active==='1'?"checked":""?> type="radio" name="status" value="1"> Aktif
                    </label>
                    <label>
                        <input <?=$users->active==='0'?"checked":""?> type="radio" name="status" value="0"> Tidak Aktif
                    </label>
                    <small class="help-block"></small>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                <button type="submit" id="btn-status" class="btn btn-success">Simpan</button>
                </div>
                <?=form_close()?>
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
              <?=form_open('admin/operator/users/change_password', array('id'=>'change_password'), array('id'=>$users->id))?>
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

  <script src="<?=base_url()?>assets/dist/js/app/users/edit.js"></script>

<?php if($user->id === $users->id) : ?>
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
<?php endif; ?>