<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		
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
			'judul'	=> 'Data Transaksi '.getSamsat($this->session->userdata('admin_id_samsat')),
            'subjudul' => 'Samsat Siondel',
            'm_transaksi' => true,
            
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('operator/transaksi/list');
		$this->load->view('_templates/dashboard/_footer.php');
	}

	public function add()
	{
		$data = [
			'user' 		=> $this->ion_auth->user()->row(),
			'judul'		=> 'Tambah Samsat',
			'subjudul'	=> 'Tambah Data Samsat',
			'm_samsat' => true,
		];
		$this->load->view('_templates/dashboard/_header', $data);
		$this->load->view('operator/samsat/add');
		$this->load->view('_templates/dashboard/_footer');
	}

	public function save()
	{
		$nama = $this->input->post('nama', true);
		$address = $this->input->post('address', true);
		$latitude = $this->input->post('latitude', true);
		$longitude = $this->input->post('longitude', true);


			$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'png|PNG|jpg|JPG|jpeg|JPEG|BMP|bmp|pdf|PDF|Pdf';
            $config['max_size']             = 3024;
            $config['encrypt_name'] 		= false;
            $config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('gambar1'))
            {
				$data = [
					'status'	=> false,
					'msg'	 => $this->upload->display_errors()
				];
			}else
			{
				$uploadData = $this->upload->data();
				$berkas = $uploadData['file_name']; 
				$input = [
					'nama'			=> $nama,
					'address' 	=> $address,
					'latitude' 		=> $latitude,
					'longitude'	=> $longitude,
					'foto'	=> $berkas,
					'created_at'		=> date('Y-m-d H:i:s'),
				];
				
						$data = [
							'status'	=> true,
							'msg'	 => 'Data samsat berhasil dibuat'
						];
						$this->master->create('tb_samsat', $input);

						redirect('operator/samsat');
					
		
			}

		
		
		
		$this->output_json($data);
	}

	
	public function data()
	{
		$this->output_json($this->master->getListVoucher(), false);
	}

	

	public function edit($id)
	{
		$data = [
			'judul'		=> 'Data Samsat',
			'subjudul'	=> 'Edit Samsat',
			'users' 	=>  $this->master->getSamsatById($id),
			'm_samsat' => true,
		];
		$this->load->view('_templates/dashboard/_header.php', $data);
		$this->load->view('operator/samsat/edit');
		$this->load->view('_templates/dashboard/_footer.php');
	}


	public function edit_info()
	{
		$gambar1 = $this->input->post('gambar1', true);
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
			
				$config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'png|PNG|jpg|JPG|jpeg|JPEG|BMP|bmp|pdf|PDF|Pdf';
            $config['max_size']             = 3024;
            $config['encrypt_name'] 		= false;
            $config['overwrite'] = FALSE;
            $config['remove_spaces'] = TRUE;

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('gambar1'))
            {
				$data = [
					'status'	=> false,
					'msg'	 => $this->upload->display_errors()
				];
			}else
			{
				$id = $this->input->post('id', true);
				$uploadData = $this->upload->data();
				$berkas = $uploadData['file_name'];
			$input = [
				'nama' 		=> $this->input->post('nama', true),
				'address'	=> $this->input->post('address', true),
				'latitude'		=> $this->input->post('latitude', true),
				'longitude'			=> $this->input->post('longitude', true),
				'foto'			=> $berkas
			];
			$update = $this->master->update('tb_samsat', $input, 'id', $id);
			$data['status'] = $update ? true : false;


			}
		
		}
		$this->output_json($data);
		redirect('operator/samsat');
	}
		

	public function delete($id)
	{
		$data['status'] = $this->master->delete('tb_samsat',$id,'id') ? true : false;
		$this->output_json($data);
	}
}
