<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends CI_Controller {

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
			'judul'	=> 'Kelola Data desa ',
            'subjudul' => 'Aplikasi data desa',
            'linkmenuutama' => 'master',
            'linkmenu' 		=> 'desa',
            
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/desa/list');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function add()
	{
		$data = [
			'user' 		=> 'Test',
			'judul'		=> 'Tambah desa',
			'subjudul'	=> 'Tambah Data desa',
			'kecamatan'	=> $this->master->getKecamatan(),

			'linkmenuutama' => 'master',
            'linkmenu' 		=> 'desa',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/desa/add');
		$this->load->view('_templates/dashboard/_footer'); 
	}

	public function edit($id)
	{
		//$desa = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 		=> $this->session->userdata('admin_username'),
			'judul'		=> 'Data desa',
			'subjudul'	=> 'Edit desa',
			'ddesa' 	=>  $this->master->getDesaById($id)->row_array(),
			'kecamatan'	=> $this->master->getKecamatan(),

			'linkmenuutama' => 'master',
            'linkmenu' 		=> 'desa',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/desa/edit');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function data()
	{
		$this->output_json($this->master->getDesa(), false);
	}

	public function save()
	{	
		$desa = [
			'nama_desa'			=> $this->input->post('nama_desa', true),
			'id_kecamatan'		=> $this->input->post('kecamatan', true),
			'created_at'			=> date('Y-m-d H:i:s'),
		];
		
		$data = [
			'status'	=> true,
			'msg'	 => 'Data desa berhasil ditambahkan'
		];
		$masuk=$this->master->create('m_desa', $desa);
		$data['status'] = $masuk ? true : false;
		$this->output_json($data);
		
	}

	public function update()
	{
		$id = $this->input->post('id_desa', true);
		
		$desa = [
			'nama_desa'			=> $this->input->post('nama_desa', true),
			'id_kecamatan'		=> $this->input->post('kecamatan', true),
			'update_at'		=> date('Y-m-d H:i:s'),
		];
		
		$update = $this->master->update('m_desa', $desa, 'id_desa', $id);

		$data['status'] = $update ? true : false;

		$this->output_json($data);
	}

	public function delete($id)
	{
		$data['status'] = $this->master->delete('m_desa',$id,'id_desa') ? true : false;
		$this->output_json($data);
		activity_log("desa", "desa Berhasil Dihapus", $id, $this->session->userdata('admin_id_samsat'),'desa SAMSAT');
	}

}

/* End of file Desa.php */
/* Location: ./application/controllers/server/Desa.php */