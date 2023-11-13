
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

  
  <style>
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

    <div id="wow" class="section md-padding">
        <div class="container">
            <div class="row">
                <div class="section-header text-center">
                    <h2 class="title"><i class="fa fa-map"></i> Data Warga</h2>
                    <h3 class="title">Kecamatan <?php echo getKecamatan($desa['id_kecamatan']);?> , Desa/Kelurahan <?php echo $desa['nama_desa'];?></h2>
					<h3 class="title"><?php echo $judul;?></h2>
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
		  <th>Action</th>
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
		  <th>
		  	
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
				  $warga=getNIKPribadi($k['nik_kepala']);
  		?>
  		<tr>
        <td><?php echo $no ?></td>
        <td><?php echo $k['no_bpjs'] ?></td>
        <td><?php echo $warga['nama_lengkap'] ?></td>
        <td><?php echo $warga['alamat'] ?></td>
		<td>
			<a href="<?php echo base_URL()."maps/detailAnggota/$id/".$k['no_kk']."/".$k['key_nik']; ?>" target="_blank">
				<input type="button" name="submit" value="Anggota Keluarga" id="submit" class="btn btn-primary btn-block btn-flat">
			</a>
		</td>
        
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

</body>

</html>