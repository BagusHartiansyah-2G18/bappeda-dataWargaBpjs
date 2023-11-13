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
                <h3 class="card-title">Laporan Data Kecamatan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="mt-3 mb-4">
                <?=form_open_multipart('server/warga/save')?>
                <div class="row">
                  <div class="form-group col-sm-2">
                      <button type="button" onclick="reload_ajax()" class="btn btn-info"><i class="fa fa-recycle"></i> Reload</button>
                  </div>
                </div>
              </div>
              <?php echo $this->session->flashdata("k");?>
                <table id="data" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Nama Kecamatan </th>
                    <th class="text-center">Jml Data Terverifikasi</th>
                    <th class="text-center">Target Data</th>
                    <th class="text-center">Persentase Terverifikasi</th>
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

  <script src="<?= base_url() ?>assets/dist/js/app/data/laporan/list-kecamatan.js"></script>