<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Buku_Model extends CI_Model
{
	public function create($data)
	{
		// input data baru
		if($this->db->insert('buku', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function read()
	{	
		// baca data
		$this->db->where('deleted_at is null', null);
		return $this->db->get('buku');
	}

	public function update($id, $data)
	{
		// ubah data

		$this->db->where('id_buku', $id);
		if($this->db->update('buku', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function delete($id)
	{
		// hapus data
		// hard delete atau soft delete
		$this->db->where('id_buku', $id);
		if($this->db->delete('buku')){
			return true;
		}else{
			return false;
		}
	}

	public function soft_delete($id)
	{
		$data = array(
			'deleted_at' => date('Y-m-d H:i:s')
		);
		$this->db->where('id_buku', $id);
		if($this->db->update('buku', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function show($id)
	{	
		// baca data
		$this->db->where('id_buku', $id);
		return $this->db->get('buku');
	}
}