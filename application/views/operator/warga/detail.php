<style type="text/css">
  .dataTable.no-footer tfoot th, 
.dataTable.no-footer tfoot td {
    border-bottom: none;
}
</style>

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

                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                            <i class="fas fa-clone"></i> <?=$t_pribadi->verifikasi?> 
                            <a href="<?php echo base_url('server/warga/kk/'.$t_keluarga->nik_kepala); ?>"><small class="float-right">Kembali</small></a>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <br>

                    <div class="card">
                        <div class="card-header d-flex p-0">
                            <ul class="nav nav-pills ml-auto p-2">
                                <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Data Awal</a></li>
                                <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Data Terakhir</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <div class="row invoice-info">
                                        <?php if($jmlDataAwal > 0) { ?>
                                        <div class="col-sm-4 invoice-col">
                                            <b>DATA PRIBADI</b>
                                            <address>
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td>NIK</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->nik?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Lengkap</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->nama_lengkap?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->jenis_kelamin?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tempat / Tgl Lahir</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->tempat_lahir?>, <?=date('d F Y',strtotime($t_pribadi->tanggal_lahir));?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agama</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->agama?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pekerjaan</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->nama_jenis?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Golongan Darah</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->gol_darah?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status Perkawinan</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->status_kawin?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kewarganegaraan</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->warga_negara?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->alamat?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>RT</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->rt?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>RW</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->rw?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kecamatan</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->nama_kecamatan?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Desa / Kelurahan</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi->nama_desa?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Photo</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?php if($t_pribadi->foto == '') { ?>
                                                            <img src="<?php echo base_url('uploads/no-name.jpg'); ?>" alt="Foto Pribadi" width="150" height="180">
                                                            <?php } else { ?>
                                                            <img src="<?php echo base_url('uploads/'.$t_pribadi->foto); ?>" alt="Foto Rumah" width="150" height="180">
                                                            <?php } ?>
                                                            
                                                        </td>
                                                    </tr>
                                                </table>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <b>DATA KK</b>
                                            <address>
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td>NO KK</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga->no_kk?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIK Kepala Keluarga</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga->nik_kepala?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Kepala Keluarga</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga->nama_kepala?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Foto Depan Rumah</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?php if($t_keluarga->foto == '') { ?>
                                                            <img src="<?php echo base_url('uploads/no-name.jpg'); ?>" alt="Foto Pribadi" width="150" height="180">
                                                            <?php } else { ?>
                                                            <img src="<?php echo base_url('uploads/'.$t_keluarga->foto); ?>" alt="Foto Rumah" width="150" height="180">
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Latitude</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga->latitude?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Longitude</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga->longitude?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>pindah / Meninggal</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga->pindah_meninggal?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Data Ganda</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga->data_ganda?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>No Data Ganda</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga->no_data_ganda?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Keterangan Lain</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga->keterangan_lain?></td>
                                                    </tr>
                                                </table>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <b>DATA BPJS</b>
                                            <address>
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td>No Kartu BPJS</td>
                                                        <td>:</td>
                                                        <td><?=$t_bpjs->no_bpjs?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Peserta</td>
                                                        <td>:</td>
                                                        <td><?=$t_bpjs->id_jenis?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kepesertaan</td>
                                                        <td>:</td>
                                                        <td><?=$t_bpjs->jenis_peserta?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kelas BPJS</td>
                                                        <td>:</td>
                                                        <td><?=$t_bpjs->kelas?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status Hubungan Keluarga</td>
                                                        <td>:</td>
                                                        <td><?=$t_bpjs->nama?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Keterangan</td>
                                                        <td>:</td>
                                                        <td><?=$t_bpjs->nama_status?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><b>Lokasi</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d504685.7762161397!2d116.60301847077974!3d-8.799443747078787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcc617b3a12b729%3A0x170fc4bb9a5645e!2sKabupaten%20Sumbawa%20Barat%2C%20Nusa%20Tenggara%20Bar.!5e0!3m2!1sid!2sid!4v1639607585443!5m2!1sid!2sid" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                                        </td>
                                                       
                                                    </tr>
                                                </table>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <?php } else { ?>
                                        <div class="col-12">
                                            <div class="alert alert-danger alert-dismissible">
                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                              <h5><i class="icon fas fa-ban"></i> Data Belum Ada!</h5>
                                              Mohon maaf Data Awal belum di import
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="row invoice-info">
                                        <?php if($jmlDataAkhir > 0) { ?>
                                        <div class="col-sm-4 invoice-col">
                                            <b>DATA PRIBADI</b>
                                            <address>
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td>NIK</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->nik?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Lengkap</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->nama_lengkap?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kelamin</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->jenis_kelamin?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tempat / Tgl Lahir</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->tempat_lahir?>, <?=date('d F Y',strtotime($t_pribadi2->tanggal_lahir));?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agama</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->agama?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pekerjaan</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->nama_jenis?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Golongan Darah</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->gol_darah?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status Perkawinan</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->status_kawin?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kewarganegaraan</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->warga_negara?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->alamat?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>RT</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->rt?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>RW</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->rw?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kecamatan</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->nama_kecamatan?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Desa / Kelurahan</td>
                                                        <td>:</td>
                                                        <td><?=$t_pribadi2->nama_desa?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Photo</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?php if($t_pribadi2->foto == '') { ?>
                                                            <img src="<?php echo base_url('uploads/no-name.jpg'); ?>" alt="Foto Pribadi" width="150" height="180">
                                                            <?php } else { ?>
                                                            <img src="<?php echo base_url('uploads/'.$t_pribadi2->foto); ?>" alt="Foto Pribadi" width="150" height="180">
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <b>DATA KK</b>
                                            <address>
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td>NO KK</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga2->no_kk?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIK Kepala Keluarga</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga2->nik_kepala?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Kepala Keluarga</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga2->nama_kepala?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Foto Depan Rumah</td>
                                                        <td>:</td>
                                                        <td>
                                                            <?php if($t_keluarga2->foto == '') { ?>
                                                            <img src="<?php echo base_url('uploads/no-name.jpg'); ?>" alt="Foto Pribadi" width="150" height="180">
                                                            <?php } else { ?>
                                                            <img src="<?php echo base_url('uploads/'.$t_keluarga2->foto); ?>" alt="Foto Pribadi" width="150" height="180">
                                                            <?php } ?>
                                                           
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Latitude</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga2->latitude?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Longitude</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga2->longitude?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>pindah / Meninggal</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga->pindah_meninggal?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Data Ganda</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga->data_ganda?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>No Data Ganda</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga->no_data_ganda?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Keterangan Lain</td>
                                                        <td>:</td>
                                                        <td><?=$t_keluarga->keterangan_lain?></td>
                                                    </tr>
                                                </table>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <b>DATA BPJS</b>
                                            <address>
                                                <table class="table table-striped">
                                                    <tr>
                                                        <td>No Kartu BPJS</td>
                                                        <td>:</td>
                                                        <td><?=$t_bpjs2->no_bpjs?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Peserta</td>
                                                        <td>:</td>
                                                        <td><?=$t_bpjs2->id_jenis?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jenis Kepesertaan</td>
                                                        <td>:</td>
                                                        <td><?=$t_bpjs2->jenis_peserta?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kelas BPJS</td>
                                                        <td>:</td>
                                                        <td><?=$t_bpjs2->kelas?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status Hubungan Keluarga</td>
                                                        <td>:</td>
                                                        <td><?=$t_bpjs2->nama?></td>
                                                    </tr>

                                                    <tr>
                                                        <td>Keterangan</td>
                                                        <td>:</td>
                                                        <td><?=$t_bpjs2->nama_status?></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><b>Lokasi</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d504685.7762161397!2d116.60301847077974!3d-8.799443747078787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcc617b3a12b729%3A0x170fc4bb9a5645e!2sKabupaten%20Sumbawa%20Barat%2C%20Nusa%20Tenggara%20Bar.!5e0!3m2!1sid!2sid!4v1639607585443!5m2!1sid!2sid" width="300" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                                        </td>
                                                       
                                                    </tr>
                                                </table>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <?php } else { ?>
                                        <div class="col-12">
                                            <div class="alert alert-danger alert-dismissible">
                                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                              <h5><i class="icon fas fa-ban"></i> Data Belum Ada!</h5>
                                              Mohon maaf Data Akhir belum di import
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- ./card -->
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</section>
<!-- /.content -->