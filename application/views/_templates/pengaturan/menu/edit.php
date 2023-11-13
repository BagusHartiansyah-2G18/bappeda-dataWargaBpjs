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
                                        <h3 class="card-title">Data menu</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <?=form_open_multipart('server/menu/update', array('id'=>'user_info'))?>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Nama Menu</label>
                                                <input type="hidden" name="id_menu" class="form-control" value="<?=$dmenu->id?>" required>
                                                <input type="text" name="nama_menu" class="form-control" value="<?=$dmenu->nama?>" required>
                                                <small class="help-block"></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">URL</label>
                                                <input type="text" name="url" class="form-control" value="<?=$dmenu->uri?>" required>
                                                <small class="help-block"></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Permalink</label>
                                                <input type="text" name="permalink" class="form-control" value="<?=$dmenu->permalink?>" required>
                                                <small class="help-block"></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Icon</label>
                                                <input type="text" name="icon" class="form-control" value="<?=$dmenu->icon?>" required>
                                                <small class="help-block"></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Parent Id</label>
                                                <select name="parent" class="form-control">
                                                    <?php
                                                        if($dmenu->id_menu_induk !== '99') {
                                                            $this->db->select('a.id, a.nama');
                                                            $this->db->where('a.id', $dmenu->id_menu_induk);
                                                            $query = $this->db->get('menu a');
                                                            $menu_induk     = $query->row_array();

                                                            echo "<option value='".$menu_induk['id']."'>".$menu_induk['nama']."</option>";

                                                        }
                                                    ?>
                                                    <option value="0">-- Set Sebagai Menu Induk --</option>
                                                    <option value="99">-- Set Sebagai Menu Utama --</option>
                                                    <?php foreach ($menu_utama as $row): ?>
                                                    <option value="<?php echo $row->id;?>"><?php echo $row->nama; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Urutan</label>
                                                <input type="text" name="urutan" class="form-control"value="<?=$dmenu->urutan?>"  required>
                                                <small class="help-block"></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="first_name">Status</label>
                                                <select id="Aktif" name="status" class="form-control select2" style="width: 100%!important">
                                                    <option value="<?=$dmenu->aktif?>"><?=$dmenu->aktif?></option>
                                                    <option value="Y"> Y </option>
                                                    <option value="N"> N </option>
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
                        <button type="submit" id="btn-info" class="btn btn-info"><i class="nav-icon fas fa-save"></i> Simpan</button>
                    </div>
                    <?=form_close()?>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
  <script src="<?= base_url() ?>assets/dist/js/app/data/menu/edit.js"></script>