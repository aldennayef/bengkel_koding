<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Krs extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->model('modelku');
    }

	public function index()
	{
		$data['mahasiswa'] = $this->modelku->get_data('inputMhs');
		$this->load->view('template/header');
		$this->load->view('index', $data);
		$this->load->view('template/footer');
	}

	public function v_edit_mahasiswa($id)
	{
		$data['mahasiswa'] = $this->modelku->get_where_data('inputmhs',array('id'=>$id))->row_array();
		$data['jadwal'] = $this->modelku->get_where_data('jwl_mhs',array('mhs_id'=>$id))->result_array();
		$data['matkulDiambil'] = $this->modelku->get_where_data('jwl_mhs', ['mhs_id' => $id])->result_array();
		$data['matkul'] = $this->modelku->get_data('jwl_matakuliah');
		$this->load->view('template/header');
		$this->load->view('edit_mahasiswa', $data);
		$this->load->view('template/footer');
	}

	public function v_matkul(){
		$data['matakuliah'] = $this->modelku->get_data('jwl_matakuliah');
		$this->load->view('template/header');
		$this->load->view('input_matkul', $data);
		$this->load->view('template/footer');
	}

	public function v_unduh_krs($idmhs){
		$data['mahasiswa'] = $this->modelku->get_where_data('inputmhs',array('id'=>$idmhs))->row_array();
		$data['jadwal'] = $this->modelku->get_where_data('jwl_mhs',array('mhs_id'=>$idmhs))->result_array();
		$data['matkulDiambil'] = $this->modelku->get_where_data('jwl_mhs', ['mhs_id' => $idmhs])->result_array();
		$data['matkul'] = $this->modelku->get_data('jwl_matakuliah');
		$this->load->view('template/header');
		$this->load->view('unduh_krs', $data);
		$this->load->view('template/footer');
	}

	public function unduh_krs($idmhs){
		$this->load->library('Pdfgenerator');
		$data['mahasiswa'] = $this->modelku->get_where_data('inputmhs',array('id'=>$idmhs))->row_array();
		$data['jadwal'] = $this->modelku->get_where_data('jwl_mhs',array('mhs_id'=>$idmhs))->result_array();
		$data['matkulDiambil'] = $this->modelku->get_where_data('jwl_mhs', ['mhs_id' => $idmhs])->result_array();
		$data['matkul'] = $this->modelku->get_data('jwl_matakuliah');
        $data['title'] = "KRS ".$data['mahasiswa']['namaMhs'];
        $file_pdf = $data['title'];
        $paper = 'A4';
        $orientation = "landscape";
        $html = $this->load->view('template_pdf', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function input_mhs(){
		$nama = $this->input->post('namaMhs');
		$nim = $this->input->post('nimMhs');
		$ipk = $this->input->post('ipkMhs');

		if($ipk < 3){
			$sks = 20;
		}
		else{
			$sks = 24;
		}

		$data = array(
			'namaMhs' => $nama,
			'nim' => $nim,
			'ipk' => $ipk,
			'sks' => $sks,
			'matakuliah' => '-'
		);

		if($this->modelku->insert_data('inputMhs', $data)){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'success']);
		}else {
			header('Content-Type: application/json');
			echo json_encode(['status' => 'error']);
		}
	}

	public function input_matkul(){
		$nama = $this->input->post('namaMatkul');
		$sks = $this->input->post('sksMatkul');
		$kelp = $this->input->post('kelpMatkul');
		$ruangan = $this->input->post('ruanganMatkul');

		$data = array(
			'matakuliah' => $nama,
			'sks' => $sks,
			'kelp' => $kelp,
			'ruangan' => $ruangan,
		);

		if($this->modelku->insert_data('jwl_matakuliah', $data)){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'success']);
		}else {
			header('Content-Type: application/json');
			echo json_encode(['status' => 'error']);
		}
	}

	public function hapus_mhs() {
		$id = $this->input->post('id');
	
		// Hitung jumlah data terkait di jwl_mhs
		$related_count = $this->db->where('mhs_id', $id)->count_all_results('jwl_mhs');
	
		if ($related_count > 0) {
			// Hapus data terkait
			$this->modelku->delete_data('jwl_mhs', array('mhs_id' => $id));
		}
	
		// Hapus data mahasiswa
		$delete_inputmhs = $this->modelku->delete_data('inputmhs', array('id' => $id));
	
		if ($delete_inputmhs) {
			header('Content-Type: application/json');
			echo json_encode(['status' => 'success', 'deleted_related' => $related_count]);
		} else {
			header('Content-Type: application/json');
			echo json_encode(['status' => 'error']);
		}
	}
	

	public function hapus_matkul(){
		$id = $this->input->post('id');

		if($this->modelku->delete_data('jwl_matakuliah',array('id'=>$id))){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'success']);
		}
		else{
			header('Content-Type: application/json');
			echo json_encode(['status' => 'error']);
		}
	}

	public function get_data_matkul(){
		$id = $this->input->post('id');
		$data = $this->modelku->get_where_data('jwl_matakuliah',array('id'=>$id))->row_array();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function edit_matkul(){
		$id = $this->input->post('idMatkul');
		$nama = $this->input->post('namaMatkul');
		$sks = $this->input->post('sksMatkul');
		$kelp = $this->input->post('kelpMatkul');
		$ruangan = $this->input->post('ruanganMatkul');

		$data = array(
			'matakuliah' => $nama,
			'sks' => $sks,
			'kelp' => $kelp,
			'ruangan' => $ruangan,
		);

		if($this->modelku->update_data('jwl_matakuliah', $data, array('id'=>$id))){
			header('Content-Type: application/json');
			echo json_encode(['status' => 'success']);
		}else {
			header('Content-Type: application/json');
			echo json_encode(['status' => 'error']);
		}
	}

	public function tambah_krs()
	{
		$input = json_decode(file_get_contents('php://input'), true); // Decode JSON
		$mahasiswa_id = $input['mahasiswa_id'];
		$matkul_data = $input['matkul'];
		$sks = 0;
		$matkul_list = []; // Array untuk menyimpan nama mata kuliah baru

		$mhs = $this->modelku->get_where_data('inputmhs', array('id' => $mahasiswa_id))->row_array();

		// Validasi input
		if (empty($mahasiswa_id) || empty($matkul_data)) {
			echo json_encode(['status' => 'error', 'message' => 'Data tidak lengkap!']);
			return;
		}

		// Simpan ke database
		foreach ($matkul_data as $matkul) {
			$data = [
				'mhs_id' => $mahasiswa_id,
				'matakuliah' => $matkul['matakuliah'],
				'sks' => $matkul['sks'],
				'kelp' => $matkul['kelp'],
				'ruangan' => $matkul['ruangan']
			];

			$sks += $matkul['sks']; // Tambahkan SKS
			$matkul_list[] = $matkul['matakuliah']; // Tambahkan nama mata kuliah ke list
			$this->modelku->insert_data('jwl_mhs', $data);
		}

		// Gabungkan dengan data mata kuliah yang sudah ada di tabel inputmhs
		$existing_matkul = isset($mhs['matakuliah']) ? $mhs['matakuliah'] : ''; // Mata kuliah yang sudah ada
		if (!empty($existing_matkul)) {
			$matkul_list = array_merge(explode(', ', $existing_matkul), $matkul_list); // Gabungkan mata kuliah lama dan baru
		}

		// Update SKS di tabel inputmhs
		$sksMhs = $mhs['sks'] - $sks;
		$datas = [
			'sks' => $sksMhs,
			'matakuliah' => implode(', ', $matkul_list) // Gabungkan nama mata kuliah dengan koma
		];
		$this->modelku->update_data('inputmhs', $datas, array('id' => $mahasiswa_id));

		header('Content-Type: application/json');
		echo json_encode(['status' => 'success', 'message' => 'Data berhasil ditambahkan!']);
	}

	public function hapus_krs()
	{
		$id = $this->input->post('id'); // ID data di jwl_mhs
		$matkul = $this->input->post('matkul'); // Nama mata kuliah yang akan dihapus
		$sks = $this->input->post('sks'); // Jumlah sks
	
		// Ambil data mahasiswa berdasarkan ID
		$jadwal = $this->modelku->get_where_data('jwl_mhs', ['id' => $id])->row_array();
		if (!$jadwal) {
			header('Content-Type: application/json');
			echo json_encode(['status' => 'error', 'message' => 'Data tidak ditemukan!']);
			return;
		}
	
		$mhs_id = $jadwal['mhs_id']; // Ambil mhs_id dari jadwal
		$mahasiswa = $this->modelku->get_where_data('inputmhs', ['id' => $mhs_id])->row_array();
		if (!$mahasiswa) {
			header('Content-Type: application/json');
			echo json_encode(['status' => 'error', 'message' => 'Mahasiswa tidak ditemukan!']);
			return;
		}
	
		// Hapus data dari tabel jwl_mhs
		$this->modelku->delete_data('jwl_mhs', ['id' => $id]);
	
		// Update kolom matakuliah di tabel inputmhs
		$matkul_list = explode(', ', $mahasiswa['matakuliah']); // Pecah matkul menjadi array
		$matkul_list = array_filter($matkul_list, function ($item) use ($matkul) {
			return $item !== $matkul; // Hapus matkul yang dihapus dari list
		});
	
		$sksUpdate = $mahasiswa['sks'] + $sks;
		$update_data = [
			'matakuliah' => implode(', ', $matkul_list), // Gabungkan kembali list matkul
			'sks' => $sksUpdate
		];
		$this->modelku->update_data('inputmhs', $update_data, ['id' => $mhs_id]);
	

		header('Content-Type: application/json');
		echo json_encode(['status' => 'success', 'message' => 'Data berhasil dihapus!']);
	}
	




}