<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vdatasekolah extends CI_Controller
{
    
    public $table = 'v_data_sekolah';

    function __construct()
    {
       parent::__construct();
       is_login();
       //$this->load->library('ssp');
       $this->load->model('V_data_sekolah_model');
       $this->load->library('form_validation');
       $this->load->library('datatables');
       $this->load->library(array('PHPExcel','PHPExcel/PHPExcel_IOFactory'));
    }    

 public function data() {
        // Nama table
            $table = 'v_data_sekolah';
        // Nama primaryKey
            $primaryKey = '';
        // List field
            $columns = array(
array('db' => 'id_data_sekolah', 'dt' => 'id_data_sekolah'),
array('db' => 'nama_bentuk', 'dt' => 'nama_bentuk'),
array('db' => 'npsn', 'dt' => 'npsn'),
array('db' => 'nama_sekolah', 'dt' => 'nama_sekolah'),
array('db' => 'status_sekolah', 'dt' => 'status_sekolah'),
array('db' => 'name_reg', 'dt' => 'name_reg'),
array('db' => 'name_dist', 'dt' => 'name_dist'),
array(
                'db' => '',
                'dt' => 'aksi',
                'formatter' => function( $d, $row ) {
                    return anchor('vdatasekolah/read/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-eye"></i>',"class='label bg-green'").' '.
                   anchor('vdatasekolah/update/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-edit"></i>',"class='label bg-blue'").' '.
                   anchor('vdatasekolah/delete/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-trash"></i>',"class='label bg-red'",'onclick="javasciprt: return confirm(\'Are You Sure ?\')"','');
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
        $this->template->load('template','vdatasekolah/v_data_sekolah_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->V_data_sekolah_model->json();
    }

    public function read($key) 
    {
         $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->V_data_sekolah_model->get_by_id($key);
        if ($row) {
            $data = array(
		'id_data_sekolah' => $row->id_data_sekolah,
		'nama_bentuk' => $row->nama_bentuk,
		'npsn' => $row->npsn,
		'nama_sekolah' => $row->nama_sekolah,
		'status_sekolah' => $row->status_sekolah,
		'name_reg' => $row->name_reg,
		'name_dist' => $row->name_dist,
	    );
            $this->template->load('template','vdatasekolah/v_data_sekolah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vdatasekolah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('vdatasekolah/create_action'),
	    'id_data_sekolah' => set_value('id_data_sekolah'),
	    'nama_bentuk' => set_value('nama_bentuk'),
	    'npsn' => set_value('npsn'),
	    'nama_sekolah' => set_value('nama_sekolah'),
	    'status_sekolah' => set_value('status_sekolah'),
	    'name_reg' => set_value('name_reg'),
	    'name_dist' => set_value('name_dist'),
	);
        $this->template->load('template','vdatasekolah/v_data_sekolah_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_data_sekolah' => $this->input->post('id_data_sekolah',TRUE),
		'nama_bentuk' => $this->input->post('nama_bentuk',TRUE),
		'npsn' => $this->input->post('npsn',TRUE),
		'nama_sekolah' => $this->input->post('nama_sekolah',TRUE),
		'status_sekolah' => $this->input->post('status_sekolah',TRUE),
		'name_reg' => $this->input->post('name_reg',TRUE),
		'name_dist' => $this->input->post('name_dist',TRUE),
	    );

            $this->V_data_sekolah_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('vdatasekolah'));
        }
    }
    
    public function update($key) 
    {
        $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->V_data_sekolah_model->get_by_id($key);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('vdatasekolah/update_action'),
		'id_data_sekolah' => set_value('id_data_sekolah', $row->id_data_sekolah),
		'nama_bentuk' => set_value('nama_bentuk', $row->nama_bentuk),
		'npsn' => set_value('npsn', $row->npsn),
		'nama_sekolah' => set_value('nama_sekolah', $row->nama_sekolah),
		'status_sekolah' => set_value('status_sekolah', $row->status_sekolah),
		'name_reg' => set_value('name_reg', $row->name_reg),
		'name_dist' => set_value('name_dist', $row->name_dist),
	    );
            $this->template->load('template','vdatasekolah/v_data_sekolah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vdatasekolah'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('', TRUE));
        } else {
            $data = array(
		'id_data_sekolah' => $this->input->post('id_data_sekolah',TRUE),
		'nama_bentuk' => $this->input->post('nama_bentuk',TRUE),
		'npsn' => $this->input->post('npsn',TRUE),
		'nama_sekolah' => $this->input->post('nama_sekolah',TRUE),
		'status_sekolah' => $this->input->post('status_sekolah',TRUE),
		'name_reg' => $this->input->post('name_reg',TRUE),
		'name_dist' => $this->input->post('name_dist',TRUE),
	    );

            $this->V_data_sekolah_model->update($this->input->post('', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('vdatasekolah'));
        }
    }
    
    public function delete($key) 
    {
        $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->V_data_sekolah_model->get_by_id($key);

        if ($row) {
            $this->V_data_sekolah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('vdatasekolah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vdatasekolah'));
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
           redirect(site_url('vdatasekolah')); 
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
            $this->db->insert("v_data_sekolah",$data);
           } 
           //delete file
           $file = $media['file_name'];
           $path = './uploads/' . $file;
            // Perintah meghapus file yang di upload -> unlink($path);
            unlink($path);
           $this->session->set_flashdata('message','Berhasil upload ...!!'); 
           redirect(site_url('vdatasekolah'));
          }  
    } 
   

    public function _rules() 
    {
	$this->form_validation->set_rules('id_data_sekolah', 'id data sekolah', 'trim|required');
	$this->form_validation->set_rules('nama_bentuk', 'nama bentuk', 'trim|required');
	$this->form_validation->set_rules('npsn', 'npsn', 'trim|required');
	$this->form_validation->set_rules('nama_sekolah', 'nama sekolah', 'trim|required');
	$this->form_validation->set_rules('status_sekolah', 'status sekolah', 'trim|required');
	$this->form_validation->set_rules('name_reg', 'name reg', 'trim|required');
	$this->form_validation->set_rules('name_dist', 'name dist', 'trim|required');

	$this->form_validation->set_rules('', '', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "v_data_sekolah.xls";
        $judul = "v_data_sekolah";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Id Data Sekolah");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Bentuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Npsn");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Sekolah");
	xlsWriteLabel($tablehead, $kolomhead++, "Status Sekolah");
	xlsWriteLabel($tablehead, $kolomhead++, "Name Reg");
	xlsWriteLabel($tablehead, $kolomhead++, "Name Dist");

	foreach ($this->V_data_sekolah_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_data_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_bentuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npsn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->status_sekolah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name_reg);
	    xlsWriteLabel($tablebody, $kolombody++, $data->name_dist);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Vdatasekolah.php */
/* Kodir Zaelani */
/* Location: ./application/controllers/Vdatasekolah.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-08 14:57:34 */
/* http://harviacode.com */