<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Transaksi_Model extends CI_Model
{
	public function create($data)
	{
		// input data baru
		if($this->db->insert('transaksi', $data)){
			return true;
		}else{
			return false;
		}
	}

	public function read()
	{	
		// baca data
		return $this->db->get('transaksi');
	}

	public function update($id, $data)
	{
		// ubah data

		$this->db->where('id_pinjam', $id);
		if($this->db->update('transaksi', $data)){
			return true;
		}else{
			return false;
		}
	}

}