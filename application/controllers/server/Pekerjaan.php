<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Controller {

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
			'judul'	=> 'Kelola Data pekerjaan ',
            'subjudul' => 'Aplikasi data pekerjaan',
            'linkmenuutama' => 'master',
            'linkmenu' 		=> 'pekerjaan',
            
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/pekerjaan/list');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function add()
	{
		$data = [
			'user' 		=> 'Test',
			'judul'		=> 'Tambah Pekerjaan',
			'subjudul'	=> 'Tambah Data Pekerjaan',

			'linkmenuutama' => 'master',
            'linkmenu' 		=> 'pekerjaan',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/pekerjaan/add');
		$this->load->view('_templates/dashboard/_footer'); 
	}

	public function edit($id)
	{
		//$pekerjaan = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 		=> $this->session->userdata('admin_username'),
			'judul'		=> 'Data Pekerjaan',
			'subjudul'	=> 'Edit Pekerjaan',
			'dpekerjaan' 	=>  $this->master->getPekerjaanById($id),
			'linkmenuutama' => 'master',
            'linkmenu' 		=> 'pekerjaan',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/pekerjaan/edit');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function data()
	{
		$this->output_json($this->master->getPekerjaanAll(), false);
	}

	public function save()
	{	
		$pekerjaan = [
			'nama_jenis'		=> $this->input->post('nama_pekerjaan', true),
			'created_at'		=> date('Y-m-d H:i:s'),
		];
		
		$data = [
			'status'	=> true,
			'msg'	 => 'Data pekerjaan berhasil ditambahkan'
		];
		$masuk=$this->master->create('m_jenis_peserta', $pekerjaan);
		$data['status'] = $masuk ? true : false;
		$this->output_json($data);
		
	}

	public function update()
	{
		$id = $this->input->post('id_pekerjaan', true);
		
		$pekerjaan = [
			'nama_jenis'		=> $this->input->post('nama_pekerjaan', true),
			'updated_at'		=> date('Y-m-d H:i:s'),
		];
		
		$update = $this->master->update('m_jenis_peserta', $pekerjaan, 'id', $id);

		$data['status'] = $update ? true : false;

		$this->output_json($data);
	}

	public function delete($id)
	{
		$data['status'] = $this->master->delete('m_jenis_peserta',$id,'id') ? true : false;
		$this->output_json($data);
		activity_log("pekerjaan", "pekerjaan Berhasil Dihapus", $id,$this->session->userdata('admin_id_samsat'), 'pekerjaan SAMSAT');
	}

}

/* End of file Pekerjaan.php */
/* Location: ./application/controllers/server/Pekerjaan.php */