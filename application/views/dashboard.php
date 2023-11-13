<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard <?=tgl_indo(date('Y-m-d H:i:s')) ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <?php if( $this->session->userdata('admin_username')<>'' ) : ?>
          <div class="row">
              <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Welcome Dashboard</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?=form_open_multipart('operator/warga/save', array('id'=>'user_info'))?>
                <div class="card-body">
                <div class="row">
                    <h4>Selamat Datang <?= $this->session->userdata('admin_nama_lengkap');?><?php if($this->session->userdata('admin_nama') == 'Admin') { echo '';} else {?>, Silahkan melalukan verifikasi data warga untuk Desa/Kelurahan <?=getKelurahan($this->session->userdata('admin_id_kelurahan'));?> .</h4>
                    <h5>Verifikasi Data Terakhir anda adalah <?=getMaxVerifikasi($this->session->userdata('admin_id'));?></h5>
                  <?php } ?>
                </div>
                </div>
                <!-- /.card-body -->

                
                
            </div>
            <!-- /.card -->


          </div>
              </div>

    <div class="row">

        <?php
           if($this->session->userdata('admin_nama') == 'Admin') { 
        ?>
        <div class="col-lg-4 col-6">
            <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-danger">
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="<?=base_url()?>assets/dist/img/avatar5.png" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username"><?php echo $jmlAdmin; ?></h3>
                    <p class="widget-user-desc">Jumlah Operator</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3><?php echo rupiah($jmlVerifAdmin); ?></h3>
                    <p>Target Data Verifikasi</p>
                </div>
                
                <div class="icon">
                    <i class="ion ion-android-bookmark"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-6">
            <div class="small-box bg-olive">
                <div class="inner">
                    <h3><?php echo $jmlVerifAdmin2; ?></h3>
                    <p>Data Terverifikasi - <?php if($jmlVerifAdmin2 == 0) {echo '0';} else { $persen = substr(($jmlVerifAdmin2/$jmlVerifAdmin) * 100,0,6); echo '['.$persen.'%]'; } ?></p>
                </div>
                
                <div class="icon">
                    <i class="ion ion-card"></i>
                </div>
            </div>
        </div>
        <?php } else { ?>

        <div class="col-lg-3 col-6">
            <div class="card card-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-danger">
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="<?=base_url()?>assets/dist/img/avatar5.png" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username"><?php echo $jmlAdmin; ?></h3>
                    <p class="widget-user-desc">Jumlah Operator</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3><?php echo rupiah($jmlVerif); ?></h3>
                    <p>Total Data Terverifikasi</p>
                </div>
                
                <div class="icon">
                    <i class="ion ion-android-bookmark"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-olive">
                <div class="inner">
                    <h3><?php echo rupiah($jmlVerif2); ?></h3>
                    <p>Target Data Terverifikasi</p>
                </div>
                
                <div class="icon">
                    <i class="ion ion-card"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-cyan">
                <div class="inner">
                    <h3><?php echo $jmlVerif3; ?></h3>
                    <p>Data terverifikasi oleh <?php echo $this->session->userdata('admin_nama_lengkap'); ?></p>
                </div>
                
                <div class="icon">
                    <i class="ion ion-card"></i>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php endif;  ?>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->