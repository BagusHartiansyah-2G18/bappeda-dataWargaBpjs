
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
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="<?=base_url()?>assets/maps/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/style.css?v=002" />

	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/mod.css?v=002" />
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/mod-home.css?v=002" />
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/mod-modal.css?v=004" />
	<link type="text/css" rel="stylesheet" href="<?=base_url()?>assets/maps/css/mod-pagination.css?v=004" />

	
  <link href="<?=base_url()?>assets/maps/js/pace-loading-bar.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  <style>
  #map {
      width: 100%;
      height: 800px;
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
		<div class="bg-img" style="background-image: url('<?=base_url()?>/assets/maps/img/background1.jpg');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->

		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<div class="navbar-brand">
						<a href="">
							<img class="logo" src="<?=base_url()?>assets/maps/img/logo-alt.png" alt="logo">
							<img class="logo-alt" src="<?=base_url()?>assets/maps/img/logo-ksb.png" alt="logo">
						</a>
					</div>
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="#home"><i class="fa fa-home"></i>  Beranda</a></li>
					<li><a href="<?=base_url()?>server/"><i class="fa fa-sign-in"></i>  Login</a></li>
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

    

    <script type="text/javascript">
        var peta_1 = <?php echo getLegendValidasi(1)?>;
        var peta_2 = <?php echo getLegendValidasi(2)?>;
        var peta_3 = <?php echo getLegendValidasi(3)?>;
        var peta_4 = <?php echo getLegendValidasi(4)?>;
        var peta_5 = <?php echo getLegendValidasi(5)?>;
        var peta_6 = <?php echo getLegendValidasi(6)?>;
        var peta_7 = <?php echo getLegendValidasi(7)?>;
        var peta_8 = <?php echo getLegendValidasi(8)?>;
    </script>
   
   <!--  <script src="<?=base_url()?>assets/maps/peta_kecamatan.js"></script> -->
   
   <script src="<?=base_url()?>assets/maps/peta_desa.js"></script>
   <script src="<?=base_url()?>assets/maps/peta.js"></script>
    <style>
.leaflet-popup-close-button {
    display:none;
}


</style>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    

    /* function update_desa() {
        $.getJSON("http://localhost/warga/maps/dataKecamatan", function(data) {
        $("table").empty();
		var no = 1;
		$.each(data.result, function() {
			$("table").append("<tr><td>"+(no++)+"</td><td>"+this['nama']+"</td><td>"+this['jurusan']+"</td></tr>");
		});
	});
    } */
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
           

        
            // control that shows state info on hover
            var info = L.control();
    
info.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
    this.update();
    return this._div;
};


function update_kec(id_desa) {
    $.getJSON("<?php echo base_URL(); ?>/maps/dataKecamatan/" + id_desa, function(data) {
        var no=1;
        
        $.each(data.result, function() {
            $("table").append("<tr id='data1'><td align='center'>"+(no++)+"</td><td >"+this['nama_desa']+"</td><td align='center'>"+this['jumlah_awal']+"</td><td align='center'>"+this['jumlah_valid']+"</td></tr>");
        });
    });
}




function update_satu(id_desa) {
    $.getJSON("<?php echo base_URL(); ?>/maps/dataDesa/" + id_desa, function(data) {
        var no=1;
        
        $.each(data.result, function() {
            $("table").append("<tr ><td align='center'>"+(no++)+"</td><td >"+this['nama_desa']+"</td><td align='center'><a target='_blank' href='<?php echo base_URL(); ?>maps/kk/"+ id_desa +"'>"+this['jumlah_kk']+"</a></td><td align='center'><a target='_blank' href='<?php echo base_URL(); ?>maps/bpjs/"+ id_desa +"'>"+this['jumlah_bpjs']+"</a></td></tr>");
        });
    });
}


// method that we will use to update the control based on feature properties passed
info.update = function (props) {
    var t_html_pilih='<table class="table table-sm table-hover percentile-tbl"><thead><tr><th colspan="8">DATA WARGA KECAMATAN '+(props ? '' + props.KECAMATAN  +' </b>'  : '')+'</th></tr> <tr><th>No</th> <th class="w-25">Nama Desa</th> <th>Jumlah KK</th><th>Keikutsertaan BPJS</th></tr></thead><tbody></table><br \> <b>Klik area desa/kel untuk melihat data KK dan BPJS</b> <br/><b>Klik angka pada tabel untuk info detail warga</b>';
    $pilih=(props ? update_kec(props.id_kecamatan) : '');
    //$pilih=(props ? update_desa(props.KDEPUM) : '');

    var thtml = '<table class="table table-sm table-hover percentile-tbl"><thead><tr><th colspan="8">DATA WARGA KABUPATEN SUMBAWA BARAT</th></tr> <tr><th>No</th> <th class="w-25">Nama Kecamatan</th> <th>Data Awal</th> <th>Verifikasi Data</th></tr></thead><tbody>';
    var awal=0;
    var valid=0;
    <?php foreach ($kecamatan as $kec) {?>
    thtml += '<tr><td><?php echo $kec['id_kecamatan']?></td><td><?php echo $kec['nama_kecamatan']?> </td><td align="center"><?php $awal=getDataAwal($kec['id_kecamatan']);echo $awal?></td><td align="center"><?php $valid=getDataValid($kec['id_kecamatan']);echo $valid?></td></tr>';
    awal+=<?php echo $awal;?>;
    valid+=<?php echo $valid;?>;
    
    <?php }?>
    
    thtml += '</tbody> <tfoot><tr><td colspan="2">Total Data</td> <td align="center">' + awal + '</td> <td align="center">' + valid + '</td> </tr></tfoot></table>';
    
    this._div.innerHTML = (props ? t_html_pilih : thtml);
};

