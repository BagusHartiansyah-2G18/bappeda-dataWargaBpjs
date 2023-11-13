<?php $m=getmasyarakat($this->session->userdata('admin_id'));$alasan='';?>
<section class="wrapper" style="color:black;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Form Pengajuan Layanan Kartu Keluarga
                    </div>
                    <div class="panel-body">                 
                    <div class="col" style="color:red;margin-bottom:20px">
            Pemohon hanya mengisi isian yang tersedia pada form. Untuk file yang diupload silahkan gunakan file JPEG,PNG dan BMP dengan besar file maks (3 Mb). Setelah semua diisi klik tombol proses.Sementara Hanya Melayani Pengiriman Lewat POS. Untuk Formulir Pendaftaran silahkan di download di link yang sudah disediakan. Kemudian di cetak masing-masing. Apabila sudah dicetak silahkan scan/foto menggunakan Kamera HP Kemudian Upload.Apabila Mengalami Kesulitan Silahkan meminta bantuan operator di Desa. 
                        </div>
                  
                    <form action="<?php echo base_url(); ?>permohonan/kk/act_add" method="post" enctype="multipart/form-data">
<input type="hidden" class="form-control" value="<?php echo $this->session->userdata('admin_id');?>" name="id_user" >
<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="textinput">No Register</label>
                        <input type="text" class="form-control" name="pin" id="textinput" value="<?php echo $pin;?>" readonly>
                    </div>
					
					<div class="form-group">
                        <label for="textinput">NIK Pemohon</label>
                        <input type="text" class="form-control" name="nik" id="textinput" value="<?php echo $m['nik'];?>" required readonly>
                    </div>
					<div class="form-group">
                        <label for="textinput">Nama Pemohon</label>
                        <input type="text" class="form-control" name="nama" id="textinput" value="<?php echo $m['nama'];?>" required readonly>
                    </div>
					<div class="form-group">
                        <label for="textinput">Alamat Pemohon</label>
                        <input type="text" class="form-control" name="alamat" id="textinput" value="<?php echo $m['alamat'];?>" required readonly>
                    </div>
					<div class="form-group">
                        <label for="textinput">Telepon Pemohon</label>
                        <input type="text" class="form-control" name="telepon" id="textinput" value="<?php echo $m['telepon'];?>" required readonly>
                    </div>
					

                </div>
                <div class="col-12 col-md-6 col-lg-4">
				
                    <div class="form-group">
                        <label for="textinput">Jenis Permohonan</label>
                        <input type="text" class="form-control" name="jenis" id="textinput" value="Pelayanan Kartu Keluarga" required readonly>
                    </div>
					 <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alasan Permohonan</label>
                        <select  class="form-control" id="exampleFormControlSelect2" name="alasan" required>
                        <option value=""> - Pilih Alasan  - </option>
        <?php
          $l_sifat  = array('Membentuk Keluarga Baru','Tambah Anggota KK','Penggantian Kepala Keluarga','Pisah KK','Pindah Datang', 'WNI dari LN Karena Pindah','Rentan Adminduk','Hilang','Rusak');

          for ($i = 0; $i < sizeof($l_sifat); $i++) {
            if ($l_sifat[$i] == $alasan) {
              echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
            } else {
              echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
            }
          }
        ?>
                        </select>
                    </div>
					<div class="form-group">
                        <label for="exampleFormControlSelect2">Pilih Pengiriman</label>
                        <select  class="form-control" id="exampleFormControlSelect2" name="ket" required>
                        <option value=""> - Pilih Pengiriman - </option>
        <?php
          $l_sifat  = array('Kirim Lewat POS');

          for ($i = 0; $i < sizeof($l_sifat); $i++) {
            if ($l_sifat[$i] == $jenis) {
              echo "<option selected value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
            } else {
              echo "<option value='".$l_sifat[$i]."'>".$l_sifat[$i]."</option>";
            }
          }
        ?>
                        </select>
                    </div>
                   
                </div>
                <div class="col-12 col-md-6 col-lg-4">
				    <div class="form-group">
                        <label for="file">Upload Scan Formulir(<a href="<?php echo base_url(); ?>dokumen/form_pendaftaran.pdf">Download Formulir</a>)</label>
                        <input type="file" class="form-control" id="file" name="gambar[]" required>
                    </div>
					<div class="form-group">
                        <label for="file">Upload Scan Kartu Keluarga</label>
                        <input type="file" class="form-control" id="file" name="gambar[]" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Scan Buku Nikah</label>
                        <input type="file" class="form-control" id="file" name="gambar[]" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Scan Bukti Pendukung</label>
                        <input type="file" class="form-control" id="file" name="gambar[]" required>
                    </div>
					
					<div class="form-group">
                    <button type="submit" class="btn btn-lg" style="background-color: #ff6700;color: white;width: 50%;margin-bottom: 30px;margin-top:30px"> <i class="fa fa-address-book"></i> Proses</button>
					</div>
                </div>
				
			
            </div>
			
			</form>
            
                    </div>
            </div>
        </div>
        
    </section>