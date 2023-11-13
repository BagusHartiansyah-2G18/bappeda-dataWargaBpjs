
<?php
$host = "localhost";
$user = "bapped12_warga";
$password = "Warga@2021";
$database_name = "bapped12_warga";
$pdo = new PDO("mysql:host=$host;dbname=$database_name", $user, $password, array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));
$kecamatan = $pdo->prepare("select * from m_kecamatan where id_kecamatan<>'99' ");
$kecamatan->execute();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title id="title">Kabupaten Sumbawa Barat</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css?v=002" />

	<link type="text/css" rel="stylesheet" href="css/mod.css?v=002" />
	<link type="text/css" rel="stylesheet" href="css/mod-home.css?v=002" />
	<link type="text/css" rel="stylesheet" href="css/mod-modal.css?v=004" />
	<link type="text/css" rel="stylesheet" href="css/mod-pagination.css?v=004" />

	
  <link href="js/pace-loading-bar.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  <style>
  #map {
      width: 100%;
      height: 500px;
  }

  .info {
      padding: 6px 8px;
      font: 14px/16px Arial, Helvetica, sans-serif;
      background: white;
      background: rgba(255, 255, 255, 0.8);
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
      border-radius: 5px;
  }

  .info h4 {
      margin: 0 0 5px;
      color: #777;
  }

  .legend {
      text-align: left;
      line-height: 18px;
      color: #555;
  }

  .legend i {
      width: 18px;
      height: 18px;
      float: left;
      margin-right: 8px;
      opacity: 0.7;
  }

  .full-width-div {
  position: absolute;
  width: 100%;
  left: 0;
  background: linear-gradient(90deg, #FFECD2 0%, #FCB69F 100%);
  
}

.kecamatanLabel{
  background: rgba(255, 255, 255, 0);
  border:0;
  border-radius:0px;
  box-shadow: 0 0px 0px;
}

.desaLabel{
  background:white;
  border:0;
  border-radius:0px;
  box-shadow: 0 0px 0px;
}


</style>

</head>

<body id="public">
	<!-- Header -->
	<header id="home">
		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('./img/background1.jpg');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<div class="navbar-brand">
						<a href="">
							<img class="logo" src="img/logo-alt.png" alt="logo">
							<img class="logo-alt" src="img/logo-ksb.png" alt="logo">
						</a>
					</div>
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="#home"><i class="fa fa-home"></i>  Beranda</a></li>
					<li><a href="../index.php/server/"><i class="fa fa-sign-in"></i>  Login</a></li>
				</ul>
				<!-- /Main navigation -->
			</div>
		</nav>
		<!-- /Nav -->

		<!-- home wrapper -->
		<div class="home-wrapper">
			<div class="container">
				<div class="row">
					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">
						<div class="home-content">
							<h1 class="white-text">SISTEM APLIKASI PEMUTAKHIRAN DATA WARGA</h1>
							<p class="white-text">BAPPEDA & LITBANG  KABUPATEN SUMBAWA BARAT
							</p>
							<a href="#map"><button class="white-btn"><i class="fa fa-map"></i> Peta</button></a>
						</div>
					</div>
					<!-- /home content -->
				</div>
			</div>
		</div>
		<!-- /home wrapper -->

        


	</header>
	<!-- /Header -->
	<!-- peta -->
    <br/>
	<div id="map" class="section md-padding-map">
    </div>

    <div id="wow" class="section md-padding">
        <div class="container">
            <div class="row">
                <div class="section-header text-center">
                    <h2 class="title"><i class="fa fa-map"></i> Peta Sebaran Warga</h2>
                    	
               
                </div> 
                <div class="col-md-12 col-sm-6">
                    <p class="black-text text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Et pharetra pharetra massa massa. Amet luctus venenatis lectus magna fringilla urna porttitor. Vestibulum sed arcu non odio euismod. Nunc faucibus a pellentesque sit amet porttitor eget dolor morbi. Nisi vitae suscipit tellus mauris a diam maecenas sed. In nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque. Vestibulum rhoncus est pellentesque elit ullamcorper dignissim cras. Aliquam sem et tortor consequat. Semper feugiat nibh sed pulvinar proin gravida hendrerit lectus. Eget dolor morbi non arcu. Nisl vel pretium lectus quam id leo in vitae. Justo laoreet sit amet cursus sit amet. Non consectetur a erat nam. Cursus in hac habitasse platea dictumst quisque sagittis.

                        Ipsum dolor sit amet consectetur adipiscing elit. Tempus egestas sed sed risus pretium quam vulputate. Pellentesque diam volutpat commodo sed egestas. Vitae aliquet nec ullamcorper sit. Tortor posuere ac ut consequat semper viverra nam. Urna condimentum mattis pellentesque id nibh. Vel turpis nunc eget lorem dolor. Lacinia quis vel eros donec ac odio. Tellus in hac habitasse platea dictumst vestibulum rhoncus est. Ut eu sem integer vitae justo eget magna fermentum iaculis. Ac tortor dignissim convallis aenean. Cursus turpis massa tincidunt dui ut ornare. Urna condimentum mattis pellentesque id. Elementum integer enim neque volutpat ac tincidunt vitae semper quis. Nullam eget felis eget nunc lobortis. Faucibus in ornare quam viverra orci sagittis eu volutpat. Rhoncus est pellentesque elit ullamcorper dignissim. Feugiat pretium nibh ipsum consequat nisl vel.
                        
                        Vulputate enim nulla aliquet porttitor lacus luctus accumsan tortor. In fermentum posuere urna nec tincidunt praesent semper feugiat nibh. Ac odio tempor orci dapibus ultrices in iaculis nunc sed. Elementum sagittis vitae et leo duis ut diam quam nulla. Sed nisi lacus sed viverra tellus in hac. Ullamcorper eget nulla facilisi etiam dignissim diam quis. Odio ut enim blandit volutpat maecenas. Quisque sagittis purus sit amet volutpat consequat mauris nunc congue. Libero nunc consequat interdum varius. Fermentum dui faucibus in ornare quam viverra orci sagittis eu. Molestie a iaculis at erat pellentesque adipiscing commodo. Neque vitae tempus quam pellentesque nec nam. Etiam dignissim diam quis enim lobortis scelerisque. In fermentum posuere urna nec tincidunt praesent. Massa placerat duis ultricies lacus. Dignissim suspendisse in est ante in nibh mauris. Ut enim blandit volutpat maecenas volutpat. Praesent elementum facilisis leo vel fringilla est.
                        
                        Enim tortor at auctor urna nunc id cursus metus. Accumsan tortor posuere ac ut. Massa vitae tortor condimentum lacinia quis vel eros. Feugiat nibh sed pulvinar proin gravida hendrerit lectus. Dictum varius duis at consectetur lorem donec massa sapien. Sed sed risus pretium quam vulputate dignissim suspendisse in est. Non enim praesent elementum facilisis. Erat imperdiet sed euismod nisi porta lorem. Ornare aenean euismod elementum nisi quis. Ut eu sem integer vitae justo eget. Risus at ultrices mi tempus imperdiet. Porta nibh venenatis cras sed. Tristique nulla aliquet enim tortor at auctor urna nunc. Congue nisi vitae suscipit tellus mauris a. At elementum eu facilisis sed odio morbi quis commodo. Massa tincidunt nunc pulvinar sapien et ligula. Consectetur adipiscing elit ut aliquam purus sit amet. Aliquam sem fringilla ut morbi tincidunt. Ultrices eros in cursus turpis massa. Nisi scelerisque eu ultrices vitae auctor eu augue ut lectus.</p>
                    
    </div> 
   
</div>
</div>
</div>


   
    <script src="peta_kecamatan.js"></script>
    <script src="peta_desa.js"></script>
    <style>
.leaflet-popup-close-button {
    display:none;
}


</style>

<script type="text/javascript">
    //var map = L.map('map').setView([-8.836393, 116.907578],10);
    var map = L.map('map', {
        scrollWheelZoom: false
    }).setView([-8.836393, 116.907578], 10);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: '&copy; <a href="https://www.openstreetmap.org/">OSM</a>, ' +
            '© <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
    }).addTo(map);


    info = L.control();

