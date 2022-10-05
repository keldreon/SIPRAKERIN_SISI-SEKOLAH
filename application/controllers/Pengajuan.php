<?php
class Pengajuan extends CI_Controller {
  public function __construct()
  {

		parent::__construct();
		$this->load->helper(array('form','url','html','security','date', 'string','directory','download','file'));
		$this->load->library(array('session', 'form_validation'));		
		$this->load->model('userModel');
  }

  function index()
  {
		
		//function index($nlab = NULL)
		// set form validation rules
		//data sekolah		
		$cekSekolah = $this->input->post('nSekolah');
		/*
		$this->session->set_flashdata('item', $nlab);
		$this->session->keep_flashdata('item');
		*/
		$kdlab = $this->session->flashdata('item');
		$this->session->keep_flashdata('item');
		
		$this->form_validation->set_rules('nSekolah', 'Nama Sekolah', 'trim|required|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('aSekolah', 'Alamat Sekolah', 'trim|required|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('contSekolah', 'No. Telp/HP Sekolah', 'trim|required|min_length[3]|max_length[60]|xss_clean');		
		
		//pembimbing
		$this->form_validation->set_rules('nPembimbing', 'Nama Pembimbing', 'trim|required|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('pJabatan', 'Jabatan', 'trim|required|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('pKontak', 'Kontak Pembimbing', 'trim|required|min_length[3]|max_length[15]|xss_clean');
		$this->form_validation->set_rules('pEmail', 'Email Pembimbing', 'trim|required|valid_email');
		
				
		//dataSiswa1
		$this->form_validation->set_rules('nis1', 'NIS 1', 'trim|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('nSiswa1', 'Nama Siswa 1', 'trim|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('nJurusan1', 'Jurusan Siswa 1', 'trim|min_length[3]|max_length[60]|xss_clean');
		
		//dataSiswa2
		$this->form_validation->set_rules('nis2', 'NIS 2', 'trim|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('nSiswa2', 'Nama Siswa 2', 'trim|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('nJurusan2', 'Jurusan Siswa2', 'trim|min_length[3]|max_length[60]|xss_clean');
		
		//dataSiswa3
		$this->form_validation->set_rules('nis3', 'NIS 3', 'trim|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('nSiswa3', 'Nama Siswa 3', 'trim|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('nJurusan3', 'Jurusan Siswa3', 'trim|min_length[3]|max_length[60]|xss_clean');
		
		//$kode_lab = $foo->bar;
		// submit		
		$datalab['laboratorium'] = $this->userModel->selectLabByKode($kdlab)->row();			
		if ($this->form_validation->run() == FALSE)
        {
			// fails
			$this->load->view('V_formDaftar',$datalab);
        }
		else
		{											
			$kode = random_string('numeric', 10); //jangan alnum, kacau bacanya :v
			$tanggal = date('Y-m-d H:i:s');
			//data sekolah			
				$data1 = array(
						'nama_sekolah' => $this->input->post('nSekolah'),
						'alamat_sekolah' => $this->input->post('aSekolah'),
						'kontak_sekolah' => $this->input->post('contSekolah'),				
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab')						
				);										
			  //$this->userModel->insert_sekolah($data1)
			
			   //$sq3 = $this->getIdSekolah($data1['nama_sekolah']);
			   $data2 = array(			    					
					//'id_sekolah'=> $sq3, 
					'nama_pembimbing' => $this->input->post('nPembimbing'),
					'jabatan_pembimbing' => $this->input->post('pJabatan'),
					'kontak_pembimbing' => $this->input->post('pKontak'),
					'kode_lab' => $this->input->post('id_lab'),
					'email_pembimbing' => $this->input->post('pEmail'),										
					'kode_masuk' => $kode,
					'tanggal_pengajuan' => $tanggal
				);				
				//$this->userModel->insert_pembimbing($data2);	
					$this->session->set_flashdata('dataSiswa1',$data2);
					
				//$sq4 = $this->getIdPembimbing($data2['nama_pembimbing']);
				
				//memulai pengisian data siswa
		
				$nis1 = $this->input->post('nis1');
				$nama1 = $this->input->post('nSiswa1');
				$jurusan1 = $this->input->post('nJurusan1');
			
				$nis2 = $this->input->post('nis2');
				$nama2 = $this->input->post('nSiswa2');
				$jurusan2 = $this->input->post('nJurusan2');
		
				$nis3 = $this->input->post('nis3');
				$nama3 = $this->input->post('nSiswa3');
				$jurusan3 = $this->input->post('nJurusan3');				
								
				//data siswa				
				if((!empty($nis1) && !empty($nama1) && !empty($jurusan1)) &&
					(!empty($nis2) && !empty($nama2) && !empty($jurusan2)) && 
					(!empty($nis3) && !empty($nama3) && !empty($jurusan3))){
						//semua terisi						
					//data1 siswa
					$data3 = array(
						'NIS_siswa' => $nis1,
						'nama_siswa' => $nama1,
						'jurusan_siswa' => $jurusan1,
						//'id_sekolah' => $sq3,
						//'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);					
					//$this->userModel->insert_siswa($data3);
					$this->session->set_flashdata('dataSiswa1',$data3);					
					
					//data2 siswa
					$data4 = array(
						'NIS_siswa' => $nis2,
						'nama_siswa' => $nama2,
						'jurusan_siswa' => $jurusan2,
						//'id_sekolah' => $sq3,
						//'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);
					//$this->userModel->insert_siswa($data4);					
					$this->session->set_flashdata('dataSiswa2',$data4);					
					
					//data3 siswa
					$data5 = array(
						'NIS_siswa' => $nis3,
						'nama_siswa' => $nama3,
						'jurusan_siswa' => $jurusan3,
						//'id_sekolah' => $sq3,
						//'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);														
					//$this->userModel->insert_siswa($data5);				
					$this->session->set_flashdata('dataSiswa3',$data5);					
										
				}else if((!empty($nis1) && !empty($nama1) && !empty($jurusan1)) && 
				(empty($nis2) && empty($nama2) && empty($jurusan2)) && 
				(empty($nis3) && empty($nama3) && empty($jurusan3))){
						//1 saja terisi
						$data3 = array(
							'NIS_siswa' => $nis1,
							'nama_siswa' => $nama1,
							'jurusan_siswa' => $jurusan1,
							//'id_sekolah' => $sq3,
							//'id_pembimbing' => $sq4,
							'kode_masuk' => $kode,
							'kode_lab' => $this->input->post('id_lab'),
							'tanggal_pengajuan' => $tanggal
						);
						//$this->userModel->insert_siswa($data3);
						$this->session->set_flashdata('dataSiswa1',$data3);					
				}
				else if((empty($nis1) && empty($nama1) && empty($jurusan1)) &&
					(!empty($nis2) && !empty($nama2) && !empty($jurusan2)) && 
					(empty($nis3) && empty($nama3) && empty($jurusan3))){
						//2 saja terisi
						$data4 = array(
							'NIS_siswa' => $nis2,
							'nama_siswa' => $nama2,
							'jurusan_siswa' => $jurusan2,
							//'id_sekolah' => $sq3,
							//'id_pembimbing' => $sq4,
							'kode_masuk' => $kode,
							'kode_lab' => $this->input->post('id_lab'),
							'tanggal_pengajuan' => $tanggal
						);
						//$this->userModel->insert_siswa($data4);									
						$this->session->set_flashdata('dataSiswa2',$data4);						
				}
				else if((empty($nis1) && empty($nama1) && empty($jurusan1)) &&
					(empty($nis2) && empty($nama2) && empty($jurusan2)) &&  
					(!empty($nis3) && !empty($nama3) && !empty($jurusan3))){
						//3 saja terisi
							$data5 = array(
								'NIS_siswa' => $nis3,
								'nama_siswa' => $nama3,
								'jurusan_siswa' => $jurusan3,
								//'id_sekolah' => $sq3,
								//'id_pembimbing' => $sq4,
								'kode_masuk' => $kode,
								'kode_lab' => $this->input->post('id_lab'),
								'tanggal_pengajuan' => $tanggal
							);														
							//$this->userModel->insert_siswa($data5);								
							$this->session->set_flashdata('dataSiswa3',$data5);							
				}				
				else if((!empty($nis1) && !empty($nama1) && !empty($jurusan1)) &&
					(!empty($nis2) && !empty($nama2) && !empty($jurusan2)) && 
					(empty($nis3) && empty($nama3) && empty($jurusan3))){
						//1 & 2 terisi
						//data1 siswa
						$data3 = array(
						'NIS_siswa' => $nis1,
						'nama_siswa' => $nama1,
						'jurusan_siswa' => $jurusan1,
						//'id_sekolah' => $sq3,
						//'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);					
					//$this->userModel->insert_siswa($data3);
					$this->session->set_flashdata('dataSiswa1',$data3);					
					
					
					//data2 siswa
					$data4 = array(
						'NIS_siswa' => $nis2,
						'nama_siswa' => $nama2,
						'jurusan_siswa' => $jurusan2,
						//'id_sekolah' => $sq3,
						//'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);
					//$this->userModel->insert_siswa($data4);										
					$this->session->set_flashdata('dataSiswa2',$data4);					
				}
				else if((!empty($nis1) && !empty($nama1) && !empty($jurusan1)) &&
					(empty($nis2) && empty($nama2) && empty($jurusan2)) && 
					(!empty($nis3) && !empty($nama3) && !empty($jurusan3))){
						//1 & 3 terisi						
						//data 1
						$data3 = array(
						'NIS_siswa' => $nis1,
						'nama_siswa' => $nama1,
						'jurusan_siswa' => $jurusan1,
						//'id_sekolah' => $sq3,
						//'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);					
					//$this->userModel->insert_siswa($data3);
					$this->session->set_flashdata('dataSiswa1',$data3);					
					
					//data3 siswa
					$data5 = array(
						'NIS_siswa' => $nis3,
						'nama_siswa' => $nama3,
						'jurusan_siswa' => $jurusan3,
						//'id_sekolah' => $sq3,
						//'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);
					//$this->userModel->insert_siswa($data5);		
					$this->session->set_flashdata('dataSiswa3',$data5);
				}
				else if((empty($nis1) && empty($nama1) && empty($jurusan1)) &&
					(!empty($nis2) && !empty($nama2) && !empty($jurusan2)) &&
					(!empty($nis3) && !empty($nama3) && !empty($jurusan3))){
					//2 & 3 terisi
					//data2 siswa
					$data4 = array(
						'NIS_siswa' => $nis2,
						'nama_siswa' => $nama2,
						'jurusan_siswa' => $jurusan2,
						//'id_sekolah' => $sq3,
						//'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);
					//$this->userModel->insert_siswa($data4);					
					$this->session->set_flashdata('dataSiswa2',$data4);					
					
					//data3 siswa
					$data5 = array(
						'NIS_siswa' => $nis3,
						'nama_siswa' => $nama3,
						'jurusan_siswa' => $jurusan3,
						//'id_sekolah' => $sq3,
						//'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);														
					//$this->userModel->insert_siswa($data5);										
					$this->session->set_flashdata('dataSiswa3',$data5);
				}
				
				else if((empty($nis1) && empty($nama1) && empty($jurusan1)) &&
					(empty($nis2) && empty($nama2) && empty($jurusan2)) &&
					(empty($nis3) && empty($nama3) && empty($jurusan3))){
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Maaf, data siswa belum diisi.</div>');
					redirect('Pengajuan/index/' .$this->input->post('id_lab'), 'refresh');								
				}
				
				/*				
				$dataAll['dataSekolah'] = $this->userModel->selectSekolahByKodeDaftar($kode)->row();
				$dataAll['dataPembimbing'] = $this->userModel->selectPembimbingByKode($kode)->row();				
				$dataAll['dataSiswa'] = $this->userModel->selectSiswaNamaLab($kode);
				*/
				
				//$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Pengajuan Berhasil. </div>');				
				//redirect('Pengajuan/index/' .$this->input->post('id_lab'));	
				$this->session->set_flashdata('result',$kode);
				$this->session->set_flashdata('dataSekolah',$data1);
				$this->session->set_flashdata('dataPembimbing',$data2);
				$this->load->view('V_formDaftarVer',$datalab);
		}
  }

  public function Selesai()
  {

		$this->session->keep_flashdata('result');
		$tes = $this->session->flashdata('result');
		$dataAll['dataSekolah'] = $this->userModel->selectSekolahByKodeDaftar($tes)->row();
		$dataAll['dataPembimbing'] = $this->userModel->selectPembimbingByKode($tes)->row();				
		$dataAll['dataSiswa'] = $this->userModel->selectSiswaNamaLab($tes);
				
		if(empty($tes)){
			redirect('Home','refresh');
		}else{
			$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Pengajuan Berhasil. </div>');
			$this->load->view('V_pengajuan_end',$dataAll);
		}
  }

  public function getIdSekolah($namaSekolah)
  {

		$q3 = $this->userModel->selectKodeSekolahByNama($namaSekolah);				
		return $q3;
  }

  public function getJumlahIsi($namaSekolah)
  {

		//isi_pake kode
		$q3 = $this->userModel->getQuantitybyLabKode($namaSekolah);				
		return $q3;
  }

  public function getIdPembimbing($namaPembimbing)
  {

		$q3 = $this->userModel->selectKodePembimbingByNama($namaPembimbing);				
		return $q3;
  }

  //file value and type check during validation
  public function file_check($str)
  {

		//file yang didukung doc,docx,pdf
        $allowed_mime_type_arr = array('application/pdf', 'application/force-download', 'application/x-download', 'binary/octet-stream','application/msword', 'application/vnd.ms-office', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/zip', 'application/msword', 'application/x-zip');
        $mime = get_mime_by_extension($_FILES['userfile']['name']);
        if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only document file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
  }

  function VerifikasiData()
  {

		$kdlab = $this->session->flashdata('item');
		$this->session->keep_flashdata('item');		
		
		//if(){}
		$dataSekolah  = $this->session->flashdata('dataSekolah');
		$dataPembimbing = $this->session->flashdata('dataPembimbing');
		$dataSiswa1 = $this->session->flashdata('dataSiswa1');
		$dataSiswa2 = $this->session->flashdata('dataSiswa2');
		$dataSiswa3 = $this->session->flashdata('dataSiswa3');
		
  }

  function downloadBalasan($filename = NULL)
  {
		$data = file_get_contents(base_url('uploads/balasan/'.$filename));		
		force_download($filename, $data);
  }

  function downloadPengajuan($filename = NULL)
  {

		$data = file_get_contents(base_url('uploads/pengajuan/'.$filename));		
		force_download($filename, $data);
  }

  function kirimProposal()
  {
		
		//data sekolah		
		$cekSekolah = $this->input->post('nSekolah');
		/*
		$this->session->set_flashdata('item', $nlab);
		$this->session->keep_flashdata('item');
		*/
		$kdlab = $this->session->flashdata('item');
		$this->session->keep_flashdata('item');
		
		$this->form_validation->set_rules('nSekolah', 'Nama Sekolah', 'trim|required|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('aSekolah', 'Alamat Sekolah', 'trim|required|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('contSekolah', 'No. Telp/HP Sekolah', 'trim|required|min_length[3]|max_length[60]|xss_clean');		
		
		//pembimbing
		$this->form_validation->set_rules('nPembimbing', 'Nama Pembimbing', 'trim|required|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('pJabatan', 'Jabatan', 'trim|required|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('pKontak', 'Kontak Pembimbing', 'trim|required|min_length[3]|max_length[15]|xss_clean');
		$this->form_validation->set_rules('pEmail', 'Email Pembimbing', 'trim|required|valid_email');
		//$this->form_validation->set_rules('userfile', '', 'callback_file_check');
		
		/*$this->form_validation->set_rules('username', 'username', 'trim|required|alpha|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5');*/
		
		//dataSiswa1
		$this->form_validation->set_rules('nis1', 'NIS 1', 'trim|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('nSiswa1', 'Nama Siswa 1', 'trim|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('nJurusan1', 'Jurusan Siswa 1', 'trim|min_length[3]|max_length[60]|xss_clean');
		
		//dataSiswa2
		$this->form_validation->set_rules('nis2', 'NIS 2', 'trim|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('nSiswa2', 'Nama Siswa 2', 'trim|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('nJurusan2', 'Jurusan Siswa2', 'trim|min_length[3]|max_length[60]|xss_clean');
		
		//dataSiswa3
		$this->form_validation->set_rules('nis3', 'NIS 3', 'trim|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('nSiswa3', 'Nama Siswa 3', 'trim|min_length[3]|max_length[60]|xss_clean');
		$this->form_validation->set_rules('nJurusan3', 'Jurusan Siswa3', 'trim|min_length[3]|max_length[60]|xss_clean');
		
		//$kode_lab = $foo->bar;
		// submit		
		$datalab['laboratorium'] = $this->userModel->selectLabByKode($kdlab)->row();				
		if ($this->form_validation->run() == FALSE)
        {
			// fails
			$this->load->view('V_formDaftarVer',$datalab);
        }
		else
		{			
			//insert user details into db
			//mengatur configurasi			
			$config['upload_path']          = './uploads/pengajuan/';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 15000;
			$this->load->library('upload', $config);
			
			$kode = random_string('numeric', 10); //jangan alnum, kacau bacanya :v
			$tanggal = date('Y-m-d H:i:s');
					   			
			//upload sections
			if(!$this->upload->do_upload('userfile')){
					//$error = array('error' => $this->upload->display_errors());
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Kesalahan saat unggah, silakan coba lagi...</div>');
					redirect('Pengajuan/index/' .$this->input->post('id_lab'));								
			}else{
					$file_data = $this->upload->data();
                    $fname = $file_data['file_name'];
					//upload file + nama file rujukan...					
					//data sekolah			
					$data1 = array(
						'nama_sekolah' => $this->input->post('nSekolah'),
						'alamat_sekolah' => $this->input->post('aSekolah'),
						'kontak_sekolah' => $this->input->post('contSekolah'),				
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'file_surat' => $fname
					);										
					$this->userModel->insert_sekolah($data1);				
			}
			
			   $sq3 = $this->getIdSekolah($data1['nama_sekolah']);
			   $data2 = array(			    					
					'id_sekolah'=> $sq3, 
					'nama_pembimbing' => $this->input->post('nPembimbing'),
					'jabatan_pembimbing' => $this->input->post('pJabatan'),
					'kontak_pembimbing' => $this->input->post('pKontak'),
					'kode_lab' => $this->input->post('id_lab'),
					'email_pembimbing' => $this->input->post('pEmail'),										
					'kode_masuk' => $kode,
					'tanggal_pengajuan' => $tanggal
				);				
				$this->userModel->insert_pembimbing($data2);			
				$sq4 = $this->getIdPembimbing($data2['nama_pembimbing']);
				
				//memulai pengisian data siswa
		
				$nis1 = $this->input->post('nis1');
				$nama1 = $this->input->post('nSiswa1');
				$jurusan1 = $this->input->post('nJurusan1');
			
				$nis2 = $this->input->post('nis2');
				$nama2 = $this->input->post('nSiswa2');
				$jurusan2 = $this->input->post('nJurusan2');
		
				$nis3 = $this->input->post('nis3');
				$nama3 = $this->input->post('nSiswa3');
				$jurusan3 = $this->input->post('nJurusan3');
														
				//data siswa				
				if((!empty($nis1) && !empty($nama1) && !empty($jurusan1)) &&
					(!empty($nis2) && !empty($nama2) && !empty($jurusan2)) && 
					(!empty($nis3) && !empty($nama3) && !empty($jurusan3))){
						//semua terisi						
					//data1 siswa
					$data3 = array(
						'NIS_siswa' => $nis1,
						'nama_siswa' => $nama1,
						'jurusan_siswa' => $jurusan1,
						'id_sekolah' => $sq3,
						'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);					
					$this->userModel->insert_siswa($data3);
					
					//data2 siswa
					$data4 = array(
						'NIS_siswa' => $nis2,
						'nama_siswa' => $nama2,
						'jurusan_siswa' => $jurusan2,
						'id_sekolah' => $sq3,
						'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);
					$this->userModel->insert_siswa($data4);
					
					//data3 siswa
					$data5 = array(
						'NIS_siswa' => $nis3,
						'nama_siswa' => $nama3,
						'jurusan_siswa' => $jurusan3,
						'id_sekolah' => $sq3,
						'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);														
					$this->userModel->insert_siswa($data5);					
										
				}else if((!empty($nis1) && !empty($nama1) && !empty($jurusan1)) && 
				(empty($nis2) && empty($nama2) && empty($jurusan2)) && 
				(empty($nis3) && empty($nama3) && empty($jurusan3))){
						//1 saja terisi
						$data3 = array(
							'NIS_siswa' => $nis1,
							'nama_siswa' => $nama1,
							'jurusan_siswa' => $jurusan1,
							'id_sekolah' => $sq3,
							'id_pembimbing' => $sq4,
							'kode_masuk' => $kode,
							'kode_lab' => $this->input->post('id_lab'),
							'tanggal_pengajuan' => $tanggal
						);
						$this->userModel->insert_siswa($data3);						
				}
				else if((empty($nis1) && empty($nama1) && empty($jurusan1)) &&
					(!empty($nis2) && !empty($nama2) && !empty($jurusan2)) && 
					(empty($nis3) && empty($nama3) && empty($jurusan3))){
						//2 saja terisi
						$data4 = array(
							'NIS_siswa' => $nis2,
							'nama_siswa' => $nama2,
							'jurusan_siswa' => $jurusan2,
							'id_sekolah' => $sq3,
							'id_pembimbing' => $sq4,
							'kode_masuk' => $kode,
							'kode_lab' => $this->input->post('id_lab'),
							'tanggal_pengajuan' => $tanggal
						);
						$this->userModel->insert_siswa($data4);						
				}
				else if((empty($nis1) && empty($nama1) && empty($jurusan1)) &&
					(empty($nis2) && empty($nama2) && empty($jurusan2)) &&  
					(!empty($nis3) && !empty($nama3) && !empty($jurusan3))){
						//3 saja terisi
							$data5 = array(
								'NIS_siswa' => $nis3,
								'nama_siswa' => $nama3,
								'jurusan_siswa' => $jurusan3,
								'id_sekolah' => $sq3,
								'id_pembimbing' => $sq4,
								'kode_masuk' => $kode,
								'kode_lab' => $this->input->post('id_lab'),
								'tanggal_pengajuan' => $tanggal
							);														
							$this->userModel->insert_siswa($data5);														
				}				
				else if((!empty($nis1) && !empty($nama1) && !empty($jurusan1)) &&
					(!empty($nis2) && !empty($nama2) && !empty($jurusan2)) && 
					(empty($nis3) && empty($nama3) && empty($jurusan3))){
						//1 & 2 terisi
						//data1 siswa
						$data3 = array(
						'NIS_siswa' => $nis1,
						'nama_siswa' => $nama1,
						'jurusan_siswa' => $jurusan1,
						'id_sekolah' => $sq3,
						'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);					
					$this->userModel->insert_siswa($data3);
					
					
					//data2 siswa
					$data4 = array(
						'NIS_siswa' => $nis2,
						'nama_siswa' => $nama2,
						'jurusan_siswa' => $jurusan2,
						'id_sekolah' => $sq3,
						'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);
					$this->userModel->insert_siswa($data4);					
				}
				else if((!empty($nis1) && !empty($nama1) && !empty($jurusan1)) &&
					(empty($nis2) && empty($nama2) && empty($jurusan2)) && 
					(!empty($nis3) && !empty($nama3) && !empty($jurusan3))){
						//1 & 3 terisi						
						//data 1
						$data3 = array(
						'NIS_siswa' => $nis1,
						'nama_siswa' => $nama1,
						'jurusan_siswa' => $jurusan1,
						'id_sekolah' => $sq3,
						'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);					
					$this->userModel->insert_siswa($data3);
					
					//data3 siswa
					$data5 = array(
						'NIS_siswa' => $nis3,
						'nama_siswa' => $nama3,
						'jurusan_siswa' => $jurusan3,
						'id_sekolah' => $sq3,
						'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);
					$this->userModel->insert_siswa($data5);		
				}
				else if((empty($nis1) && empty($nama1) && empty($jurusan1)) &&
					(!empty($nis2) && !empty($nama2) && !empty($jurusan2)) &&
					(!empty($nis3) && !empty($nama3) && !empty($jurusan3))){
					//2 & 3 terisi
					//data2 siswa
					$data4 = array(
						'NIS_siswa' => $nis2,
						'nama_siswa' => $nama2,
						'jurusan_siswa' => $jurusan2,
						'id_sekolah' => $sq3,
						'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);
					$this->userModel->insert_siswa($data4);
					
					//data3 siswa
					$data5 = array(
						'NIS_siswa' => $nis3,
						'nama_siswa' => $nama3,
						'jurusan_siswa' => $jurusan3,
						'id_sekolah' => $sq3,
						'id_pembimbing' => $sq4,
						'kode_masuk' => $kode,
						'kode_lab' => $this->input->post('id_lab'),
						'tanggal_pengajuan' => $tanggal
					);														
					$this->userModel->insert_siswa($data5);					
				}
				
				else if((empty($nis1) && empty($nama1) && empty($jurusan1)) &&
					(empty($nis2) && empty($nama2) && empty($jurusan2)) &&
					(empty($nis3) && empty($nama3) && empty($jurusan3))){
					$this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Oops! Error.  Please try again later!!!</div>');
					redirect('Pengajuan/index/' .$this->input->post('id_lab'), 'refresh');								
				}
				$jml = $this->userModel->hitungSiswa_lab($this->input->post('id_lab'));
				$this->userModel->updateCapLab($this->input->post('id_lab'), $jml);
				$nlab = $this->userModel-> selectNamaLabById($this->input->post('id_lab'));
				
				$data6 = array(
					'id_sekolah' => $sq3,
					'id_pembimbing' => $sq4,
					'nama_pembimbing'=> $this->input->post('nPembimbing'),
					'nama_sekolah'=> $this->input->post('nSekolah'),
					'id_lab'=> $this->input->post('id_lab'),
					'nama_lab'=> $nlab,
					'kode_masuk'=>$kode,
					'file_surat'=> $fname,
					'tanggal_pengajuan'=> $tanggal
				);
				$this->userModel->insertPengajuan($data6);
				
				$dataAll['dataSekolah'] = $this->userModel->selectSekolahByKodeDaftar($kode)->row();
				$dataAll['dataPembimbing'] = $this->userModel->selectPembimbingByKode($kode)->row();				
				$dataAll['dataSiswa'] = $this->userModel->selectSiswaNamaLab($kode);
								
				$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Pengajuan Berhasil. </div>');				
				//redirect('Pengajuan/index/' .$this->input->post('id_lab'));	
				$this->session->set_flashdata('result',$kode);				
				//$this->load->view('V_pengajuan_end',$dataAll);
				redirect('Pengajuan/Selesai');
		}
  }

}