info.addTo(map);


info2 = L.control();

info2.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
    //this.update();
    return this._div;
};


info2.update = function (props) {
    var t_html_pilih='<table class="table table-sm table-hover percentile-tbl"><thead><tr><th colspan="8">DATA WARGA KECAMATAN '+(props ? '' + props.KECAMATAN  +' </b>'  : '')+'</th></tr> <tr><th>No</th> <th class="w-25">Nama Desa</th> <th>Data Awal</th><th>Verifikasi Data</th></tr></thead><tbody></table><br \> <b>Klik area desa/kel untuk melihat data KK dan BPJS</b></b>';
    $pilih=(props ? update_kec(props.id_kecamatan) : '');
    //$pilih=(props ? update_desa(props.KDCPUM) : '');
    
    this._div.innerHTML = (props ? t_html_pilih : 'Sentuh Desa Untuk Melihat Data');
};


info3 = L.control();

info3.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
    //this.update();
    return this._div;
};

// method that we will use to update the control based on feature properties passed
info3.update = function (props) {
    var thtml = '<table class="table table-sm table-hover percentile-tbl"><thead><tr><th colspan="8">DATA WARGA DESA '+(props ? '' + props.WADMKD  +' </b>'  : '')+'</th></tr> <tr><th>No</th> <th class="w-25">Nama Desa/Kelurahan</th> <th>Jumlah KK</th> <th>Jumlah BPJS</th></tr></thead> <tbody></tbody></table><br \> <b>Klik angka pada tabel untuk info detail warga</b>';
    $pilih=(props ? update_satu(props.KDEPUM) : '');
    
    this._div.innerHTML = (props ? thtml : 'Belum Ada Data');
   
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




        
        
            // get color depending on population density value
            //1 PP dan ODP, 2 Untuk PDP dan 3 Untuk Positif
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
        
            function style(feature) {
                return {
                    weight: 2,
                    opacity: 0.3,
                    color: 'white',
                    dashArray: '3',
                    fillOpacity: 1,
                    fillColor: getColor(feature.properties.status)
                };
            }
        
        
            function highlightFeature(e) {
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
                layer.bindTooltip(layer.feature.properties.KECAMATAN, {permanent:false,direction:'center',className: 'desaLabel'}); 
                
                //info.update(layer.feature.properties);
            }
        
        
            function resetHighlight(e) {
                simpan_kecamatan.resetStyle(e.target);
                info.update();
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
		
		//console.log(simpan_koordinat_kecamatan);		
		
		//console.log(simpan_koordinat_kecamatan[0]);
		//console.log(simpan_koordinat_kecamatan[1]);		
        
        //map.setView([simpan_koordinat_kecamatan[1], simpan_koordinat_kecamatan[0]], 12);

        ///Menghapus Geojson kecamatan
        

        map.removeLayer(simpan_desa);
        map.removeLayer(simpan_kecamatan);
        info.remove()
        info2.addTo(map)
        info2.update(e.feature.properties);
        //info.update(e.feature.properties)
        //map.removeLayer(simpan_kecamatan);
        info3.remove()

simpan_desa = L.geoJson(petaDesa, {
	filter: filter_kecamatan,
    style: style2,
    onEachFeature: onEachFeature2
}).addTo(map);




function filter_kecamatan(feature) {
  if (feature.properties.KDCPUM === e.feature.properties.id_kecamatan) return true
}
console.log(e.feature.properties.id_kecamatan);
        	

	}
        
            geojson = L.geoJson(petaKecamatan, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);
        
            map.attributionControl.addAttribution('Powered &copy; <a href="#">Kabupaten Sumbawa Barat</a>');


            function highlightFeature2(e) {
    var layer = e.target;
	
    layer.setStyle({
        weight: 5,
        color: '#e28743',
        dashArray: '',
        fillOpacity: 0.7
    });

    if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
        layer.bringToFront();
    }
	layer.bindTooltip(layer.feature.properties.WADMKD, {permanent:false,direction:'center',className: 'desaLabel'}); 
	
	//info2.update(layer.feature.properties);
	
	
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
        fillColor: '#1e81b0',
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

	<!-- map key -->
	
	<script src="<?=base_url()?>assets/maps/js/highcharts.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/maps/js/avocado.js?v=010"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/maps/js/exporting.js?v=010"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/maps/js/offline-exporting.js?v=010"></script>

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="<?=base_url()?>assets/maps/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/maps/js/jquery.tiny-draggable.min.js"></script>
	<!-- <script type="text/javascript" src="js/jquery.ui.touch-punch.js"></script> -->
	<script type="text/javascript" src="<?=base_url()?>assets/maps/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/maps/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/maps/js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/maps/js/vue.min.js"></script>

	<script type="text/javascript" src="<?=base_url()?>assets/maps/js/vue-highcharts.js"></script>

	<script src="<?=base_url()?>assets/maps/js/pace.min.js"></script>

</body>

</html>