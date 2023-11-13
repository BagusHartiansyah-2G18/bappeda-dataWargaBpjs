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
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card card-danger">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Data Level</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?=form_open_multipart('server/level/update', array('id'=>'user_info'))?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Nama Level</label>
                                                <input type="hidden" value="<?=$dlevel->id_level?>" name="id_level">
                                                <input type="text" name="nama_level" value="<?=$dlevel->nama_level?>" class="form-control" required>
                                                <small class="help-block"></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="<?=$dlevel->status_level?>"><?=$dlevel->status_level?></option>
                                                    <option>-- Pilih Status --</option>
                                                    <option>Aktif</option>
                                                    <option>Non AKtif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->   
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
              
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" id="btn-info" class="btn btn-info"><i class="nav-icon fas fa-save"></i> Update</button>
                    </div>
                    <?=form_close()?>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
  <script src="<?= base_url() ?>assets/dist/js/app/data/level/edit.js"></script>