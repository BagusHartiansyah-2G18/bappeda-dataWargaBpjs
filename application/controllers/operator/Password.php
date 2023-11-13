<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
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
			'user' => 'Admin',
			'judul'	=> 'Ubah Password '.$this->session->userdata('admin_id'),
			'subjudul' => 'Aplikasi Data Warga',
			'users' 	=>  'admin',
            'm_ubah_password' => true,
            
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('operator/warga/edit_password');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	
}
