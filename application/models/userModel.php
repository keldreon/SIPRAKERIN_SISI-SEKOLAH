<?php
class userModel extends CI_Model{
	function __construct(){
		parent::__construct();
		//$this->load->database(); jangan di load, soalnya udah autoload dari autoload.php
	}
	
	//region sekolah
	function getAbsenByPemb($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('absensi');
		$this->db->where('kode_masuk',$kdPetugas);
		$this->db->order_by('waktu_kehadiran','DESC');
		$this->db->order_by('nama_siswa','ASC');
		return $this->db->get();
	}
	
	function updateAccKehadiran($data, $data1)
	{			
			$this->db->set('acc_pembimbing', $data);
			$this->db->where('kode_referal',$data1);
			$this->db->update('absensi');			
	}
	
	//region sekolah
	function selectSekolahByNama($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('data_sekolah');
		$this->db->where('nama_sekolah',$kdPetugas);
		return $this->db->get();
	}
	
	function selectSekolahByKodeDaftar($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('data_sekolah');
		$this->db->where('kode_masuk',$kdPetugas);
		return $this->db->get();
	}
	
	function check_Sekolah($username)
	{		
		$sql = "SELECT * FROM data_sekolah WHERE nama_sekolah=?";
		$query = $this->db->query($sql, array($username ));		

		if($query->num_rows() > 0)
		{						
			return $query->num_rows();
		}else
		{
			return false;
		}
	}	
	
	function check_SiswaACC($username)
	{		
		$acc = 1;
		$sql = "SELECT * FROM data_siswa WHERE id_pembimbing=? && status_penerimaan_lab=? ";		
		$query = $this->db->query($sql, array($username,$acc));		

		if($query->num_rows() > 0)
		{						
			return $query->num_rows();
		}else
		{
			return false;
		}
	}	
	
	function hitungSiswa_lab($username)
	{		
		$this->db->select('*');
		$this->db->from('data_siswa');
		$this->db->where('kode_lab',$username);
		$this->db->where('status_penerimaan_lab !=',2);
		$query = $this->db->count_all_results();		
		if(!empty($query)){
			return $query;	
		}else{
			return 0;	
		}
	}

	function selectSiswaNamaLab($kode){
		/*
		$qtes = $this->getSiswaKMasuk($kode);
		$pemb = $qtes['id_pemb_lab'];
		if(empty($pemb)){
			$this->db->select('*');
			$this->db->from('data_siswa');
			$this->db->where('data_siswa.kode_masuk',$kode);								
			$this->db->join('laboratorium', 'data_siswa.kode_lab = laboratorium.id_lab');
			$query = $this->db->get();		
			
			return $query;		
		}else{
			$this->db->select('*');
			$this->db->from('data_siswa');
			$this->db->where('data_siswa.kode_masuk',$kode);								
			$this->db->join('laboratorium', 'data_siswa.kode_lab = laboratorium.id_lab');		
			$this->db->join('pembimbing_lab', 'data_siswa.kode_lab = pembimbing_lab.id_lab');		
			$query = $this->db->get();		
			
			return $query;					
		}	*/										
			$this->db->select('*');
			$this->db->from('data_siswa');
			$this->db->where('data_siswa.kode_masuk',$kode);								
			$this->db->join('laboratorium', 'data_siswa.kode_lab = laboratorium.id_lab');				
			$query = $this->db->get();		
			
			return $query;					
	}
	
	function selectIsiLab($kode){
		$this->db->select('*');
		$this->db->from('data_siswa');
		$this->db->where('data_siswa.kode_lab',$kode);
		$this->db->where('data_siswa.status_penerimaan_lab !=',2);
		$this->db->join('laboratorium', 'data_siswa.kode_lab = laboratorium.id_lab');
		$this->db->join('data_sekolah', 'data_sekolah.id_sekolah = data_siswa.id_sekolah');	
		$query = $this->db->get();		
		/*
		$sql = "SELECT * FROM data_siswa,laboratorium,pembimbingpembimbing_lab WHERE data_siswa.kode_lab=laboratorium.id_lab && data_siswa.kode_masuk=? && data_siswa.id_pemb_lab = pembimbing_lab.id_pemb_lab";
		$query = $this->db->query($sql, array($kode));
		*/
		return $query;		
	}
	
