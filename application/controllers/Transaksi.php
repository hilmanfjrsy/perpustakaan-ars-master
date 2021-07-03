<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_Model');
		$this->load->model('Anggota_Model');
		$this->load->model('Buku_Model');
	}

	public function pengembalian()
	{
		$this->db->select('*')
			->from('transaksi')
			->join('anggota','transaksi.id_anggota=anggota.id_anggota')
			->join('buku','transaksi.id_buku=buku.id_buku')
			->where('buku.deleted_at',null)
			->where('transaksi.status_pengembalian',1)
			->where('transaksi.status_peminjaman',1);
		$query = $this->db->get(); 
		$data = [
			'title' => 'Pengembalian',
			'sub_title' => 'Daftar Pengembalian',
			'content' => 'transaksi/pengembalian',
			'show' => $query->result()
		];
		$this->load->view('template/my_template', $data);
	}

	public function peminjaman()
	{
		$this->db->select('*')
			->from('transaksi')
			->join('anggota','transaksi.id_anggota=anggota.id_anggota')
			->join('buku','transaksi.id_buku=buku.id_buku')
			->where('buku.deleted_at',null)
			->where('transaksi.status_pengembalian',0)
			->where('transaksi.status_peminjaman',1);
		$query = $this->db->get(); 
		$data = [
			'title' => 'Peminjaman',
			'sub_title' => 'Daftar Peminjaman',
			'content' => 'transaksi/peminjaman',
			'show' => $query->result()
		];
		$this->load->view('template/my_template', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Peminjaman',
			'sub_title' => 'Tambah Data',
			'content' => 'transaksi/add',
			'anggota' => $this->Anggota_Model->read()->result(),
			'buku' => $this->Buku_Model->read()->result(),
		];
		$this->load->view('template/my_template', $data);
	}

	public function create()
	{
		$data = array(
			'id_anggota' => $this->input->post('id_anggota'),
			'id_buku' => $this->input->post('id_buku'),
			'tgl_pinjam' => $this->input->post('tgl_pinjam'),
			'tgl_kembali' => $this->input->post('tgl_kembali'),
			'denda' => $this->input->post('denda'),
			'status_peminjaman' => 1,
			'tgl_pencatatan' => date('Y-m-d H:i:s')
		);
		// kirim data ke model
		$insert_data = $this->Transaksi_Model->create($data);

		if ($insert_data) {
			redirect('transaksi/peminjaman');
		} else {
			redirect('transaksi/add');
		}
	}

	public function update($id_pinjam,$denda,$tgl_pengembalian)
	{
		$data = array(
			'tgl_pengembalian' => $tgl_pengembalian,
			'total_denda' => $denda,
			'status_pengembalian' => 1,
		);
		// kirim data ke model
		$update_data = $this->Transaksi_Model->update($id_pinjam, $data);

		if($update_data)
		{
			redirect('transaksi/pengembalian');
		}
		else
		{
			redirect('transaksi/peminjaman');
		}

	}
}
