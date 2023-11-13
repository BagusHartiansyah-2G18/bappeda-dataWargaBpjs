<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuota extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('login');
		} else if (!$this->ion_auth->in_group('Admin')) {
			show_error('Hanya Administrator yang diberi hak untuk mengakses halaman ini, <a href="' . base_url('dashboard') . '">Kembali ke menu awal</a>', 403, 'Akses Terlarang');
		}
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
			'user' => $this->ion_auth->user()->row(),
			'judul'	=> 'Data Kuota ',
            'subjudul' => 'Samsat Siondel',
            'm_kuota' => true,
            
		];
		$this->load->view('_templates/dashboard_admin/_header.php', $data);
		$this->load->view('admin/kuota/list');
		$this->load->view('_templates/dashboard_admin/_footer.php');
	}

	public function add()
	{
		$data = [
			'user' 		=> $this->ion_auth->user()->row(),
			'judul'		=> 'Tambah Samsat',
			'subjudul'	=> 'Tambah Data Samsat',
			'm_samsat' => true,
		];
		$this->load->view('_templates/dashboard_admin/_header', $data);
		$this->load->view('admin/samsat/add');
		$this->load->view('_templates/dashboard_admin/_footer');
	}

	public function save()
	{
		$nama = $this->input->post('nama', true);
		$address = $this->input->post('address', true);
		$latitude = $this->input->post('latitude', true);
		$longitude = $this->input->post('longitude', true);
		
		$input = [
			'nama'			=> $nama,
			'address' 	=> $address,
			'latitude' 		=> $latitude,
			'longitude'	=> $longitude,
			'created_at'		=> date('Y-m-d H:i:s'),
		];
		
				$data = [
					'status'	=> true,
					'msg'	 => 'Data samsat berhasil dibuat'
				];
				$this->master->create('tb_samsat', $input);
			

		
		$this->output_json($data);
	}

	
	public function data()
	{
		$this->output_json($this->master->getListKuota(), false);
	}

	

	public function edit($id)
	{
		$data = [
			'user' 		=> $this->ion_auth->user()->row(),
			'judul'		=> 'Data Samsat',
			'subjudul'	=> 'Edit Samsat',
			'users' 	=>  $this->master->getSamsatById($id),
			'm_samsat' => true,
		];
		$this->load->view('_templates/dashboard_admin/_header.php', $data);
		$this->load->view('admin/samsat/edit');
		$this->load->view('_templates/dashboard_admin/_footer.php');
	}


	public function edit_info()
	{
		$this->form_validation->set_rules('nama', 'Nama ', 'required');
		$this->form_validation->set_rules('address', 'Alamat', 'required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'required');
		
		if($this->form_validation->run()===FALSE){
			$data['status'] = false;
			$data['errors'] = [
				'nama' => form_error('nama'),
				'address' => form_error('address'),
				'latitude' => form_error('latitude'),
				'longitude' => form_error('longitude'),
			];
		}else{
			$id = $this->input->post('id', true);
			$input = [
				'nama' 		=> $this->input->post('nama', true),
				'address'	=> $this->input->post('address', true),
				'latitude'		=> $this->input->post('latitude', true),
				'longitude'			=> $this->input->post('longitude', true)
			];
			$update = $this->master->update('tb_samsat', $input, 'id', $id);
			$data['status'] = $update ? true : false;
		}
		$this->output_json($data);
	}

	

	public function delete($id)
	{
		$data['status'] = $this->master->delete('tb_samsat',$id,'id') ? true : false;
		$this->output_json($data);
	}

	
}
