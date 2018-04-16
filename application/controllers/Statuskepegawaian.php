<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statuskepegawaian extends CI_Controller
{
    
    public $table = 'tbl_refstatuskepegawaian';

    function __construct()
    {
       parent::__construct();
       is_login();
       //$this->load->library('ssp');
       $this->load->model('Tbl_refstatuskepegawaian_model');
       $this->load->library('form_validation');
       $this->load->library('datatables');
       $this->load->library(array('PHPExcel','PHPExcel/PHPExcel_IOFactory'));
    }    

 public function data() {
        // Nama table
            $table = 'tbl_refstatuskepegawaian';
        // Nama primaryKey
            $primaryKey = 'id_status_kepegawaian';
        // List field
            $columns = array(
array('db' => 'id_status_kepegawaian', 'dt' => 'id_status_kepegawaian'),
array('db' => 'nama_status_kepegawaian', 'dt' => 'nama_status_kepegawaian'),
array('db' => 'tgl_input', 'dt' => 'tgl_input'),
array('db' => 'user_input', 'dt' => 'user_input'),
array('db' => 'tgl_update', 'dt' => 'tgl_update'),
array('db' => 'user_update', 'dt' => 'user_update'),
array(
                'db' => 'id_status_kepegawaian',
                'dt' => 'aksi',
                'formatter' => function( $d, $row ) {
                    return anchor('statuskepegawaian/read/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-eye"></i>',"class='btn btn-success btn-sm'").' '.
                   anchor('statuskepegawaian/update/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-edit"></i>',"class='btn btn-info btn-sm'").' '.
                   anchor('statuskepegawaian/delete/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-trash"></i>',"class='btn btn-danger btn-sm'",'onclick="javasciprt: return confirm(\'Are You Sure ?\')"','id_status_kepegawaian');
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
        $this->template->load('template','statuskepegawaian/tbl_refstatuskepegawaian_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_refstatuskepegawaian_model->json();
    }

    public function read($key) 
    {
         $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_refstatuskepegawaian_model->get_by_id($key);
        if ($row) {
            $data = array(
		'id_status_kepegawaian' => $row->id_status_kepegawaian,
		'nama_status_kepegawaian' => $row->nama_status_kepegawaian,
		'tgl_input' => $row->tgl_input,
		'user_input' => $row->user_input,
		'tgl_update' => $row->tgl_update,
		'user_update' => $row->user_update,
	    );
            $this->template->load('template','statuskepegawaian/tbl_refstatuskepegawaian_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statuskepegawaian'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('statuskepegawaian/create_action'),
	    'id_status_kepegawaian' => set_value('id_status_kepegawaian'),
	    'nama_status_kepegawaian' => set_value('nama_status_kepegawaian'),
	    'tgl_input' => set_value('tgl_input'),
	    'user_input' => set_value('user_input'),
	    'tgl_update' => set_value('tgl_update'),
	    'user_update' => set_value('user_update'),
	);
        $this->template->load('template','statuskepegawaian/tbl_refstatuskepegawaian_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_status_kepegawaian' => $this->input->post('nama_status_kepegawaian',TRUE),
		'tgl_input' => $this->input->post('tgl_input',TRUE),
		'user_input' => $this->input->post('user_input',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
		'user_update' => $this->input->post('user_update',TRUE),
	    );

            $this->Tbl_refstatuskepegawaian_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('statuskepegawaian'));
        }
    }
    
    public function update($key) 
    {
        $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_refstatuskepegawaian_model->get_by_id($key);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('statuskepegawaian/update_action'),
		'id_status_kepegawaian' => set_value('id_status_kepegawaian', $row->id_status_kepegawaian),
		'nama_status_kepegawaian' => set_value('nama_status_kepegawaian', $row->nama_status_kepegawaian),
		'tgl_input' => set_value('tgl_input', $row->tgl_input),
		'user_input' => set_value('user_input', $row->user_input),
		'tgl_update' => set_value('tgl_update', $row->tgl_update),
		'user_update' => set_value('user_update', $row->user_update),
	    );
            $this->template->load('template','statuskepegawaian/tbl_refstatuskepegawaian_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statuskepegawaian'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_status_kepegawaian', TRUE));
        } else {
            $data = array(
		'nama_status_kepegawaian' => $this->input->post('nama_status_kepegawaian',TRUE),
		'tgl_input' => $this->input->post('tgl_input',TRUE),
		'user_input' => $this->input->post('user_input',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
		'user_update' => $this->input->post('user_update',TRUE),
	    );

            $this->Tbl_refstatuskepegawaian_model->update($this->input->post('id_status_kepegawaian', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('statuskepegawaian'));
        }
    }
    
    public function delete($key) 
    {
        $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_refstatuskepegawaian_model->get_by_id($key);

        if ($row) {
            $this->Tbl_refstatuskepegawaian_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('statuskepegawaian'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statuskepegawaian'));
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
           redirect(site_url('statuskepegawaian')); 
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
            $this->db->insert("tbl_refstatuskepegawaian",$data);
           } 
           //delete file
           $file = $media['file_name'];
           $path = './uploads/' . $file;
            // Perintah meghapus file yang di upload -> unlink($path);
            unlink($path);
           $this->session->set_flashdata('message','Berhasil upload ...!!'); 
           redirect(site_url('statuskepegawaian'));
          }  
    } 
   

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_status_kepegawaian', 'nama status kepegawaian', 'trim|required');
	$this->form_validation->set_rules('tgl_input', 'tgl input', 'trim|required');
	$this->form_validation->set_rules('user_input', 'user input', 'trim|required');
	$this->form_validation->set_rules('tgl_update', 'tgl update', 'trim|required');
	$this->form_validation->set_rules('user_update', 'user update', 'trim|required');

	$this->form_validation->set_rules('id_status_kepegawaian', 'id_status_kepegawaian', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_refstatuskepegawaian.xls";
        $judul = "tbl_refstatuskepegawaian";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Status Kepegawaian");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Input");
	xlsWriteLabel($tablehead, $kolomhead++, "User Input");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Update");
	xlsWriteLabel($tablehead, $kolomhead++, "User Update");

	foreach ($this->Tbl_refstatuskepegawaian_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_status_kepegawaian);
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

/* End of file Statuskepegawaian.php */
/* Kodir Zaelani */
/* Location: ./application/controllers/Statuskepegawaian.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-09 08:00:56 */
/* http://harviacode.com */