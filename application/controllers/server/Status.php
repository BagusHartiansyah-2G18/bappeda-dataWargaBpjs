<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller {

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
			'user' 			=> $this->session->userdata('admin_id_kecamatan'),
			'judul'			=> 'Kelola Data status ',
            'subjudul' 		=> 'Aplikasi data Status',
            'linkmenuutama' => 'master',
            'linkmenu' 		=> 'status',
            
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/status/list');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function add()
	{
		$data = [
			'user' 		=> 'Test',
			'judul'		=> 'Tambah Status',
			'subjudul'	=> 'Tambah Data Status',

			'linkmenuutama' => 'master',
            'linkmenu' 		=> 'pekerjaan',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/status/add');
		$this->load->view('_templates/dashboard/_footer'); 
	}

	public function edit($id)
	{
		//$status = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 		=> $this->session->userdata('admin_username'),
			'judul'		=> 'Data Status',
			'subjudul'	=> 'Edit Status',
			'dstatus' 	=>  $this->master->getStatusById($id),
			'linkmenuutama' => 'master',
            'linkmenu' 		=> 'status',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/status/edit');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function data()
	{
		$this->output_json($this->master->getStatus(), false);
	}

	public function save()
	{	
		$status = [
			'nama_status'		=> $this->input->post('nama_status', true),
			'status_status'		=> $this->input->post('status', true),
			'created'			=> date('Y-m-d H:i:s'),
		];
		
		$data = [
			'status'	=> true,
			'msg'	 => 'Data status berhasil ditambahkan'
		];
		$masuk=$this->master->create('m_status', $status);
		$data['status'] = $masuk ? true : false;
		$this->output_json($data);
		
	}

	public function update()
	{
		$id = $this->input->post('id_status', true);
		
		$status = [
			'nama_status'		=> $this->input->post('nama_status', true),
			'status_status'		=> $this->input->post('status', true),
		];
		
		$update = $this->master->update('m_status', $status, 'id_status', $id);

		$data['status'] = $update ? true : false;

		$this->output_json($data);
	}

	public function delete($id)
	{
		$data['status'] = $this->master->delete('m_status',$id,'id_status') ? true : false;
		$this->output_json($data);
		activity_log("status", "status Berhasil Dihapus", $id, $this->session->userdata('admin_id_samsat'),'status SAMSAT');
	}

}

/* End of file Status.php */
/* Location: ./application/controllers/server/Status.php */