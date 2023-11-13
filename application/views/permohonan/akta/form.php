<?php $m=getmasyarakat($this->session->userdata('admin_id'));$alasan='';?>
<section class="wrapper" style="color:black;">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Form Pengajuan Layanan Akta
                    </div>
                    <div class="panel-body">                 
                    <div class="col" style="color:red;margin-bottom:20px">
            Pemohon hanya mengisi isian yang tersedia pada form. Untuk file yang diupload silahkan gunakan file JPEG,PNG dan BMP dengan besar file maks (3 Mb). Setelah semua diisi klik tombol proses.Sementara Hanya Melayani Pengiriman Lewat POS. Untuk Formulir Pendaftaran silahkan di download di link yang sudah disediakan. Kemudian di cetak masing-masing. Apabila sudah dicetak silahkan scan/foto menggunakan Kamera HP Kemudian Upload.Apabila Mengalami Kesulitan Silahkan meminta bantuan operator di Desa. 
                        </div>
                        <form action="<?php echo base_url(); ?>permohonan/akta/act_add" method="post" enctype="multipart/form-data">
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
                        <select  class="form-control" id="jenis_akta" name="jenis" required>
                        <option value=""> - Pilih Permohonan - </option>
        <?php
          $l_sifat  = array('Permohonan Akta Kelahiran','Permohonan Akta Kematian');

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
					 <div class="form-group">
                        <label for="exampleFormControlTextarea1">Alasan Permohonan</label>
                        <textarea class="form-control" name="alasan" id="exampleFormControlTextarea1" rows="3"><?php echo $alasan;?></textarea>
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

                <div id="kelahiran">
                <div class="col-12 col-md-6 col-lg-4">
				    <div class="form-group">
            <label for="file">Upload Scan Formulir(<a target="_blank" href="<?php echo base_url(); ?>dokumen/form_akta_kelahiran.pdf">Download Formulir</a>)</label>
                        <input type="file" class="form-control" id="gambar1" name="gambar[]" required>
                    </div>
                    <div class="form-group">
            <label for="file">Upload Scan Surat Pernyataan(<a target="_blank" href="<?php echo base_url(); ?>dokumen/surat_pernyataan.pdf">Download</a>)</label>
                        <input type="file" class="form-control" id="gambar2" name="gambar[]" required>
                    </div>
                    <div class="form-group">
            <label for="file">Upload Scan SPTJM(<a target="_blank" href="<?php echo base_url(); ?>dokumen/SPTJM.pdf">Download</a>)</label>
                        <input type="file" class="form-control" id="gambar3" name="gambar[]" required>
                    </div>
					<div class="form-group">
                        <label for="file">Upload Scan KTP Asli Suami Istri</label>
                        <input type="file" class="form-control" id="gambar4" name="gambar[]" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Scan KTP Asli Dua Orang Saksi</label>
                        <input type="file" class="form-control" id="gambar5" name="gambar[]" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Scan Buku Nikah Asli Halaman Awal Sampai Akhir</label>
                        <input type="file" class="form-control" id="gambar6" name="gambar[]" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="file">Upload Scan KK Asli </label>
                        <input type="file" class="form-control" id="gambar7" name="gambar[]" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Scan Surat Keterangan Lahir</label>
                        <input type="file" class="form-control" id="gambar8" name="gambar[]" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Dokumen Pendukung Lainnya</label>
                        <input type="file" class="form-control" id="gambar9" name="gambar[]">
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-lg" style="background-color: #ff6700;color: white;width: 50%;margin-bottom: 30px;margin-top:30px"> <i class="fa fa-address-book"></i> Proses</button>
					</div>
                </div>
                </div>

                <div id="kematian">
                <div class="col-12 col-md-6 col-lg-4">
				    <div class="form-group">
            <label for="file">Upload Scan Formulir(<a href="<?php echo base_url(); ?>dokumen/form_akta_kematian.pdf">Download Formulir</a>)</label>
                        <input type="file" class="form-control" id="gambar10" name="gambar[]" required>
                    </div>
					<div class="form-group">
                        <label for="file">Surat Keterangan Kematian dari Desa/Kel/Tenaga Medis</label>
                        <input type="file" class="form-control" id="gambar11" name="gambar[]" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Scan KTP yang bersangkutan</label>
                        <input type="file" class="form-control" id="gambar12" name="gambar[]" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Scan KTP Pelapor</label>
                        <input type="file" class="form-control" id="gambar13" name="gambar[]" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="file">Upload Scan KTP 2 Orang Saksi </label>
                        <input type="file" class="form-control" id="gambar14" name="gambar[]" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Scan Kartu Keluarga</label>
                        <input type="file" class="form-control" id="gambar15" name="gambar[]" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Scan Surat Nikah yang bersangkutan Halaman Awal Sampai Akhir</label>
                        <input type="file" class="form-control" id="gambar16" name="gambar[]" required>
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Scan Akta Kelahiran yang meninggal (bila ada) </label>
                        <input type="file" class="form-control" id="gambar17" name="gambar[]">
                    </div>

                    <div class="form-group">
                        <label for="file">Upload Scan Bukti Karip/SK (bila PNS,TNI,POLRI) </label>
                        <input type="file" class="form-control" id="gambar18" name="gambar[]">
                    </div>
                    <div class="form-group">
                        <label for="file">Upload Dokumen Pendukung Lainnya </label>
                        <input type="file" class="form-control" id="gambar19" name="gambar[]">
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-lg" style="background-color: #ff6700;color: white;width: 50%;margin-bottom: 30px;margin-top:30px"> <i class="fa fa-address-book"></i> Proses</button>
					</div>					
                </div>
                
                </div>
                
				
			
            </div>
			
			</form>
            
            
                    
                    </div>
            </div>
        </div>
        
    </section>

    