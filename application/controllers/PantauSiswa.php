 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PantauSiswa extends CI_Controller {
  public function __construct()
  {

        parent::__construct();
        $this->load->helper(array('form','url','html','security','date', 'string','text'));
        $this->load->library(array('session', 'form_validation'));
        $this->load->model('userModel');        								
  }

  public function index()
  {

        // get form input
        $username = $this->input->post("kode");//kode_pembimbing
        //$password = $this->input->post("no_rek");//password? 
		//sifatnya flash_message
        //insert harga koin

        // form validation
		if(empty($this->session->tempdata('kpemb'))){
			$this->form_validation->set_rules("kode", "Kode Pengajuan", "trim|required|xss_clean"); 
			$this->load->helper('text');
        
			if ($this->form_validation->run() == FALSE)
			{
				// validation fail
				$this->load->view('V_Pantau');
			}
        else
        {
            // check for user credentials
            $uresult = $this->userModel->checkPengajuanProses($username);
            if ($uresult > 0)
            {	
				$id = $this->userModel->selectIdPembByKMasuk($username);
				$data['dataSiswa'] = $this->userModel->selectSiswaNamaLabExcept($username);
				$data['dataPembimbing'] = 	$this->userModel->selectPembimbingByKode($username)->row();
				$data['catatanKegiatan'] = $this->userModel->selectCatatanByKMasuk($username);
				$data['catatanAbsen'] = $this->userModel->getAbsenByPemb($username);
				/*$no_lab = $this->getNoLab($username);
                $data['dataSiswa'] = $this->userModel->selectSiswaNamaLab($username);
				$data['dataSekolah'] = 	$this->userModel->selectSekolahByKodeDaftar($username)->row();				
				$data['dat_lab'] = 	$this->userModel->selectLabByKode($no_lab)->row();*/
				$this->session->set_tempdata('kpemb', $username, 1800);
				redirect('PantauSiswa/KelolaSiswa');
                //$this->load->view('V_PantauSis', $data);
				//$this->load->view('V_statusDaftar', $data2);
            }
            else
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Data Tidak Ditemukan atau Data belum diproses admin.</div>');
                redirect('PantauSiswa/index');
            }
        }
	}else{
		redirect('PantauSiswa/KelolaSiswa');
	}
  }

  public function klikAbsensi()
  {

		//$ref = $this->input->post('kode_referal');
		$val = $this->input->post('accAbsen');
		$ref = $this->input->post('kode_referal');
		for($x=0;$x<sizeof($val);$x++){
			 //$this->userModel->updateAccKehadiran()			 
			 $this->userModel->updateAccKehadiran($val[$x],$ref[$x]);
		}		
		redirect(site_url('PantauSiswa/index'));
  }

  public function klikCatatan($id)
  {
		
		$username = $this->session->tempdata('kpemb');
		$data['dataPembimbing'] = 	$this->userModel->selectPembimbingByKode($username)->row();
		$data['kegiatanku'] = $this->userModel->selectCatatanById($id)->row();
		$this->load->view('V_detailCatatan',$data);
  }

  public function tes()
  {

		$this->load->view('V_PantauSis');
  }

  public function getNoLab($lab)
  {

		$q1 = $this->userModel->selectKodeLabByKode($lab);
		return $q1;
  }

  public function Absensi()
  {

		$id = $this->input->post('id_absen');
		$val = $this->input->post('accAbsen');
		$ref = $this->input->post('kode_referal');
		for($x=0;$x<sizeof($val);$x++){
			 //$this->userModel->updateAccKehadiran()			 
			 $this->userModel->updateAccKehadiran2($val[$x],$ref[$x],$id[$x]);
		}		
		redirect(site_url('PantauSiswa/index'));
  }

  public function AccKegiatan($id)
  {
		
		$val = 1;				
		$this->userModel->updateAccKegiatan($val,$id);		
		redirect(site_url('PantauSiswa/index'));
  }

  public function RejectKegiatan($id)
  {
		
		$val = 0;				
		$this->userModel->updateAccKegiatan($val,$id);		
		redirect(site_url('PantauSiswa/index'));
  }

  public function logout()
  {

		//$this->session->set_flashdata('kpemb', $username);
		$this->session->unset_tempdata('kpemb');
		redirect(site_url('Home/index'));
  }

  public function KelolaSiswa()
  {

			if(!empty($this->session->tempdata('kpemb'))){
				$username=$this->session->tempdata('kpemb');
				$data['dataSiswa'] = $this->userModel->selectSiswaNamaLabExcept($username);
				$data['dataPembimbing'] = 	$this->userModel->selectPembimbingByKode($username)->row();
				$data['catatanKegiatan'] = $this->userModel->selectCatatanByKMasuk($username);
				$data['catatanAbsen'] = $this->userModel->getAbsenByPemb($username);
				/*$no_lab = $this->getNoLab($username);
				$data['dataSiswa'] = $this->userModel->selectSiswaNamaLab($username);
				$data['dataSekolah'] = 	$this->userModel->selectSekolahByKodeDaftar($username)->row();				
				$data['dat_lab'] = 	$this->userModel->selectLabByKode($no_lab)->row();*/
				$this->session->set_tempdata('kpemb', $username, 1800);
				$this->load->view('V_PantauSis', $data);
			}else{
				redirect(site_url('PantauSiswa/index'));
			}
  }

  function cancelAbsensi($red)
  {
				
		$val = 0;
		$ref = $red;
		$this->userModel->updateAccKehadiranSingle($val,$red);
		redirect(site_url('PantauSiswa/index'));
  }

  function hadirAbsensi($red)
  {

		$val = 1;		
		$this->userModel->updateAccKehadiranSingle($val,$red);
		redirect(site_url('PantauSiswa/index'));
  }

}


?>