	function selectSiswaNamaLabExcept($kode){
		$sql = "SELECT * FROM data_siswa,laboratorium, akun_siswa WHERE data_siswa.kode_lab=laboratorium.id_lab && data_siswa.kode_masuk=? && data_siswa.status_penerimaan_lab=? && akun_siswa.id_siswa=data_siswa.id_siswa";
		$query = $this->db->query($sql, array($kode,1));
		return $query;		
	}
	
	function selectKodeSekolahByNama($kdPetugas)
	{
		$this->db->select('id_sekolah');
		$this->db->from('data_sekolah');
		$this->db->where('nama_sekolah',$kdPetugas);
		$query = $this->db->get();
		$row = $query->row();
		return $row->id_sekolah;
	}
	
	function getSiswaByIdPembimbing($kdPetugas)
	{	
		$acc = 1;
		$this->db->from('data_siswa');
		$this->db->where('kode_masuk',$kdPetugas);
		$this->db->where('status_penerimaan_lab',$acc);		
		//$query = $this->db->get();
		//return $query->row_array();
		return $this->db->get();
	}
	
	function getSiswaKMasuk($kdPetugas)
	{			
		$this->db->from('data_siswa');
		$this->db->where('kode_masuk',$kdPetugas);		
		$query = $this->db->get();
		return $query->row_array();		
	}
		
	function selectIdPembByKMasuk($kdPetugas)
	{
		$this->db->select('id_pembimbing');
		$this->db->from('data_siswa');
		$this->db->where('kode_masuk',$kdPetugas);
		$query = $this->db->get();
		$row = $query->row();
		return $row->id_pembimbing;
	}
	
	function selectCatatanByKMasuk($kdPetugas)
	{
		
		$sql = "SELECT id_kegiatan, tanggal_nulis,nama_siswa,judul_tulisan,isi_tulisan,acc_pembimbing FROM data_siswa,kegiatan_siswa WHERE data_siswa.kode_masuk=? && data_siswa.kode_masuk=kegiatan_siswa.kode_masuk && data_siswa.id_siswa=kegiatan_siswa.id_siswa ORDER BY `tanggal_nulis` DESC, `nama_siswa` DESC";		
		$query = $this->db->query($sql, array($kdPetugas));
		return $query;		
		
		/*$this->db->select('*');
		$this->db->from('kegiatan_siswa');
		$this->db->where('kode_masuk',$kdPetugas);
		$this->db->order_by('tanggal_nulis','DESC');
		$query = $this->db->get();		
		return $query;
		*/
	}
	
	function selectCatatanById($kdPetugas)
	{
		
		$sql = "SELECT * FROM kegiatan_siswa, data_siswa WHERE kegiatan_siswa.id_kegiatan=? && kegiatan_siswa.id_siswa=data_siswa.id_siswa";		
		$query = $this->db->query($sql, array($kdPetugas));
		return $query;		
		
		/*$this->db->select('*');
		$this->db->from('kegiatan_siswa');
		$this->db->where('kode_masuk',$kdPetugas);
		$this->db->order_by('tanggal_nulis','DESC');
		$query = $this->db->get();		
		return $query;
		*/
	}
	
	function selectKodeLabByKode($kdPetugas)
	{
		$this->db->select('kode_lab');
		$this->db->from('data_siswa');
		$this->db->where('kode_masuk',$kdPetugas);
		$query = $this->db->get();
		$row = $query->row();
		return $row->kode_lab;
	}
	
	function selectKodePembimbingByNama($kdPetugas)
	{
		$this->db->select('id_pembimbing');
		$this->db->from('data_pembimbing');
		$this->db->where('nama_pembimbing',$kdPetugas);
		$query = $this->db->get();
		$row = $query->row();
		return $row->id_pembimbing;
	}
	
	function selectSekolahByKode($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('data_sekolah');
		$this->db->where('id_sekolah',$kdPetugas);
		return $this->db->get();
	}
	
