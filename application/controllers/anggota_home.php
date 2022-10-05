<?php
class anggota_home extends CI_Controller {
  public function __construct()
  {

		parent::__construct();
		$this->load->helper(array('url', 'html','form','download','file'));
		$this->load->library(array('session','pagination'));
		$this->load->model('userModel');
  }

  function index()
  {
	
		$config['base_url'] = base_url().'index.php/anggota_home/index';
		
		$jmlRecord = $this->userModel->selectAllJurnal()->num_rows();
		$config['total_rows'] = $jmlRecord;
		
		$per_page=3;
		//config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = true;
        $config['last_link'] = true;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = 'Prev';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['prev_tag_open'] = '<li class="prev" aria-label="Previous">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
		$config['per_page']=$per_page;
	
		$this->pagination->initialize($config);
		$data['dataJurnal'] = $this->userModel->getData($per_page, $this->uri->segment(3));
		$data['links'] = $this->pagination->create_links();
		$this->load->view('V_anggotaHome',$data);
  }

  function logout()
  {

		// destroy session
        $data = array('login' => '', 'uname' => '', 'id_admin' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('anggota_login/index');
  }

  function prosesEdit()
  {

			$data['nama'] = $this->input->post('nama');
			$data['alamat'] = $this->input->post('alamat');
			$data['telepon'] = $this->input->post('telepon');
			$data['jabatan'] = $this->input->post('jabatan');
			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');
			$kd_petugas = $this->input->post('kd_petugas');

			$this->petugasModel->updateAnggota($kd_petugas, $data);

			redirect(site_url('V_anggotaHome'));
  }

  function getJurnal($kdPetugas)
  {

			$data['jurnal'] = $this->userModel->selectJurnalByKode($kdPetugas)->row();
			$this->load->view('V_anggotaJurnal', $data);
  }

  function download($filename = NULL)
  {

		$data = file_get_contents(base_url('uploads/'.$filename));
		force_download($filename, $data);
  }

  function home()
  {

		$this->load->view('V_homepage');
  }

}

