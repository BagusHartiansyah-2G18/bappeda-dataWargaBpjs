
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
							<h1 class="white-text" style="font-size: xxx-large;">SISTEM PEMUTAKHIRAN DATA KEPESERTAAN BPJS</h1>
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
    
    // console.log(petaKecamatan.features);
    
    var dbg=[
        "#808080","#0000FF",
        "#000080","#00FFFF",
        "#964B00","#FFD700",
        "#00FF00","#FFFF00",

        "#FF00FF","#FF0000",
        "#FF007F","#800000",
        "#6F00FF","#FF7F00",
        "#C0C0C0","#BF00FF",

        "#8F00FF","#808000"
    ];
    var dkec=[];
    fhasil=JSON.parse('<?php $awal=getJumlahKKAkhir($kecamatan);echo json_encode($awal);?>');
    // console.log(fhasil);
    
    petaKecamatan.features.forEach((v,i) => {
        dkec.push({
            nm:v.properties.KECAMATAN,
            bg:dbg[i]
        })
        v.bg=dbg[i];
        v.properties.nm=v.properties.KECAMATAN;
        v.properties.KECAMATAN+=`<br>
        Total KK:`+fhasil[v.properties.id_kecamatan].kk+` <br> 
        Peserta :`+fhasil[(v.properties.id_kecamatan)].anggota;
    });
    // console.log(dkec);
    
    
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
    // data Maps
    var simpan_kecamatan=[];
    var simpan_desa=[];
    var ulrx='https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';
    var map;
    var fg,isback=false;
    function startMap(mapkecamatan) {
        $('#map').html('');
        map= L.map('map', {
            scrollWheelZoom: false
        }).setView([-8.836393, 116.907578], 10);
        
        L.tileLayer(ulrx, {
            maxZoom: 18,
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OSM</a>, ' +
                '© <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);
        fg= L.featureGroup().addTo(map);

        simpan_kecamatan= L.geoJson(petaKecamatan, {
            style: style,
            onEachFeature: onEachFeature
        })
        simpan_desa = L.geoJson(petaDesa, {
            style: style2,
            onEachFeature: onEachFeature2
        })
        // if(mapkecamatan){
            simpan_kecamatan.addTo(map); 
        // }
    }
    startMap(true);
   
    function startKecamatan() {
        // var simpan_kecamatan = L.geoJson(petaKecamatan, {
        //     style: style,
        //     onEachFeature: onEachFeature
        // })
        // simpan_kecamatan.addTo(map); 
    }
    function style(feature) {
        return {
            weight: 2,
            opacity: 0.3,
            color: 'white',
            dashArray: '3',
            fillOpacity: 1,
            fillColor: feature.bg
        };
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
    function highlightFeature(e) {
        var layer = e.target;
        // console.log(layer);
        
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
        // info.update();
    }
    function select(e) {
        isback=true;
        var labels=["KECAMATAN "+e.feature.properties.nm];
        nox=0;
        
        
        petaDesa.features.forEach((v,i) => {
            if(v.properties.KDCPUM==e.feature.properties.id_kecamatan){
                labels.push(
                '<i style="background-color:'+dbg[nox]+';"></i> ' +
                v.properties.NAMOBJ);

                v.properties.preiew=v.properties.WADMKD+`<br>
                    Total KK:`+fhasil[v.properties.KDCPUM].desa[v.properties.KDEPUM].kk+` <br> 
                    Peserta :`+fhasil[v.properties.KDCPUM].desa[v.properties.KDEPUM].anggota;
                
                v.bg=dbg[nox];
                nox++;
                
            }
        });
        $('#informasi').html(labels.join('<br/><br/>'));


        simpan_desa = L.geoJson(petaDesa, {
            filter: filter_kecamatan,
            style: style2,
            onEachFeature: onEachFeature2
        })

        map.removeLayer(simpan_kecamatan);
        // map.removeLayer(dataKec);
        simpan_desa.addTo(map);
        function filter_kecamatan(feature) { // tidak boleh diganggu
            if (feature.properties.KDCPUM === e.feature.properties.id_kecamatan) return true;
        }
        // console.log(e.feature.properties);

        
        
        
        // dkec.forEach(v => {
            // labels.push(
            //     '<i style="background-color:'+v.bg+';"></i> ' +
            //     v.nm);
        // });

        // div.innerHTML = labels.join('<br/><br/>');
    }
    startKecamatan();



    // desa
    
    function style2(feature) {
        return {
            // fillColor: '#1e81b0',
            weight: 0.8,
            opacity: 0.8,
            color: 'white',
            dashArray: '0',
            fillOpacity: 1,
            fillColor: feature.bg
        };
    }
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
        layer.bindTooltip(layer.feature.properties.preiew, {permanent:false,direction:'center',className: 'desaLabel'}); 
        // +"<button>tes</button>"
    //info2.update(layer.feature.properties);
    }
    function resetHighlight2(e) {
        simpan_desa.resetStyle(e.target);
    }
    function onEachFeature2(feature, layer) {
        layer.on({
            mouseover: highlightFeature2,
            mouseout: resetHighlight2,
            'click': function (e) {
                select2(e.target);
                map.fitBounds(e.target.getBounds());
            },
            'contextmenu': function (e) {
                backToKecamatan();
                map.setZoom(9); 
            },
            
        });
    }
    function backToKecamatan(){
        map.removeLayer(simpan_desa);
        simpan_kecamatan.addTo(map);

        labels = [];
        dkec.forEach(v => {
            labels.push(
                '<i style="background-color:'+v.bg+';"></i> ' +
                v.nm);
        });
        $('#informasi').html(labels.join('<br/><br/>'));
    }
    function select2(e) {
        window.open('<?php echo base_URL(); ?>/maps/kk/'+e.feature.properties.KDEPUM, '_blank');
    }
    var dataKec = L.control({position: 'topright'});
    dataKec.onAdd = function (map) {

        var div = L.DomUtil.create('div', 'info legend'),
            labels = [];
        div.setAttribute('id', 'informasi');
        
        dkec.forEach(v => {
            labels.push(
                '<i style="background-color:'+v.bg+';"></i> ' +
                v.nm);
        });

        div.innerHTML = labels.join('<br/><br/>');
        return div;
    };
    dataKec.addTo(map);
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