	//region pembimbing
	function selectPembimbingByNama($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('data_pembimbing');
		$this->db->where('nama_pembimbing',$kdPetugas);
		return $this->db->get();
	}
	
	function selectPembimbingByKode($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('data_pembimbing');
		$this->db->where('kode_masuk',$kdPetugas);
		return $this->db->get();
	}
	
	function check_Pembimbing($username)
	{		
		$sql = "SELECT * FROM data_pembimbing WHERE kode_masuk=?";
		$query = $this->db->query($sql, array($username));		

		if($query->num_rows() > 0)
		{						
			return $query->num_rows();
		}else
		{
			return false;
		}
	}
	
	function checkPengajuanProses($username)
	{		
		$tes =1;
		$sql = "SELECT * FROM data_pembimbing, data_pengajuan WHERE data_pembimbing.kode_masuk=? && data_pembimbing.kode_masuk=data_pengajuan.kode_masuk && data_pengajuan.status_pemrosesan=?";
		$query = $this->db->query($sql, array($username,$tes));		

		if($query->num_rows() > 0)
		{						
			return $query->num_rows();
		}else
		{
			return 0;
		}
	}
	
	function selectAllbyKode($username)
	{		
		$this->db->select('*');
		$this->db->from('data_pembimbing');
		$this->db->from('data_siswa');
		$this->db->where('kode_masuk',$kdPetugas);
		return $this->db->get();
	}	

	//region siswa
	function selectSiswaByNama($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('data_siswa');
		$this->db->where('nama_siswa',$kdPetugas);
		return $this->db->get();
	}
	
	function selectSiswaByNIS($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('data_siswa');
		$this->db->where('NIS_siswa',$kdPetugas);
		return $this->db->get();
	}
	
	function selectSiswaByKode($kdPetugas)
	{
		$this->db->select('*');
		$this->db->from('data_siswa');
		$this->db->where('kode_masuk',$kdPetugas);
		return $this->db->get();
	}
	
	
	function selectSiswaByPembimbing($kdPetugas, $kddua)
	{
		$this->db->select('*');
		$this->db->from('data_siswa');
		$this->db->where('id_pembimbing',$kddua);		
		return $this->db->get();
	}
	
	
	function selectAllSiswa(){
		$this->db->select('*');
		$this->db->from('data_siswa');
		$this->db->order_by('id_siswa');
		
		//dikembalikan pada get
		return $this->db->get();
	}	
	
	function insert_siswa($data)
    {
		return $this->db->insert('data_siswa', $data);
	}
	
	function insert_sekolah($data)
    {
		return $this->db->insert('data_sekolah', $data);
	}
	
	function insert_pembimbing($data)
    {
		return $this->db->insert('data_pembimbing', $data);
	}		

	function selectAllJurnal(){
		$this->db->select('*');
		$this->db->from('jurnal');
		$this->db->where('status',"Layak");
		$this->db->order_by('id_jurnal');
		
		//dikembalikan pada get
		return $this->db->get();
	}
	
	//lab section
	function selectAllLab(){
		$this->db->select('*');
		$this->db->from('laboratorium');		
		$this->db->order_by('id_lab');
		
		//dikembalikan pada get
		return $this->db->get();
	}		
	
	function selectAllPembLabKode($kode){
		$this->db->select('*');
		$this->db->from('pembimbing_lab');		
		$this->db->where('id_lab',$kode);		
		$this->db->order_by('id_pemb_lab');
		
		//dikembalikan pada get
		return $this->db->get();
	}		

	function selectNamaLab(){
		$this->db->select('nama_lab');
		$this->db->from('laboratorium');						
		//dikembalikan pada get
		return $this->db->get();
	}
	
	function selectNamaLabById($idk){
		$this->db->select('nama_lab');
		$this->db->from('laboratorium');	
		$this->db->where('id_lab',$idk);	
		$query = $this->db->get();
		$row = $query->row();
		return $row->nama_lab;
	}
	
	function selectLabByKode($id){
		$this->db->select('*');
		$this->db->from('laboratorium');
		$this->db->where('id_lab',$id);
		return $this->db->get();
	}
		
