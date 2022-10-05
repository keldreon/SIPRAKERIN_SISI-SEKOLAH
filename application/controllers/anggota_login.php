<?php
class anggota_login extends CI_Controller {
  public function __construct()
  {

		parent::__construct();
		$this->load->helper(array('form','url','html','security'));
		$this->load->library(array('session', 'form_validation'));
		$this->load->model('userModel');
  }

  public function index()
  {

		// get form input
		$username = $this->input->post("username");
        $password = $this->input->post("password");

		// form validation
		$this->form_validation->set_rules("username", "username", "trim|required|xss_clean");
		$this->form_validation->set_rules("password", "password", "trim|required|xss_clean");
		
		if ($this->form_validation->run() == FALSE)
        {
			// validation fail
			$this->load->view('V_anggota');
		}
		else
		{
			// check for user credentials
			$uresult = $this->userModel->get_akun($username, $password);
			if (count($uresult) > 0)
			{
				// set session
				$sess_data = array('login' => TRUE, 'uname' => $uresult[0]->nama_user, 'id_user' => $uresult[0]->id_user);
				$this->session->set_userdata($sess_data);
				redirect("anggota_home/index");
			}
			else
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Wrong Username or Password!</div>');
				redirect('anggota_login/index');
			}
		}
  }

}

