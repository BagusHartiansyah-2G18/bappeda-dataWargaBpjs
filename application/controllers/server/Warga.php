<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->library(['datatables', 'form_validation']); // Load Library Ignited-Datatables
		$this->load->model('Master_model', 'master');
		$this->form_validation->set_error_delimiters('', '');
		
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	public function index()
	{
		$data = [
			'user' => $this->session->userdata('admin_id_kecamatan'),
			'judul'	=> 'Kelola Data Warga ',
			'kecamatan'		=> $this->master->getKecamatan(),
			'kelurahan'		=> $this->master->getKelurahan(),
            'subjudul' => 'Aplikasi data Warga',
            'linkmenuutama' => 'warga',
            'linkmenu' => 'warga',
            
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('operator/warga/list');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function wargadesa()
	{
		$data = [
			'user' => $this->session->userdata('admin_id_kecamatan'),
			'judul'	=> 'Kelola Data Warga ',
			'kecamatan'		=> $this->master->getKecamatan(),
			'kelurahan'		=> $this->master->getKelurahan(),
            'subjudul' => 'Aplikasi data Warga',
            'linkmenuutama' => 'listbpjs',
            'linkmenu' => 'listbpjs',
            
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('laporan/list-desa-warga');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function verifikasi()
	{
		$data = [
			'user' => $this->session->userdata('admin_id_kecamatan'),
			'judul'	=> 'Laporan Data Warga ',
            'subjudul' => 'Aplikasi Data Warga',
            'linkmenuutama' => 'laporan',
            'linkmenu' => 'verifikasi',
            
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('laporan/verifikasi');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function listkecamatan()
	{
		$data = [
			'user' => $this->session->userdata('admin_id_kecamatan'),
			'judul'	=> 'Laporan Data Warga ',
            'subjudul' => 'Aplikasi Data Warga',
            'linkmenuutama' => 'laporan',
            'linkmenu' => 'listkecamatan',
            
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('laporan/list-kecamatan');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function listbpjs()
	{
		$data = [
			'user' => $this->session->userdata('admin_id_kecamatan'),
			'judul'	=> 'Laporan Data Warga ',
            'subjudul' => 'Aplikasi Data Warga',
            'linkmenuutama' => 'laporan',
            'linkmenu' => 'listbpjs',
            
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('laporan/list-bpjs');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function listbpjsdesa()
	{
		$data = [
			'user' => $this->session->userdata('admin_id_kecamatan'),
			'judul'	=> 'Laporan Data Warga ',
            'subjudul' => 'Aplikasi Data Warga',
            'linkmenuutama' => 'laporan',
            'linkmenu' => 'listbpjs',
            
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('laporan/list-desa');
		$this->load->view('_templates/dashboard/_footer.php');
	}


	public function getWargaList(){

      	// POST data
      	$postData = $this->input->post();

      	// Get data
      	if($this->session->userdata('admin_nama') == 'Admin') {
			$data = $this->master->getWargaAdminSSKK($postData);
		} else {
			$data = $this->master->getWargaUserSSKK($postData,$this->session->userdata('admin_id'));
		}

      	echo json_encode($data);
   }

   public function getWargaListDesa(){

      	// POST data
      	$postData = $this->input->post();

		$data = $this->master->getWargaUserSSKKDesa($postData);

      	echo json_encode($data);
   }

	public function add()
	{
		$data = [
			'user' 		=> 'Test',
			'judul'		=> 'Tambah Warga',
			'subjudul'	=> 'Tambah Data Warga',
			//'desa'	=> $this->master->getSamsatById($this->session->userdata('admin_id_samsat')),
			'keterangan'	=> $this->master->getKeterangan(),
			'hubungan'	=> $this->master->getHubungan(),
			'pekerjaan'	=> $this->master->getPekerjaan(),
			'kecamatan'	=> $this->master->getKecamatan(),
			'kelurahan'	=> $this->master->getKelurahan(),
			'desa'	=> 'admin',
			'linkmenuutama' => 'input',
			'linkmenu' => 'input',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('operator/warga/add');
		$this->load->view('_templates/dashboard/_footer'); 
	}

	public function save()
	{	
        
        if ($_FILES['gambar1']['name'] !== ''){

	        $new_name1 = time().$_FILES["gambar1"]['name'];
			$config['upload_path'] 		= './uploads';
	        $config['allowed_types'] 	= 'mp4|3gp|gif|jpg|png|jpeg|pdf';
	        $config['max_size']  		= '20000';
	        $config['max_width']  		= '12024';
	        $config['max_height']  		= '12768';
			$config['file_name'] 	 	= $new_name1;

			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar1');

			$fdata['foto']              = str_replace(" ","_",$new_name1);
	    }
	        
	    if ($_FILES['gambar2']['name'] !== ''){
	        $new_name2 = time().$_FILES["gambar2"]['name'];
			$config2['upload_path'] 		= './uploads';
	        $config2['allowed_types'] 	= 'mp4|3gp|gif|jpg|png|jpeg|pdf';
	        $config2['max_size']  		= '20000';
	        $config2['max_width']  		= '12024';
	        $config2['max_height']  		= '12768';
			$config2['file_name'] 	 	= $new_name2;
			$this->load->library('upload', $config2);
			$this->upload->do_upload('gambar2');

			$fdata3['foto']         = str_replace(" ","_",$new_name2);
	    } 
		
		$fdata['nik']				= $this->input->post('nik', true);
		$fdata['no_kk']				= $this->input->post('nokk', true);
		$fdata['id_user']			= $this->input->post('id_user', true);
		$fdata['nama_lengkap'] 		= $this->input->post('nama_lengkap', true);
		$fdata['jenis_kelamin'] 	= $this->input->post('jk', true);
		$fdata['tempat_lahir']		= $this->input->post('tempat_lahir', true);
		$fdata['tanggal_lahir']		= $this->input->post('tanggal_lahir', true);
		$fdata['agama']				= $this->input->post('agama', true);
		$fdata['pekerjaan']			= $this->input->post('pekerjaan', true);
		$fdata['gol_darah']			= $this->input->post('gol', true);
		$fdata['status_kawin']		= $this->input->post('perkawinan', true);
		$fdata['warga_negara']		= $this->input->post('kewarganegaraan', true);
		$fdata['alamat']			= $this->input->post('alamat', true);
		$fdata['rt']				= $this->input->post('rt_rw', true);
		$fdata['rw']				= $this->input->post('rw', true);
		$fdata['id_desa']			= $this->input->post('kelurahan', true);
		$fdata['id_kecamatan']		= $this->input->post('kecamatan', true);
		$fdata['verifikasi']		= 'Belum Verifikasi';
		$fdata['status_data']		= '0';
		$fdata['created_at']		= date('Y-m-d H:i:s');
		  
		$insert = $this->master->save_pribadi($fdata);

		$fdata2['key_nik']			= $this->input->post('nik', true);
		$fdata2['no_bpjs']			= $this->input->post('nobpjs', true);
		$fdata2['id_jenis'] 		= $this->input->post('jenispeserta', true);
		$fdata2['jenis_peserta'] 	= $this->input->post('kepesertaan', true);
		$fdata2['kelas']			= $this->input->post('kelasbpjs', true);
		$fdata2['id_hubungan']		= $this->input->post('hubungan_keluarga', true);
		$fdata2['keterangan']		= $this->input->post('keterangan', true);
		$fdata2['created_at']		= date('Y-m-d H:i:s');
		$fdata2['status_data']		= '0';

		$insert = $this->master->save_bpjs($fdata2);

		$fdata3['key_nik']		= $this->input->post('nik', true);
		$fdata3['no_kk']		= $this->input->post('nokk', true);
		$fdata3['id_user']		= $this->input->post('id_user', true);
		$fdata3['nik_kepala'] 	= $this->input->post('nik', true);
		$fdata3['nama_kepala'] 	= $this->input->post('nama_lengkap', true);
		$fdata3['kategori']		= 'kepala';
		$fdata3['id_kelurahan']	= $this->input->post('kelurahan', true);
		$fdata3['id_kecamatan']	= $this->input->post('kecamatan', true);
		$fdata3['latitude']		= $this->input->post('latitude', true);
		$fdata3['longitude']	= $this->input->post('longitude', true);
		$fdata3['created_at']	= date('Y-m-d H:i:s');
		$fdata3['status_data']		= '0';
		$fdata3['pindah_meninggal']	= $this->input->post('pindah_meninggal', true);
		$fdata3['data_ganda']	= $this->input->post('data_ganda', true);
		$fdata3['no_data_ganda']	= $this->input->post('no_data_ganda', true);
		$fdata3['keterangan_lain']	= $this->input->post('keterangan_lain', true);

		$insert = $this->master->save_keluarga($fdata3);

		if($insert) {
			$this->session->set_flashdata('success', 'Tersimpan');
		} else {
			$this->session->set_flashdata('error', 'Gagal');
		}

		redirect('server/warga/add', 'refresh');
		
	}


	public function add_anggota()
	{
		$data = [
			'user' 		=> 'Test',
			'judul'		=> 'Tambah Warga',
			'subjudul'	=> 'Tambah Data Warga',
			//'desa'	=> $this->master->getSamsatById($this->session->userdata('admin_id_samsat')),
			'keterangan'	=> $this->master->getKeterangan(),
			'hubungan'	=> $this->master->getHubungan(),
			'pekerjaan'	=> $this->master->getPekerjaan(),
			'kecamatan'	=> $this->master->getKecamatan(),
			'kelurahan'	=> $this->master->getKelurahan(),
			'nik_head'	=> $this->uri->segment(5),
			'desa'	=> 'admin',
			'linkmenu' => 'input',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('operator/warga/add_anggota');
		$this->load->view('_templates/dashboard/_footer'); 
	}

	public function save_anggota()
	{	

		if ($_FILES['gambar1']['name'] !== ''){

	        $new_name1 = time().$_FILES["gambar1"]['name'];
			$config['upload_path'] 		= './uploads';
	        $config['allowed_types'] 	= 'mp4|3gp|gif|jpg|png|jpeg|pdf';
	        $config['max_size']  		= '20000';
	        $config['max_width']  		= '12024';
	        $config['max_height']  		= '12768';
			$config['file_name'] 	 	= $new_name1;

			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar1');

			$fdata['foto']              = str_replace(" ","_",$new_name1);
	    }
	        
	    if ($_FILES['gambar2']['name'] !== ''){
	        $new_name2 = time().$_FILES["gambar2"]['name'];
			$config2['upload_path'] 		= './uploads';
	        $config2['allowed_types'] 	= 'mp4|3gp|gif|jpg|png|jpeg|pdf';
	        $config2['max_size']  		= '20000';
	        $config2['max_width']  		= '12024';
	        $config2['max_height']  		= '12768';
			$config2['file_name'] 	 	= $new_name2;
			$this->load->library('upload', $config2);
			$this->upload->do_upload('gambar2');

			$fdata3['foto']         = str_replace(" ","_",$new_name2);
	    } 
		
		$fdata['nik']				= $this->input->post('nik', true);
		$fdata['no_kk']				= $this->input->post('nokk', true);
		$fdata['id_user']			= $this->input->post('id_user', true);
		$fdata['nama_lengkap'] 		= $this->input->post('nama_lengkap', true);
		$fdata['jenis_kelamin'] 	= $this->input->post('jk', true);
		$fdata['tempat_lahir']		= $this->input->post('tempat_lahir', true);
		$fdata['tanggal_lahir']		= $this->input->post('tanggal_lahir', true);
		$fdata['agama']				= $this->input->post('agama', true);
		$fdata['pekerjaan']			= $this->input->post('pekerjaan', true);
		$fdata['gol_darah']			= $this->input->post('gol', true);
		$fdata['status_kawin']		= $this->input->post('perkawinan', true);
		$fdata['warga_negara']		= $this->input->post('kewarganegaraan', true);
		$fdata['alamat']			= $this->input->post('alamat', true);
		$fdata['rt']				= $this->input->post('rt_rw', true);
		$fdata['rw']				= $this->input->post('rw', true);
		$fdata['id_desa']			= $this->input->post('kelurahan', true);
		$fdata['id_kecamatan']		= $this->input->post('kecamatan', true);
		$fdata['verifikasi']		= 'Belum Verifikasi';
		$fdata['status_data']		= '0';
		$fdata['created_at']		= date('Y-m-d H:i:s');
		  
		$insert = $this->master->save_pribadi($fdata);

		$fdata2['key_nik']			= $this->input->post('nik', true);
		$fdata2['no_bpjs']			= $this->input->post('nobpjs', true);
		$fdata2['id_jenis'] 		= $this->input->post('jenispeserta', true);
		$fdata2['jenis_peserta'] 	= $this->input->post('kepesertaan', true);
		$fdata2['kelas']			= $this->input->post('kelasbpjs', true);
		$fdata2['id_hubungan']		= $this->input->post('hubungan_keluarga', true);
		$fdata2['keterangan']		= $this->input->post('keterangan', true);
		$fdata2['created_at']		= date('Y-m-d H:i:s');
		$fdata2['status_data']		= '0';

		$insert = $this->master->save_bpjs($fdata2);

		$fdata3['key_nik']		= $this->input->post('nik', true);
		$fdata3['no_kk']		= $this->input->post('nokk', true);
		$fdata3['id_user']		= $this->input->post('id_user', true);
		$fdata3['nik_kepala'] 	= $this->input->post('nik', true);
		$fdata3['nama_kepala'] 	= $this->input->post('nama_lengkap', true);
		$fdata3['kategori']		= 'anggota';
		$fdata3['id_kelurahan']	= $this->input->post('kelurahan', true);
		$fdata3['id_kecamatan']	= $this->input->post('kecamatan', true);
		$fdata3['latitude']		= $this->input->post('latitude', true);
		$fdata3['longitude']	= $this->input->post('longitude', true);
		$fdata3['created_at']	= date('Y-m-d H:i:s');
		$fdata3['status_data']		= '0';
		$fdata3['pindah_meninggal']	= $this->input->post('pindah_meninggal', true);
		$fdata3['data_ganda']	= $this->input->post('data_ganda', true);
		$fdata3['no_data_ganda']	= $this->input->post('no_data_ganda', true);
		$fdata3['keterangan_lain']	= $this->input->post('keterangan_lain', true);

		$insert = $this->master->save_keluarga($fdata3);
		
		if($insert) {
			$this->session->set_flashdata('success', 'Tersimpan');
		} else {
			$this->session->set_flashdata('error', 'Gagal');
		}

		redirect('server/warga/add_anggota/'.$this->input->post('nik_kepala'), 'refresh');
		
	}

	
	public function data()
	{
		if($this->session->userdata('admin_nama') == 'Admin') {
			$this->output_json($this->master->getWargaAdminKK(), false);
		} else {
			$this->output_json($this->master->getWargaKK($this->session->userdata('admin_id')), false);
		}
	}

	public function datalaporan()
	{
		
		$this->output_json($this->master->getWargaAdminLaporanKK(), false);
		
	}

	public function datalaporankec()
	{
		
		$this->output_json($this->master->getWargaAdminLaporanKecamatanKK(), false);
		
	}

	public function datalaporanbpjs()
	{
		
		$this->output_json($this->master->getWargaAdminLaporanBpjsKK(), false);
		
	}

	public function datalaporanbpjsdesa()
	{
		$id = $this->input->post('textbox');
		$this->output_json($this->master->getWargaAdminLaporanBpjsKKDesa($id), false);
		
	}

	public function data_anggota()
	{
		$id = $this->input->post('textbox');
		$this->output_json($this->master->getPribadi($id), false);
	}

	public function edit($id)
	{
		//$level = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 			=> $this->session->userdata('admin_username'),
			'judul'			=> 'Data Warga',
			'subjudul'		=> 'Edit Warga',
			't_pribadi' 	=> $this->master->getPribadiById($id),
			't_bpjs' 		=> $this->master->getBpjsById($id),
			't_keluarga' 	=> $this->master->getKeluargaById($id),
			'keterangan'	=> $this->master->getKeterangan(),
			'hubungan'		=> $this->master->getHubungan(),
			'pekerjaan'		=> $this->master->getPekerjaan(),
			'kecamatan'		=> $this->master->getKecamatan(),
			'kelurahan'		=> $this->master->getKelurahan(),
			'desa'			=> 'admin',
			'linkmenuutama' => 'warga',
			'linkmenu' 		=> 'warga',
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('operator/warga/edit');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function detail($id)
	{
		//$level = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 			=> $this->session->userdata('admin_username'),
			'judul'			=> 'Data Warga',
			'subjudul'		=> 'Detail Warga',
			't_pribadi' 	=> $this->master->getPribadiById($id),
			't_bpjs' 		=> $this->master->getBpjsById($id),
			't_keluarga' 	=> $this->master->getKeluargaById($id),

			't_pribadi2' 	=> $this->master->getPribadiById2($id),
			't_bpjs2' 		=> $this->master->getBpjsById2($id),
			't_keluarga2' 	=> $this->master->getKeluargaById2($id),

			'jmlDataAwal'	=> $this->master->jmlDataAwal($this->uri->segment(4)),
			'jmlDataAkhir'	=> $this->master->jmlDataAkhir($this->uri->segment(4)),

			'keterangan'	=> $this->master->getKeterangan(),
			'hubungan'		=> $this->master->getHubungan(),
			'pekerjaan'		=> $this->master->getPekerjaan(),
			'kecamatan'		=> $this->master->getKecamatan(),
			'kelurahan'		=> $this->master->getKelurahan(),
			'desa'			=> 'admin',
			'linkmenuutama' => 'warga',
			'linkmenu' 		=> 'warga',
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('operator/warga/detail');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function kk($id)
	{
		//$level = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 			=> $this->session->userdata('admin_id_kecamatan'),
			'judul'			=> 'Kelola Data Warga '.getKelurahan($this->session->userdata('admin_id_kelurahan')),
            'subjudul' 		=> 'Aplikasi data Warga',
			'nik' 			=> $id,
            'linkmenuutama' => 'warga',
            'linkmenu' 		=> 'warga',
            
		];

		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('operator/warga/anggota');
		$this->load->view('_templates/dashboard/_footer.php');
	}


	public function edit_save()
	{
	
		//$id = $this->input->post('nik', true);
			
		if ($_FILES['gambar1']['name'] !== ''){

	        $new_name1 = time().$_FILES["gambar1"]['name'];
			$config['upload_path'] 		= './uploads';
	        $config['allowed_types'] 	= 'mp4|3gp|gif|jpg|png|jpeg|pdf';
	        $config['max_size']  		= '20000';
	        $config['max_width']  		= '12024';
	        $config['max_height']  		= '12768';
			$config['file_name'] 	 	= $new_name1;

			$this->load->library('upload', $config);
			$this->upload->do_upload('gambar1');

			$fdata['foto']              = str_replace(" ","_",$new_name1);
	    }
	        
	    if ($_FILES['gambar2']['name'] !== ''){
	        $new_name2 = time().$_FILES["gambar2"]['name'];
			$config2['upload_path'] 		= './uploads';
	        $config2['allowed_types'] 	= 'mp4|3gp|gif|jpg|png|jpeg|pdf';
	        $config2['max_size']  		= '20000';
	        $config2['max_width']  		= '12024';
	        $config2['max_height']  		= '12768';
			$config2['file_name'] 	 	= $new_name2;
			$this->load->library('upload', $config2);
			$this->upload->do_upload('gambar2');

			$fdata3['foto']         = str_replace(" ","_",$new_name2);
	    } 
		
		$fdata['nik']				= $this->input->post('nik', true);
		$fdata['no_kk']				= $this->input->post('nokk', true);
		$fdata['id_user']			= $this->input->post('id_user', true);
		$fdata['nama_lengkap'] 		= $this->input->post('nama_lengkap', true);
		$fdata['jenis_kelamin'] 	= $this->input->post('jk', true);
		$fdata['tempat_lahir']		= $this->input->post('tempat_lahir', true);
		$fdata['tanggal_lahir']		= $this->input->post('tanggal_lahir', true);
		$fdata['agama']				= $this->input->post('agama', true);
		$fdata['pekerjaan']			= $this->input->post('pekerjaan', true);
		$fdata['gol_darah']			= $this->input->post('gol', true);
		$fdata['status_kawin']		= $this->input->post('perkawinan', true);
		$fdata['warga_negara']		= $this->input->post('kewarganegaraan', true);
		$fdata['alamat']			= $this->input->post('alamat', true);
		$fdata['rt']				= $this->input->post('rt_rw', true);
		$fdata['rw']				= $this->input->post('rw', true);
		$fdata['id_desa']			= $this->input->post('kelurahan', true);
		$fdata['id_kecamatan']		= $this->input->post('kecamatan', true);
		$fdata['verifikasi']		= 'Sudah Verifikasi';
		$fdata['status_data']		= '1';
		$fdata['created_at']		= date('Y-m-d H:i:s');
		  
		$insert = $this->master->save_pribadi($fdata);

		$fdata2['key_nik']			= $this->input->post('nik', true);
		$fdata2['no_bpjs']			= $this->input->post('nobpjs', true);
		$fdata2['id_jenis'] 		= $this->input->post('jenispeserta', true);
		$fdata2['jenis_peserta'] 	= $this->input->post('kepesertaan', true);
		$fdata2['kelas']			= $this->input->post('kelasbpjs', true);
		$fdata2['id_hubungan']		= $this->input->post('hubungan_keluarga', true);
		$fdata2['keterangan']		= $this->input->post('keterangan', true);
		$fdata2['created_at']		= date('Y-m-d H:i:s');
		$fdata2['status_data']		= '1';

		$insert = $this->master->save_bpjs($fdata2);

		$fdata3['key_nik']		= $this->input->post('nik', true);
		$fdata3['no_kk']		= $this->input->post('nokk', true);
		$fdata3['id_user']		= $this->input->post('id_user', true);
		$fdata3['nik_kepala'] 	= $this->input->post('nik', true);
		$fdata3['nama_kepala'] 	= $this->input->post('nama_lengkap', true);
		$fdata3['kategori']		= 'anggota';
		$fdata3['id_kelurahan']	= $this->input->post('kelurahan', true);
		$fdata3['id_kecamatan']	= $this->input->post('kecamatan', true);
		$fdata3['latitude']		= $this->input->post('latitude', true);
		$fdata3['longitude']	= $this->input->post('longitude', true);
		$fdata3['created_at']	= date('Y-m-d H:i:s');
		$fdata3['status_data']		= '1';
		$fdata3['pindah_meninggal']	= $this->input->post('pindah_meninggal', true);
		$fdata3['data_ganda']	= $this->input->post('data_ganda', true);
		$fdata3['no_data_ganda']	= $this->input->post('no_data_ganda', true);
		$fdata3['keterangan_lain']	= $this->input->post('keterangan_lain', true);
		
		$insert = $this->master->save_keluarga($fdata3);
		
		if($insert) {
			$this->session->set_flashdata('success', 'Tersimpan');
		} else {
			$this->session->set_flashdata('error', 'Gagal');
		}

		redirect('server/warga/edit/'.$this->input->post('nik'), 'refresh');
	}

	
	public function save_password()
	{
		$id = $this->input->post('id_user', true);

		if($this->input->post('new') ==  $this->input->post('new_confirm')){

			$status = [
				'nama_lengkap'	=> $this->input->post('nama_admin', true),
				'password'		=> md5($this->input->post('new', true)),
			];
			
			$update = $this->master->update('m_admin', $status, 'id', $id);
			$data['status'] = $update ? true : false;

		} 

		$this->output_json($data);
	}
	

	public function delete($id)
	{
		$data['status'] = $this->master->delete('tb_user',$id,'id') ? true : false;
		$this->output_json($data);
		activity_log("Pengguna", "Pengguna Berhasil Dihapus", $id, $this->session->userdata('admin_id_samsat'), 'LEVEL SAMSAT');
	}
}
