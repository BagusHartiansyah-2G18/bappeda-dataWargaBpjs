<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link"> Aplikasi Data Warga <span class="brand-text font-weight-light" style="visibility: hidden;">a</span></a>

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
                    <a href="<?=base_url('server/dashboard')?>" class="nav-link <?php if(isset($m_dashboard)) { ?>active <?php } ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>

                <?php
                    $id_pengguna_grup = $this->session->userdata('id_pengguna');;
                    $query = "
                        SELECT m.*, ma.id AS id_menu_akses 
                        FROM menu AS m 
                        JOIN (SELECT * FROM menu_akses WHERE id_pengguna_grup = '{$id_pengguna_grup}') AS ma 
                        ON ma.id_menu = m.id 
                        WHERE m.id_menu_induk =  0 OR m.id_menu_induk = 99
                        ORDER BY m.id   
                    ";
                    $parents = $this->db->query($query);
                    if($parents->num_rows() > 0) :
                        foreach ($parents->result() as $parent) :
                ?>
          
                <li class="nav-item has-treeview <?php if(isset($m_master)) { ?>menu-open <?php } ?>">
                    <a href="#" class="nav-link <?php if(isset($m_master)) { ?>active <?php } ?>">
                        <i class="nav-icon fa fa-database"></i>
                        <p> Master Data <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=base_url('server/admin')?>" class="nav-link <?php if(isset($m_admin)) { ?>active <?php } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Admin</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?=base_url('server/level')?>" class="nav-link <?php if(isset($m_level)) { ?>active <?php } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Level</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('server/pekerjaan')?>" class="nav-link <?php if(isset($m_pekerjaan)) { ?>active <?php } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pekerjaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('server/status')?>" class="nav-link <?php if(isset($m_status)) { ?>active <?php } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Keterangan Status</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('server/desa')?>" class="nav-link <?php if(isset($m_desa)) { ?>active <?php } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Desa/Kelurahan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=base_url('server/kecamatan')?>" class="nav-link <?php if(isset($m_kecamatan)) { ?>active <?php } ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kecamatan</p>
                            </a>  
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?=base_url('server/warga/add')?>" class="nav-link <?php if(isset($m_input)) { ?>active <?php } ?>">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>Input Data</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=base_url('server/warga')?>" class="nav-link <?php if(isset($m_warga)) { ?>active <?php } ?>">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Kelola Data</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=base_url('server/transaksi')?>" class="nav-link <?php if(isset($m_laporan)) { ?>active <?php } ?>">
                        <i class="nav-icon fas fa-print"></i>
                        <p>Laporan Data</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?=base_url('server/password')?>" class="nav-link <?php if(isset($m_ubah_password)) { ?>active <?php } ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Ubah Password</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>Pengaturan<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?=base_url('server/menu')?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Menu</p>
                                </a>
                            </li>
                        <li class="nav-item">
                            <a href="<?=base_url('server/permission')?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permission</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="<?php echo site_url('server/auth/logout')?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p> Keluar Aplikasi </p>
                    </a>
                </li>
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>