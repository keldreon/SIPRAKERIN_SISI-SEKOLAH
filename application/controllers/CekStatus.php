 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class CekStatus extends CI_Controller {
  public function __construct()
  {

        parent::__construct();
        $this->load->helper(array('form','url','html','security','date', 'string'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->model('userModel');        
  }

  public function index()
  {

        // get form input
        $username = $this->input->post("kode");//kode_pembimbing
        //$no_rek = $this->input->post("no_rek");//no_rekening?        
        //$nominal_koin = $this->input->post("nominal_koin");//nominal_koin
        //insert harga koin

        // form validation
        $this->form_validation->set_rules("kode", "Kode Pengajuan", "trim|required|xss_clean");               
        
        if ($this->form_validation->run() == FALSE)
        {
            // validation fail
            $this->load->view('V_topup');
        }
        else
        {
            // check for user credentials
            $uresult = $this->userModel->check_Pembimbing($username);
            if ($uresult > 0)
            {	
				$no_lab = $this->getNoLab($username);				
                $data['dataSiswa'] = $this->userModel->selectSiswaNamaLab($username);
				$data['dataSekolah'] = 	$this->userModel->selectSekolahByKodeDaftar($username)->row();
				$data['dataPembimbing'] = 	$this->userModel->selectPembimbingByKode($username)->row();
				$data['dat_lab'] = 	$this->userModel->selectAllPembLabKode($no_lab);
				//$this->userModel->selectLabByKode($no_lab)->row();
				$data['pengajuan'] =	$this->userModel->checkPengajuanProses($username);
				//
                $this->load->view('V_statusDaftar', $data);
				//$this->load->view('V_statusDaftar', $data2);
            }
            else
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Data Tidak Ditemukan.</div>');
                redirect('CekStatus/index');
            }
        }
  }
}


?>