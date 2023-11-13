<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
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
			'judul'	=> 'Kelola Data Warga '.getKelurahan($this->session->userdata('admin_id_kelurahan')),
            'subjudul' => 'Aplikasi data Warga',
            'm_warga' => true,
            
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('operator/warga/list');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function add()
	{
		$data = [
			'user' 		=> 'Test',
			'judul'		=> 'Tambah Warga',
			'subjudul'	=> 'Tambah Data Warga',
			//'desa'	=> $this->master->getSamsatById($this->session->userdata('admin_id_samsat')),
			'hubungan'	=> $this->master->getHubungan(),
			'pekerjaan'	=> $this->master->getPekerjaan(),
			'kecamatan'	=> $this->master->getKecamatan(),
			'kelurahan'	=> $this->master->getKelurahan(),
			'desa'	=> 'admin',
			'm_input' => true,
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('operator/warga/add');
		$this->load->view('_templates/dashboard/_footer'); 
	}

	public function save()
	{	
		$pribadi = [
			'nik'			=> $this->input->post('nik', true),
			'id_user'			=> $this->session->userdata('admin_id'),
			'nama_lengkap' 	=> $this->input->post('nama_lengkap', true),
			'jenis_kelamin' 		=> $this->input->post('jk', true),
			'tempat_lahir'	=> $this->input->post('tempat_lahir', true),
			'tanggal_lahir'		=> $this->input->post('tanggal_lahir', true),
			'agama'		=> $this->input->post('agama', true),
			'pekerjaan'		=> $this->input->post('pekerjaan', true),
			'gol_darah'		=> $this->input->post('gol', true),
			'status_kawin'		=> $this->input->post('perkawinan', true),
			'warga_negara'		=> $this->input->post('kewarganegaraan', true),
			'alamat'		=> $this->input->post('alamat', true),
			'rt'		=> $this->input->post('rt_rw', true),
			'rw'		=> $this->input->post('rw', true),
			'id_desa'		=> $this->input->post('kelurahan', true),
			'id_kecamatan'		=> $this->input->post('kecamatan', true),
			'verifikasi'		=> $this->input->post('verifikasi', true),
			'created_at'		=> date('Y-m-d H:i:s'),
		];

		$bpjs = [
			'key_nik'			=> $this->input->post('nik', true),
			'no_bpjs'			=> $this->input->post('nobpjs', true),
			'id_jenis' 	=> $this->input->post('jenispeserta', true),
			'jenis_peserta' 		=> $this->input->post('kepesertaan', true),
			'kelas'	=> $this->input->post('kelasbpjs', true),
			'id_hubungan'		=> $this->input->post('hubungan_keluarga', true),
			'keterangan'		=> $this->input->post('keterangan', true),
			'created_at'		=> date('Y-m-d H:i:s'),
		];

		$keluarga = [
			'key_nik'			=> $this->input->post('nik', true),
			'no_kk'			=> $this->input->post('nokk', true),
			'nik_kepala' 	=> $this->input->post('nik_kepala', true),
			'nama_kepala' 		=> $this->input->post('nama_kepala', true),
			'latitude'		=> $this->input->post('latitude', true),
			'longitude'		=> $this->input->post('longitude', true),
			'created_at'		=> date('Y-m-d H:i:s'),
		];
		
				$data = [
					'status'	=> true,
					'msg'	 => 'Data Warga berhasil dibuat'
				];
				$masuk=$this->master->create('t_pribadi', $pribadi);
				$masuk_bpjs=$this->master->create('t_bpjs', $bpjs);
				$masuk_keluarga=$this->master->create('t_keluarga', $keluarga);
				$data['status'] = $masuk ? true : false;
		$this->output_json($data);
		
	}


	public function add_anggota()
	{
		$data = [
			'user' 		=> 'Test',
			'judul'		=> 'Tambah Warga',
			'subjudul'	=> 'Tambah Data Warga',
			//'desa'	=> $this->master->getSamsatById($this->session->userdata('admin_id_samsat')),
			'hubungan'	=> $this->master->getHubungan(),
			'pekerjaan'	=> $this->master->getPekerjaan(),
			'kecamatan'	=> $this->master->getKecamatan(),
			'kelurahan'	=> $this->master->getKelurahan(),
			'nik_head'	=> $this->uri->segment(5),
			'desa'	=> 'admin',
			'm_input' => true,
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('operator/warga/add_anggota');
		$this->load->view('_templates/dashboard/_footer'); 
	}

	public function save_anggota()
	{	
		$pribadi = [
			'nik'			=> $this->input->post('nik', true),
			'id_user'			=> $this->session->userdata('admin_id'),
			'nama_lengkap' 	=> $this->input->post('nama_lengkap', true),
			'jenis_kelamin' 		=> $this->input->post('jk', true),
			'tempat_lahir'	=> $this->input->post('tempat_lahir', true),
			'tanggal_lahir'		=> $this->input->post('tanggal_lahir', true),
			'agama'		=> $this->input->post('agama', true),
			'pekerjaan'		=> $this->input->post('pekerjaan', true),
			'gol_darah'		=> $this->input->post('gol', true),
			'status_kawin'		=> $this->input->post('perkawinan', true),
			'warga_negara'		=> $this->input->post('kewarganegaraan', true),
			'alamat'		=> $this->input->post('alamat', true),
			'rt'		=> $this->input->post('rt_rw', true),
			'rw'		=> $this->input->post('rw', true),
			'id_desa'		=> $this->input->post('kelurahan', true),
			'id_kecamatan'		=> $this->input->post('kecamatan', true),
			'verifikasi'		=> $this->input->post('verifikasi', true),
			'created_at'		=> date('Y-m-d H:i:s'),
		];

		$bpjs = [
			'key_nik'			=> $this->input->post('nik', true),
			'no_bpjs'			=> $this->input->post('nobpjs', true),
			'id_jenis' 	=> $this->input->post('jenispeserta', true),
			'jenis_peserta' 		=> $this->input->post('kepesertaan', true),
			'kelas'	=> $this->input->post('kelasbpjs', true),
			'id_hubungan'		=> $this->input->post('hubungan_keluarga', true),
			'keterangan'		=> $this->input->post('keterangan', true),
			'created_at'		=> date('Y-m-d H:i:s'),
		];

		$keluarga = [
			'key_nik'			=> $this->input->post('nik', true),
			'no_kk'			=> $this->input->post('nokk', true),
			'nik_kepala' 	=> $this->input->post('nik_kepala', true),
			'nama_kepala' 		=> $this->input->post('nama_kepala', true),
			'latitude'		=> $this->input->post('latitude', true),
			'longitude'		=> $this->input->post('longitude', true),
			'created_at'		=> date('Y-m-d H:i:s'),
		];
		
				$data = [
					'status'	=> true,
					'msg'	 => 'Data Warga berhasil dibuat'
				];
				$masuk=$this->master->create('t_pribadi', $pribadi);
				$masuk_bpjs=$this->master->create('t_bpjs', $bpjs);
				$masuk_keluarga=$this->master->create('t_keluarga', $keluarga);
				$data['status'] = $masuk ? true : false;
		$this->output_json($data);
		
	}

	
	public function data()
	{
		$this->output_json($this->master->getWargaKK($this->session->userdata('admin_id')), false);
	}

	public function data_anggota()
	{
		$this->output_json($this->master->getPribadi($this->uri->segment(4)), false);
	}

	

	

	public function edit($id)
	{
		//$level = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 		=> $this->session->userdata('admin_username'),
			'judul'		=> 'Data Warga',
			'subjudul'	=> 'Edit Warga',
			't_pribadi' 	=>  $this->master->getPribadiById($id),
			't_bpjs' 	=>  $this->master->getBpjsById($id),
			't_keluarga' 	=>  $this->master->getKeluargaById($id),
			'hubungan'	=> $this->master->getHubungan(),
			'pekerjaan'	=> $this->master->getPekerjaan(),
			'kecamatan'	=> $this->master->getKecamatan(),
			'kelurahan'	=> $this->master->getKelurahan(),
			'desa'	=> 'admin',
			'm_warga' => true,
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('operator/warga/edit');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function kk($id)
	{
		//$level = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' => $this->session->userdata('admin_id_kecamatan'),
			'judul'	=> 'Kelola Data Warga '.getKelurahan($this->session->userdata('admin_id_kelurahan')),
            'subjudul' => 'Aplikasi data Warga',
			'nik'=>$id,
            'm_warga' => true,
            
		];

		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('operator/warga/anggota');
		$this->load->view('_templates/dashboard/_footer.php');
	}


	public function edit_save()
	{
	
		/* $this->form_validation->set_rules('id', 'Id', 'required');
		$this->form_validation->set_rules('nik', 'NIK');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
		$this->form_validation->set_rules('gol', 'Golongan Darah', 'required');
		$this->form_validation->set_rules('perkawinan', 'Status Kawin', 'required');
		$this->form_validation->set_rules('kewarganegaraan', 'Warga Negara', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('rt_rw', 'RT', 'required');
		$this->form_validation->set_rules('kelurahan', 'Desa', 'required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		$this->form_validation->set_rules('verifikasi', 'Verifikasi', 'required');

		$this->form_validation->set_rules('no_bpjs', 'Nomor BPJS', 'required');
		$this->form_validation->set_rules('jenispeserta', 'Jenis Peserta', 'required');
		$this->form_validation->set_rules('kepesertaan', 'Kepesertaan', 'required');
	
		$this->form_validation->set_rules('kelasbpjs', 'Kelas BPJS', 'required');
		$this->form_validation->set_rules('hubungan_keluarga', 'Hubungan Keluarga', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		$this->form_validation->set_rules('no_kk', 'Nomor Kartu Keluarga', 'required');
		$this->form_validation->set_rules('nik_kepala', 'NIK Kepala Keluarga', 'required');
		$this->form_validation->set_rules('nama_kepala', 'Nama Kepala Keluarga', 'required');
		$this->form_validation->set_rules('latitude', 'Koordinat Latitude', 'required');
		$this->form_validation->set_rules('longitude', 'Koordinat Longitude', 'required');
	
		 */
		/* if($this->form_validation->run()===FALSE){
			$data['status'] = false;
			$data['errors'] = [
				'nik' => form_error('nik'), */
				/* 'nama_lengkap' => form_error('nama_lengkap'),
				'jenis_kelamin' => form_error('jenis_kelamin'),
				'tempat_lahir' => form_error('tempat_lahir'),
				'tanggal_lahir' => form_error('tanggal_lahir'),
				'agama' => form_error('agama'),
				'pekerjaan' => form_error('pekerjaan'),
				'gol_darah' => form_error('gol_darah'),
				'status_kawin' => form_error('status_kawin'),
				'warga_negara' => form_error('warga_negara'),
				'alamat' => form_error('alamat'),
				'rt' => form_error('rt'),
				'id_desa' => form_error('id_desa'),
				'id_kecamatan' => form_error('id_kecamatan'),
				'verifikasi' => form_error('verifikasi'),
				'no_bpjs' => form_error('nobpjs'),
				'jenispeserta' => form_error('jenispeserta'),
				'kepesertaan' => form_error('kepesertaan'),
				'kelasbpjs' => form_error('kelasbpjs'),
				'hubungan_keluarga' => form_error('hubungan_keluarga'),
				'keterangan' => form_error('keterangan'),
				'nokk' => form_error('nokk'),
				'nik_kepala' => form_error('nik_kepala'),
				'nama_kepala' => form_error('nama_kepala'),
				'latitude' => form_error('latitude'),
				'longitude' => form_error('longitude'), */
		/* 	];
		}else{ */
			$id = $this->input->post('id', true);
			
			$pribadi = [
				'nik'			=> $this->input->post('nik', true),
				'id_user'			=> $this->session->userdata('admin_id'),
				'nama_lengkap' 	=> $this->input->post('nama_lengkap', true),
				'jenis_kelamin' 		=> $this->input->post('jk', true),
				'tempat_lahir'	=> $this->input->post('tempat_lahir', true),
				'tanggal_lahir'		=> $this->input->post('tanggal_lahir', true),
				'agama'		=> $this->input->post('agama', true),
				'pekerjaan'		=> $this->input->post('pekerjaan', true),
				'gol_darah'		=> $this->input->post('gol', true),
				'status_kawin'		=> $this->input->post('perkawinan', true),
				'warga_negara'		=> $this->input->post('kewarganegaraan', true),
				'alamat'		=> $this->input->post('alamat', true),
				'rt'		=> $this->input->post('rt_rw', true),
				'rw'		=> $this->input->post('rw', true),
				'id_desa'		=> $this->input->post('kelurahan', true),
				'id_kecamatan'		=> $this->input->post('kecamatan', true),
				'verifikasi'		=> $this->input->post('verifikasi', true),
				'updated_at'		=> date('Y-m-d H:i:s'),
			];
	
			$bpjs = [
				'key_nik'			=> $this->input->post('nik', true),
				'no_bpjs'			=> $this->input->post('nobpjs', true),
				'id_jenis' 	=> $this->input->post('jenispeserta', true),
				'jenis_peserta' 		=> $this->input->post('kepesertaan', true),
				'kelas'	=> $this->input->post('kelasbpjs', true),
				'id_hubungan'		=> $this->input->post('hubungan_keluarga', true),
				'keterangan'		=> $this->input->post('keterangan', true),
				'updated_at'		=> date('Y-m-d H:i:s'),
			];
	
			$keluarga = [
				'key_nik'			=> $this->input->post('nik', true),
				'no_kk'			=> $this->input->post('nokk', true),
				'nik_kepala' 	=> $this->input->post('nik_kepala', true),
				'nama_kepala' 		=> $this->input->post('nama_kepala', true),
				'latitude'		=> $this->input->post('latitude', true),
				'longitude'		=> $this->input->post('longitude', true),
				'updated_at'		=> date('Y-m-d H:i:s'),
			];
			$update = $this->master->update('t_pribadi', $pribadi, 'id', $id);
			$update_bpjs = $this->master->update('t_bpjs', $bpjs, 'key_nik', $this->input->post('nik', true));
			$update_keluarga = $this->master->update('t_keluarga', $keluarga, 'key_nik', $this->input->post('nik', true));

			$data['status'] = $update ? true : false;

		
		$this->output_json($data);
	}

	
	
	

	

	public function delete($id)
	{
		$data['status'] = $this->master->delete('tb_user',$id,'id') ? true : false;
		$this->output_json($data);
		activity_log("Pengguna", "Pengguna Berhasil Dihapus", $id, $this->session->userdata('admin_id_samsat'), 'LEVEL SAMSAT');
	}
}
