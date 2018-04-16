<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profillembaga extends CI_Controller
{
    
    public $table = 'tbl_profil_lembaga';

    function __construct()
    {
       parent::__construct();
       //is_login();
       //$this->load->library('ssp');
       $this->load->model('Tbl_profil_lembaga_model');
       $this->load->library('form_validation');
       $this->load->library('datatables');
       $this->load->library(array('PHPExcel','PHPExcel/PHPExcel_IOFactory'));
    }    

 public function data() {
        // Nama table
            $table = 'tbl_profil_lembaga';
        // Nama primaryKey
            $primaryKey = 'id_lembaga';
        // List field
            $columns = array(
array('db' => 'id_lembaga', 'dt' => 'id_lembaga'),
array('db' => 'nama_lembaga', 'dt' => 'nama_lembaga'),
array('db' => 'alamat', 'dt' => 'alamat'),
array('db' => 'provinsi', 'dt' => 'provinsi'),
array('db' => 'kabupaten', 'dt' => 'kabupaten'),
array('db' => 'no_telpon', 'dt' => 'no_telpon'),
array('db' => 'logo', 'dt' => 'logo'),
array(
                'db' => 'id_lembaga',
                'dt' => 'aksi',
                'formatter' => function( $d, $row ) {
                    return anchor('profillembaga/read/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-eye"></i>',"class='label bg-green'").' '.
                   anchor('profillembaga/update/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-edit"></i>',"class='label bg-blue'").' '.
                   anchor('profillembaga/delete/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-trash"></i>',"class='label bg-red'",'onclick="javasciprt: return confirm(\'Are You Sure ?\')"','id_lembaga');
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
        $this->template->load('template','profillembaga/tbl_profil_lembaga_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Tbl_profil_lembaga_model->json();
    }

    public function read($key) 
    {
         $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_profil_lembaga_model->get_by_id($key);
        if ($row) {
            $data = array(
		'id_lembaga' => $row->id_lembaga,
		'nama_lembaga' => $row->nama_lembaga,
		'alamat' => $row->alamat,
		'provinsi' => $row->provinsi,
		'kabupaten' => $row->kabupaten,
		'no_telpon' => $row->no_telpon,
		'logo' => $row->logo,
	    );
            $this->template->load('template','profillembaga/tbl_profil_lembaga_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profillembaga'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('profillembaga/create_action'),
	    'id_lembaga' => set_value('id_lembaga'),
	    'nama_lembaga' => set_value('nama_lembaga'),
	    'alamat' => set_value('alamat'),
	    'provinsi' => set_value('provinsi'),
	    'kabupaten' => set_value('kabupaten'),
	    'no_telpon' => set_value('no_telpon'),
	    'logo' => set_value('logo'),
	);
        $this->template->load('template','profillembaga/tbl_profil_lembaga_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_lembaga' => $this->input->post('nama_lembaga',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'no_telpon' => $this->input->post('no_telpon',TRUE),
		'logo' => $this->input->post('logo',TRUE),
	    );

            $this->Tbl_profil_lembaga_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success 2');
            redirect(site_url('profillembaga'));
        }
    }
    
    public function update($id) 
    {
        $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_profil_lembaga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('profillembaga/update_action'),
		'id_lembaga' => set_value('id_lembaga', $row->id_lembaga),
		'nama_lembaga' => set_value('nama_lembaga', $row->nama_lembaga),
		'alamat' => set_value('alamat', $row->alamat),
		'provinsi' => set_value('provinsi', $row->provinsi),
		'kabupaten' => set_value('kabupaten', $row->kabupaten),
		'no_telpon' => set_value('no_telpon', $row->no_telpon),
		'logo' => set_value('logo', $row->logo),
	    );
            $this->template->load('template','profillembaga/tbl_profil_lembaga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profillembaga'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_lembaga', TRUE));
        } else {
            $data = array(
		'nama_lembaga' => $this->input->post('nama_lembaga',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'provinsi' => $this->input->post('provinsi',TRUE),
		'kabupaten' => $this->input->post('kabupaten',TRUE),
		'no_telpon' => $this->input->post('no_telpon',TRUE),
		'logo' => $this->input->post('logo',TRUE),
	    );

            $this->Tbl_profil_lembaga_model->update($this->input->post('id_lembaga', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('profillembaga'));
        }
    }
    
    public function delete($key) 
    {
        $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
        $row = $this->Tbl_profil_lembaga_model->get_by_id($key);

        if ($row) {
            $this->Tbl_profil_lembaga_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('profillembaga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('profillembaga'));
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
           redirect(site_url('profillembaga')); 
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
            $this->db->insert("tbl_profil_lembaga",$data);
           } 
           //delete file
           $file = $media['file_name'];
           $path = './uploads/' . $file;
            // Perintah meghapus file yang di upload -> unlink($path);
            unlink($path);
           $this->session->set_flashdata('msg','Berhasil upload ...!!'); 
           redirect(site_url('profillembaga'));
          }  
    } 
   

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_lembaga', 'nama lembaga', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
	$this->form_validation->set_rules('kabupaten', 'kabupaten', 'trim|required');
	$this->form_validation->set_rules('no_telpon', 'no telpon', 'trim|required');
	$this->form_validation->set_rules('logo', 'logo', 'trim|required');

	$this->form_validation->set_rules('id_lembaga', 'id_lembaga', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Profillembaga.php */
/* Kodir Zaelani */
/* Location: ./application/controllers/Profillembaga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-08 01:42:17 */
/* http://harviacode.com */