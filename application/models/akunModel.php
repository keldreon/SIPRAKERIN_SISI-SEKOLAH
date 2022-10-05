<?php
Class  akunModel extends CI_Model{
	function __construct(){
		parent::__construct();
		//$this->load->database(); jangan di load, soalnya udah autoload dari autoload.php
	}
	//menambah data
	function selectByKode($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('akun_siswa');
		$this->db->where('id_siswa',$kdPetugas);
		return $this->db->get();
	}
	
	function get_akun($uname, $password)
	{
		$this->db->where('username', $uname);
		$this->db->where('password', md5($password));
        $query = $this->db->get('akun');
		return $query->result();
	}

	function insertAkun($data){
		$this->db->insert('akun',$data);	
	}
	
	function updateAkun($id_admin, $data)
	{
		$this->db->where('ID',$id_admin);
		$this->db->update('akun',$data);
	}
}
?>