	function getQuantitybyLabKode($id){
		$this->db->select('kapasitas_isi');
		$this->db->from('laboratorium');
		$this->db->where('id_lab',$id);
		$query =  $this->db->get();
		$row = $query->row();
		return $row->kapasitas_isi;
	}
	
	function insertPengajuan($data){
		$this->db->insert('data_pengajuan', $data);	
	}

	//fungsi login
	function get_akun($uname, $password)
	{
		$this->db->where('uname_user', $uname);
		$this->db->where('pwd_user', md5($password));
		$this->db->where('pengakuan',"Sah");
        $query = $this->db->get('user');
		return $query->result();
	}

	//jaga-jaga jika mau modif data diri, maka perlu get_byid
	function get_user_by_id($id)
	{
		$this->db->where('id_user', $id);
        $query = $this->db->get('user');
		return $query->result();
	}

	function get_jurnal_by_id($id)
	{
		$this->db->where('id_jurnal', $id);
        $query = $this->db->get('jurnal');
		return $query->result();
	}
	
	function updateProfil($id_jurnal, $jml)
	{
		$this->db->where('id_user',$id_jurnal);
		$this->db->update('user',$data);
	}
	
	function updateCapLab($id_jurnal, $jml)
	{
		$sql = "UPDATE laboratorium SET kapasitas_isi =  ? WHERE id_lab = ?";
		$this->db->query($sql, array($jml, $id_jurnal));		
	}

	function insert_user($data)
    {
		return $this->db->insert('user', $data);
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

	function selectFileByKode($kdPetugas)
	{
		$this->db->select('alamat_file');
		$this->db->from('jurnal');
		$this->db->where('id_jurnal',$kdPetugas);
		return $this->db->get();
	}

	function getData($awal, $akhir){
		$hasil = $this->db->get('jurnal',$awal,$akhir);
		return $hasil;
	}	

	function cari($keyword, $kategori)
	{
		if($kategori == 'author'){
			$this->db->select('*');
			$this->db->from('jurnal');
			$this->db->like('author',$keyword);
			return $this->db->get();	
		}
		else if($kategori == 'judul_jurnal'){
			$this->db->select('*');
			$this->db->from('jurnal');
			$this->db->like('judul_jurnal',$keyword);
			return $this->db->get();		
		}
		else if($kategori == 'keyword'){
			$this->db->select('*');
			$this->db->from('jurnal');
			$this->db->like('keyword',$keyword);
			return $this->db->get();			
		}
	}
	
	function updateAccKehadiran2($data, $data1,$data2)
	{			
			$this->db->set('acc_pembimbing', $data);
			$this->db->where('kode_referal',$data1);
			$this->db->where('id_absen',$data2);
			$this->db->update('absensi');			
	}
	
	
	function updateAccKegiatan($data, $data2)
	{			
			$this->db->set('acc_pembimbing', $data);
			$this->db->where('id_kegiatan',$data2);
			$this->db->update('kegiatan_siswa');			
	}
	
	function updateAccKehadiranSingle($data, $data1)
	{			
			$this->db->set('acc_pembimbing', $data);			
			$this->db->where('id_absen',$data1);
			$this->db->update('absensi');			
	}
	
	function getStatusAcc($data)
	{			
			$this->db->select('acc_pembimbing');			
			$this->db->where('id_kegiatan',$data);
			$query = $this->db->get('kegiatan_siswa');			
			return $query->row_array();
	}
	
	function getAllIDLab()
	{			
			$this->db->select('id_lab');				
			$query = $this->db->get('laboratorium');			
			return $query->row_array();
	}
	/*
	pertanyaan :
	1. data siswa sudah mencakup status penerimaan lab atau tidak?
	2. tiap lab perlu entitas sendiri atau ditambahkan juga peminatan lab di data siswa?
	3. kalau surat fomatnya gimana? apa .pdf aja atau gimana? surat cuma dipegang pembimbing dalam db?
	4. status itu terdiri dari ditolak di proses sama di terima. kalau ditolak gak bisa ngeakses lagi?
	5. setelah diterima ngapain aja hak pembimbing itu?
	*/
}
?>