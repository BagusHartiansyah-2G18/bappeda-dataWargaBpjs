<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller {

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
			'judul'	=> 'Kelola Data Level ',
            'subjudul' => 'Aplikasi data Level',
            'linkmenuutama' => 'master',
            'linkmenu' 		=> 'level',
            
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/level/list');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function add()
	{
		$data = [
			'user' 		=> 'Test',
			'judul'		=> 'Tambah Level',
			'subjudul'	=> 'Tambah Data Level',

			'linkmenuutama' => 'master',
            'linkmenu' 		=> 'level',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/level/add');
		$this->load->view('_templates/dashboard/_footer'); 
	}

	public function edit($id)
	{
		//$level = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 		=> $this->session->userdata('admin_username'),
			'judul'		=> 'Data Warga',
			'subjudul'	=> 'Edit Warga',
			'dlevel' 	=>  $this->master->getLevelById($id),
			'linkmenuutama' => 'master',
            'linkmenu' 		=> 'level',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/level/edit');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function data()
	{
		$this->output_json($this->master->getLevel(), false);
	}

	public function save()
	{	
		// return print_r($this->input->post);
		$level = [
			'nama_level'		=> $this->input->post('nama_level', true),
			'status_level'		=> $this->input->post('status', true),
			'created'			=> date('Y-m-d H:i:s'),
		];
		
		$data = [
			'status'	=> true,
			'msg'	 => 'Data Level berhasil ditambahkan'
		];
		$masuk=$this->master->create('m_level', $level);
		$data['status'] = $masuk ? true : false;
		$this->output_json($data);
		
	}

	public function update()
	{
		$id = $this->input->post('id_level', true);
		
		$level = [
			'nama_level'		=> $this->input->post('nama_level', true),
			'status_level'		=> $this->input->post('status', true),
		];
		
		$update = $this->master->update('m_level', $level, 'id_level', $id);

		$data['status'] = $update ? true : false;

		$this->output_json($data);
	}

	public function delete($id)
	{
		// return print_r($id);
		$data['status'] = $this->master->delete('m_level',$id,'id_level') ? true : false;
		$this->output_json($data);
		activity_log("Level", "Level Berhasil Dihapus", $id, $this->session->userdata('admin_id_samsat'),'LEVEL SAMSAT');
	}
}

/* End of file Level.php */
/* Location: ./application/controllers/Level.php */