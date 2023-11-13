<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->general->cekAdminLogin();
		if (!$this->ion_auth->logged_in()){
			redirect('auth');
		}
		$this->load->model('Dashboard_model', 'dashboard');
		$this->user = $this->ion_auth->user()->row();
		if ($this->ion_auth->in_group('Admin')) {
			
		}else if ($this->ion_auth->in_group('Front')) 
		{
			
		}else if ($this->ion_auth->in_group('Pemroses')) 
		{
			$user=$this->ion_auth->user()->row();
			$id_pemroses=$user->id;
		
		}else if ($this->ion_auth->in_group('Cetak')) 
		{
			
		}
	}

	public function admin_box()
	{
		$k=$this->db->query('select sum(jumlah_kuota) as jumlah from tb_kuota')->row_array();
		$box = [
			[
				'box' 		=> 'blue',
				'total' 	=> $this->dashboard->total('tb_samsat'),
				'title'		=> 'Jumlah Samsat',
				'url'		=> 'admin/samsat',
				'icon'		=> 'android-bookmark'
			],
			[
				'box' 		=> 'olive',
				'total' 	=> $this->dashboard->total('tb_user'),
				'title'		=> 'Jumlah Petugas',
				'url'		=> 'admin/pengguna',
				'icon'		=> 'card'
			],
			[
				'box' 		=> 'cyan',
				'total' 	=> $k['jumlah'],
				'title'		=> 'Jumlah Kuota',
				'url'		=> 'admin/kuota',
				'icon'		=> 'android-document'
			],
			[
				'box' 		=> 'red',
				'total' 	=> $this->dashboard->total('tb_ambil_kuota'),
				'title'		=> 'Kuota Diambil',
				'url'		=> 'admin/kuota',
				'icon'		=> 'android-list'

			],
		];

		
		$info_box = json_decode(json_encode($box), FALSE);
		return $info_box;
	}

	public function operator_box()
	{
		$q=date('Y-m-d');
		$k=$this->db->query("select sum(jumlah_kuota) as jumlah from tb_kuota where DATE_FORMAT(tanggal,'%Y-%m-%d')='".$q."'")->row_array();
		if ($k['jumlah']=='')
		{
			$kuota='0';
		}else
		{
			$kuota=$k['jumlah'];
		}
		$box = [
			[
				'box' 		=> 'blue',
				'total' 	=> $this->db->query("select * from tb_samsat where aktif='1'")->num_rows(),
				'title'		=> 'Samsat Aktif',
				'url'		=> 'admin/samsat',
				'icon'		=> 'android-bookmark'
			],
			[
				'box' 		=> 'cyan',
				'total' 	=> $kuota,
				'title'		=> 'Kuota Hari Ini',
				'url'		=> 'admin/kuota',
				'icon'		=> 'android-document'
			],
			[
				'box' 		=> 'yellow',
				'total' 	=> $this->db->query("select * from tb_pesan_kuota where DATE_FORMAT(tanggal,'%Y-%m-%d')='".$q."'")->num_rows(),
				'title'		=> 'Kuota Dipesan',
				'url'		=> 'admin/kuota',
				'icon'		=> 'archive'

			],
			[
				'box' 		=> 'red',
				'total' 	=> $this->db->query("select * from tb_ambil_kuota where DATE_FORMAT(tanggal,'%Y-%m-%d')='".$q."'")->num_rows(),
				'title'		=> 'Kuota Diambil',
				'url'		=> 'admin/kuota',
				'icon'		=> 'android-list'

			],
		];

		
		$info_box = json_decode(json_encode($box), FALSE);
		return $info_box;
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Dashboard',
			'subjudul'	=> 'Data Aplikasi',
			'info_box' => $this->admin_box(),
			'operator_box' => $this->operator_box(),
			'm_dashboard' => true,
		];

		$this->load->view('_templates/dashboard_admin/_header.php', $data);
		$this->load->view('dashboard_admin');
		$this->load->view('_templates/dashboard_admin/_footer.php');
	}
}