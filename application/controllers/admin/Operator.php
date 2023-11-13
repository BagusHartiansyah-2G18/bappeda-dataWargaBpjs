<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operator extends CI_Controller
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
			'judul'	=> 'Data Operator ',
            'subjudul' => 'Data Operator',
            'm_operator' => true,
            
		];
		$this->load->view('_templates/dashboard_admin/_header.php', $data);
		$this->load->view('admin/operator/list');
		$this->load->view('_templates/dashboard_admin/_footer.php');
	}

	public function add()
	{
		$data = [
			'user' 		=> $this->ion_auth->user()->row(),
			'judul'		=> 'Tambah Operator',
			'subjudul'	=> 'Tambah Data Operator',
			'groups'	=> $this->ion_auth->groups()->result(),
		];
		$this->load->view('_templates/dashboard_admin/_header', $data);
		$this->load->view('admin/operator/add');
		$this->load->view('_templates/dashboard_admin/_footer');
	}

	public function save()
	{
		$username = $this->input->post('username', true);
		$password = $this->input->post('new', true);
		$password1 = $this->input->post('new_confirm', true);
		$email = $this->input->post('email', true);
		$additional_data = [
			'first_name'	=> $this->input->post('first_name', true),
			'last_name'		=> $this->input->post('last_name', true)
		];
		$group = array('2'); // Sets user to dosen.
		$input = [
			'username'			=> $username,
			'password' 	=> $password,
			'email' 		=> $email,
			'first_name'	=> $this->input->post('first_name', true),
			'last_name'		=> $this->input->post('last_name', true)
		];
		if ($password==$password1)
		{
			if ($this->ion_auth->username_check($username)) {
				$data = [
					'status' => false,
					'msg'	 => 'Username tidak tersedia (sudah digunakan).'
				];
			} else if ($this->ion_auth->email_check($email)) {
				$data = [
					'status' => false,
					'msg'	 => 'Email tidak tersedia (sudah digunakan).'
				];
			} else {
				$this->ion_auth->register($username, $password, $email, $additional_data, $group);
				$data = [
					'status'	=> true,
					'msg'	 => 'User berhasil dibuat. Email digunakan sebagai username pada saat login.'
				];
				//$this->master->create('users', $input);
			}
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
		$this->output_json($this->master->getOperator(), false);
	}

	

	public function edit($id)
	{
		$level = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 		=> $this->ion_auth->user()->row(),
			'judul'		=> 'User Management',
			'subjudul'	=> 'Edit Data User',
			'users' 	=> $this->ion_auth->user($id)->row(),
			'groups'	=> $this->ion_auth->groups()->result(),
			'level'		=> $level[0],
			'm_operator' => true,
		];
		$this->load->view('_templates/dashboard_admin/_header.php', $data);
		$this->load->view('admin/operator/edit');
		$this->load->view('_templates/dashboard_admin/_footer.php');
	}


	public function edit_info()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if($this->form_validation->run()===FALSE){
			$data['status'] = false;
			$data['errors'] = [
				'username' => form_error('username'),
				'first_name' => form_error('first_name'),
				'last_name' => form_error('last_name'),
				'email' => form_error('email'),
			];
		}else{
			$id = $this->input->post('id', true);
			$input = [
				'username' 		=> $this->input->post('username', true),
				'first_name'	=> $this->input->post('first_name', true),
				'last_name'		=> $this->input->post('last_name', true),
				'email'			=> $this->input->post('email', true)
			];
			$update = $this->master->update('users', $input, 'id', $id);
			$data['status'] = $update ? true : false;
		}
		$this->output_json($data);
	}

	public function edit_status()
	{
		$this->form_validation->set_rules('status', 'Status', 'required');
		
		if($this->form_validation->run()===FALSE){
			$data['status'] = false;
			$data['errors'] = [
				'status' => form_error('status'),
			];
		}else{
			$id = $this->input->post('id', true);
			$input = [
				'active' 		=> $this->input->post('status', true),
			];
			$update = $this->master->update('users', $input, 'id', $id);
			$data['status'] = $update ? true : false;
		}
		$this->output_json($data);
	}
	
	public function edit_level()
	{
		$this->form_validation->set_rules('level', 'Level', 'required');
		
		if($this->form_validation->run()===FALSE){
			$data['status'] = false;
			$data['errors'] = [
				'level' => form_error('level'),
			];
		}else{
			$id = $this->input->post('id', true);
			$input = [
				'group_id' 		=> $this->input->post('level', true),
			];
			$update = $this->master->update('users_groups', $input, 'user_id', $id);
			$data['status'] = $update ? true : false;
		}
		$this->output_json($data);
	}

	public function change_password()
	{
		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');
		
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
			$identity = $this->session->userdata('identity');
			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));
			if($change){
				$data['status'] = true;
			}
			else{
				$data = [
					'status' 	=> false,
					'msg'		=> $this->ion_auth->errors()
				];
			}
		}
		$this->output_json($data);
	}

	public function delete($id)
	{
		$data['status'] = $this->ion_auth->delete_user($id) ? true : false;
		$this->output_json($data);
	}
}