info.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
    this.update();
    return this._div;
};

// method that we will use to update the control based on feature properties passed
info.update = function (props) {
    var thtml = '<table class="table table-sm table-hover percentile-tbl"><thead><tr><th colspan="8">DATA WARGA KABUPATEN SUMBAWA BARAT</th></tr> <tr><th>No</th> <th class="w-25">Nama Kecamatan</th> <th>Data Awal</th> <th>Data Valid</th><th>Data BPJS</th></tr></thead><tbody>';
    var awal=0;
    var valid=0;
    var bpjs=0;
    <?php while($kec = $kecamatan->fetch()){?>
    thtml += '<tr><td><?php echo $kec['id_kecamatan']?></td><td><?php echo $kec['nama_kecamatan']?> </td><td><?php $digits = 3;$awal=rand(pow(10, $digits-1), pow(10, $digits)-1);echo $awal?></td><td><?php $digits = 3;$valid=rand(pow(10, $digits-1), pow(10, $digits)-1);echo $valid?></td><td><?php $digits = 3;$bpjs=rand(pow(10, $digits-1), pow(10, $digits)-1);echo $bpjs?></td></tr>';
    awal+=<?php echo $awal;?>;
    valid+=<?php echo $valid;?>;
    bpjs+=<?php echo $bpjs;?>;
    <?php }?>
    
    thtml += '</tbody> <tfoot><tr><td colspan="2">Total Data</td> <td>' + awal + '</td> <td>' + valid + '</td> <td>'+ bpjs +'</td></tr></tfoot></table>';
    this._div.innerHTML += thtml;
    
};

