<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Histori extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
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
			'user' => getSamsat($this->session->userdata('admin_id_samsat')),
			'judul'	=> 'Histori Aktifitas '.getSamsat($this->session->userdata('admin_id_samsat')),
            'subjudul' => 'Samsat Siondel',
            'm_histori' => true,
            
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('operator/histori/list');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function data()
	{
		$this->output_json($this->master->getHistori($this->session->userdata('admin_id_samsat')), false);
	}
}
