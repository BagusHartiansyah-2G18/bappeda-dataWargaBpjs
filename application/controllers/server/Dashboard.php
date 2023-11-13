<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		/* if (!$this->ion_auth->logged_in()){
			redirect('auth');
		} */
		$this->load->model('Dashboard_model', 'dashboard');
		/* $this->user = $this->ion_auth->user()->row();
		if ($this->ion_auth->in_group('Admin')) {
			
		}else if ($this->ion_auth->in_group('Front')) 
		{
			
		}else if ($this->ion_auth->in_group('Pemroses')) 
		{
			$user=$this->ion_auth->user()->row();
			$id_pemroses=$user->id;
		
		}else if ($this->ion_auth->in_group('Cetak')) 
		{
			
		} */
	}

	public function admin_box()
	{
		$box = [
			[
				'box' 		=> 'blue',
				'total' 	=> 20,
				'title'		=> 'Total Data Terverifikasi',
				'icon'		=> 'android-bookmark'
			],
			[
				'box' 		=> 'olive',
				'total' 	=> 30,
				'title'		=> 'Data Terverifikasi Desa/Kel '. getKelurahan($this->session->userdata('admin_id_kelurahan')),
				'icon'		=> 'card'
			],
			[
				'box' 		=> 'cyan',
				'total' 	=> 40,
				'title'		=> 'Data terverifikasi oleh '.$this->session->userdata('admin_nama_lengkap'),
				'icon'		=> 'card'
			],
		];
		$info_box = json_decode(json_encode($box), FALSE);
		return $info_box;
	}

	public function index()
	{
		//$user = $this->user;
		$data = [
			'user' 		=> $this->session->userdata('admin_username'),
			'judul'		=> 'Dashboard',
			'subjudul'	=> 'Data Aplikasi',
			'jmlAdmin'	=> $this->dashboard->jmlAdmin(),
			'jmlVerif'	=> $this->dashboard->jmlVerif($this->session->userdata('admin_id_kelurahan')),
			'jmlVerif2'	=> $this->dashboard->jmlVerif2($this->session->userdata('admin_id_kelurahan')),
			'jmlVerif3'	=> $this->dashboard->jmlVerif3($this->session->userdata('admin_id')),
			'jmlVerifAdmin'	=> $this->dashboard->jmlVerifAdmin(),
			'jmlVerifAdmin2'	=> $this->dashboard->jmlVerifAdmin2(),

			'linkmenuutama' => 'dashboard',
			'linkmenu' => 'dashboard',
		];

		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('dashboard');
		$this->load->view('_templates/dashboard/_footer.php');
	}
}