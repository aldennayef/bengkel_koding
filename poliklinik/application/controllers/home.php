<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('modelku');
    }
	
	public function index()
	{
		if(!$this->session->userdata('id')){
			$this->load->view('auth');
		}
		else{
			$data['user'] = $this->modelku->get_where_data('users',['id'=>$this->session->userdata('id')])->row_array();
			$data['pasien'] = count($this->modelku->get_data('pasien'));
			$data['dokter'] = count($this->modelku->get_data('dokter'));
			$data['periksa'] = count($this->modelku->get_data('periksa'));
			$this->load->view('dashboard',$data);
		}
	}

	public function auth(){
		$type = $this->input->post('type');
		if ($type === 'login') {
			$username = $this->input->post('username_login');
			$password = $this->input->post('password_login');
			$dataUser = $this->modelku->get_where_data('users',['username'=>$username])->row_array();
			if($dataUser){
				$pass_verify = password_verify($password,$dataUser['password']);
				if($pass_verify){
					$data = [
						'id' => $dataUser['id'],
						'username' => $dataUser['username']
					];
					$this->session->set_userdata($data);
					header('Content-Type: application/json');
					echo json_encode(['status' => 'success', 'message' => 'Sukses login']);
					return;
				}else{
					header('Content-Type: application/json');
					echo json_encode(['status' => 'error', 'message' => 'Password salah']);
					return;
				}
			}else{
				header('Content-Type: application/json');
				echo json_encode(['status' => 'error', 'message' => 'User tidak terdaftar']);
				return;
			}
		} 
		else {
			// Penanganan register
			$username = $this->input->post('username_register');
			$password = $this->input->post('password_register');
	
			// Validasi username unik dan format
			if (!preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) {
				header('Content-Type: application/json');
				echo json_encode(['status' => 'error', 'message' => 'Username harus minimal 5 karakter, hanya boleh mengandung huruf dan angka']);
				return;
			}
	
			// Cek apakah username sudah ada di database
			if ($this->modelku->get_where_data('users',['username'=>$username])->row_array()) {
				header('Content-Type: application/json');
				echo json_encode(['status' => 'error', 'message' => 'Username sudah digunakan']);
				return;
			}
	
			// Validasi panjang password
			if (strlen($password) < 8) {
				header('Content-Type: application/json');
				echo json_encode(['status' => 'error', 'message' => 'Password harus minimal 8 karakter']);
				return;
			}
	
			// Hash password dengan bcrypt
			$pass_hash = password_hash($password, PASSWORD_BCRYPT);
	
			// Data untuk disimpan
			$data = [
				'username' => $username,
				'password' => $pass_hash
			];
	
			// Simpan data ke database
			if ($this->modelku->insert_data('users',$data)) {
				header('Content-Type: application/json');
				echo json_encode(['status' => 'success']);
			} else {
				header('Content-Type: application/json');
				echo json_encode(['status' => 'error', 'message' => 'Gagal menyimpan data, coba lagi']);
			}
		}
	}

	public function data_dokter(){
		if($this->session->userdata('id')){
			$data['type'] = "data_dokter";
			$data['list_dokter'] = $this->modelku->get_data('dokter');
			$this->load->view('data_master',$data);
		}
		else{
			redirect('home');
		}
	}

	public function data_pasien(){
		if($this->session->userdata('id')){
			$data['type'] = "data_pasien";
			$data['list_pasien'] = $this->modelku->get_data('pasien');
			$this->load->view('data_master',$data);
		}else{
			redirect('home');
		}
	}

	public function data_master(){
		$type = $this->input->post('type');
		if($type === 'datadokter'){
			$data = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('nohp'),
			);
			$this->modelku->insert_data('dokter',$data);
			header('Content-Type: application/json');
			echo json_encode(['status' => 'success']);
		}
		else{
			$data = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('nohp'),
			);
			$this->modelku->insert_data('pasien',$data);
			header('Content-Type: application/json');
			echo json_encode(['status' => 'success']);
		}
	}

	public function periksa(){
		if($this->session->userdata('id')){
			$data['dokter'] = $this->modelku->get_data('dokter');
			$data['pasien'] = $this->modelku->get_data('pasien');
			$data['list_periksa'] = $this->modelku->get_periksa();
			$this->load->view('periksa',$data);
		}else{
			redirect('home');
		}
	}

	public function data_periksa(){
		$data = array(
			'id_dokter' => $this->input->post('iddokter'),
			'id_pasien' => $this->input->post('idpasien'),
			'tgl_periksa' => $this->input->post('tanggalperiksa'),
			'catatan' => $this->input->post('catatan'),
			'obat' => $this->input->post('obat'),
		);
		$this->modelku->insert_data('periksa',$data);
		header('Content-Type: application/json');
		echo json_encode(['status' => 'success']);
	}

	public function delete_data(){
		$type = $this->input->post('type');
		if($type === 'periksa'){
			$where = array(
				'id' => $this->input->post('idPeriksa')
			);
			$this->modelku->delete_data('periksa',$where);
			header('Content-Type: application/json');
			echo json_encode(['status' => 'success']);
		}
		else if($type==='datadokter'){
			$where = array(
				'id' => $this->input->post('iddokter')
			);
			$this->modelku->delete_data('dokter',$where);
			header('Content-Type: application/json');
			echo json_encode(['status' => 'success']);
		}
		else{
			$where = array(
				'id' => $this->input->post('idpasien')
			);
			$this->modelku->delete_data('pasien',$where);
			header('Content-Type: application/json');
			echo json_encode(['status' => 'success']);
		}
	}

	public function get_data() {
		$type = $this->input->post('type');
		if($type==='datapasien'){
			$id = $this->input->post('idPasien');
			$data = $this->db->get_where('pasien', ['id' => $id])->row_array();
		}
		else if($type==='datadokter'){
			$id = $this->input->post('idDokter');
			$data = $this->db->get_where('dokter', ['id' => $id])->row_array();
		}
		else{
			$id = $this->input->post('idPeriksa');
			$data = $this->db->get_where('periksa', ['id' => $id])->row_array();
		}
		echo json_encode($data);
	}

	public function get_data_periksa() {
		$id = $this->input->post('id'); // ID untuk data periksa, jika diperlukan
	
		// Ambil data pasien dan dokter untuk dropdown
		$data['pasien'] = $this->db->get('pasien')->result_array();
		$data['dokter'] = $this->db->get('dokter')->result_array();
	
		// Jika ID dikirimkan, ambil juga data periksa berdasarkan ID
		if ($id) {
			$data['periksa'] = $this->db->get_where('periksa', ['id' => $id])->row_array();
		}
	
		// Kirim data dalam format JSON
		echo json_encode($data);
	}
	

	public function update_data(){
		$type = $this->input->post('type');
		if($type==='datadokter'){
			$data = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('nohp'),
			);
			$where = array(
				'id' => $this->input->post('iddokter')
			);
			$this->modelku->update_data('dokter',$data,$where);
			header('Content-Type: application/json');
			echo json_encode(['status' => 'success']);
		}
		else if($type==='datapasien'){
			$data = array(
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'no_hp' => $this->input->post('nohp'),
			);
			$where = array(
				'id' => $this->input->post('idpasien')
			);
			$this->modelku->update_data('pasien',$data,$where);
			header('Content-Type: application/json');
			echo json_encode(['status' => 'success']);
		}
		else{
			$data = array(
				'id_dokter' => $this->input->post('id_dokter'),
				'id_pasien' => $this->input->post('id_pasien'),
				'tgl_periksa' => $this->input->post('tanggal_periksa'),
				'catatan' => $this->input->post('catatan'),
				'obat' => $this->input->post('obat'),
			);
			$where = array(
				'id' => $this->input->post('id_periksa')
			);
			$this->modelku->update_data('periksa',$data,$where);
			header('Content-Type: application/json');
			echo json_encode(['status' => 'success']);
		}
	}
	

	public function logout(){
		$this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
		header('Content-Type: application/json');
		echo json_encode(['status' => 'success']);
	}

}
