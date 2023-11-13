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
              <?php echo $this->session->flashdata("k");?>
              <div class="row">
              <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Data pribadi (data sesuai KTP)</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->

              <?php if ($this->session->flashdata('success')): ?>
                  <script>
                      swal({
                          text: "Data Berhasil DIverifikasi",
                          icon: "success",
                          type: "success"
                      });
                  </script>
              <?php endif; ?>
              
              <?php if ($this->session->flashdata('error')): ?>
                  <script>
                      swal({
                          text: "Data Gagal DIverifikasi",
                          icon: "error",
                          type: "error"
                      });
                  </script>
              <?php endif; ?>

              <?=form_open_multipart('server/warga/edit_save')?>
              <input type="hidden" name="id" class="form-control" value="<?=$t_pribadi->id?>" required>
                <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="first_name">NIK</label>
                        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('admin_id'); ?>">
                        <input type="text" name="nik" id="nik" maxlength="16" minlength="16" onkeypress="return Angkasaja(event)"  onkeyup="niksama();" class="form-control" value="<?=$t_pribadi->nik?>" required>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="last_name">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" value="<?=$t_pribadi->nama_lengkap?>"  required>
                        <small class="help-block"></small>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="first_name">Jenis Kelamin</label>
                        <select id="jk" name="jk" class="form-control select2" style="width: 100%!important">
                        <option value="">Pilih Jenis Kelamin </option>
                        <?php
				$l_sifat	= array('Laki-laki','Perempuan');

				for ($i = 0; $i < sizeof($l_sifat); $i++) {
                    if ($l_sifat[$i] == $t_pribadi->jenis_kelamin) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}

					
				}
			?>
                        
                          
                    </select>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="last_name">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="form-control" value="<?=$t_pribadi->tempat_lahir?>" required>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="last_name">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="<?=$t_pribadi->tanggal_lahir?>" required>
                        <small class="help-block"></small>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-4">
                        <label for="first_name">Agama</label>
                        <select id="agama" name="agama" class="form-control select2" style="width: 100%!important">
                        <option value="">Pilih Agama </option>
                        <?php
				$l_sifat	= array('Islam','Kristen','Katolik','Hindu','Budha','Konghucu','Kepercayaan');

				for ($i = 0; $i < sizeof($l_sifat); $i++) {
                    if ($l_sifat[$i] == $t_pribadi->agama) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}

					
				}
			?>
                           
                    </select>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="last_name">Pekerjaan</label>
                        <select id="pekerjaan" name="pekerjaan" class="form-control select2" style="width: 100%!important">
                        <option value="">Pilih Pekerjaan </option>
                        <?php foreach ($pekerjaan as $row) : ?>
                            <?php
                          if ($row->id==$t_pribadi->pekerjaan)
                          {
                            ?>
                            <option value="<?=$row->id?>" selected ><?=$row->nama_jenis?></option>
                          <?php
                          }else
                          {
                            ?>
                              <option value="<?=$row->id?>"><?=$row->nama_jenis?></option>
                  <?php
                          }
                          ?>

                          
                        <?php endforeach; ?>

                    </select>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="last_name">Golongan Darah</label>
                        <select id="gol" name="gol" class="form-control select2" style="width: 100%!important">
                        <option value="">Pilih Golongan Darah </option>
                        <?php
				$l_sifat	= array('A','B','AB','O');

				for ($i = 0; $i < sizeof($l_sifat); $i++) {
                    if ($l_sifat[$i] == $t_pribadi->gol_darah) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}

					
				}
			?>
                    </select>
                        <small class="help-block"></small>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="first_name">Status Perkawinan</label>
                        <select id="perkawinan" name="perkawinan" class="form-control select2" style="width: 100%!important">
                        <option value="">Pilih Status Perkawinan </option>
                        <?php
				$l_sifat	= array('Belum Menikah','Menikah','Cerai Hidup','Cerai Mati');

				for ($i = 0; $i < sizeof($l_sifat); $i++) {
                    if ($l_sifat[$i] == $t_pribadi->status_kawin) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}

					
				}
			?>
                    </select>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="last_name">Kewarganegaraan</label>
                        <select id="kewarganegaraan" name="kewarganegaraan" class="form-control select2" style="width: 100%!important">
                        <option value="">Pilih Kewarganegaraan </option>
                        <?php
				$l_sifat	= array('WNI','WNA');

				for ($i = 0; $i < sizeof($l_sifat); $i++) {
                    if ($l_sifat[$i] == $t_pribadi->warga_negara) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}

					
				}
			?>
                            
                    </select>
                        <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?=$t_pribadi->alamat?>" required>
                    <small class="help-block"></small>
                </div>

                <div class="row">
                    <div class="form-group col-sm-2">
                        <label for="first_name">RT</label>
                        <input type="text" name="rt_rw" class="form-control" value="<?=$t_pribadi->rt?>" maxlength="3" minlength="3" onkeypress="return Angkasaja(event)" required>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="first_name">RW</label>
                        <input type="text" name="rw" class="form-control" value="<?=$t_pribadi->rw?>" maxlength="3" minlength="3" onkeypress="return Angkasaja(event)" required>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="last_name">Kecamatan</label>
                        <select id="kecamatan" name="kecamatan" class="form-control select2" readonly style="width: 100%!important">
                        <option value="">Pilih Kecamatan </option>
                            <option value="<?=$t_pribadi->id_kecamatan?>" selected ><?=$t_pribadi->nama_kecamatan?></option>


                    </select>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="last_name">Desa/Kelurahan</label>
                        <select id="kelurahan" name="kelurahan" class="form-control select2" readonly style="width: 100%!important">
                        <option value="">Pilih Desa/Kelurahan </option>
                             <option value="<?=$t_pribadi->id_desa?>" selected><?=$t_pribadi->nama_desa?></option>
 

                    </select>
                        <small class="help-block"></small>
                    </div>
                    
                </div>

                <div class="row">
                <div class="form-group col-sm-6">
					        <label class="form-label">Foto Pribadi</label>
					        <input type="file" name="gambar1" value="<?=$t_pribadi->foto?>" class="form-control">
                            <p style="font-size: 14px;font-style: italic;color: red">*Kosongkan jika gambar tidak diubah</p>
				        </div>
                </div>              


                </div>
                <!-- /.card-body -->

                
                
            </div>
            <!-- /.card -->


          </div>
              </div>



              <div class="row">
              <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data KK (Sesuai Kartu Keluarga)</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <div class="row">
                  <div class="form-group col-sm-6">
                    <label for="username">No KK</label>
                    <input type="text" name="nokk" class="form-control" value="<?=$t_keluarga->no_kk?>" maxlength="16" minlength="16" onkeypress="return Angkasaja(event)" required >
                    <small class="help-block"></small>
                </div>
                  </div>
                
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="first_name">NIK Kepala Keluarga</label>
                        <input type="text" name="nik_kepala" class="form-control" value="<?=$t_keluarga->nik_kepala?>" readonly required>
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="last_name">Nama Kepala Keluarga</label>
                        <input type="text" name="nama_kepala" class="form-control" value="<?=$t_keluarga->nama_kepala?>" readonly required>
                        <small class="help-block"></small>
                    </div>
                </div>

                <div class="row">
                <div class="form-group col-sm-6">
					        <label class="form-label">Foto Depan Rumah</label>
					        <input type="file" name="gambar2" value="<?=$t_keluarga->foto?>" class="form-control">
                            <p style="font-size: 14px;font-style: italic;color: red">*Kosongkan jika gambar tidak diubah</p>
				        </div>
                </div>
                
                <div class="row">
                <label class="form-label">Koordinat Lokasi Rumah</label>
                </div>
                <div class="row">
                
                <div class="form-group col-sm-6">
                    <label for="email">Latitude</label>
                    <input type="text" name="latitude" class="form-control" value="<?=$t_keluarga->latitude?>" required>
                    <small class="help-block"></small>
                </div>

                <div class="form-group col-sm-6">
                    <label for="email">Longitude</label>
                    <input type="text" name="longitude" class="form-control" value="<?=$t_keluarga->longitude?>" required>
                    <small class="help-block"></small>
                </div>
                </div>
             

               
                


                </div>
                <!-- /.card-body -->

               
                
            </div>
            <!-- /.card -->


          </div>
              </div>




              <div class="row">
              <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Data Keikutsertaan BPJS Kesehatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
           
                <div class="card-body">
                <div class="row">
                <div class="form-group col-sm-6">
                    <label for="username">No Kartu BPJS</label>
                    <input type="text" name="nobpjs" class="form-control" value="<?=$t_bpjs->no_bpjs?>" maxlength="13" minlength="13" onkeypress="return Angkasaja(event)" required>
                    <small class="help-block"></small>
                </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="first_name">Jenis Peserta</label>
                        <select id="peserta" name="jenispeserta" class="form-control select2" style="width: 100%!important">
                        <option value="">Pilih Jenis Peserta </option>
                        <?php
				$l_sifat	= array('PBI','NON-PBI');

				for ($i = 0; $i < sizeof($l_sifat); $i++) {
                    if ($l_sifat[$i] == $t_bpjs->id_jenis) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}

					
				}
			?>

                    </select>
                        
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="last_name">Jenis Kepesertaan</label>
                        <select id="kepesertaan" name="kepesertaan" class="form-control select2" style="width: 100%!important">
                        <option value="">Pilih Jenis Kepesertaan </option>
                        <?php
				$l_sifat	= array('Mandiri','Pusat','Provinsi','Kabupaten/Kota');

				for ($i = 0; $i < sizeof($l_sifat); $i++) {
                    if ($l_sifat[$i] == $t_bpjs->jenis_peserta) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}

					
				}
			?>
                           

                    </select>
                        
                        <small class="help-block"></small>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="first_name">Kelas BPJS</label>
                        <select id="kelas" name="kelasbpjs" class="form-control select2" style="width: 100%!important">
                        <option value="">Pilih Kelas </option>
                        <?php
				$l_sifat	= array('Kelas I','Kelas II','Kelas III');

				for ($i = 0; $i < sizeof($l_sifat); $i++) {
                    if ($l_sifat[$i] == $t_bpjs->kelas) {
						echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					} else {
						echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
					}

					
				}
			?>
                        

                    </select>
                        
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="last_name">Status Hubungan Keluarga </label>
                        <select id="status" name="hubungan_keluarga" class="form-control select2" style="width: 100%!important">
                        <option value="">Pilih Status </option>
                        <?php foreach ($hubungan as $row) : ?>
                            <?php
                          if ($row->id==$t_bpjs->id_hubungan)
                          {
                            ?>
                              <option value="<?=$row->id?>" selected><?=$row->nama?></option>
                          <?php
                          }else
                          {
                            ?>
                                <option value="<?=$row->id?>"><?=$row->nama?></option>
                  <?php
                          }
                          ?>
                           
                        <?php endforeach; ?>

                    </select>
                        <small class="help-block"></small>
                    </div>
                </div>

                <div class="form-group">
                    <label for="new">Keterangan</label>
                    <select id="keterangan" name="keterangan" class="form-control select2" style="width: 100%!important">
                        <option value="<?=$t_bpjs->id_status?>"><?=$t_bpjs->nama_status?></option>
                        <option value="">Pilih Status </option>
                        <?php foreach ($keterangan as $row) : ?>
                            <option value="<?=$row->id_status?>"><?=$row->nama_status?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
              
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="first_name">Pindah/Meninggal</label>
                        <select id="pindah_meninggal" name="pindah_meninggal" class="form-control select2" style="width: 100%!important">
                        <?php if($t_keluarga->pindah_meninggal == '1') { ?>
                        <option value="<?=$t_keluarga->pindah_meninggal?>">Ya</option>
                        <?php } else { ?>
                        <option value="<?=$t_keluarga->pindah_meninggal?>">Tidak</option>
                        <?php } ?>
                        <option value="">Pilih Pindah/Meninggal </option>
                        <option value="1">Ya </option>
                        <option value="0">Tidak </option>
                    </select>
                        
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="last_name">Data Ganda </label>
                        <select id="data_ganda" name="data_ganda" class="form-control select2" style="width: 100%!important">
                        <?php if($t_keluarga->data_ganda == '1') { ?>
                        <option value="<?=$t_keluarga->data_ganda?>">Ya</option>
                        <?php } else { ?>
                        <option value="<?=$t_keluarga->data_ganda?>">Tidak</option>
                        <?php } ?>
                        <option value="">Pilih Data Ganda </option>
                        <option value="1">Ya </option>
                        <option value="0">Tidak </option>

                    </select>
                        <small class="help-block"></small>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="last_name">No Data Ganda </label>
                        <input type="text" name="no_data_ganda" id="no_data_ganda" class="form-control" value="<?=$t_keluarga->no_data_ganda?>">
                        <small class="help-block"></small>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="last_name">Keterangan Lain </label>
                        <textarea name="keterangan_lain" id="keterangan_lain" class="form-control"><?=$t_keluarga->keterangan_lain?></textarea>
                        <small class="help-block"></small>
                    </div>
                </div>

                </div>
                <!-- /.card-body -->

                
                
            </div>
            <!-- /.card -->


          </div>
              </div>
              
              
              
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-info"><i class="nav-icon fas fa-save"></i> Update</button>
                </div>
                <?=form_close()?>
              
            </div>
            <!-- /.card -->
          
          </div>
          
        </div>

  </div>

  <script src="<?=base_url()?>assets/dist/js/app/data/warga/edit.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $('form#change_password').on('submit', function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        
        let btn = $('#btn-pass');
        btn.attr('disabled', 'disabled').text('Process...');

        url = $(this).attr('action');
        data = $(this).serialize();
        msg = "Password anda berhasil diganti";
        submitajax(url, data, msg, btn);
    });
});
</script>


<script type="text/javascript">
        function Angkasaja(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 16 && (charCode < 48 || charCode > 57))
                return false;
                return true;
        }
    </script>

    <script>
        function niksama() {
            var nik      = document.getElementById('nik').value;
            
            document.getElementById('nik_kepala').value = nik ;
        }
    </script>

    <script>
        function namasama() {
            var nik      = document.getElementById('nama_lengkap').value;
            
            document.getElementById('nama_kepala').value = nik ;
        }
    </script>