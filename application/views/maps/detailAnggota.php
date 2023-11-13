
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title id="title">Detail Warga Kabupaten Sumbawa Barat</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/bootstrap.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="<?=base_url()?>assets/maps/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/style.css?v=002" />

	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/mod.css?v=002" />
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/mod-home.css?v=002" />
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/mod-modal.css?v=004" />
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/mod-pagination.css?v=004" />
    
	
  <link href="<?=base_url()?>assets/maps/js/pace-loading-bar.css" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" /> -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="<?=base_url()?>assets/maps/style.css" />

  
  <link rel="stylesheet" href="<?=base_url()?>assets/ionicons.min.css">
	
  <style>
	.tab {
		overflow: hidden;
		border: 1px solid #ccc;
		background-color: #f1f1f1;
		}

		/* Style the buttons that are used to open the tab content */
		.tab button {
		background-color: inherit;
		float: left;
		border: none;
		outline: none;
		cursor: pointer;
		padding: 14px 16px;
		transition: 0.3s;
		}

		/* Change background color of buttons on hover */
		.tab button:hover {
		background-color: #ddd;
		}

		/* Create an active/current tablink class */
		.tab button.active {
		background-color: #ccc;
		}

		/* Style the tab content */
		.tabcontent {
		display: none;
		padding: 6px 12px;
		border: 1px solid #ccc;
		border-top: none;
		}
</style>
</head>

<body id="public">
	<!-- Header -->
	<!-- Nav -->
    <nav id="nav"  class="navbar" style="background-color:black;height:180px;">
			<div class="container">

				<div class="navbar-header">
					<div class="navbar-brand">
						<a href="">
							<img class="logo" src="<?=base_url()?>assets/maps/img/logo-ksb.png" alt="logo">
							<img class="logo-alt" src="<?=base_url()?>assets/maps/img/logo-ksb.png" alt="logo">
						</a>
					</div>
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right" style="color:white;">
					<li><a href="<?=base_url()?>maps/"><i class="fa fa-home"></i>  Beranda</a></li>
					<li><a href="<?=base_url()?>server/"><i class="fa fa-sign-in"></i>  Login</a></li>
				</ul>
				<!-- /Main navigation -->
			</div>
		</nav>
		<!-- /Nav -->
	<!-- peta -->
	<?php 
		// echo $nik;
		$kepala=getNIKPribadi($nik); 
	?>
	<div class="tab">
	<button class="tablinks" onclick="openCity(event, 'daftar')">Daftar Anggota</button>
	<button class="tablinks" onclick="openCity(event, 'awal')">Data Awal</button>
	<button class="tablinks" onclick="openCity(event, 'verifikasi')">Data Terakhir</button>
	</div>

	<!-- Tab content -->
	<div id="daftar" class="tabcontent active" style="display: block;">
		<div id="wow" class="section md-padding">
			<div class="container">
				<div class="row">
					<div class="section-header text-center">
						<h2 class="title"><i class="fa fa-map"></i>
							Daftar Anggota Keluarga
						</h2>
						<?php
							if(true){
								echo '<img src="'.base_url().'assets/img_avatar.png" alt="Avatar" style="border-radius: 50%; width:250px;"> ';
							}else{
								echo '<img src="img_avatar.png" alt="Avatar"> ';
							}
						?>
						<h2><?php echo $kepala['nama_lengkap']; ?></h2>
					</div> 
					<div class="col-md-12 col-sm-6">
						<div class="container-fluid">
							<table class="datatable table table-hover table-bordered">
								<thead>
									<tr>
									<th>No</th>
									<th>No BPJS</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Status Keluarga</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
									<th></th>
									<th>
										<input type="text" class="form-control input-sm filter-column">
									</th>
									<th>
										<input type="text" class="form-control input-sm filter-column" />
									</th>
									<th>
									<input type="text" class="form-control input-sm filter-column" />
									</th>
									<th>
										<input type="text" class="form-control input-sm filter-column" />
									</th>
									</tr>
								</tfoot>
								<tbody>
									<?php
									if (empty($pribadi)) {
										echo "<tr><td colspan='5'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
									} else {
										$no 	= 1;
										foreach ($pribadi as $k) {
											$warga=getNIKPribadi($k['nik']);
									?>
									<tr>
									<td><?php echo $no ?></td>
									<td><?php echo $k['no_bpjs']?></td>
									<td><?php echo $warga['nama_lengkap'] ?></td>
									<td><?php echo $warga['alamat'] ?></td>
									<td ><?php echo $k['kategori'] ?></td>
									</tr>
									<?php
										$no++;
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div> 
	
			</div>
			</div>
		</div>
	</div>

	<div id="awal" class="tabcontent" style="display: block;">
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
							<td><?=$t_pribadi->tempat_lahir?>, <?=date('d F Y'),strtotime($t_pribadi->tanggal_lahir);?></td>
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
	</div>

	<div id="verifikasi" class="tabcontent" style="display: block;">
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
							<td><?=$t_pribadi2->tempat_lahir?>, <?=date('d F Y'),strtotime($t_pribadi->tanggal_lahir);?></td>
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



   
   

    
    


	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer-logo">
						<a href="#"><img src="<?=base_url()?>assets/maps/img/logo-ksb.png" alt="logo"></a>
					</div>
					<div class="footer-copyright">
						<p>Copyright © 2021. All Rights Reserved. Develod By <a href="#"
								target="_blank">BAPPEDA & LITBANG</a></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>

	<!-- Preloader -->
	<!-- <div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div> -->

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <!-- Responsive extension -->
  <script src="https://cdn.datatables.net/responsive/2.1.0/js/responsive.bootstrap.min.js"></script>
  <!-- Buttons extension -->
  <script src="//cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
  
  <script src="<?=base_url()?>assets/maps/script.js"></script>
  	

  <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>
		function openCity(evt, cityName) {
			// Declare all variables
			var i, tabcontent, tablinks;

			// Get all elements with class="tabcontent" and hide them
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}

			// Get all elements with class="tablinks" and remove the class "active"
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}

			// Show the current tab, and add an "active" class to the button that opened the tab
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.className += " active";
		} 
  </script>
</body>

</html>