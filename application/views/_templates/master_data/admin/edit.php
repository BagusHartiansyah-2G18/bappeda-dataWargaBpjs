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
                                        <h3 class="card-title">Data Admin</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?=form_open_multipart('server/admin/update', array('id'=>'user_info'))?>

                                    <?php if($dadminpusat['nama_level'] == 'Admin') {?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="first_name">Nama Lengkap</label>
                                                <input type="hidden" name="id" value="<?=$dadminpusat['iduser'];?>">
                                                <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?=$dadminpusat['nama_lengkap'];?>" class="form-control" required>
                                                <small class="help-block"></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Username</label>
                                                <input type="text" name="username" id="username" value="<?=$dadminpusat['username'];?>" class="form-control" required>
                                                <small class="help-block"></small>
                                            </div>
                 
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Password</label>
                                                <input type="password" name="password" id="password" class="form-control">
                                                <p>*Kosongkan jika password tidak diubah</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Email</label>
                                                <input type="email" name="email" id="email" value="<?=$dadminpusat['email'];?>" class="form-control" required>
                                                <small class="help-block"></small>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Desa/Kelurahan</label>
                                                <select id="kelurahan" name="kelurahan" class="form-control select2" readonly style="width: 100%!important">
                                                    <option value="0">Pilih Desa/Kelurahan </option>
                                                </select>
                                                <p style="color:red;font-style: italic">* Jika user sebagai admin tidak perlu memilih Kelurahan</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Kecamatan</label>
                                                <select id="kecamatan" name="kecamatan" class="form-control select2" readonly style="width: 100%!important">
                                                    <option value="0">Pilih Kecamatan </option>
                                                </select>
                                                <p style="color:red;font-style: italic">* Jika user sebagai admin tidak perlu memilih Kelurahan</p>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Status</label>
                                                <select class="form-control" name="status" id="status" required>
                                                    <?php if($dadminpusat['status'] == '1') { ?>
                                                    <option value="1">Aktif</option>
                                                    <?php } else {?>
                                                    <option value="0">Non Aktif</option>
                                                    <?php } ?>
                                                    <option>Pilih Status</option>
                                                    <option value="1"> Aktif </option>
                                                    <option value="0"> Non Aktif </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Level</label>
                                                <select class="form-control" name="level" id="level" required>
                                                    <option value="<?=$dadminpusat['id_level'];?>"><?=$dadminpusat['nama_level'];?></option>
                                                    <option value="">Pilih Level </option>
                                                    <?php foreach ($level as $row) : ?>
                                                        <option value="<?=$row->id_level?>"><?=$row->nama_level?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->  
                                    <?php } else { ?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="first_name">Nama Lengkap</label>
                                                <input type="hidden" name="id" value="<?=$dadmin['iduser'];?>">
                                                <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?=$dadmin['nama_lengkap'];?>" class="form-control" required>
                                                <small class="help-block"></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Username</label>
                                                <input type="text" name="username" id="username" value="<?=$dadmin['username'];?>" class="form-control" required>
                                                <small class="help-block"></small>
                                            </div>
                 
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Password</label>
                                                <input type="password" name="password" id="password" class="form-control">
                                                <p>*Kosongkan jika password tidak diubah</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Email</label>
                                                <input type="email" name="email" id="email" value="<?=$dadmin['email'];?>" class="form-control" required>
                                                <small class="help-block"></small>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Desa/Kelurahan</label>
                                                <select id="kelurahan" name="kelurahan" class="form-control select2" style="width: 100%!important">
                                                    <option value="<?=$dadmin['id_desa']; ?>"><?=$dadmin['nama_desa'];?></option>
                                                    <option value="0">Pilih Desa/Kelurahan </option>
                                                    <?php foreach ($kelurahan as $row) : ?>
                                                        <option value="<?=$row->id_desa?>"><?=$row->nama_desa?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <p style="color:red;font-style: italic">* Jika user sebagai admin tidak perlu memilih Kelurahan</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Kecamatan</label>
                                                <select id="kecamatan" name="kecamatan" class="form-control select2" style="width: 100%!important">
                                                    <option value="<?=$dadmin['id_kecamatan'];?>"><?=$dadmin['nama_kecamatan'];?></option>
                                                    <option value="0">Pilih Kecamatan </option>
                                                    <?php foreach ($kecamatan as $row) : ?>
                                                    <option value="<?=$row->id_kecamatan?>"><?=$row->nama_kecamatan?></option>   
                                                    <?php endforeach; ?>
                                                </select>
                                                <p style="color:red;font-style: italic">* Jika user sebagai admin tidak perlu memilih Kelurahan</p>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Status</label>
                                                <select class="form-control" name="status" id="status" required>
                                                    <?php if($dadmin['status'] == '1') { ?>
                                                    <option value="1">Aktif</option>
                                                    <?php } else {?>
                                                    <option value="0">Non Aktif</option>
                                                    <?php } ?>
                                                    <option>Pilih Status</option>
                                                    <option value="1"> Aktif </option>
                                                    <option value="0"> Non Aktif </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Level</label>
                                                <select class="form-control" name="level" id="level" required>
                                                    <option value="<?=$dadmin['id_level'];?>"><?=$dadmin['nama_level'];?></option>
                                                    <option value="">Pilih Level </option>
                                                    <?php foreach ($level as $row) : ?>
                                                        <option value="<?=$row->id_level?>"><?=$row->nama_level?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?> 
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
              
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" id="btn-info" class="btn btn-info"><i class="nav-icon fas fa-save"></i> Simpan</button>
                    </div>
                    <?=form_close()?>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
  <script src="<?= base_url() ?>assets/dist/js/app/data/admin/edit.js"></script>