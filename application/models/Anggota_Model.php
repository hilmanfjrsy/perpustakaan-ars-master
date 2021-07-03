<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Anggota_Model extends CI_Model
{
	public function create($data)
	{
		// input data baru
		if($this->db->insert('anggota', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function read()
	{	
		// baca data
		return $this->db->get('anggota');
	}

	public function update($id, $data)
	{
		// ubah data

		$this->db->where('id_anggota', $id);
		if($this->db->update('anggota', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function show($id)
	{	
		// baca data
		$this->db->where('id_anggota', $id);
		return $this->db->get('anggota');
	}

	public function delete($id)
	{
		// hapus data
		// hard delete atau soft delete
		$this->db->where('id_anggota', $id);
		if($this->db->delete('anggota')){
			return true;
		}else{
			return false;
		}
	}
}