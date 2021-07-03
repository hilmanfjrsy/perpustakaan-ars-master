<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
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
		$this->load->model('Anggota_Model');
	}

	function enum_select($table, $field)
	{
		$query = "SHOW COLUMNS FROM " . $table . " LIKE '$field'";
		$row = $this->db->query("SHOW COLUMNS FROM " . $table . " LIKE '$field'")->row()->Type;
		$regex = "/'(.*?)'/";
		preg_match_all($regex, $row, $enum_array);
		$enum_fields = $enum_array[1];
		foreach ($enum_fields as $key => $value) {
			$enums[$value] = $value;
		}
		return $enums;
	}

	public function delete($id)
	{
		$hapus_data = $this->Anggota_Model->delete($id);

		if($hapus_data){
			redirect('anggota');
		}else{
			redirect('anggota');
		}
	}

	public function index()
	{
		$query = $this->db->get('anggota');
		$data = [
			'title' => 'Anggota',
			'sub_title' => 'Daftar Anggota',
			'content' => 'anggota/index',
			'show' => $this->Anggota_Model->read()->result()
		];
		$this->load->view('template/my_template', $data);
	}

	public function add()
	{
		$query = $this->enum_select('anggota', 'gender');
		$data = [
			'title' => 'Anggota',
			'sub_title' => 'Tambah Anggota',
			'content' => 'anggota/add',
			'show' => $query
		];
		$this->load->view('template/my_template', $data);
	}

	public function edit($id)
	{
		$query = $this->enum_select('anggota', 'gender');
		$data = [
			'title' => 'Anggota',
			'sub_title' => 'Edit Anggota',
			'content' => 'anggota/edit',
			'gender' => $query,
			'show' => $this->Anggota_Model->show($id)->row()
		];
		$this->load->view('template/my_template', $data);
	}
	
	public function create()
	{
		$data = array(
			'nama_anggota' => $this->input->post('nama_anggota'),
			'gender' => $this->input->post('gender'),
			'no_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
		);
		// kirim data ke model
		$insert_data = $this->Anggota_Model->create($data);

		if ($insert_data) {
			redirect('anggota');
		} else {
			redirect('anggota/add');
		}
	}
	public function update()
	{
		$id_anggota = $this->input->post('id_anggota');

		$data = array(
			'nama_anggota' => $this->input->post('nama_anggota'),
			'gender' => $this->input->post('gender'),
			'no_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
		);
		// kirim data ke model
		$update_data = $this->Anggota_Model->update($id_anggota, $data);

		if($update_data)
		{
			redirect('anggota');
		}
		else
		{
			redirect('anggota/add');
		}

	}
}
