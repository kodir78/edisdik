<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Statuskepemilikan extends CI_Controller
{
    
    public $table = 'tbl_refstatuskepemilikan';

    function __construct()
    {
       parent::__construct();
       is_login();
       //$this->load->library('ssp');
       $this->load->model('Tbl_refstatuskepemilikan_model');
       $this->load->library('form_validation');
       $this->load->library('datatables');
       $this->load->library(array('PHPExcel','PHPExcel/PHPExcel_IOFactory'));
    }    

 public function data() {
        // Nama table
            $table = 'tbl_refstatuskepemilikan';
        // Nama primaryKey
            $primaryKey = 'id_status_kepemilikan';
        // List field
            $columns = array(
array('db' => 'id_status_kepemilikan', 'dt' => 'id_status_kepemilikan'),
array('db' => 'nama_status_kepemilikan', 'dt' => 'nama_status_kepemilikan'),
array('db' => 'tgl_input', 'dt' => 'tgl_input'),
array('db' => 'user_input', 'dt' => 'user_input'),
array('db' => 'tgl_update', 'dt' => 'tgl_update'),
array('db' => 'user_update', 'dt' => 'user_update'),
array(
                'db' => 'id_status_kepemilikan',
                'dt' => 'aksi',
                'formatter' => function( $d, $row ) {
                    return anchor('statuskepemilikan/read/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-eye"></i>',"class='btn btn-success btn-sm'").' '.
                   anchor('statuskepemilikan/update/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-edit"></i>',"class='btn btn-info btn-sm'").' '.
                   anchor('statuskepemilikan/delete/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-trash"></i>',"class='btn btn-danger btn-sm'",'onclick="javasciprt: return confirm(\'Are You Sure ?\')"','id_status_kepemilikan');
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
        $this->template->load('template','statuskepemilikan/tbl_refstatuskepemilikan_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_refstatuskepemilikan_model->json();
    }

    public function read($key) 
    {
         $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_refstatuskepemilikan_model->get_by_id($key);
        if ($row) {
            $data = array(
		'id_status_kepemilikan' => $row->id_status_kepemilikan,
		'nama_status_kepemilikan' => $row->nama_status_kepemilikan,
		'tgl_input' => $row->tgl_input,
		'user_input' => $row->user_input,
		'tgl_update' => $row->tgl_update,
		'user_update' => $row->user_update,
	    );
            $this->template->load('template','statuskepemilikan/tbl_refstatuskepemilikan_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statuskepemilikan'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('statuskepemilikan/create_action'),
	    'id_status_kepemilikan' => set_value('id_status_kepemilikan'),
	    'nama_status_kepemilikan' => set_value('nama_status_kepemilikan'),
	    'tgl_input' => set_value('tgl_input'),
	    'user_input' => set_value('user_input'),
	    'tgl_update' => set_value('tgl_update'),
	    'user_update' => set_value('user_update'),
	);
        $this->template->load('template','statuskepemilikan/tbl_refstatuskepemilikan_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_status_kepemilikan' => $this->input->post('nama_status_kepemilikan',TRUE),
		'tgl_input' => $this->input->post('tgl_input',TRUE),
		'user_input' => $this->input->post('user_input',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
		'user_update' => $this->input->post('user_update',TRUE),
	    );

            $this->Tbl_refstatuskepemilikan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('statuskepemilikan'));
        }
    }
    
    public function update($key) 
    {
        $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_refstatuskepemilikan_model->get_by_id($key);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('statuskepemilikan/update_action'),
		'id_status_kepemilikan' => set_value('id_status_kepemilikan', $row->id_status_kepemilikan),
		'nama_status_kepemilikan' => set_value('nama_status_kepemilikan', $row->nama_status_kepemilikan),
		'tgl_input' => set_value('tgl_input', $row->tgl_input),
		'user_input' => set_value('user_input', $row->user_input),
		'tgl_update' => set_value('tgl_update', $row->tgl_update),
		'user_update' => set_value('user_update', $row->user_update),
	    );
            $this->template->load('template','statuskepemilikan/tbl_refstatuskepemilikan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statuskepemilikan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_status_kepemilikan', TRUE));
        } else {
            $data = array(
		'nama_status_kepemilikan' => $this->input->post('nama_status_kepemilikan',TRUE),
		'tgl_input' => $this->input->post('tgl_input',TRUE),
		'user_input' => $this->input->post('user_input',TRUE),
		'tgl_update' => $this->input->post('tgl_update',TRUE),
		'user_update' => $this->input->post('user_update',TRUE),
	    );

            $this->Tbl_refstatuskepemilikan_model->update($this->input->post('id_status_kepemilikan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('statuskepemilikan'));
        }
    }
    
    public function delete($key) 
    {
        $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_refstatuskepemilikan_model->get_by_id($key);

        if ($row) {
            $this->Tbl_refstatuskepemilikan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('statuskepemilikan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('statuskepemilikan'));
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
           redirect(site_url('statuskepemilikan')); 
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
            $this->db->insert("tbl_refstatuskepemilikan",$data);
           } 
           //delete file
           $file = $media['file_name'];
           $path = './uploads/' . $file;
            // Perintah meghapus file yang di upload -> unlink($path);
            unlink($path);
           $this->session->set_flashdata('message','Berhasil upload ...!!'); 
           redirect(site_url('statuskepemilikan'));
          }  
    } 
   

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_status_kepemilikan', 'nama status kepemilikan', 'trim|required');
	$this->form_validation->set_rules('tgl_input', 'tgl input', 'trim|required');
	$this->form_validation->set_rules('user_input', 'user input', 'trim|required');
	$this->form_validation->set_rules('tgl_update', 'tgl update', 'trim|required');
	$this->form_validation->set_rules('user_update', 'user update', 'trim|required');

	$this->form_validation->set_rules('id_status_kepemilikan', 'id_status_kepemilikan', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_refstatuskepemilikan.xls";
        $judul = "tbl_refstatuskepemilikan";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Status Kepemilikan");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Input");
	xlsWriteLabel($tablehead, $kolomhead++, "User Input");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Update");
	xlsWriteLabel($tablehead, $kolomhead++, "User Update");

	foreach ($this->Tbl_refstatuskepemilikan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_status_kepemilikan);
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

/* End of file Statuskepemilikan.php */
/* Kodir Zaelani */
/* Location: ./application/controllers/Statuskepemilikan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-09 08:08:46 */
/* http://harviacode.com */