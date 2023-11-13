<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

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
			'judul'	=> 'Kelola Data menu ',
            'subjudul' => 'Aplikasi data menu',

            'linkmenuutama' => 'pengaturan',
            'linkmenu' 		=> 'menu',
            
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/pengaturan/menu/list');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function add()
	{
		$data = [
			'user' 		=> 'Test',
			'judul'		=> 'Tambah menu',
			'subjudul'	=> 'Tambah Data menu',
			'menu_utama' => $this->master->menu_utama(),

			'linkmenuutama' => 'pengaturan',
            'linkmenu' 		=> 'menu',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/pengaturan/menu/add');
		$this->load->view('_templates/dashboard/_footer'); 
	}

	public function edit($id)
	{
		//$menu = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 		=> $this->session->userdata('admin_username'),
			'judul'		=> 'Data menu',
			'subjudul'	=> 'Edit menu',
			'dmenu' 	=>  $this->master->getMenuById($id),
			'menu_utama' => $this->master->menu_utama(),
			'linkmenuutama' => 'pengaturan',
            'linkmenu' 		=> 'menu',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/pengaturan/menu/edit');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function data()
	{
		$this->output_json($this->master->getMenu(), false);
	}

	public function save()
	{	
		$menu = [
			'nama'			=> $this->input->post('nama_menu', true),
			'uri'			=> $this->input->post('url', true),
			'icon'			=> $this->input->post('icon', true),
			'permalink'		=> $this->input->post('permalink', true),
			'id_menu_induk'	=> $this->input->post('parent', true),
			'urutan'		=> $this->input->post('urutan', true),
			'aktif'			=> $this->input->post('status', true),
		];
		
		$data = [
			'menu'	=> true,
			'msg'	 => 'Data menu berhasil ditambahkan'
		];
		$masuk=$this->master->create('menu', $menu);
		$data['status'] = $masuk ? true : false;
		$this->output_json($data);
		
	}

	public function update()
	{
		$id = $this->input->post('id_menu', true);
		
		$menu = [
			'nama'			=> $this->input->post('nama_menu', true),
			'uri'			=> $this->input->post('url', true),
			'icon'			=> $this->input->post('icon', true),
			'permalink'		=> $this->input->post('permalink', true),
			'id_menu_induk'	=> $this->input->post('parent', true),
			'urutan'		=> $this->input->post('urutan', true),
			'aktif'			=> $this->input->post('status', true),
		];
		
		$update = $this->master->update('menu', $menu, 'id', $id);

		$data['status'] = $update ? true : false;

		$this->output_json($data);
	}

	public function delete($id)
	{
		$data['menu'] = $this->master->delete('m_menu',$id,'id_menu') ? true : false;
		$this->output_json($data);
		activity_log("menu", "menu Berhasil Dihapus", $id, 'menu SAMSAT');
	}

}

/* End of file Menu.php */
/* Location: ./application/controllers/server/Menu.php */