<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('server/dashboard'); ?>" class="brand-link">
        <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Aplikasi Data Warga</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=base_url()?>assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?=$this->session->userdata('admin_username')?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?=base_url('server/dashboard')?>" class="nav-link <?php if($linkmenu == 'dashboard') { ?>active <?php } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>

                <?php
                    $id_pengguna_grup = $this->session->userdata('admin_level');
                    $query = "
                        SELECT m.*, ma.id AS id_menu_akses 
                        FROM menu AS m 
                        JOIN (SELECT * FROM menu_akses WHERE id_pengguna_grup = '{$id_pengguna_grup}') AS ma 
                        ON ma.id_menu = m.id 
                        WHERE m.id_menu_induk =  0 OR m.id_menu_induk = 99
                        ORDER BY m.urutan   
                    ";
                    $parents = $this->db->query($query);
                    if($parents->num_rows() > 0) :
                        foreach ($parents->result() as $parent) :
                ?>
                
                <?php if($parent->id_menu_induk == '99') { ?>
                <li class="nav-item">
                    <a href="<?=base_url($parent->uri)?>" class="nav-link <?php if($linkmenu == $parent->permalink) { ?>active <?php } ?>">
                        <i class="nav-icon <?php echo $parent->icon; ?>"></i>
                        <?php if($parent->nama == 'Kelola Data') {?>
                            <?php if($this->session->userdata('admin_nama') == 'Admin') {?>
                                <p><?php echo 'Lihat Data'; ?></p>
                            <?php } else {?>
                                <p><?php echo $parent->nama; ?></p>
                            <?php } ?>
                        <?php } else {?>
                            <p><?php echo $parent->nama; ?></p>
                        <?php } ?>
                    </a>
                </li>
                <?php } else { ?>
                <li class="nav-item has-treeview <?php if($linkmenuutama == $parent->permalink) { ?>menu-open <?php } ?>">
                    <a href="#" class="nav-link <?php if($linkmenuutama == $parent->permalink) { ?>active <?php } ?>">
                        <i class="nav-icon <?php echo $parent->icon; ?>"></i>
                        <p> <?php echo $parent->nama; ?><i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <?php
                        $query = "
                            SELECT m.*, ma.id AS id_menu_akses 
                            FROM menu AS m 
                            JOIN (SELECT * FROM menu_akses WHERE id_pengguna_grup = '{$id_pengguna_grup}') AS ma 
                              ON ma.id_menu = m.id 
                            WHERE m.id_menu_induk = '{$parent->id}'
                            ORDER BY m.id       
                        ";
                        $childs = $this->db->query($query);
                    ?>
                    <ul class="nav nav-treeview">
                        <?php 
                          foreach($childs->result() as $child) :
                        ?>

                        <li class="nav-item">
                            <a href="<?=base_url($child->uri)?>" class="nav-link <?php if($linkmenu == $parent->permalink) { ?>active <?php } ?>">
                                <i class="<?php echo $child->icon; ?> nav-icon"></i>
                                <p><?php echo $child->nama; ?></p>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php 
                } 
                endforeach;
            endif;
            ?>
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>