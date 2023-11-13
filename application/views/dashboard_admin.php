<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
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
    <h5 class="mb-2">Informasi Keseluruhan</h5>
        <!-- Small boxes (Stat box) -->
        <?php if( $this->ion_auth->in_group('Admin') ) : ?>
<div class="row">
    <?php foreach($info_box as $info) : ?>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-<?=$info->box?>">
        <div class="inner">
            <h3><?=$info->total;?></h3>
            <p><?=$info->title;?></p>
        </div>
        <div class="icon">
            <i class="ion ion-<?=$info->icon?>"></i>
        </div>
        <a href="<?=base_url().strtolower($info->url);?>" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
        </div>
    </div>
    <?php endforeach;  ?>
    </div><!-- /.container-fluid -->  
    <div class="container-fluid">
    <h5 class="mb-2">Informasi Per Hari</h5>
    <div class="row">
    <?php foreach($operator_box as $operator) : ?>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-<?=$operator->box?>">
        <div class="inner">
            <h3><?=$operator->total;?></h3>
            <p><?=$operator->title;?></p>
        </div>
        <div class="icon">
            <i class="ion ion-<?=$operator->icon?>"></i>
        </div>
        <a href="<?=base_url().strtolower($operator->url);?>" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
        </div>
    </div>
    <?php endforeach; endif;  ?>

    </div>
    
    <?php if( !$this->ion_auth->in_group('Admin') ) : ?>
<div class="row">
    <?php foreach($info_box as $info) : ?>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-<?=$info->box?>">
        <div class="inner">
            <h3><?=$info->total;?></h3>
            <p><?=$info->title;?></p>
        </div>
        <div class="icon">
            <i class="ion ion-<?=$info->icon?>"></i>
        </div>
        <a href="<?=base_url().strtolower($info->title);?>" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
        </a>
        </div>
    </div>
    <?php endforeach; endif;  ?>
</div>
          
       
       
</div><!-- /.container-fluid -->
    
            <!-- /.row (main row) -->
 