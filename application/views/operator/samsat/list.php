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
                <h3 class="card-title">SAMSAT SIONDEL</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="form-group col-sm-6">
                    <label for="username">Nama</label>
                    <input type="text" name="nama" class="form-control" required autofocus value="<?=$users->nama?>" readonly>
                    <small class="help-block"></small>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="first_name">Alamat</label>
                        <textarea name="address" class="form-control" readonly required><?=$users->address?></textarea>
                        <small class="help-block"></small>
                    </div>
                </div>
                <div class="row">
                <div class="form-group col-sm-6">
                    <label for="email">Latitude</label>
                    <input type="text" name="latitude" class="form-control" value="<?=$users->latitude?>" readonly required>
                    <small class="help-block"></small>
                </div>

                <div class="form-group col-sm-6">
                    <label for="email">Longitude</label>
                    <input type="text" name="longitude" class="form-control" value="<?=$users->longitude?>" readonly required>
                    <small class="help-block"></small>
                </div>

                <div class="form-group col-sm-6">
					        <img src="<?= base_url('./uploads/'.$users->foto) ?>" width="300px" height="200px">
				        </div>

             
              </div>
              <!-- /.card-body -->

              
            </div>
            <!-- /.card -->
          </div>
        </div>

  </div>
  