<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
			'judul'	=> 'Kelola Data Admin ',
            'subjudul' => 'Aplikasi data Warga',
            'linkmenuutama' => 'master',
            'linkmenu' 		=> 'admin',
            
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/admin/list');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function add()
	{
		$data = [
			'user' 		=> 'Test',
			'judul'		=> 'Tambah Admin',
			'subjudul'	=> 'Tambah Data Admin',

			'm_master' 	=> true,
			'm_admin' 	=> true,
			'kecamatan'	=> $this->master->getKecamatan(),
			'kelurahan'	=> $this->master->getKelurahan(),
			'level'   	=> $this->master->getLevelAdd(),

			'linkmenuutama' => 'master',
            'linkmenu' 		=> 'admin',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/admin/add');
		$this->load->view('_templates/dashboard/_footer'); 
	}

	public function edit($id)
	{
		//$level = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 		=> $this->session->userdata('admin_username'),
			'judul'		=> 'Data Admin',
			'subjudul'	=> 'Edit Admin',

			'dadmin' 		=> $this->master->getAdminById($id)->row_array(),
			'dadminpusat' 	=> $this->master->getAdminPusatById($id)->row_array(),
			'kecamatan'		=> $this->master->getKecamatan(),
			'kelurahan'		=> $this->master->getKelurahan(),
			'level'   		=> $this->master->getLevelAdd(),

			'linkmenuutama' => 'master',
            'linkmenu' 		=> 'admin',
		];

		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/admin/edit');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function data()
	{
		$this->output_json($this->master->getPengguna(), false);
	}

	public function save()
	{	
		$admin = [
			'nama_lengkap'		=> $this->input->post('nama_lengkap', true),
			'username'			=> $this->input->post('username', true),
			'password'			=> md5($this->input->post('password', true)),
			'email'				=> $this->input->post('email', true),
			'id_kelurahan'		=> $this->input->post('kelurahan', true),
			'id_kecamatan'		=> $this->input->post('kecamatan', true),
			'status'			=> $this->input->post('status', true),
			'level'				=> $this->input->post('level', true),
			'created_at'		=> date('Y-m-d H:i:s'),
		];
		
		$data = [
			'status'	=> true,
			'msg'	 => 'Data User berhasil ditambahkan'
		];
		$masuk=$this->master->create('m_admin', $admin);
		$data['status'] = $masuk ? true : false;
		$this->output_json($data);
		
	}

	public function update()
	{
		$id = $this->input->post('id', true);
		
		if($this->input->post('password') == '') {
			$admin = [
				'nama_lengkap'		=> $this->input->post('nama_lengkap', true),
				'username'			=> $this->input->post('username', true),
				'email'				=> $this->input->post('email', true),
				'id_kelurahan'		=> $this->input->post('kelurahan', true),
				'id_kecamatan'		=> $this->input->post('kecamatan', true),
				'status'			=> $this->input->post('status', true),
				'level'				=> $this->input->post('level', true),
				'updated_at'		=> date('Y-m-d H:i:s'),
			];
		} else {
			$admin = [
				'nama_lengkap'		=> $this->input->post('nama_lengkap', true),
				'username'			=> $this->input->post('username', true),
				'password'			=> md5($this->input->post('password', true)),
				'email'				=> $this->input->post('email', true),
				'id_kelurahan'		=> $this->input->post('kelurahan', true),
				'id_kecamatan'		=> $this->input->post('kecamatan', true),
				'status'			=> $this->input->post('status', true),
				'level'				=> $this->input->post('level', true),
				'updated_at'		=> date('Y-m-d H:i:s'),
			];
		}
		
		$update = $this->master->update('m_admin', $admin, 'id', $id);

		$data['status'] = $update ? true : false;

		$this->output_json($data);
	}

	public function delete($id)
	{

		$data['status'] = $this->master->delete('m_admin',$id,'id') ? true : false;
		$this->output_json($data);
		activity_log("Level", "Level Berhasil Dihapus", $id, 'LEVEL SAMSAT');
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */