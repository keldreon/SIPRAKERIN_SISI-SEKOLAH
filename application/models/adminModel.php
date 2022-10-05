<?php
Class  adminModel extends CI_Model{
	function __construct(){
		parent::__construct();
		//$this->load->database(); jangan di load, soalnya udah autoload dari autoload.php
	}
	
	//menambah data

	function selectByKode($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id_admin',$kdPetugas);
		return $this->db->get();
	}

	function selectUserByKode($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user',$kdPetugas);
		return $this->db->get();
	}

	function selectJurnalByKode($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('jurnal');
		$this->db->where('id_jurnal',$kdPetugas);
		return $this->db->get();
	}

	function selectAll(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user');
		
		//dikembalikan pada get
		return $this->db->get();
	}	

	function selectAllJurnal(){
		$this->db->select('*');
		$this->db->from('jurnal');
		$this->db->order_by('id_jurnal');
		
		//dikembalikan pada get
		return $this->db->get();
	}	


	function get_akun($uname, $password)
	{
		$this->db->where('uname_admin', $uname);
		$this->db->where('pwd_admin', md5($password));
        $query = $this->db->get('admin');
		return $query->result();
	}

	function get_admin_by_id($id)
	{
		$this->db->where('id_admin', $id);
        $query = $this->db->get('admin');
		return $query->result();
	}

	function get_user_by_id($id)
	{
		$this->db->where('id_user', $id);
        $query = $this->db->get('user');
		return $query->result();
	}

	function j_selectAll(){
		$this->db->select('*');
		$this->db->from('jurnal');
		$this->db->order_by('id_jurnal');
		
		//dikembalikan pada get
		return $this->db->get();
	}

	function updateJurnal($id_jurnal, $data)
	{
		$this->db->where('id_jurnal',$id_jurnal);
		$this->db->update('jurnal',$data);
	}

	function deleteJurnal($id_jurnal)
	{
		$this->db->where('id_jurnal',$id_jurnal);
		$this->db->delete('jurnal');
	}

	function insertJurnal($data){
		$this->db->insert('jurnal',$data);	
	}

	function updateAdmin($id_jurnal, $data)
	{
		$this->db->where('id_jurnal',$id_jurnal);
		$this->db->update('admin',$data);
	}

	function updateAnggota($id_admin, $data)
	{
		$this->db->where('id_user',$id_admin);
		$this->db->update('user',$data);
	}

	function deleteAnggota($id_anggota)
	{
		$this->db->where('id_user',$id_anggota);
		$this->db->delete('user');
	}
}
?>