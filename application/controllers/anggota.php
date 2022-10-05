<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class anggota extends CI_Controller {
  public function __construct()
  {

		parent::__construct();
		$this->load->helper(array('url', 'html','form'));
		$this->load->library('session');
		$this->load->model('adminModel');
  }

  public function index()
  {

		$data['dataAnggota'] = $this->adminModel->selectAll()->result();
		$this->load->view('V_mAnggota',$data);
  }

  function editPetugas($kdPetugas)
  {

			$data['anggota'] = $this->adminModel->selectUserByKode($kdPetugas)->row();
			$this->load->view('V_anggotaEdit', $data);
  }

  function deletePetugas($kdPetugas)
  {

			$this->adminModel->deleteAnggota($kdPetugas);

			redirect(site_url('anggota'));
  }

  function logout()
  {

		// destroy session
        $data = array('login' => '', 'uname' => '', 'id_admin' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('admin_login/index');
  }

  function prosesEdit()
  {
	
			$id_user = $this->input->post('id_user');
			$data['nama_user'] = $this->input->post('nama');
			$data['email_user'] = $this->input->post('email');
			$data['uname_user'] = $this->input->post('username');
			$data['pwd_user'] = $this->input->post('password');
			$data['pengakuan'] = $this->input->post('pengakuan');

			$this->adminModel->updateAnggota($id_user, $data);

			redirect(site_url('anggota'));
  }

}