info.addTo(map);

info2 = L.control();

info2.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
    //this.update();
    return this._div;
};

// method that we will use to update the control based on feature properties passed
info2.update = function (props) {
    var thtml = '<table class="table table-sm table-hover percentile-tbl"><thead><tr><th colspan="8">DATA WARGA KECAMATAN '+(props ? '' + props.WADMKC  +' </b>'  : '')+'</th></tr> <tr><th>No</th> <th class="w-25">Nama Desa/Kelurahan</th> <th>Data Awal</th> <th>Data Valid</th><th>Data BPJS</th></tr></thead> <tbody>';

    var awal=0;
    var valid=0;
    var bpjs=0;
    <?php
    $desa = $pdo->prepare("select * from m_desa where id_kecamatan='8' ");
    $desa->execute();
    $no=1;
    ?>
    <?php while($des = $desa->fetch()){?>
    thtml += '<tr><td><?php echo $no?></td><td><?php echo $des['nama_desa']?> </td><td><?php $digits = 3;$awal=rand(pow(10, $digits-1), pow(10, $digits)-1);echo $awal?></td><td><?php $digits = 3;$valid=rand(pow(10, $digits-1), pow(10, $digits)-1);echo $valid?></td><td><?php $digits = 3;$bpjs=rand(pow(10, $digits-1), pow(10, $digits)-1);echo $bpjs?></td></tr>';
    awal+=<?php echo $awal;?>;
    valid+=<?php echo $valid;?>;
    bpjs+=<?php echo $bpjs;?>;

    <?php $no++; }?>
    
    thtml += '</tbody> <tfoot><tr><td colspan="2">Total Data</td> <td>' + awal + '</td> <td>' + valid + '</td> <td>'+ bpjs +'</td></tr></tfoot></table>';
    this._div.innerHTML += thtml;
    
};

info3 = L.control();

info3.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
    //this.update();
    return this._div;
};

