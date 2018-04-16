<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Sekolah extends CI_Controller
{

	public $table = 'tbl_sekolah';

	function __construct()
	{
		parent::__construct();
		is_login();
		//$this->load->library('ssp');
		$this->load->model('Tbl_sekolah_model');
		$this->load->library('form_validation');
		$this->load->library('datatables');
		$this->load->library(array('PHPExcel','PHPExcel/PHPExcel_IOFactory'));
	}    

	public function data() {
        // Nama table
		$table = 'tbl_sekolah';
        // Nama primaryKey
		$primaryKey = 'id_data_sekolah';
        // List field
		$columns = array(
			array('db' => 'id_data_sekolah', 'dt' => 'id_data_sekolah'),
			array('db' => 'npsn', 'dt' => 'npsn'),
			array('db' => 'nss', 'dt' => 'nss'),
			array('db' => 'id_bentuk_sekolah', 'dt' => 'id_bentuk_sekolah'),
			array('db' => 'nama_sekolah', 'dt' => 'nama_sekolah'),
			array('db' => 'status_sekolah', 'dt' => 'status_sekolah'),
			array('db' => 'id_status_kepemilikan', 'dt' => 'id_status_kepemilikan'),
			array('db' => 'id_opdpembina', 'dt' => 'id_opdpembina'),
			array('db' => 'kebutuhan_khusus', 'dt' => 'kebutuhan_khusus'),
			array('db' => 'mbs', 'dt' => 'mbs'),
			array('db' => 'penerima_bos', 'dt' => 'penerima_bos'),
			array('db' => 'sertifikat_iso', 'dt' => 'sertifikat_iso'),
			array('db' => 'id_kategori_wilayah', 'dt' => 'id_kategori_wilayah'),
			array('db' => 'id_waktu_penyelengaraan', 'dt' => 'id_waktu_penyelengaraan'),
			array('db' => 'no_sk_pendirian', 'dt' => 'no_sk_pendirian'),
			array('db' => 'tgl_sk', 'dt' => 'tgl_sk'),
			array('db' => 'file_pendirian', 'dt' => 'file_pendirian'),
			array('db' => 'logo', 'dt' => 'logo'),
			array('db' => 'province_id', 'dt' => 'province_id'),
			array('db' => 'regency_id', 'dt' => 'regency_id'),
			array('db' => 'id_districts', 'dt' => 'id_districts'),
			array('db' => 'id_villages', 'dt' => 'id_villages'),
			array('db' => 'alamat', 'dt' => 'alamat'),
			array('db' => 'rt', 'dt' => 'rt'),
			array('db' => 'rw', 'dt' => 'rw'),
			array('db' => 'dusun', 'dt' => 'dusun'),
			array('db' => 'postal_code', 'dt' => 'postal_code'),
			array('db' => 'lintang', 'dt' => 'lintang'),
			array('db' => 'bujur', 'dt' => 'bujur'),
			array('db' => 'kode_registrasi', 'dt' => 'kode_registrasi'),
			array('db' => 'no_tlp', 'dt' => 'no_tlp'),
			array('db' => 'no_fax', 'dt' => 'no_fax'),
			array('db' => 'hp', 'dt' => 'hp'),
			array('db' => 'email', 'dt' => 'email'),
			array('db' => 'website', 'dt' => 'website'),
			array('db' => 'no_rekening', 'dt' => 'no_rekening'),
			array('db' => 'nama_bank', 'dt' => 'nama_bank'),
			array('db' => 'cabang_bank', 'dt' => 'cabang_bank'),
			array('db' => 'nama_direkening', 'dt' => 'nama_direkening'),
			array('db' => 'luas_tanahmilik', 'dt' => 'luas_tanahmilik'),
			array('db' => 'luas_tanahbukanmilik', 'dt' => 'luas_tanahbukanmilik'),
			array('db' => 'nama_wajibpajak', 'dt' => 'nama_wajibpajak'),
			array('db' => 'no_npwp', 'dt' => 'no_npwp'),
			array('db' => 'tgl_input', 'dt' => 'tgl_input'),
			array('db' => 'user_input', 'dt' => 'user_input'),
			array('db' => 'user_update', 'dt' => 'user_update'),
			array('db' => 'tgl_update', 'dt' => 'tgl_update'),
			array(
				'db' => 'id_data_sekolah',
				'dt' => 'aksi',
				'formatter' => function( $d, $row ) {
					return anchor('sekolah/read/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-eye"></i>',"class='label bg-green'").' '.
					anchor('sekolah/update/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-edit"></i>',"class='label bg-blue'");
					return $this->datatables->generate();
				}
			)
		);

		$sql_details = array(
			'user' => $this->db->username,
			'pass' => $this->db->password,
			'db' => $this->db->database,
			'host' => $this->db->hostname
		);

		echo json_encode(
			SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
		);
	}

	public function index()
	{
		$this->template->load('template','sekolah/tbl_sekolah_list');
	} 

	public function json() {
		header('Content-Type: application/json');
		echo $this->Tbl_sekolah_model->json();
	}

	public function read($id) 
	//public function read($key) 
	{
		//$key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
		$row = $this->Tbl_sekolah_model->get_by_id($id);
		if ($row) {
			$data = array(
				'id_data_sekolah' => $row->id_data_sekolah,
				'npsn' => $row->npsn,
				'nss' => $row->nss,
				'id_bentuk_sekolah' => $row->id_bentuk_sekolah,
				'nama_sekolah' => $row->nama_sekolah,
				'status_sekolah' => $row->status_sekolah,
				'id_status_kepemilikan' => $row->id_status_kepemilikan,
				'id_opdpembina' => $row->id_opdpembina,
				'kebutuhan_khusus' => $row->kebutuhan_khusus,
				'mbs' => $row->mbs,
				'penerima_bos' => $row->penerima_bos,
				'sertifikat_iso' => $row->sertifikat_iso,
				'id_kategori_wilayah' => $row->id_kategori_wilayah,
				'id_waktu_penyelengaraan' => $row->id_waktu_penyelengaraan,
				'no_sk_pendirian' => $row->no_sk_pendirian,
				'tgl_sk' => $row->tgl_sk,
				'file_pendirian' => $row->file_pendirian,
				'logo' => $row->logo,
				'province_id' => $row->province_id,
				'regency_id' => $row->regency_id,
				'id_districts' => $row->id_districts,
				'id_villages' => $row->id_villages,
				'alamat' => $row->alamat,
				'rt' => $row->rt,
				'rw' => $row->rw,
				'dusun' => $row->dusun,
				'postal_code' => $row->postal_code,
				'lintang' => $row->lintang,
				'bujur' => $row->bujur,
				'kode_registrasi' => $row->kode_registrasi,
				'no_tlp' => $row->no_tlp,
				'no_fax' => $row->no_fax,
				'hp' => $row->hp,
				'email' => $row->email,
				'website' => $row->website,
				'no_rekening' => $row->no_rekening,
				'nama_bank' => $row->nama_bank,
				'cabang_bank' => $row->cabang_bank,
				'nama_direkening' => $row->nama_direkening,
				'luas_tanahmilik' => $row->luas_tanahmilik,
				'luas_tanahbukanmilik' => $row->luas_tanahbukanmilik,
				'nama_wajibpajak' => $row->nama_wajibpajak,
				'no_npwp' => $row->no_npwp,
				'tgl_input' => $row->tgl_input,
				'user_input' => $row->user_input,
				'user_update' => $row->user_update,
				'tgl_update' => $row->tgl_update,
			);
			$this->template->load('template','sekolah/tbl_sekolah_profile', $data);
			//$this->template->load('template','sekolah/tbl_sekolah_read', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sekolah'));
		}
	}

	public function create() 
	{
		$data = array(
			'button' => 'Create',
			'action' => site_url('sekolah/create_action'),
			'id_data_sekolah' => set_value('id_data_sekolah'),
			'npsn' => set_value('npsn'),
			'nss' => set_value('nss'),
			'id_bentuk_sekolah' => set_value('id_bentuk_sekolah'),
			'nama_sekolah' => set_value('nama_sekolah'),
			'status_sekolah' => set_value('status_sekolah'),
			'id_status_kepemilikan' => set_value('id_status_kepemilikan'),
			'id_opdpembina' => set_value('id_opdpembina'),
			'kebutuhan_khusus' => set_value('kebutuhan_khusus'),
			'mbs' => set_value('mbs'),
			'penerima_bos' => set_value('penerima_bos'),
			'sertifikat_iso' => set_value('sertifikat_iso'),
			'id_kategori_wilayah' => set_value('id_kategori_wilayah'),
			'id_waktu_penyelengaraan' => set_value('id_waktu_penyelengaraan'),
			'no_sk_pendirian' => set_value('no_sk_pendirian'),
			'tgl_sk' => set_value('tgl_sk'),
			'file_pendirian' => set_value('file_pendirian'),
			'logo' => set_value('logo'),
			'province_id' => set_value('province_id'),
			'regency_id' => set_value('regency_id'),
			'id_districts' => set_value('id_districts'),
			'id_villages' => set_value('id_villages'),
			'alamat' => set_value('alamat'),
			'rt' => set_value('rt'),
			'rw' => set_value('rw'),
			'dusun' => set_value('dusun'),
			'postal_code' => set_value('postal_code'),
			'lintang' => set_value('lintang'),
			'bujur' => set_value('bujur'),
			'kode_registrasi' => set_value('kode_registrasi'),
			'no_tlp' => set_value('no_tlp'),
			'no_fax' => set_value('no_fax'),
			'hp' => set_value('hp'),
			'email' => set_value('email'),
			'website' => set_value('website'),
			'no_rekening' => set_value('no_rekening'),
			'nama_bank' => set_value('nama_bank'),
			'cabang_bank' => set_value('cabang_bank'),
			'nama_direkening' => set_value('nama_direkening'),
			'luas_tanahmilik' => set_value('luas_tanahmilik'),
			'luas_tanahbukanmilik' => set_value('luas_tanahbukanmilik'),
			'nama_wajibpajak' => set_value('nama_wajibpajak'),
			'no_npwp' => set_value('no_npwp'),
			'tgl_input' => set_value('tgl_input'),
			'user_input' => set_value('user_input'),
			'user_update' => set_value('user_update'),
			'tgl_update' => set_value('tgl_update'),
		);
		$this->template->load('template','sekolah/tbl_sekolah_form', $data);
	}

	public function create_action() 
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$data = array(
				'npsn' => $this->input->post('npsn',TRUE),
				'nss' => $this->input->post('nss',TRUE),
				'id_bentuk_sekolah' => $this->input->post('id_bentuk_sekolah',TRUE),
				'nama_sekolah' => $this->input->post('nama_sekolah',TRUE),
				'status_sekolah' => $this->input->post('status_sekolah',TRUE),
				'id_status_kepemilikan' => $this->input->post('id_status_kepemilikan',TRUE),
				'id_opdpembina' => $this->input->post('id_opdpembina',TRUE),
				'kebutuhan_khusus' => $this->input->post('kebutuhan_khusus',TRUE),
				'mbs' => $this->input->post('mbs',TRUE),
				'penerima_bos' => $this->input->post('penerima_bos',TRUE),
				'sertifikat_iso' => $this->input->post('sertifikat_iso',TRUE),
				'id_kategori_wilayah' => $this->input->post('id_kategori_wilayah',TRUE),
				'id_waktu_penyelengaraan' => $this->input->post('id_waktu_penyelengaraan',TRUE),
				'no_sk_pendirian' => $this->input->post('no_sk_pendirian',TRUE),
				'tgl_sk' => $this->input->post('tgl_sk',TRUE),
				'file_pendirian' => $this->input->post('file_pendirian',TRUE),
				'logo' => $this->input->post('logo',TRUE),
				'province_id' => $this->input->post('province_id',TRUE),
				'regency_id' => $this->input->post('regency_id',TRUE),
				'id_districts' => $this->input->post('id_districts',TRUE),
				'id_villages' => $this->input->post('id_villages',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'rt' => $this->input->post('rt',TRUE),
				'rw' => $this->input->post('rw',TRUE),
				'dusun' => $this->input->post('dusun',TRUE),
				'postal_code' => $this->input->post('postal_code',TRUE),
				'lintang' => $this->input->post('lintang',TRUE),
				'bujur' => $this->input->post('bujur',TRUE),
				'kode_registrasi' => $this->input->post('kode_registrasi',TRUE),
				'no_tlp' => $this->input->post('no_tlp',TRUE),
				'no_fax' => $this->input->post('no_fax',TRUE),
				'hp' => $this->input->post('hp',TRUE),
				'email' => $this->input->post('email',TRUE),
				'website' => $this->input->post('website',TRUE),
				'no_rekening' => $this->input->post('no_rekening',TRUE),
				'nama_bank' => $this->input->post('nama_bank',TRUE),
				'cabang_bank' => $this->input->post('cabang_bank',TRUE),
				'nama_direkening' => $this->input->post('nama_direkening',TRUE),
				'luas_tanahmilik' => $this->input->post('luas_tanahmilik',TRUE),
				'luas_tanahbukanmilik' => $this->input->post('luas_tanahbukanmilik',TRUE),
				'nama_wajibpajak' => $this->input->post('nama_wajibpajak',TRUE),
				'no_npwp' => $this->input->post('no_npwp',TRUE),
				'tgl_input' => $this->input->post('tgl_input',TRUE),
				'user_input' => $this->input->post('user_input',TRUE),
				'user_update' => $this->input->post('user_update',TRUE),
				'tgl_update' => $this->input->post('tgl_update',TRUE),
			);

			$this->Tbl_sekolah_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success 2');
			redirect(site_url('sekolah'));
		}
	}

	public function update($id) 
	//public function update($key) 
	{
		//$key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
		$row = $this->Tbl_sekolah_model->get_by_id($id);
		//$row = $this->Tbl_sekolah_model->get_by_id($key);

		if ($row) {
			$data = array(
				'button' => 'Update',
				'action' => site_url('sekolah/update_action'),
				'id_data_sekolah' => set_value('id_data_sekolah', $row->id_data_sekolah),
				'npsn' => set_value('npsn', $row->npsn),
				'nss' => set_value('nss', $row->nss),
				'id_bentuk_sekolah' => set_value('id_bentuk_sekolah', $row->id_bentuk_sekolah),
				'nama_sekolah' => set_value('nama_sekolah', $row->nama_sekolah),
				'status_sekolah' => set_value('status_sekolah', $row->status_sekolah),
				'id_status_kepemilikan' => set_value('id_status_kepemilikan', $row->id_status_kepemilikan),
				'id_opdpembina' => set_value('id_opdpembina', $row->id_opdpembina),
				'kebutuhan_khusus' => set_value('kebutuhan_khusus', $row->kebutuhan_khusus),
				'mbs' => set_value('mbs', $row->mbs),
				'penerima_bos' => set_value('penerima_bos', $row->penerima_bos),
				'sertifikat_iso' => set_value('sertifikat_iso', $row->sertifikat_iso),
				'id_kategori_wilayah' => set_value('id_kategori_wilayah', $row->id_kategori_wilayah),
				'id_waktu_penyelengaraan' => set_value('id_waktu_penyelengaraan', $row->id_waktu_penyelengaraan),
				'no_sk_pendirian' => set_value('no_sk_pendirian', $row->no_sk_pendirian),
				'tgl_sk' => set_value('tgl_sk', $row->tgl_sk),
				'file_pendirian' => set_value('file_pendirian', $row->file_pendirian),
				'logo' => set_value('logo', $row->logo),
				'province_id' => set_value('province_id', $row->province_id),
				'regency_id' => set_value('regency_id', $row->regency_id),
				'id_districts' => set_value('id_districts', $row->id_districts),
				'id_villages' => set_value('id_villages', $row->id_villages),
				'alamat' => set_value('alamat', $row->alamat),
				'rt' => set_value('rt', $row->rt),
				'rw' => set_value('rw', $row->rw),
				'dusun' => set_value('dusun', $row->dusun),
				'postal_code' => set_value('postal_code', $row->postal_code),
				'lintang' => set_value('lintang', $row->lintang),
				'bujur' => set_value('bujur', $row->bujur),
				'kode_registrasi' => set_value('kode_registrasi', $row->kode_registrasi),
				'no_tlp' => set_value('no_tlp', $row->no_tlp),
				'no_fax' => set_value('no_fax', $row->no_fax),
				'hp' => set_value('hp', $row->hp),
				'email' => set_value('email', $row->email),
				'website' => set_value('website', $row->website),
				'no_rekening' => set_value('no_rekening', $row->no_rekening),
				'nama_bank' => set_value('nama_bank', $row->nama_bank),
				'cabang_bank' => set_value('cabang_bank', $row->cabang_bank),
				'nama_direkening' => set_value('nama_direkening', $row->nama_direkening),
				'luas_tanahmilik' => set_value('luas_tanahmilik', $row->luas_tanahmilik),
				'luas_tanahbukanmilik' => set_value('luas_tanahbukanmilik', $row->luas_tanahbukanmilik),
				'nama_wajibpajak' => set_value('nama_wajibpajak', $row->nama_wajibpajak),
				'no_npwp' => set_value('no_npwp', $row->no_npwp),
				'tgl_input' => set_value('tgl_input', $row->tgl_input),
				'user_input' => set_value('user_input', $row->user_input),
				'user_update' => set_value('user_update', $row->user_update),
				'tgl_update' => set_value('tgl_update', $row->tgl_update),
			);
			$this->template->load('template','sekolah/tbl_sekolah_form', $data);
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sekolah'));
		}
	}

	public function update_action() 
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('id_data_sekolah', TRUE));
		} else {
			$data = array(
				'npsn' => $this->input->post('npsn',TRUE),
				'nss' => $this->input->post('nss',TRUE),
				'id_bentuk_sekolah' => $this->input->post('id_bentuk_sekolah',TRUE),
				'nama_sekolah' => $this->input->post('nama_sekolah',TRUE),
				'status_sekolah' => $this->input->post('status_sekolah',TRUE),
				'id_status_kepemilikan' => $this->input->post('id_status_kepemilikan',TRUE),
				'id_opdpembina' => $this->input->post('id_opdpembina',TRUE),
				'kebutuhan_khusus' => $this->input->post('kebutuhan_khusus',TRUE),
				'mbs' => $this->input->post('mbs',TRUE),
				'penerima_bos' => $this->input->post('penerima_bos',TRUE),
				'sertifikat_iso' => $this->input->post('sertifikat_iso',TRUE),
				'id_kategori_wilayah' => $this->input->post('id_kategori_wilayah',TRUE),
				'id_waktu_penyelengaraan' => $this->input->post('id_waktu_penyelengaraan',TRUE),
				'no_sk_pendirian' => $this->input->post('no_sk_pendirian',TRUE),
				'tgl_sk' => $this->input->post('tgl_sk',TRUE),
				'file_pendirian' => $this->input->post('file_pendirian',TRUE),
				'logo' => $this->input->post('logo',TRUE),
				'province_id' => $this->input->post('province_id',TRUE),
				'regency_id' => $this->input->post('regency_id',TRUE),
				'id_districts' => $this->input->post('id_districts',TRUE),
				'id_villages' => $this->input->post('id_villages',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'rt' => $this->input->post('rt',TRUE),
				'rw' => $this->input->post('rw',TRUE),
				'dusun' => $this->input->post('dusun',TRUE),
				'postal_code' => $this->input->post('postal_code',TRUE),
				'lintang' => $this->input->post('lintang',TRUE),
				'bujur' => $this->input->post('bujur',TRUE),
				'kode_registrasi' => $this->input->post('kode_registrasi',TRUE),
				'no_tlp' => $this->input->post('no_tlp',TRUE),
				'no_fax' => $this->input->post('no_fax',TRUE),
				'hp' => $this->input->post('hp',TRUE),
				'email' => $this->input->post('email',TRUE),
				'website' => $this->input->post('website',TRUE),
				'no_rekening' => $this->input->post('no_rekening',TRUE),
				'nama_bank' => $this->input->post('nama_bank',TRUE),
				'cabang_bank' => $this->input->post('cabang_bank',TRUE),
				'nama_direkening' => $this->input->post('nama_direkening',TRUE),
				'luas_tanahmilik' => $this->input->post('luas_tanahmilik',TRUE),
				'luas_tanahbukanmilik' => $this->input->post('luas_tanahbukanmilik',TRUE),
				'nama_wajibpajak' => $this->input->post('nama_wajibpajak',TRUE),
				'no_npwp' => $this->input->post('no_npwp',TRUE),
				'tgl_input' => $this->input->post('tgl_input',TRUE),
				'user_input' => $this->input->post('user_input',TRUE),
				'user_update' => $this->input->post('user_update',TRUE),
				'tgl_update' => $this->input->post('tgl_update',TRUE),
			);

			$this->Tbl_sekolah_model->update($this->input->post('id_data_sekolah', TRUE), $data);
			$this->session->set_flashdata('message', 'Update Record Success');
			redirect(site_url('sekolah'));
		}
	}

	public function delete($key) 
	{
		$key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
		$row = $this->Tbl_sekolah_model->get_by_id($key);

		if ($row) {
			$this->Tbl_sekolah_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('sekolah'));
		} else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('sekolah'));
		}
	}


    // Import Data excel
	public function upload(){
		$fileName = $this->input->post('file', TRUE);

		$config['upload_path'] = './uploads/'; 
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
		$config['max_size'] = 10000;

		$this->load->library('upload', $config);
		$this->upload->initialize($config); 

		if (!$this->upload->do_upload('file')) {
			$error = array('error' => $this->upload->display_errors());
			$this->session->set_flashdata('message','Ada kesalah dalam upload'); 
			redirect(site_url('sekolah')); 
           //redirect('Welcome'); 
		} else {
			$media = $this->upload->data();
			$inputFileName = './uploads/'.$media['file_name'];

			try {
				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objPHPExcel = $objReader->load($inputFileName);
			} catch(Exception $e) {
				die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
			}

			$sheet = $objPHPExcel->getSheet(0);
			$highestRow = $sheet->getHighestRow();
			$highestColumn = $sheet->getHighestColumn();

			for ($row = 2; $row <= $highestRow; $row++){  
				$rowData = $sheet->rangeToArray('B' . $row . ':' . $highestColumn . $row,
					NULL,
					TRUE,
					FALSE);
               // Sesuaikan kolom dengan field dari masing-masing table
				$data = array(
					"npsn"=> $rowData[0][0],
					"nss"=> $rowData[0][1],
					"id_bentuk_sekolah"=> $rowData[0][2],
					"nama_sekolah"=> $rowData[0][3],
					"status_sekolah"=> $rowData[0][4],
					"id_status_kepemilikan"=> $rowData[0][5],
					"id_opdpembina"=> $rowData[0][6],
					"kebutuhan_khusus"=> $rowData[0][7],
					"mbs"=> $rowData[0][8],
					"penerima_bos"=> $rowData[0][9],
					"sertifikat_iso"=> $rowData[0][10],
					"id_kategori_wilayah"=> $rowData[0][11],
					"id_waktu_penyelengaraan"=> $rowData[0][12],
					"no_sk_pendirian"=> $rowData[0][13],
					"tgl_sk"=> $rowData[0][14],
					"province_id"=> $rowData[0][15],
					"regency_id"=> $rowData[0][16],
					"id_districts"=> $rowData[0][17],
					"id_villages"=> $rowData[0][18],
					"dusun"=> $rowData[0][19],
					"alamat"=> $rowData[0][20],
					"rt"=> $rowData[0][21],
					"rw"=> $rowData[0][22],
					"postal_code"=> $rowData[0][23],
					"lintang"=> $rowData[0][24],
					"bujur"=> $rowData[0][25],
					"kode_registrasi"=> $rowData[0][26],
					'no_tlp' => $rowData[0][27],
					'no_fax' => $rowData[0][28],
					'hp' => $rowData[0][29],
					'email' => $rowData[0][30],
					'website' => $rowData[0][31],
					'no_rekening' => $rowData[0][32],
					'nama_bank' => $rowData[0][33],
					'cabang_bank' => $rowData[0][34],
					'nama_direkening' => $rowData[0][35],
					'luas_tanahmilik' => $rowData[0][36],
					'luas_tanahbukanmilik' => $rowData[0][37],
					'nama_wajibpajak' => $rowData[0][38],
					'no_npwp' => $rowData[0][39],
					"tgl_input" => date('Y-m-d H:i:s'),
					"user_input" => $this->session->userdata('id_users'),
				);
				$this->db->insert("tbl_sekolah",$data);
			} 
           //delete file
			$file = $media['file_name'];
			$path = './uploads/' . $file;
            // Perintah meghapus file yang di upload -> unlink($path);
			unlink($path);
			$this->session->set_flashdata('message','Berhasil upload ...!!'); 
			redirect(site_url('sekolah'));
		}  
	} 


	public function _rules() 
	{
		$this->form_validation->set_rules('npsn', 'npsn', 'trim|required');
		/*$this->form_validation->set_rules('nss', 'nss', 'trim|required');
		$this->form_validation->set_rules('id_bentuk_sekolah', 'id bentuk sekolah', 'trim|required');
		$this->form_validation->set_rules('nama_sekolah', 'nama sekolah', 'trim|required');
		$this->form_validation->set_rules('status_sekolah', 'status sekolah', 'trim|required');
		$this->form_validation->set_rules('id_status_kepemilikan', 'id status kepemilikan', 'trim|required');
		$this->form_validation->set_rules('id_opdpembina', 'id opdpembina', 'trim|required');
		$this->form_validation->set_rules('kebutuhan_khusus', 'kebutuhan khusus', 'trim|required');
		$this->form_validation->set_rules('mbs', 'mbs', 'trim|required');
		$this->form_validation->set_rules('penerima_bos', 'penerima bos', 'trim|required');
		$this->form_validation->set_rules('sertifikat_iso', 'sertifikat iso', 'trim|required');
		$this->form_validation->set_rules('id_kategori_wilayah', 'id kategori wilayah', 'trim|required');
		$this->form_validation->set_rules('id_waktu_penyelengaraan', 'id waktu penyelengaraan', 'trim|required');
		$this->form_validation->set_rules('no_sk_pendirian', 'no sk pendirian', 'trim|required');
		$this->form_validation->set_rules('tgl_sk', 'tgl sk', 'trim|required');
		$this->form_validation->set_rules('file_pendirian', 'file pendirian', 'trim|required');
		$this->form_validation->set_rules('logo', 'logo', 'trim|required');
		$this->form_validation->set_rules('province_id', 'province id', 'trim|required');
		$this->form_validation->set_rules('regency_id', 'regency id', 'trim|required');
		$this->form_validation->set_rules('id_districts', 'id districts', 'trim|required');
		$this->form_validation->set_rules('id_villages', 'id villages', 'trim|required');
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_rules('rt', 'rt', 'trim|required');
		$this->form_validation->set_rules('rw', 'rw', 'trim|required');
		$this->form_validation->set_rules('dusun', 'dusun', 'trim|required');
		$this->form_validation->set_rules('postal_code', 'postal code', 'trim|required');
		$this->form_validation->set_rules('lintang', 'lintang', 'trim|required');
		$this->form_validation->set_rules('bujur', 'bujur', 'trim|required');
		$this->form_validation->set_rules('kode_registrasi', 'kode registrasi', 'trim|required');
		$this->form_validation->set_rules('no_tlp', 'no tlp', 'trim|required');
		$this->form_validation->set_rules('no_fax', 'no fax', 'trim|required');
		$this->form_validation->set_rules('hp', 'hp', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('website', 'website', 'trim|required');
		$this->form_validation->set_rules('no_rekening', 'no rekening', 'trim|required');
		$this->form_validation->set_rules('nama_bank', 'nama bank', 'trim|required');
		$this->form_validation->set_rules('cabang_bank', 'cabang bank', 'trim|required');
		$this->form_validation->set_rules('nama_direkening', 'nama direkening', 'trim|required');
		$this->form_validation->set_rules('luas_tanahmilik', 'luas tanahmilik', 'trim|required');
		$this->form_validation->set_rules('luas_tanahbukanmilik', 'luas tanahbukanmilik', 'trim|required');
		$this->form_validation->set_rules('nama_wajibpajak', 'nama wajibpajak', 'trim|required');
		$this->form_validation->set_rules('no_npwp', 'no npwp', 'trim|required');
		$this->form_validation->set_rules('tgl_input', 'tgl input', 'trim|required');
		$this->form_validation->set_rules('user_input', 'user input', 'trim|required');
		$this->form_validation->set_rules('user_update', 'user update', 'trim|required');
		$this->form_validation->set_rules('tgl_update', 'tgl update', 'trim|required');

		$this->form_validation->set_rules('id_data_sekolah', 'id_data_sekolah', 'trim');*/
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}

	public function excel()
	{
		$this->load->helper('exportexcel');
		$namaFile = "tbl_sekolah.xls";
		$judul = "tbl_sekolah";
		$tablehead = 0;
		$tablebody = 1;
		$nourut = 1;
        //penulisan header
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=" . $namaFile . "");
		header("Content-Transfer-Encoding: binary ");

		xlsBOF();

		$kolomhead = 0;
		xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Npsn");
		xlsWriteLabel($tablehead, $kolomhead++, "Nss");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Bentuk Sekolah");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Sekolah");
		xlsWriteLabel($tablehead, $kolomhead++, "Status Sekolah");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Status Kepemilikan");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Opdpembina");
		xlsWriteLabel($tablehead, $kolomhead++, "Kebutuhan Khusus");
		xlsWriteLabel($tablehead, $kolomhead++, "Mbs");
		xlsWriteLabel($tablehead, $kolomhead++, "Penerima Bos");
		xlsWriteLabel($tablehead, $kolomhead++, "Sertifikat Iso");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Kategori Wilayah");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Waktu Penyelengaraan");
		xlsWriteLabel($tablehead, $kolomhead++, "No Sk Pendirian");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl Sk");
		xlsWriteLabel($tablehead, $kolomhead++, "File Pendirian");
		xlsWriteLabel($tablehead, $kolomhead++, "Logo");
		xlsWriteLabel($tablehead, $kolomhead++, "Province Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Regency Id");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Districts");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Villages");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "Rt");
		xlsWriteLabel($tablehead, $kolomhead++, "Rw");
		xlsWriteLabel($tablehead, $kolomhead++, "Dusun");
		xlsWriteLabel($tablehead, $kolomhead++, "Postal Code");
		xlsWriteLabel($tablehead, $kolomhead++, "Lintang");
		xlsWriteLabel($tablehead, $kolomhead++, "Bujur");
		xlsWriteLabel($tablehead, $kolomhead++, "Kode Registrasi");
		xlsWriteLabel($tablehead, $kolomhead++, "No Tlp");
		xlsWriteLabel($tablehead, $kolomhead++, "No Fax");
		xlsWriteLabel($tablehead, $kolomhead++, "Hp");
		xlsWriteLabel($tablehead, $kolomhead++, "Email");
		xlsWriteLabel($tablehead, $kolomhead++, "Website");
		xlsWriteLabel($tablehead, $kolomhead++, "No Rekening");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Bank");
		xlsWriteLabel($tablehead, $kolomhead++, "Cabang Bank");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Direkening");
		xlsWriteLabel($tablehead, $kolomhead++, "Luas Tanahmilik");
		xlsWriteLabel($tablehead, $kolomhead++, "Luas Tanahbukanmilik");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Wajibpajak");
		xlsWriteLabel($tablehead, $kolomhead++, "No Npwp");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl Input");
		xlsWriteLabel($tablehead, $kolomhead++, "User Input");
		xlsWriteLabel($tablehead, $kolomhead++, "User Update");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl Update");

		foreach ($this->Tbl_sekolah_model->get_all() as $data) {
			$kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
			xlsWriteNumber($tablebody, $kolombody++, $nourut);
			xlsWriteLabel($tablebody, $kolombody++, $data->npsn);
			xlsWriteLabel($tablebody, $kolombody++, $data->nss);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_bentuk_sekolah);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_sekolah);
			xlsWriteLabel($tablebody, $kolombody++, $data->status_sekolah);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_status_kepemilikan);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_opdpembina);
			xlsWriteLabel($tablebody, $kolombody++, $data->kebutuhan_khusus);
			xlsWriteLabel($tablebody, $kolombody++, $data->mbs);
			xlsWriteLabel($tablebody, $kolombody++, $data->penerima_bos);
			xlsWriteLabel($tablebody, $kolombody++, $data->sertifikat_iso);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_kategori_wilayah);
			xlsWriteNumber($tablebody, $kolombody++, $data->id_waktu_penyelengaraan);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_sk_pendirian);
			xlsWriteLabel($tablebody, $kolombody++, $data->tgl_sk);
			xlsWriteLabel($tablebody, $kolombody++, $data->file_pendirian);
			xlsWriteLabel($tablebody, $kolombody++, $data->logo);
			xlsWriteLabel($tablebody, $kolombody++, $data->province_id);
			xlsWriteLabel($tablebody, $kolombody++, $data->regency_id);
			xlsWriteLabel($tablebody, $kolombody++, $data->id_districts);
			xlsWriteLabel($tablebody, $kolombody++, $data->id_villages);
			xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
			xlsWriteLabel($tablebody, $kolombody++, $data->rt);
			xlsWriteLabel($tablebody, $kolombody++, $data->rw);
			xlsWriteLabel($tablebody, $kolombody++, $data->dusun);
			xlsWriteLabel($tablebody, $kolombody++, $data->postal_code);
			xlsWriteLabel($tablebody, $kolombody++, $data->lintang);
			xlsWriteLabel($tablebody, $kolombody++, $data->bujur);
			xlsWriteLabel($tablebody, $kolombody++, $data->kode_registrasi);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_tlp);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_fax);
			xlsWriteLabel($tablebody, $kolombody++, $data->hp);
			xlsWriteLabel($tablebody, $kolombody++, $data->email);
			xlsWriteLabel($tablebody, $kolombody++, $data->website);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_rekening);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_bank);
			xlsWriteLabel($tablebody, $kolombody++, $data->cabang_bank);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_direkening);
			xlsWriteLabel($tablebody, $kolombody++, $data->luas_tanahmilik);
			xlsWriteLabel($tablebody, $kolombody++, $data->luas_tanahbukanmilik);
			xlsWriteLabel($tablebody, $kolombody++, $data->nama_wajibpajak);
			xlsWriteLabel($tablebody, $kolombody++, $data->no_npwp);
			xlsWriteLabel($tablebody, $kolombody++, $data->tgl_input);
			xlsWriteNumber($tablebody, $kolombody++, $data->user_input);
			xlsWriteNumber($tablebody, $kolombody++, $data->user_update);
			xlsWriteLabel($tablebody, $kolombody++, $data->tgl_update);

			$tablebody++;
			$nourut++;
		}

		xlsEOF();
		exit();
	}

}

/* End of file Sekolah.php */
/* Kodir Zaelani */
/* Location: ./application/controllers/Sekolah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-07 14:16:57 */
/* http://harviacode.com */