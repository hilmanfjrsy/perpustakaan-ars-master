<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {

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
		$this->load->model('Buku_Model');
	}

	public function index()
	{
		$data = [
			'title' => 'Buku',
			'sub_title' => 'Daftar Buku',
			'content' => 'buku/index',
			'show' => $this->Buku_Model->read()->result()
		];
		$this->load->view('template/my_template', $data);
	}

	public function add()
	{
		$data = [
			'title' => 'Buku',
			'sub_title' => 'Tambah Buku',
			'content' => 'buku/add',
		];
		$this->load->view('template/my_template', $data);
	}

	public function create()
	{

		$data = array(
			'judul_buku' => $this->input->post('judul_buku'),
			'pengarang' => $this->input->post('pengarang'),
			'penerbit' => $this->input->post('penerbit'),
			'isbn' => $this->input->post('isbn'),
			'thn_terbit' => $this->input->post('thn_terbit'),
		);
		// kirim data ke model
		$insert_data = $this->Buku_Model->create($data);

		if($insert_data)
		{
			redirect('buku');
		}
		else
		{
			redirect('buku/add');
		}

	}

	public function delete($id)
	{
		$hapus_data = $this->Buku_Model->soft_delete($id);

		if($hapus_data){
			redirect('buku');
		}else{
			redirect('buku');
		}
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Buku',
			'sub_title' => 'Tambah Buku',
			'content' => 'buku/edit',
			'show' => $this->Buku_Model->show($id)->row()
		];
		$this->load->view('template/my_template', $data);
	}

	public function update()
	{
		$id_buku = $this->input->post('id_buku');

		$data = array(
			'judul_buku' => $this->input->post('judul_buku'),
			'pengarang' => $this->input->post('pengarang'),
			'penerbit' => $this->input->post('penerbit'),
			'isbn' => $this->input->post('isbn'),
			'thn_terbit' => $this->input->post('thn_terbit'),
		);
		// kirim data ke model
		$update_data = $this->Buku_Model->update($id_buku, $data);

		if($update_data)
		{
			redirect('buku');
		}
		else
		{
			redirect('buku/add');
		}

	}
}