// method that we will use to update the control based on feature properties passed
info3.update = function (props) {
    var thtml = '<table class="table table-sm table-hover percentile-tbl"><thead><tr><th colspan="8">DATA WARGA DESA '+(props ? '' + props.WADMKD  +' </b>'  : '')+'</th></tr> <tr><th>No</th> <th class="w-25">Nama Kepala Keluarga</th> <th>RT</th> <th>RW</th><th>Jumlah Anggota KK</th><th>BPJS</th></tr></thead> <tbody>';


    <?php
    $kel = $pdo->prepare("select * from t_pribadi where id_desa='12' limit 8");
    $kel->execute();
    $no=1;
    ?>
    <?php while($k = $kel->fetch()){?>
    thtml += '<tr><td><?php echo $no?></td><td><?php echo $k['nama_lengkap']?> </td><td><?php echo $k['rt']?></td><td><?php echo $k['rw']?></td><td class="center"><?php $digits = 1;$bpjs=rand(pow(10, $digits-1), pow(10, $digits)-1);echo $bpjs?></td><td class="center"><?php $digits = 1;$bpjs=rand(pow(10, $digits-1), pow(10, $digits)-1);echo $bpjs?></td></tr>';
    
    <?php $no++; }?>
    
    thtml += '</tbody></table> <a>Selengkapnya </a>';
    this._div.innerHTML += thtml;
   
};



    
    
var simpan_kecamatan = L.geoJson(petaKecamatan, {
        style: style,
        onEachFeature: onEachFeature
    })


    simpan_kecamatan.addTo(map); 
    

  
   var simpan_desa = L.geoJson(petaDesa, {
        style: style2,
        onEachFeature: onEachFeature2
    })

    
    function getColor(d) {
                if (d == '1') {
                return "#FF0D2E";
                }else if (d == '3') {
                return "#1CA43C";
                } else if (d == '2') 
                {
                    return "#F1F81F"
                }
                else {
                return "#3F89EB";
                };

            }


function resetHighlight(e) {
    simpan_kecamatan.resetStyle(e.target);
	info2.update();
}

    function style(feature) {
    return {
        fillColor: '#1CA43C',
        weight: 0.8,
        opacity: 0.8,
        color: 'white',
        dashArray: '0',
        fillOpacity: 1
    };
}

function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 5,
        color: 'white',
        fillColor:'red',
        dashArray: '',
        fillOpacity: 1
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }
    layer.bindTooltip(layer.feature.properties.WADMKC, {permanent:false,direction:'center',className: 'kecamatanLabel'}); 
	
	
	//info2.update(layer.feature.properties);
	
	
}

function zoomToFeature(e) {
    map.fitBounds(e.target.getBounds());
}


function onEachFeature(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        'click': function (e) {
              select(e.target);
              map.fitBounds(e.target.getBounds());
            }
    });
     
}


function select(e) {
//Zoom pada kecamatan yang diakses
        console.log(e.feature.geometry);	
		
		coords = []; 		
		
		var simpan_koordinat_kecamatan = e.feature.geometry.coordinates[0][0][0];
		
		console.log(simpan_koordinat_kecamatan);		
		
		console.log(simpan_koordinat_kecamatan[0]);
		console.log(simpan_koordinat_kecamatan[1]);		
        
        //map.setView([simpan_koordinat_kecamatan[1], simpan_koordinat_kecamatan[0]], 12);

        ///Menghapus Geojson kecamatan
        

        map.removeLayer(simpan_desa);
        info.remove()
        info2.addTo(map)
        //info2.update(e.feature.properties)
        info3.remove()
        //map.removeLayer(simpan_kecamatan);

simpan_desa = L.geoJson(petaDesa, {
	filter: filter_kecamatan,
    style: style2,
    onEachFeature: onEachFeature2
}).addTo(map);




function filter_kecamatan(feature) {
  if (feature.properties.WADMKC === e.feature.properties.WADMKC) return true
}
        	

	}
    

   
   



