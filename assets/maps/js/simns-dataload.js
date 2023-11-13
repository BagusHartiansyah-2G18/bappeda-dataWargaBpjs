	//////////////////////////
	// load first
	$('#title').text(Apps.title);

	///////
	//Ambil Data

	//public config
	var config = new Promise(function (resolve, reject) {
		$.ajax(Apps.url + 'public-config').then(function (resp) {
			Apps.ds.config = resp.result;
			resolve('foo');
		})
	});

	//list sumber data
	var listSumberdata = new Promise(function (resolve, reject) {
		$.ajax(Apps.url + 'listSumberdata').then(function (resp) {
			Apps.ds.listSumberdata = resp.result;
			resolve('foo');
		})
	});

	// list kabupaten
	var listkab = new Promise(function (resolve, reject) {
		$.ajax(Apps.url + 'listkab').then(function (resp) {
			Apps.ds.listKabupaten = resp.result;
			resolve('foo');
		})
	});

	// list kecamatan
	var listkec = new Promise(function (resolve, reject) {
		$.ajax(Apps.url + 'listkec').then(function (resp) {
			Apps.ds.listKecamatan = resp.result;
			resolve('foo');
		});
	});

	// list desa/ kecamatan
	var listkel = new Promise(function (resolve, reject) {
		$.ajax(Apps.url + 'listkel').then(function (resp) {
			Apps.ds.listDesa = resp.result;
			resolve('foo');
		});
	});

	//  jumlah Ruta, Kueluarga, Jiwa
	var count_all = new Promise(function (resolve, reject) {
		$.ajax(Apps.url + 'count-all').then(function (resp) {
			Apps.ds.totruta = (resp.result[0]) ? resp.result[0].tot_ruta : 0;
			Apps.ds.totkk = (resp.result[0]) ? resp.result[0].tot_kk : 0;
			Apps.ds.totjiwa = (resp.result[0]) ? resp.result[0].tot_jiwa : 0;
			resolve('foo');
		});
	});

	//list tahun pengaduan
	var listTahun = new Promise(function (resolve, reject) {
		var baseYear = 2017;
		var d = new Date();
		var thisYear = d.getFullYear();
		var result = [];
		for (let i = baseYear; i <= thisYear; i++) {
			result.push(i)

		}
		Apps.ds.listTahun = result;
		resolve('foo');
	});

	Promise.all([config, listSumberdata, listkab, listkec, listkel, count_all, listTahun]).then(values => {
		$('#peta').load('modules/peta/peta.html');
		$('#tentang').load('modules/tentang/tentang.html');
		$('#gallery').load('modules/gallery/gallery.html');
		$('#lacak').load('modules/lacak/lacak.html');
		$('#Quickcount').load('modules/Quickcount/Quickcount.html');
		$('#infografis').load('modules/Infografis/Infografis.html');
		$('#wow').load('modules/Wow/Wow.html');
	});