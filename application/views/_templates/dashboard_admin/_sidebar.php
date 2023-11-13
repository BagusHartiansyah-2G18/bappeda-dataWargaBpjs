  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?=base_url()?>assets/logo.png" class="brand-image">
      <span class="brand-text font-weight-light" style="visibility: hidden;">a</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$user->email?></a>
        </div>
      </div>
<?php
if (!$this->ion_auth->in_group('Admin')) {
  ?>
  <!-- Sidebar Menu -->
  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url('home')?>" class="nav-link <?php if(isset($m_dashboard)) { ?>active <?php } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/transaksi')?>" class="nav-link <?php if(isset($m_transaksi)) { ?>active <?php } ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Histori Transaksi
              </p>
            </a>
          </li>



		  <li class="nav-item">
            <a href="<?php echo site_url('login/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar Aplikasi
              </p>
            </a>
          </li>
         
         
        </ul>
      </nav>
  <?php
}else
{
  ?>
  <!-- Sidebar Menu -->
  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?=base_url('home')?>" class="nav-link <?php if(isset($m_dashboard)) { ?>active <?php } ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/operator')?>" class="nav-link <?php if(isset($m_operator)) { ?>active <?php } ?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Daftar Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?=base_url('admin/pengguna')?>" class="nav-link <?php if(isset($m_pengguna)) { ?>active <?php } ?>">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Daftar Petugas Samsat
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('admin/samsat')?>" class="nav-link <?php if(isset($m_samsat)) { ?>active <?php } ?>">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Daftar Lokasi Samsat
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('admin/kuota')?>" class="nav-link <?php if(isset($m_kuota)) { ?>active <?php } ?>">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Kuota Samsat
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('admin/transaksi')?>" class="nav-link <?php if(isset($m_transaksi)) { ?>active <?php } ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Histori Transaksi
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?=base_url('admin/histori')?>" class="nav-link <?php if(isset($m_histori)) { ?>active <?php } ?>">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Histori Aktifitas
              </p>
            </a>
          </li>


		  <li class="nav-item">
            <a href="<?php echo site_url('login/logout')?>" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Keluar Aplikasi
              </p>
            </a>
          </li>
         
         
         
         
         
         
         
      
         
        
       
        
         
        </ul>
      </nav>
  <?php
}
?>
      
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>