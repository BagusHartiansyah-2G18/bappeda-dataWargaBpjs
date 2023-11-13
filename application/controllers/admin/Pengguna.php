<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
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
			'judul'	=> 'Data Pengguna ',
            'subjudul' => 'Samsat Siondel',
            'm_pengguna' => true,
            
		];
		$this->load->view('_templates/dashboard_admin/_header.php', $data);
		$this->load->view('admin/pengguna/list');
		$this->load->view('_templates/dashboard_admin/_footer.php');
	}

	public function add()
	{
		$data = [
			'user' 		=> $this->ion_auth->user()->row(),
			'judul'		=> 'Tambah Pengguna',
			'subjudul'	=> 'Tambah Data Pengguna',
			'samsat'	=> $this->master->getSamsat(),
			'm_pengguna' => true,
		];
		$this->load->view('_templates/dashboard_admin/_header', $data);
		$this->load->view('admin/pengguna/add');
		$this->load->view('_templates/dashboard_admin/_footer');
	}

	public function save()
	{
		$username = $this->input->post('username', true);
		$nohp = $this->input->post('nohp', true);
		$alamat = $this->input->post('alamat', true);
		$password = $this->input->post('new', true);
		$password1 = $this->input->post('new_confirm', true);
		$email = $this->input->post('email', true);
		$samsat = $this->input->post('samsat', true);
		$status = $this->input->post('status', true);
		
		$input = [
			'username'			=> $username,
			'password' 	=> $password,
			'email' 		=> $email,
			'nohp'	=> $nohp,
			'alamat'		=> $alamat,
			'status'		=> $status,
			'id_samsat'		=> $samsat,
			'created_at'		=> date('Y-m-d H:i:s'),
		];
		if ($password==$password1)
		{
				$data = [
					'status'	=> true,
					'msg'	 => 'data Pengguna berhasil dibuat'
				];
				$masuk=$this->master->create('tb_user', $input);
				$data['status'] = $masuk ? true : false;
			
		}else
		{
			$data = [
				'status' => false,
				'msg'	 => 'Password dan Konfirmasi Password Tidak Sama'
			];
			
		}

		
		$this->output_json($data);
		
	}

	
	public function data()
	{
		$this->output_json($this->master->getPengguna(), false);
	}

	

	public function edit($id)
	{
		$level = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 		=> $this->ion_auth->user()->row(),
			'judul'		=> 'Data Pengguna',
			'subjudul'	=> 'Edit Pengguna',
			'users' 	=>  $this->master->getPenggunaById($id),
			'samsat'	=>  $this->master->getSamsat(),
			'm_pengguna' => true,
		];
		$this->load->view('_templates/dashboard_admin/_header.php', $data);
		$this->load->view('admin/pengguna/edit');
		$this->load->view('_templates/dashboard_admin/_footer.php');
	}


	public function edit_info()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('nohp', 'Nomor Handphone', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if($this->form_validation->run()===FALSE){
			$data['status'] = false;
			$data['errors'] = [
				'username' => form_error('username'),
				'nohp' => form_error('nohp'),
				'alamat' => form_error('alamat'),
				'email' => form_error('email'),
			];
		}else{
			$id = $this->input->post('id', true);
			$input = [
				'username' 		=> $this->input->post('username', true),
				'nohp'	=> $this->input->post('nohp', true),
				'alamat'		=> $this->input->post('alamat', true),
				'email'			=> $this->input->post('email', true)
			];
			$update = $this->master->update('tb_user', $input, 'id', $id);
			$data['status'] = $update ? true : false;
		}
		$this->output_json($data);
	}

	public function edit_samsat()
	{
		$this->form_validation->set_rules('samsat', 'Pilih Samsat', 'required');
		
		if($this->form_validation->run()===FALSE){
			$data['status'] = false;
			$data['errors'] = [
				'samsat' => form_error('samsat'),
			];
		}else{
			$id = $this->input->post('id', true);
			$input = [
				'id_samsat' 		=> $this->input->post('samsat', true),
			];
			$update = $this->master->update('tb_user', $input, 'id', $id);
			$data['status'] = $update ? true : false;
		}
		$this->output_json($data);
	}


	public function change_password()
	{
		$this->form_validation->set_rules('old', 'Password Lama', 'required');
		$this->form_validation->set_rules('new', 'Password Baru', 'required');
		$this->form_validation->set_rules('new_confirm', 'Konfirmasi Password', 'required');
		
		if ($this->form_validation->run() === FALSE){
			$data = [
				'status' => false,
				'errors' => [
					'old' => form_error('old'),
					'new' => form_error('new'),
					'new_confirm' => form_error('new_confirm')
				]
			];
		}else{
			$u 		= $this->security->xss_clean($this->input->post('username'));
        	$p 		= $this->security->xss_clean($this->input->post('old'));
		
			$q_cek	= $this->db->query("SELECT * FROM tb_user WHERE username = '".$u."' AND password = '".$p."'");
			$j_cek	= $q_cek->num_rows();
			if($j_cek == 1) 
			{
			$input = [
				'password' 		=> $this->input->post('new', true),
			];
			$update = $this->master->update('tb_user', $input, 'username', $u);
			$data['status'] = $update ? true : false;
			}else
			{
				$data = [
					'status' 	=> false,
					'msg'		=> 'Password dan Konfirmasi Password Tidak Sama'
				];
			}
			
		}
		$this->output_json($data);
	}
	
	

	

	public function delete($id)
	{
		$data['status'] = $this->master->delete('tb_user',$id,'id') ? true : false;
		$this->output_json($data);
	}
}
