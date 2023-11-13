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
                <h3 class="card-title">Kecamatan Sumedang Utara</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="mt-3 mb-4">
            <a href="<?= base_url('admin/operator/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
            <button type="button" onclick="reload_ajax()" class="btn btn-info"><i class="fa fa-recycle"></i> Reload</button>
            
        </div>
              <?php echo $this->session->flashdata("k");?>
                <table id="kk" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Username</th>
                    <th class="text-center" >Email</th>
                    <th class="text-center">Level</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                    
                </tr>
            </thead>
                  <tbody>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

              
            </div>
            <!-- /.card -->
          </div>
        </div>

  </div>
  <script src="<?= base_url() ?>assets/dist/js/app/master/operator/operator.js"></script>