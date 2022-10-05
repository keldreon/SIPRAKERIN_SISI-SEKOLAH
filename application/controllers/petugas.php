<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//
//file name: petugas.php
//location: ./application/controllers

class petugas extends CI_Controller {
  public function __construct()
  {

		parent:: __construct();
		$this->load->helper('url');
		$this->load->model('petugasModel');
  }

  public function index()
  {

		$data['dataPetugas'] = $this->petugasModel->selectAll()->result();//load datapetugas lewat selectAll
		$this->load->view('dataPetugas',$data);//tampilkan ke view
  }

  public function tambahPetugas()
  {

		$this->load->view('tambahPetugas');
  }

  public function prosesTambah()
  {

		$data['nama'] = $this->input->post('nama');
		$data['alamat'] = $this->input->post('alamat');
		$data['telepon'] = $this->input->post('telepon');
		$data['jabatan'] = $this->input->post('jabatan');
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');

		$this->petugasModel->insertPetugas($data);

		redirect(site_url('petugas'));
  }

  function editPetugas($kdPetugas)
  {

			$data['petugas'] = $this->petugasModel->selectByKode($kdPetugas)->row();
			$this->load->view('petugasEdit', $data);
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

			$this->petugasModel->updatePetugas($kd_petugas, $data);

			redirect(site_url('petugas'));
  }

  function deletePetugas($kdPetugas)
  {

			$this->petugasModel->deletePetugas($kdPetugas);

			redirect(site_url('petugas'));
  }

}


?>