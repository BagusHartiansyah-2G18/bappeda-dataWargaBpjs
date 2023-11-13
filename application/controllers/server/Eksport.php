<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eksport extends CI_Controller {

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
			'judul'			=> 'Eksport Data Warga',
            'subjudul' 		=> 'Aplikasi data Warga',
            'kecamatan'		=> $this->master->getKecamatan(),
			'kelurahan'		=> $this->master->getKelurahan(),
            'linkmenuutama' => 'eksport',
            'linkmenu' 		=> 'eksport',
            
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('_templates/eksport/form');
		$this->load->view('_templates/dashboard/_footer');
	}

	function fetch_state()
 	{
  		if($this->input->post('kecamatan_id'))
  		{
			echo $this->master->fetch_state($this->input->post('kecamatan_id'));
  		}
 	}

	public function lihat(){

		$kecamatan 	  		= $this->input->post('kecamatan');
		$kelurahan 	  		= $this->input->post('kelurahan');

		$fltr  = "";
		$lk    = "";
		if(!empty($kelurahan)){ $fltr .=" AND a.id_desa = '$kelurahan'"; $lk .= "$kelurahan";}
		

		echo '<div class="col-12"><div style="background:#fff;height:900px;overflow:scroll">';
    		$query = "SELECT a.*, b.*, c.*, d.*, e.*, f.*,g.*,h.* FROM t_pribadi a, t_keluarga b, t_bpjs c , m_jenis_peserta d, m_hub_kel e, m_status f, m_kecamatan g, m_desa h WHERE a.`id_kecamatan` = '$kecamatan' AND a.id = b.id_keluarga AND a.id = c.id_bpjs AND c.id_hubungan = e.id AND a.pekerjaan = d.id AND c.keterangan = f.id_status AND a.id_kecamatan = g.id_kecamatan AND a.id_desa = h.id_desa $fltr ";

			$grid = $this->db->query($query)->result();

			$no = 1;
				echo '&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.base_url().'server/eksport/cetakexcel/'.$kecamatan.'/'.$lk.'" target="_blank"  class="btn btn-success btn-sm"><i class="fa fa-print"></i> Export Excel</a>';
				echo "<br><br>";

				echo "<table class='table' id='myTable'>
				<tr>
					<th >KECAMATAN</td>
					<th >DESA</td>
					<th >NO KK</td>
					<th >NIK</td>
					<th >NAMA LENGKAP</td>
					<th >JENIS KELAMIN</td>
				</tr>";

			foreach($grid as $indikator){
				
				echo "
					<tr>
						<td>".$indikator->nama_kecamatan."</td>
						<td >".$indikator->nama_desa."</td>
						<td >".$indikator->no_kk."</td>
						<td >".$indikator->nik."</td>
						<td >".$indikator->nama_lengkap."</td>
						<td >".$indikator->jenis_kelamin."</td>
					</tr>";

				$no++;
			}

			echo"</table>";
    	echo "</div></div>";
	}

	public function cetakexcel() {

		$kecamatan 	  		= $this->uri->segment(4);
		$kelurahan 	  		= $this->uri->segment(5);

		$fltr  = "";
		if(!empty($kelurahan)){ $fltr .=" AND a.id_desa = '$kelurahan'"; }
		
		require('application/third_party/Classes/PHPExcel.php');

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getActiveSheet()->getStyle("A1:P1")->getFont()->setBold(true);
			
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth("40");
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth("10");
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth("10");
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth("10");
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth("15");
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth("10");
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth("10");
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth("30");
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth("20");
		$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth("20");

		$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'NO KK')
            ->setCellValue('C1', 'NIK')
            ->setCellValue('D1', 'NO BPJS')
            ->setCellValue('E1', 'NAMA LENGKAP')
            ->setCellValue('F1', 'JENIS KELAMIN')
            ->setCellValue('G1', 'TEMPAT LAHIR')
            ->setCellValue('H1', 'TGL LAHIR')
            ->setCellValue('I1', 'HUB KELUARGA')
            ->setCellValue('J1', 'ALAMAT')
            ->setCellValue('K1', 'RT')
            ->setCellValue('L1', 'RW')
            ->setCellValue('M1', 'PINDAH/MENINGGAL')
            ->setCellValue('N1', 'DATA GANDA')
            ->setCellValue('O1', 'NO DATA GANDA')
            ->setCellValue('P1', 'KETERANGAN LAIN (KARTU BPJS TDK ADA DLL)');
		    

			$query = "SELECT a.*, b.*, c.*, d.*, e.*, f.*,g.*,h.* FROM t_pribadi a, t_keluarga b, t_bpjs c , m_jenis_peserta d, m_hub_kel e, m_status f, m_kecamatan g, m_desa h WHERE a.`id_kecamatan` = '$kecamatan' AND a.id = b.id_keluarga AND a.id = c.id_bpjs AND c.id_hubungan = e.id AND a.pekerjaan = d.id AND c.keterangan = f.id_status AND a.id_kecamatan = g.id_kecamatan AND a.id_desa = h.id_desa $fltr ";
		
			$grid = $this->db->query($query)->result();
			$baris = 2;
			$no = 1;
			foreach($grid as $indikator){
	        	$objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A'.$baris."", $no++)
		            ->setCellValue('B'.$baris."", $indikator->no_kk)
		            ->setCellValue('C'.$baris."", $indikator->nik)
		            ->setCellValue('D'.$baris."", $indikator->no_bpjs)
		            ->setCellValue('E'.$baris."", $indikator->nama_lengkap)
		            ->setCellValue('F'.$baris."", $indikator->jenis_kelamin)
		            ->setCellValue('G'.$baris."", $indikator->tempat_lahir)
		            ->setCellValue('H'.$baris."", $indikator->tanggal_lahir)
		            ->setCellValue('I'.$baris."", $indikator->nama)
		            ->setCellValue('J'.$baris."", $indikator->alamat)
		            ->setCellValue('K'.$baris."", $indikator->rt)
		            ->setCellValue('L'.$baris."", $indikator->rw)
		            ->setCellValue('M'.$baris."", '')
		            ->setCellValue('N'.$baris."", '')
		            ->setCellValue('O'.$baris."", '')
		            ->setCellValue('P'.$baris."", '');
	        	

	        	$baris++;
		        
		    }


		// Redirect output to a client's web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Laporan Eksport Data.xlsx"');
		header('Cache-Control: max-age=0');
		// If you're serving to IE 9, then the following may be needed
		header('Cache-Control: max-age=1');
		// If you're serving to IE over SSL, then the following may be needed
		header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
		header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
		header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
		header ('Pragma: public'); // HTTP/1.0

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		unset($objPHPExcel);
	}
}
?>