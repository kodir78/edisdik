<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Agama extends CI_Controller
{
    
    public $table = 'tbl_refagama';

    function __construct()
    {
       parent::__construct();
       is_login();
       //$this->load->library('ssp');
       $this->load->model('Tbl_refagama_model');
       $this->load->library('form_validation');
       $this->load->library('datatables');
       $this->load->library(array('PHPExcel','PHPExcel/PHPExcel_IOFactory'));
    }    

 public function data() {
        // Nama table
            $table = 'tbl_refagama';
        // Nama primaryKey
            $primaryKey = 'id_agama';
        // List field
            $columns = array(
array('db' => 'id_agama', 'dt' => 'id_agama'),
array('db' => 'agama', 'dt' => 'agama'),
array(
                'db' => 'id_agama',
                'dt' => 'aksi',
                'formatter' => function( $d, $row ) {
                    return anchor('agama/read/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-eye"></i>',"class='label bg-green'").' '.
                   anchor('agama/update/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-edit"></i>',"class='label bg-blue'").' '.
                   anchor('agama/delete/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-trash"></i>',"class='label bg-red'",'onclick="javasciprt: return confirm(\'Are You Sure ?\')"','id_agama');
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
        $this->template->load('template','agama/tbl_refagama_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_refagama_model->json();
    }

    public function read($key) 
    {
         $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_refagama_model->get_by_id($key);
        if ($row) {
            $data = array(
		'id_agama' => $row->id_agama,
		'agama' => $row->agama,
	    );
            $this->template->load('template','agama/tbl_refagama_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agama'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('agama/create_action'),
	    'id_agama' => set_value('id_agama'),
	    'agama' => set_value('agama'),
	);
        $this->template->load('template','agama/tbl_refagama_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'agama' => $this->input->post('agama',TRUE),
	    );

            $this->Tbl_refagama_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('agama'));
        }
    }
    
    public function update($key) 
    {
        $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_refagama_model->get_by_id($key);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('agama/update_action'),
		'id_agama' => set_value('id_agama', $row->id_agama),
		'agama' => set_value('agama', $row->agama),
	    );
            $this->template->load('template','agama/tbl_refagama_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agama'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_agama', TRUE));
        } else {
            $data = array(
		'agama' => $this->input->post('agama',TRUE),
	    );

            $this->Tbl_refagama_model->update($this->input->post('id_agama', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('agama'));
        }
    }
    
    public function delete($key) 
    {
        $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_refagama_model->get_by_id($key);

        if ($row) {
            $this->Tbl_refagama_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('agama'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('agama'));
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
           redirect(site_url('agama')); 
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
            $this->db->insert("tbl_refagama",$data);
           } 
           //delete file
           $file = $media['file_name'];
           $path = './uploads/' . $file;
            // Perintah meghapus file yang di upload -> unlink($path);
            unlink($path);
           $this->session->set_flashdata('message','Berhasil upload ...!!'); 
           redirect(site_url('agama'));
          }  
    } 
   

    public function _rules() 
    {
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');

	$this->form_validation->set_rules('id_agama', 'id_agama', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_refagama.xls";
        $judul = "tbl_refagama";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Agama");

	foreach ($this->Tbl_refagama_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->agama);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Agama.php */
/* Kodir Zaelani */
/* Location: ./application/controllers/Agama.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-08 10:43:05 */
/* http://harviacode.com */