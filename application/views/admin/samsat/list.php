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
              <div class="mt-3 mb-4">
            <a href="<?= base_url('admin/samsat/add') ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
            <button type="button" onclick="reload_ajax()" class="btn btn-info"><i class="fa fa-recycle"></i> Reload</button>
            
        </div>
              <?php echo $this->session->flashdata("k");?>
                <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="text-center" width="10%">No.</th>
                    <th class="text-center" width="20%">Nama</th>
                    <th class="text-center" width="30%">Alamat</th>
                    <th class="text-center" width="20%">Status</th>
                    <th class="text-center" width="30%">Aksi</th>
                    
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
  <script src="<?= base_url() ?>assets/dist/js/app/master/samsat/list.js"></script>