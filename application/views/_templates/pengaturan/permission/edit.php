<script type="text/javascript">
$(document).ready(function(){
    
    $('.parent').change(function(){
        var id = $(this).attr('id');
        $('.child-'+id).prop('checked', $(this).prop('checked'));       
    });
    
});
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
                        <h3 class="card-title"><?php echo $judul;?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php echo $this->session->flashdata("success");?>
                        <?=form_open_multipart('server/permission/update');?>
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="first_name">Level</label>
                                <?php
                                    $this->db->select('a.id_level, a.nama_level');
                                    $this->db->where('a.id_level', $this->uri->segment(4));
                                    $query          = $this->db->get('m_level a');
                                    $level_name     = $query->row_array();

                                    echo "<select name='level' class='form-control' readonly><option value='".$level_name['id_level']."'>".$level_name['nama_level']."</option></select>";
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <?php $a = 0;?>
                                <?php if($menu->num_rows() > 0) :?>
                                <table> 
                                    <?php foreach($menu->result() as $indeks => $p) :?>         
                                    <tr>
                                        <td width="10"></td>
                                        <td width="10"></td>
                                        <td width="10"></td>
                                        <td width="10"></td>            
                                        <td>
                                            <label>
                                                <input type="checkbox" class="parent" id="<?php echo $p->id;?>" name="id_menu[<?php echo $a++;?>]" value="<?php echo $p->id;?>" <?php if($p->id_menu_akses!=NULL){echo 'checked';} ?> />
                                                <?php echo $p->nama;?>
                                            </label>
                                        </td>
                                    </tr>
                                        <?php if($submenu->num_rows() > 0) :?>
                                            <?php foreach ($submenu->result() as $key => $q) :?>
                                                <?php if($q->id_menu_induk == $p->id) :?>
                                                    <tr>
                                                        <td colspan="4"></td>
                                                        <td></td>
                                                        <td>
                                                            <label>
                                                                <input type="checkbox" class="child-<?php echo $p->id;?>" name="id_menu[<?php echo $a++;?>]" value="<?php echo $q->id;?>" <?php if($q->id_menu_akses!=NULL){echo 'checked';} ?> />
                                                                <?php echo $q->nama;?>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                <?php endif;?>
                                            <?php endforeach;?>
                                        <?php endif;?>      
                                    <?php endforeach;?>
                                </table>
                                <?php endif;?> 
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info"><i class="nav-icon fas fa-save"></i> Simpan</button>
                        </div>
                        <?=form_close()?>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
  <script src="<?= base_url() ?>assets/dist/js/app/data/permission/add.js"></script>