function highlightFeature2(e) {
    var layer = e.target;
	
	

    layer.setStyle({
        weight: 5,
        color: '#666',
        dashArray: '',
        fillOpacity: 0.7
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }
	layer.bindTooltip(layer.feature.properties.WADMKD, {permanent:false,direction:'center',className: 'desaLabel'}); 
	
	//info2.update(layer.feature.properties);
	//info.update(layer.feature.properties);
	
}










function resetHighlight2(e) {
    simpan_desa.resetStyle(e.target);
	
	//info3.update();
}


function zoomToFeature2(e) {
    map.fitBounds(e.target.getBounds());
}



function onEachFeature2(feature, layer) {
    layer.on({
        mouseover: highlightFeature2,
        mouseout: resetHighlight2,
          'click': function (e) {
              select2(e.target);
              map.fitBounds(e.target.getBounds());
            }
    });
     
}

    function style2(feature) {
    return {
        fillColor: '#12AD2B',
        weight: 0.8,
        opacity: 0.8,
        color: 'white',
        dashArray: '0',
        fillOpacity: 1
    };
}


function select2(e) {
        //Zoom pada kabkot yang diakses
        
                console.log(e.feature.geometry);	
                
                coords = []; 		
                
                var simpan_koordinat = e.feature.geometry.coordinates[0][0][0];
                
                console.log(simpan_koordinat);		
                
                console.log(simpan_koordinat[0]);
                console.log(simpan_koordinat[1]);		
                
        map.setView([simpan_koordinat[1], simpan_koordinat[0]], 13);
        
        
        
        
        
                
                
                console.log(e.feature.properties.WADMKC);
                console.log(e.feature.properties.WADMKC);
                info.remove()
                info2.remove()
                info3.addTo(map)

	            info3.update(e.feature.properties);
              
        
                
                //map_indonesia.removeLayer(geojson_kabkot_indonesia);
            
        ///Menghapus Geojson Kabkot Sebelumnya untuk pertukaran
        
            //map_indonesia.removeLayer(simpan_geojson_sumatera_dalam_desa);
        //map_indonesia.removeLayer(simpan_geojson_sumatera_dalam_desa);
        //map.removeLayer(simpan_kecamatan);
        
        //////Akses Geojson Kecamatan
            }

            var legend = L.control({position: 'bottomleft'});
        
        legend.onAdd = function (map) {
    
            var div = L.DomUtil.create('div', 'info legend'),
                grades = [1, 2, 3],
                labels = [],
                from, to;
    
            for (var i = 0; i < grades.length; i++) {
                from = grades[i];
                to = grades[i + 1];
                if (from=='1')
                {
                    ket='Data Verifikasi 0 - 30 %';
                }else if (from=='2')
                {
                ket='Data Verifikasi 31 - 60 %';
                }else if (from=='3')
                {
                ket='Data Verifikasi 61 - 100 %';
                }
                labels.push(
                    '<i style="background:' + getColor(from) + '"></i> ' +
                    ket);
            }
    
            div.innerHTML = labels.join('<br/><br/>');
            return div;
        };
    
        legend.addTo(map);






</script>
    
    


	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="footer-logo">
						<a href="index.html"><img src="img/logo-ksb.png" alt="logo"></a>
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

	<!-- map key -->
	
	<script src="js/highcharts.js"></script>
	<script type="text/javascript" src="js/avocado.js?v=010"></script>
	<script type="text/javascript" src="js/exporting.js?v=010"></script>
	<script type="text/javascript" src="js/offline-exporting.js?v=010"></script>

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.tiny-draggable.min.js"></script>
	<!-- <script type="text/javascript" src="js/jquery.ui.touch-punch.js"></script> -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/vue.min.js"></script>

	<script type="text/javascript" src="js/vue-highcharts.js"></script>

	<script src="js/pace.min.js"></script>

</body>

</html>