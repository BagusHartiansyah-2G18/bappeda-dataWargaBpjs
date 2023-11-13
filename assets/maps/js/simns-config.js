	/** GLOBAL VARIABLE - fixed */
	window.Apps = {};
	Apps.url = 'https://simnangkis.com/trenggalek/main/api/';
	if (location.hostname === "localhost" || location.hostname === "127.0.0.1" || location.hostname === "") {
		Apps.url = 'http://localhost/integra/simnangkis-trenggalek/api/';
	}

	Apps.title = "Simnangkis Trenggalek";
	Apps.lat = -8.1414;
	Apps.lng = 112.1002;
	Apps.tahun = 2018;
	Apps.id_prop = 35;
	Apps.id_kab = '03';

	Apps.map_start_zoom = 10; // map dimulai/min sampai tingkat Propinsi
	Apps.map_min_level = 2; // map dimulai/min sampai tingkat Propinsi
	Apps.map_max_level = 3; // map bisa dilihat sampai tingkat desa

	Apps.ds = {};