<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcrud extends CI_Model {

	public function get_data($table) {
		return $this->db->get($table);
	}

	//GET
	//halaman admin
	public function getchass()
	{
		$chass = $this->db->query('SELECT * FROM chass order by id_chass desc');
		return $chass;
	}

	public function getadmin()
	{
		$admin = $this->db->query('SELECT * FROM user order by id_user desc');
		return $admin;
	}
	
	public function getchass_id($id)
	{
		$chass = $this->db->query('SELECT * FROM chass where id_chass='.$id);
		return $chass;
	}

	public function insert($data){
		$insert = $this->db->insert_batch('dataset', $data);
		if($insert){
			return true;
		}
	}
	//halaman pesantren
	public function getfasdig_pesantren($id)
	{
		$fasilitas_digital = $this->db->query("SELECT * FROM fasilitas_digital_pesantren a, pesantren b, fasilitas_digital c where a.id_pesantren=b.id_pesantren and a.id_fasilitas_digital=c.id_fasilitas_digital and a.id_pesantren='$id'");
		return $fasilitas_digital;
	}

	public function getsantri_id($id)
	{
		$santri = $this->db->query("SELECT * FROM data_santri a, pesantren b where a.id_pesantren=b.id_pesantren and a.id_pesantren='$id'");
		return $santri;
	}

	public function getpengajar_id($id)
	{
		$pengajar = $this->db->query("SELECT * FROM data_pengajar a, pesantren b where a.id_pesantren=b.id_pesantren and a.id_pesantren='$id'");
		return $pengajar;
	}

	public function getprofil_pesantren_id($id)
	{
		$profil_pesantren = $this->db->query("SELECT * FROM profil_pesantren a, pesantren b where a.id_pesantren=b.id_pesantren and a.id_pesantren='$id'");
		return $profil_pesantren;
	}
	
	//OPERATION
	public function tambah($tabel, $data){
		$add=$this->db->insert($tabel, $data);

		return $add;
	}

	public function insert_data($table, $data){
		$this->db->insert($table, $data);
		return $this->db->affected_rows();
	}

	public function hapus($tabel, $id){
		$this->db->query("DELETE FROM $tabel where $id");
		return $this->db->affected_rows();
	}

	public function update($tabel, $data, $id){
		$this->db->query("UPDATE $tabel set $data where $id");
		return $this->db->affected_rows();
	}

	public function update_data($table, $data, $where) {
		$this->db->where($where);
		$this->db->update($table, $data);
		return $this->db->affected_rows();
	}

	function uploadGambar($nama_file='',$folder='') {
		$this->pathgambar= realpath(APPPATH . "../$folder");
		$config = array(
	'allowed_types' => 'jpg|png|gif|jpeg',
			'upload_path' => $this->pathgambar
		);
		$this->load->library('upload', $config);
		$this->upload->do_upload($nama_file);
		$file_data = $this->upload->data();
		$nama_file = $file_data['file_name'];
		return $nama_file;
	}

	function deleteFile($namagambar='',$folder=''){
		$this->pathgambar = realpath(APPPATH . "../$folder");
		unlink($this->pathgambar."/".$namagambar);
	}

	function kode_fasilitas_digital(){
		$this->db->select('right(id_fasilitas_digital,3) as kode', false);
		$this->db->order_by('id_fasilitas_digital','desc');
		$this->db->limit(1);
		$query=$this->db->get('fasilitas_digital');
		if($query->num_rows()<>0){
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		}

		$kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
		$kodejadi='FD'.$kodemax;

		return $kodejadi;
	}

	function kode_pesantren(){
		$this->db->select('right(id_pesantren,3) as kode', false);
		$this->db->order_by('id_pesantren','desc');
		$this->db->limit(1);
		$query=$this->db->get('pesantren');
		if($query->num_rows()<>0){
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		}

		$kodemax=str_pad($kode,3,"0", STR_PAD_LEFT);
		$kodejadi='TREN'.$kodemax;

		return $kodejadi;
	}

}
