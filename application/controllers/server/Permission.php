<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permission extends CI_Controller {

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
			'judul'	=> 'Kelola Data permission ',
            'subjudul' => 'Aplikasi data permission',

            'linkmenuutama' => 'pengaturan',
            'linkmenu' 		=> 'permission',
            
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/pengaturan/permission/list');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function add()
	{
		$data = [
			'user' 		=> 'Test',
			'judul'		=> 'Tambah permission',
			'subjudul'	=> 'Tambah Data permission',
			'menu'		=> $this->master->getMenuGrup(),
			'submenu'	=> $this->master->getSubmenuGrup(),
			'level'   	=> $this->master->getLevelAdd(),

			'linkmenuutama' => 'pengaturan',
            'linkmenu' 		=> 'permission',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/pengaturan/permission/add');
		$this->load->view('_templates/dashboard/_footer'); 
	}

	public function edit($id)
	{
		//$permission = $this->ion_auth->get_users_groups($id)->result();
		$data = [
			'user' 		=> 'Test',
			'judul'		=> 'Tambah permission',
			'subjudul'	=> 'Tambah Data permission',
			'menu'		=> $this->master->getMenuGrup(),
			'submenu'	=> $this->master->getSubmenuGrup(),
			'level'   	=> $this->master->getLevelAdd(),

			'linkmenuutama' => 'pengaturan',
            'linkmenu' 		=> 'permission',
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/pengaturan/permission/edit');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function data()
	{
		$this->output_json($this->master->getPermission(), false);
	}

	public function save()
	{	
		//Mengambil data dari form
	
		$menu 	= $this->input->post('id_menu');
		$level  = $this->input->post('level');
		if($menu != ''){
			foreach ($menu as $p){
				if($p != '0'){
					$this->db->insert('menu_akses', array('id_menu' => $p, 'id_pengguna_grup' => $level));
				}			
			}
		}

		$this->session->set_flashdata('success', 'Data Berhasil Di Simpan');

		redirect('server/permission/add');
		
	}

	public function update()
	{
		$id = $this->input->post('id_permission', true);
		
		$permission = [
			'nama_permission'		=> $this->input->post('nama_permission', true),
			'permission_permission'		=> $this->input->post('permission', true),
		];
		
		$menu 	= $this->input->post('id_menu');
		$level  = $this->input->post('level');

		$this->db->delete('menu_akses',array('id_pengguna_grup' => $level));
		if($menu != ''){
			foreach ($menu as $p){
				if($p != '0'){
					$this->db->insert('menu_akses', array('id_menu' => $p, 'id_pengguna_grup' => $level));
				}			
			}
		}

		$this->session->set_flashdata('success', 'Data Berhasil Di Simpan');

		redirect('server/permission/add');
	}

	public function delete($id)
	{
		$data['permission'] = $this->master->delete('m_permission',$id,'id_permission') ? true : false;
		$this->output_json($data);
		activity_log("permission", "permission Berhasil Dihapus", $id, 'permission SAMSAT');
	}

}

/* End of file Permission.php */
/* Location: ./application/controllers/server/Permission.php */