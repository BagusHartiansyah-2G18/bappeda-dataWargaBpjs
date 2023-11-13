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
              <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Samsat</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?=form_open_multipart('admin/samsat/save', array('id'=>'user_info'))?>
                <div class="card-body">
                <div class="form-group col-sm-6">
                    <label for="username">Nama</label>
                    <input type="text" name="nama" class="form-control" required autofocus>
                    <small class="help-block"></small>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="first_name">Alamat</label>
                        <textarea name="address" class="form-control" required></textarea>
                        <small class="help-block"></small>
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-sm-6">
                    <label for="email">Latitude</label>
                    <input type="text" name="latitude" class="form-control" required>
                    <small class="help-block"></small>
                </div>

                <div class="form-group col-sm-6">
                    <label for="email">Longitude</label>
                    <input type="text" name="longitude" class="form-control" required>
                    <small class="help-block"></small>
                </div>
                <div class="form-group col-sm-6">
                    <label>
                        <input type="radio" name="aktif" value="1"> Aktif
                    </label>
                    <label>
                        <input checked type="radio" name="aktif" value="0"> Tidak Aktif
                    </label>
                    <small class="help-block"></small>
                </div>

                <div class="form-group col-sm-6">
					        <label class="form-label">Upload Foto Samsat</label>
					        <input type="file" name="gambar1" class="form-control" required>
				        </div>
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
              </div>
              
              
              
              </div>
              <!-- /.card-body -->

              
            </div>
            <!-- /.card -->
          </div>
        </div>

  </div>

  <script src="<?= base_url() ?>assets/dist/js/app/master/samsat/add.js"></script>