<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jenisptk extends CI_Controller
{
    
    public $table = 'tbl_refjenisptk';

    function __construct()
    {
       parent::__construct();
       is_login();
       //$this->load->library('ssp');
       $this->load->model('Tbl_refjenisptk_model');
       $this->load->library('form_validation');
       $this->load->library('datatables');
       $this->load->library(array('PHPExcel','PHPExcel/PHPExcel_IOFactory'));
    }    

 public function data() {
        // Nama table
            $table = 'tbl_refjenisptk';
        // Nama primaryKey
            $primaryKey = 'id_jenisptk';
        // List field
            $columns = array(
array('db' => 'id_jenisptk', 'dt' => 'id_jenisptk'),
array('db' => 'nama_jenisptk', 'dt' => 'nama_jenisptk'),
array('db' => 'tgl_input', 'dt' => 'tgl_input'),
array('db' => 'user_input', 'dt' => 'user_input'),
array('db' => 'tgl_update', 'dt' => 'tgl_update'),
array('db' => 'user_update', 'dt' => 'user_update'),
array(
                'db' => 'id_jenisptk',
                'dt' => 'aksi',
                'formatter' => function( $d, $row ) {
                    return anchor('jenisptk/read/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-eye"></i>',"class='btn btn-success btn-sm'").' '.
                   anchor('jenisptk/update/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-edit"></i>',"class='btn btn-info btn-sm'").' '.
                   anchor('jenisptk/delete/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-trash"></i>',"class='btn btn-danger btn-sm'",'onclick="javasciprt: return confirm(\'Are You Sure ?\')"','id_jenisptk');
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
        $this->template->load('template','jenisptk/tbl_refjenisptk_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_refjenisptk_model->json();
    }

    public function read($key) 
    {
         $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_refjenisptk_model->get_by_id($key);
        if ($row) {
            $data = array(
		'id_jenisptk' => $row->id_jenisptk,
		'nama_jenisptk' => $row->nama_jenisptk,
		'tgl_input' => $row->tgl_input,
		'user_input' => $row->user_input,
		'tgl_update' => $row->tgl_update,
		'user_update' => $row->user_update,
	    );
            $this->template->load('template','jenisptk/tbl_refjenisptk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisptk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('jenisptk/create_action'),
	    'id_jenisptk' => set_value('id_jenisptk'),
	    'nama_jenisptk' => set_value('nama_jenisptk'),
	    'tgl_input' => set_value('tgl_input'),
	    'user_input' => set_value('user_input'),
	    'tgl_update' => set_value('tgl_update'),
	    'user_update' => set_value('user_update'),
	);
        $this->template->load('template','jenisptk/tbl_refjenisptk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_jenisptk' => $this->input->post('nama_jenisptk',TRUE),
		'tgl_input' => $this->input->post('tgl_input',TRUE),
		'user_input' => $this->input->post('user_input',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
		'user_update' => $this->input->post('user_update',TRUE),
	    );

            $this->Tbl_refjenisptk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('jenisptk'));
        }
    }
    
    public function update($key) 
    {
        $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_refjenisptk_model->get_by_id($key);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('jenisptk/update_action'),
		'id_jenisptk' => set_value('id_jenisptk', $row->id_jenisptk),
		'nama_jenisptk' => set_value('nama_jenisptk', $row->nama_jenisptk),
		'tgl_input' => set_value('tgl_input', $row->tgl_input),
		'user_input' => set_value('user_input', $row->user_input),
		'tgl_update' => set_value('tgl_update', $row->tgl_update),
		'user_update' => set_value('user_update', $row->user_update),
	    );
            $this->template->load('template','jenisptk/tbl_refjenisptk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisptk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_jenisptk', TRUE));
        } else {
            $data = array(
		'nama_jenisptk' => $this->input->post('nama_jenisptk',TRUE),
		'tgl_input' => $this->input->post('tgl_input',TRUE),
		'user_input' => $this->input->post('user_input',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
		'user_update' => $this->input->post('user_update',TRUE),
	    );

            $this->Tbl_refjenisptk_model->update($this->input->post('id_jenisptk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('jenisptk'));
        }
    }
    
    public function delete($key) 
    {
        $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_refjenisptk_model->get_by_id($key);

        if ($row) {
            $this->Tbl_refjenisptk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('jenisptk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('jenisptk'));
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
           redirect(site_url('jenisptk')); 
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
            $this->db->insert("tbl_refjenisptk",$data);
           } 
           //delete file
           $file = $media['file_name'];
           $path = './uploads/' . $file;
            // Perintah meghapus file yang di upload -> unlink($path);
            unlink($path);
           $this->session->set_flashdata('message','Berhasil upload ...!!'); 
           redirect(site_url('jenisptk'));
          }  
    } 
   

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_jenisptk', 'nama jenisptk', 'trim|required');
	$this->form_validation->set_rules('tgl_input', 'tgl input', 'trim|required');
	$this->form_validation->set_rules('user_input', 'user input', 'trim|required');
	$this->form_validation->set_rules('tgl_update', 'tgl update', 'trim|required');
	$this->form_validation->set_rules('user_update', 'user update', 'trim|required');

	$this->form_validation->set_rules('id_jenisptk', 'id_jenisptk', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_refjenisptk.xls";
        $judul = "tbl_refjenisptk";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Jenisptk");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Input");
	xlsWriteLabel($tablehead, $kolomhead++, "User Input");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Update");
	xlsWriteLabel($tablehead, $kolomhead++, "User Update");

	foreach ($this->Tbl_refjenisptk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_jenisptk);
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

/* End of file Jenisptk.php */
/* Kodir Zaelani */
/* Location: ./application/controllers/Jenisptk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-09 07:54:38 */
/* http://harviacode.com */