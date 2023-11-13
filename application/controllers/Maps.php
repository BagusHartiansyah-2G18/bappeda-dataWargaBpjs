<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library(['datatables', 'form_validation']); // Load Library Ignited-Datatables
		$this->load->model('Master_model', 'master');
		$this->form_validation->set_error_delimiters('', '');
		
	}

	public function output_json($data, $encode = true){
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	public function index(){
		$data = [
			'judul'	=> 'Kelola Data Admin ',
            'subjudul' => 'Aplikasi data Warga',
            'kecamatan' => $this->db->query("select * from m_kecamatan where id_kecamatan<>'99'")->result_array(),
			'desa' => $this->db->query("select * from m_desa where id_kecamatan='8' ")->result_array(),
			'kel' => $this->db->query("select * from t_pribadi where id_desa='12' limit 8")->result_array(),
            'linkmenu' 		=> 'admin',
            
		];
		$this->load->view('maps/index',$data);
	}

	public function detail(){
		$data = [
			'judul'	=> 'Kelola Data Admin ',
            'subjudul' => 'Aplikasi data Warga',
            'pribadi' => $this->db->query("select * from t_pribadi where id_desa='12'")->result_array(),
            
		];
		$this->load->view('maps/detail',$data);
	}

	public function kk(){
		$id=$this->uri->segment(3);
		$data = [
			'judul'	=> 'Jumlah KK ',
			'id'=>$id,
            'subjudul' => '',
			'desa' => $this->db->query("select * from m_desa where id_desa='$id' ")->row_array(),
			'pribadi' => $this->db->query("
				select a.*,b.no_bpjs
				from t_keluarga a
				JOIN t_bpjs b  
					ON a.key_nik=b.key_nik
				where a.kategori='Kepala' 
				and a.id_kelurahan='$id' 
				and char_length(a.key_nik)>4 
				group by a.no_kk 
			")->result_array(),
            
		];
		$this->load->view('maps/detail',$data);
	}
	public function detailAnggota($id,$kk,$nik){
		$id=$this->uri->segment(3);
		$idx="1101041403850001";
		$data = [
			't_pribadi' 	=> $this->master->getPribadiById($idx),
			't_bpjs' 		=> $this->master->getBpjsById($idx),
			't_keluarga' 	=> $this->master->getKeluargaById($idx),

			't_pribadi2' 	=> $this->master->getPribadiById2($idx),
			't_bpjs2' 		=> $this->master->getBpjsById2($idx),
			't_keluarga2' 	=> $this->master->getKeluargaById2($idx),

			'jmlDataAwal'	=> $this->master->jmlDataAwal($idx),
			'jmlDataAkhir'	=> $this->master->jmlDataAkhir($idx),

			'keterangan'	=> $this->master->getKeterangan(),
			'hubungan'		=> $this->master->getHubungan(),
			'pekerjaan'		=> $this->master->getPekerjaan(),
			'kecamatan'		=> $this->master->getKecamatan(),
			'kelurahan'		=> $this->master->getKelurahan(),
			'desa'			=> 'admin',
			'linkmenuutama' => 'warga',
			'linkmenu' 		=> 'warga',

			'judul'	=> 'Jumlah KK ',
			'subjudul' => '',
			'nik'=>$nik,
			'desa' => $this->db->query("select * from m_desa where id_desa='$id' ")->row_array(),
            'pribadi' => $this->db->query(" 
				SELECT a.* ,b.no_bpjs,c.kategori
				FROM t_pribadi a
				JOIN t_bpjs b  
					ON a.nik=b.key_nik
				join t_keluarga c 
					ON c.key_nik=b.key_nik
				WHERE 
					a.no_kk='".$kk."' 
					and a.id_desa='".$id."'
					group by b.key_nik,b.no_bpjs
			")->result_array(),
            
		];

		// return print_r($data['jmlDataAwal']);
		$this->load->view('maps/detailAnggota',$data);
	}


	public function bpjs(){
		$id=$this->uri->segment(3);
		$data = [
			'judul'	=> 'Jumlah BPJS ',
            'subjudul' => '',
			'desa' => $this->db->query("select * from m_desa where id_desa='$id' ")->row_array(),
            'pribadi' => $this->db->query("select * from t_keluarga inner join t_bpjs on t_keluarga.key_nik=t_bpjs.key_nik where t_keluarga.id_kelurahan='$id'")->result_array(),
            
		];
		$this->load->view('maps/detail_bpjs',$data);
	}

	public function data(){
		$data = [
			'judul'	=> 'Kelola Data Admin ',
            'subjudul' => 'Aplikasi data Warga',
            'pribadi' => $this->db->query("select * from t_pribadi where id_desa='12'")->result_array(),
            
		];
		$this->load->view('maps/data',$data);
	}


	public function dataKecamatan(){
		$id=$this->uri->segment(3);
		//$id=2;
        $kecamatan = $this->db->query("select * from m_desa where id_kecamatan='$id'")->result_array();
		foreach($kecamatan as $kec)
		{
			$data [] = array(
				'id_desa'     => $kec['id_desa'],
				'nama_desa'   => $kec['nama_desa'],
				'id_kecamatan' => $kec['id_kecamatan'],
			    'jumlah_awal' => getDataAwal($kec['id_desa']),
				'jumlah_valid' => getDataValid($kec['id_desa']),
				
			);
		}

		echo json_encode(array("result" => $data));
	}

	public function dataDesa(){
		$id=$this->uri->segment(3);
		//$id=2;
        $kecamatan = $this->db->query("select * from m_desa where id_desa='$id'")->result_array();
		foreach($kecamatan as $kec)
		{
			$data [] = array(
				'id_desa'     => $kec['id_desa'],
				'nama_desa'   => $kec['nama_desa'],
				'id_kecamatan' => $kec['id_kecamatan'],
				'jumlah_kk' => getJumlahKK($kec['id_desa']),
				'jumlah_bpjs' => getJumlahBpjs($kec['id_desa']),
				
			);
		}

		echo json_encode(array("result" => $data));
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */