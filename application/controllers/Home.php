<?php
class Home extends CI_Controller {
  public function __construct()
  {

		parent::__construct();
		$this->load->helper(array('form','url','html','security','date', 'string'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->model('userModel');    
		$jml = array();		
		$angka = $this->userModel->getAllIDLab();
		$tes2 = $angka['id_lab'];
		for($x=0;$x<sizeof($angka);$x++){			
			$jml[$x] = $this->userModel->hitungSiswa_lab($tes2[$x]);			
			$this->userModel->updateCapLab($tes2[$x],$jml[$x]);			
		}				
		/*
		$jml1 = $this->userModel->hitungSiswa_lab(1);
		$jml2 = $this->userModel->hitungSiswa_lab(2);
		$jml3 = $this->userModel->hitungSiswa_lab(3);
		$this->userModel->updateCapLab(1, $jml1);
		$this->userModel->updateCapLab(2, $jml2);
		$this->userModel->updateCapLab(3, $jml3);
		*/
  }

  function index()
  {

		$data['laboratorium'] = $this->userModel->selectAllLab();//load
		$this->load->view('V_homepage',$data);
  }

  function logout()
  {

		// destroy session
        $data = array('login' => '', 'uname' => '', 'id_admin' => '');
        $this->session->unset_userdata($data);
        $this->session->sess_destroy();
		redirect('admin_login/index');
  }

  function klikLab($id_jurnal)
  {

		$this->session->set_flashdata('item', $id_jurnal);
		$this->session->keep_flashdata('item');
		redirect('Pengajuan/index');
  }

  function klikIsiLab($id_jurnal)
  {

		$this->session->set_flashdata('item', $id_jurnal);
		$this->session->keep_flashdata('item');
		$data['laboratorium'] = $this->userModel->selectLabByKode($id_jurnal)->row();
		$data['isi'] = $this->userModel->selectIsiLab($id_jurnal);
		$this->load->view('V_isiLab',$data);
  }

  function Panduan()
  {

		$this->load->view('V_help');
  }

}

