<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {

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
			'judul'	=> 'Kelola Data kecamatan ',
            'subjudul' => 'Aplikasi data kecamatan',
            'linkmenuutama' => 'master',
            'linkmenu' 		=> 'kecamatan',
            
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/kecamatan/list');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function add()
	{
		$data = [
			'user' 		=> 'Test',
			'judul'		=> 'Tambah kecamatan',
			'subjudul'	=> 'Tambah Data kecamatan',

			'linkmenuutama' => 'master',
            'linkmenu' 		=> 'kecamatan',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/kecamatan/add');
		$this->load->view('_templates/dashboard/_footer'); 
	}

	public function edit($id)
	{
		//$kecamatan = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 		=> $this->session->userdata('admin_username'),
			'judul'		=> 'Data kecamatan',
			'subjudul'	=> 'Edit kecamatan',
			'dkecamatan' 	=>  $this->master->getKecamatanById($id)->row_array(),

			'linkmenuutama' => 'master',
            'linkmenu' 		=> 'kecamatan',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/master_data/kecamatan/edit');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function data()
	{
		$this->output_json($this->master->getKecamatanAll(), false);
	}

	public function save()
	{	
		$kecamatan = [
			'nama_kecamatan'		=> $this->input->post('nama_kecamatan', true),
			'keterangan'			=> $this->input->post('keterangan', true),
			'created_at'			=> date('Y-m-d H:i:s'),
		];
		
		$data = [
			'status'	=> true,
			'msg'	 => 'Data kecamatan berhasil ditambahkan'
		];
		$masuk=$this->master->create('m_kecamatan', $kecamatan);
		$data['status'] = $masuk ? true : false;
		$this->output_json($data);
		
	}

	public function update()
	{
		$id = $this->input->post('id_kecamatan', true);
		
		$kecamatan = [
			'nama_kecamatan'	=> $this->input->post('nama_kecamatan', true),
			'keterangan'		=> $this->input->post('keterangan', true),
			'updated_at'		=> date('Y-m-d H:i:s'),
		];
		
		$update = $this->master->update('m_kecamatan', $kecamatan, 'id_kecamatan', $id);

		$data['status'] = $update ? true : false;

		$this->output_json($data);
	}

	public function delete($id)
	{
		$data['status'] = $this->master->delete('m_kecamatan',$id,'id_kecamatan') ? true : false;
		$this->output_json($data);
		activity_log("kecamatan", "kecamatan Berhasil Dihapus", $id,$this->session->userdata('admin_id_samsat'), 'kecamatan SAMSAT');
	}

}

/* End of file kecamatan.php */
/* Location: ./application/controllers/server/kecamatan.php */