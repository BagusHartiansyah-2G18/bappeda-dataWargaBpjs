<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Import extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->general->cekAdminLogin();
		$this->load->database();
		$this->load->library(['datatables', 'form_validation']); // Load Library Ignited-Datatables
		$this->load->model('Master_model', 'master');
		$this->form_validation->set_error_delimiters('', '');
		
	}

	public function index()
	{
		$data = [
			'user' 			=> $this->session->userdata('admin_id_kecamatan'),
			'judul'			=> 'Import Data Warga',
            'subjudul' 		=> 'Aplikasi data Warga',
            'kecamatan'		=> $this->master->getKecamatan(),
			'kelurahan'		=> $this->master->getKelurahan(),
            'linkmenuutama' => 'import',
            'linkmenu' 		=> 'import',
            
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/import/form');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function excel()
    {

     
		// Load plugin PHPExcel nya
		require('application/third_party/Classes/PHPExcel.php');
		
		$excelreader	= new PHPExcel_Reader_Excel2007();
		$loadexcel 		= $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet 			= $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		
		// Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
		$data1 = array();
		$data2 = array();
		$data3 = array();
		
		$numrow = 1;
		foreach($sheet as $row){
			// Cek $numrow apakah lebih dari 1
			// Artinya karena baris pertama adalah nama-nama kolom
			// Jadi dilewat saja, tidak usah diimport
			if($numrow > 1){
				// Kita push (add) array data ke variabel data
				array_push($data1, array(
					'nis'=>$row['A'], // Insert data nis dari kolom A di excel
					'nama'=>$row['B'], // Insert data nama dari kolom B di excel
					'jenis_kelamin'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'alamat'=>$row['D'], // Insert data alamat dari kolom D di excel
				));

				array_push($data2, array(
					'nis'=>$row['A'], // Insert data nis dari kolom A di excel
					'nama'=>$row['B'], // Insert data nama dari kolom B di excel
					'jenis_kelamin'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'alamat'=>$row['D'], // Insert data alamat dari kolom D di excel
				));

				array_push($data3, array(
					'nis'=>$row['A'], // Insert data nis dari kolom A di excel
					'nama'=>$row['B'], // Insert data nama dari kolom B di excel
					'jenis_kelamin'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
					'alamat'=>$row['D'], // Insert data alamat dari kolom D di excel
				));
			}
			
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$this->master->insert_multiple($data1);
		$this->master->insert_multiple($data2);
		$this->master->insert_multiple($data3);
		
		redirect("server/import"); // Redirect ke halaman awal (ke controller siswa fungsi index)
	
    }
}
?>