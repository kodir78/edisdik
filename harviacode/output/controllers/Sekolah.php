<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
    

    function __construct()
    {
       parent::__construct();
       is_login();
       $this->load->model('Tbl_sekolah_model');
       $this->load->library('form_validation');
       $this->load->library('datatables');
       $this->load->library(array('PHPExcel','PHPExcel/PHPExcel_IOFactory'));
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
    {
        $row = $this->Tbl_sekolah_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_data_sekolah' => $row->id_data_sekolah,
		'npsn' => $row->npsn,
		'nss' => $row->nss,
		'id_jenjang_sekolah' => $row->id_jenjang_sekolah,
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
		'provinci_id' => $row->provinci_id,
		'regency_id' => $row->regency_id,
		'id_distrcs' => $row->id_distrcs,
		'id_villages' => $row->id_villages,
		'no_sk_pendirian' => $row->no_sk_pendirian,
		'tgl_sk' => $row->tgl_sk,
		'file_pendirian' => $row->file_pendirian,
		'logo' => $row->logo,
		'tgl_input' => $row->tgl_input,
		'user_input' => $row->user_input,
		'tgl_update' => $row->tgl_update,
		'user_update' => $row->user_update,
	    );
            $this->template->load('template','sekolah/tbl_sekolah_read', $data);
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
	    'id_jenjang_sekolah' => set_value('id_jenjang_sekolah'),
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
	    'provinci_id' => set_value('provinci_id'),
	    'regency_id' => set_value('regency_id'),
	    'id_distrcs' => set_value('id_distrcs'),
	    'id_villages' => set_value('id_villages'),
	    'no_sk_pendirian' => set_value('no_sk_pendirian'),
	    'tgl_sk' => set_value('tgl_sk'),
	    'file_pendirian' => set_value('file_pendirian'),
	    'logo' => set_value('logo'),
	    'tgl_input' => set_value('tgl_input'),
	    'user_input' => set_value('user_input'),
	    'tgl_update' => set_value('tgl_update'),
	    'user_update' => set_value('user_update'),
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
		'id_jenjang_sekolah' => $this->input->post('id_jenjang_sekolah',TRUE),
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
		'provinci_id' => $this->input->post('provinci_id',TRUE),
		'regency_id' => $this->input->post('regency_id',TRUE),
		'id_distrcs' => $this->input->post('id_distrcs',TRUE),
		'id_villages' => $this->input->post('id_villages',TRUE),
		'no_sk_pendirian' => $this->input->post('no_sk_pendirian',TRUE),
		'tgl_sk' => $this->input->post('tgl_sk',TRUE),
		'file_pendirian' => $this->input->post('file_pendirian',TRUE),
		'logo' => $this->input->post('logo',TRUE),
		'tgl_input' => $this->input->post('tgl_input',TRUE),
		'user_input' => $this->input->post('user_input',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
		'user_update' => $this->input->post('user_update',TRUE),
	    );

            $this->Tbl_sekolah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('sekolah'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Tbl_sekolah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sekolah/update_action'),
		'id_data_sekolah' => set_value('id_data_sekolah', $row->id_data_sekolah),
		'npsn' => set_value('npsn', $row->npsn),
		'nss' => set_value('nss', $row->nss),
		'id_jenjang_sekolah' => set_value('id_jenjang_sekolah', $row->id_jenjang_sekolah),
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
		'provinci_id' => set_value('provinci_id', $row->provinci_id),
		'regency_id' => set_value('regency_id', $row->regency_id),
		'id_distrcs' => set_value('id_distrcs', $row->id_distrcs),
		'id_villages' => set_value('id_villages', $row->id_villages),
		'no_sk_pendirian' => set_value('no_sk_pendirian', $row->no_sk_pendirian),
		'tgl_sk' => set_value('tgl_sk', $row->tgl_sk),
		'file_pendirian' => set_value('file_pendirian', $row->file_pendirian),
		'logo' => set_value('logo', $row->logo),
		'tgl_input' => set_value('tgl_input', $row->tgl_input),
		'user_input' => set_value('user_input', $row->user_input),
		'tgl_update' => set_value('tgl_update', $row->tgl_update),
		'user_update' => set_value('user_update', $row->user_update),
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
		'id_jenjang_sekolah' => $this->input->post('id_jenjang_sekolah',TRUE),
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
		'provinci_id' => $this->input->post('provinci_id',TRUE),
		'regency_id' => $this->input->post('regency_id',TRUE),
		'id_distrcs' => $this->input->post('id_distrcs',TRUE),
		'id_villages' => $this->input->post('id_villages',TRUE),
		'no_sk_pendirian' => $this->input->post('no_sk_pendirian',TRUE),
		'tgl_sk' => $this->input->post('tgl_sk',TRUE),
		'file_pendirian' => $this->input->post('file_pendirian',TRUE),
		'logo' => $this->input->post('logo',TRUE),
		'tgl_input' => $this->input->post('tgl_input',TRUE),
		'user_input' => $this->input->post('user_input',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
		'user_update' => $this->input->post('user_update',TRUE),
	    );

            $this->Tbl_sekolah_model->update($this->input->post('id_data_sekolah', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sekolah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Tbl_sekolah_model->get_by_id($id);

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
           $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
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
             "No"=> $rowData[0][0],
             "NamaKaryawan"=> $rowData[0][1],
             "Alamat"=> $rowData[0][2],
             "Posisi"=> $rowData[0][3],
             "Status"=> $rowData[0][4]
            );
            $this->db->insert("tbl_sekolah",$data);
            //unlink($inputFileName);
           } 
           //delete file
           $file = $media['file_name'];
           $path = './uploads/' . $file;
            unlink($path);
           $this->session->set_flashdata('msg','Berhasil upload ...!!'); 
           redirect(site_url('sekolah'));
          }  
    } 
   

    public function _rules() 
    {
	$this->form_validation->set_rules('npsn', 'npsn', 'trim|required');
	$this->form_validation->set_rules('nss', 'nss', 'trim|required');
	$this->form_validation->set_rules('id_jenjang_sekolah', 'id jenjang sekolah', 'trim|required');
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
	$this->form_validation->set_rules('provinci_id', 'provinci id', 'trim|required');
	$this->form_validation->set_rules('regency_id', 'regency id', 'trim|required');
	$this->form_validation->set_rules('id_distrcs', 'id distrcs', 'trim|required');
	$this->form_validation->set_rules('id_villages', 'id villages', 'trim|required');
	$this->form_validation->set_rules('no_sk_pendirian', 'no sk pendirian', 'trim|required');
	$this->form_validation->set_rules('tgl_sk', 'tgl sk', 'trim|required');
	$this->form_validation->set_rules('file_pendirian', 'file pendirian', 'trim|required');
	$this->form_validation->set_rules('logo', 'logo', 'trim|required');
	$this->form_validation->set_rules('tgl_input', 'tgl input', 'trim|required');
	$this->form_validation->set_rules('user_input', 'user input', 'trim|required');
	$this->form_validation->set_rules('tgl_update', 'tgl update', 'trim|required');
	$this->form_validation->set_rules('user_update', 'user update', 'trim|required');

	$this->form_validation->set_rules('id_data_sekolah', 'id_data_sekolah', 'trim');
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Jenjang Sekolah");
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
	xlsWriteLabel($tablehead, $kolomhead++, "Provinci Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Regency Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Distrcs");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Villages");
	xlsWriteLabel($tablehead, $kolomhead++, "No Sk Pendirian");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Sk");
	xlsWriteLabel($tablehead, $kolomhead++, "File Pendirian");
	xlsWriteLabel($tablehead, $kolomhead++, "Logo");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Input");
	xlsWriteLabel($tablehead, $kolomhead++, "User Input");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Update");
	xlsWriteLabel($tablehead, $kolomhead++, "User Update");

	foreach ($this->Tbl_sekolah_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npsn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nss);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_jenjang_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_sekolah);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_status_kepemilikan);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_opdpembina);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kebutuhan_khusus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mbs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->penerima_bos);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sertifikat_iso);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_kategori_wilayah);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_waktu_penyelengaraan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinci_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->regency_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_distrcs);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_villages);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_sk_pendirian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_sk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->file_pendirian);
	    xlsWriteLabel($tablebody, $kolombody++, $data->logo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_input);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_input);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_update);
	    xlsWriteNumber($tablebody, $kolombody++, $data->user_update);

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
/* Generated by Harviacode Codeigniter CRUD Generator 2018-03-31 15:03:28 */
/* http://harviacode.com */