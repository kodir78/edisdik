<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Provinces extends CI_Controller
{
  
  public $table = 'provinces';

  function __construct()
  {
   parent::__construct();
   is_login();
       // $this->load->library('ssp');
   $this->load->model('Provinces_model');
   $this->load->library('form_validation');
   $this->load->library('datatables');
   $this->load->library(array('PHPExcel','PHPExcel/PHPExcel_IOFactory'));
 }    

 public function data() {
        // Nama table
  $table = 'provinces';
        // Nama primaryKey
  $primaryKey = 'province_id';
        // List field
  $columns = array(
    array('db' => 'province_id', 'dt' => 'province_id'),
    array('db' => 'name_prov', 'dt' => 'name_prov'),
    array(
      'db' => 'province_id',
      'dt' => 'aksi',
      'formatter' => function( $d, $row ) {
        return anchor('provinces/read/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-eye"></i>',"class='label bg-green'").' '.
        anchor('provinces/update/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-edit"></i>',"class='label bg-blue'").' '.
        anchor('provinces/delete/'.$key = $this->encryptions->encode($d,$this->config->item('encryption_key')),'<i class="fa fa-trash"></i>',"class='label bg-red'",'onclick="javasciprt: return confirm(\'Are You Sure ?\')"','province_id');
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
  $this->template->load('template','provinces/provinces_list');
} 

public function json() {
  header('Content-Type: application/json');
  echo $this->Provinces_model->json();
}

public function read($key) 
{
 $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
 $row = $this->Provinces_model->get_by_id($key);
 if ($row) {
  $data = array(
    'province_id' => $row->province_id,
    'name_prov' => $row->name_prov,
  );
  $this->template->load('template','provinces/provinces_read', $data);
} else {
  $this->session->set_flashdata('message', 'Record Not Found');
  redirect(site_url('provinces'));
}
}

public function create() 
{
  $data = array(
    'button' => 'Create',
    'action' => site_url('provinces/create_action'),
    'province_id' => set_value('province_id'),
    'name_prov' => set_value('name_prov'),
  );
  $this->template->load('template','provinces/provinces_form', $data);
}

public function create_action() 
{
  $this->_rules();

  if ($this->form_validation->run() == FALSE) {
    $this->create();
  } else {
    $data = array(
      'name_prov' => $this->input->post('name_prov',TRUE),
    );

    $this->Provinces_model->insert($data);
    $this->session->set_flashdata('message', 'Create Record Success 2');
    redirect(site_url('provinces'));
  }
}

public function update($key) 
{
  $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
  $row = $this->Provinces_model->get_by_id($key);

  if ($row) {
    $data = array(
      'button' => 'Update',
      'action' => site_url('provinces/update_action'),
      'province_id' => set_value('province_id', $row->province_id),
      'name_prov' => set_value('name_prov', $row->name_prov),
    );
    $this->template->load('template','provinces/provinces_form', $data);
  } else {
    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('provinces'));
  }
}

public function update_action() 
{
  $this->_rules();

  if ($this->form_validation->run() == FALSE) {
    $this->update($this->input->post('province_id', TRUE));
  } else {
    $data = array(
      'name_prov' => $this->input->post('name_prov',TRUE),
    );

    $this->Provinces_model->update($this->input->post('province_id', TRUE), $data);
    $this->session->set_flashdata('message', 'Update Record Success');
    redirect(site_url('provinces'));
  }
}

public function delete($key) 
{
  $key = $this->encryptions->decode($this->uri->segment(3),$this->config->item('encryption_key'));
  $row = $this->Provinces_model->get_by_id($key);

  if ($row) {
    $this->Provinces_model->delete($id);
    $this->session->set_flashdata('message', 'Delete Record Success');
    redirect(site_url('provinces'));
  } else {
    $this->session->set_flashdata('message', 'Record Not Found');
    redirect(site_url('provinces'));
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
   redirect(site_url('provinces')); 
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
   $this->db->insert("provinces",$data);
 } 
           //delete file
 $file = $media['file_name'];
 $path = './uploads/' . $file;
            // Perintah meghapus file yang di upload -> unlink($path);
 unlink($path);
 $this->session->set_flashdata('msg','Berhasil upload ...!!'); 
 redirect(site_url('provinces'));
}  
} 


public function _rules() 
{
	$this->form_validation->set_rules('name_prov', 'name prov', 'trim|required');

	$this->form_validation->set_rules('province_id', 'province_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
}

public function excel()
{
  $this->load->helper('exportexcel');
  $namaFile = "provinces.xls";
  $judul = "provinces";
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
  xlsWriteLabel($tablehead, $kolomhead++, "Name Prov");

  foreach ($this->Provinces_model->get_all() as $data) {
    $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
    xlsWriteNumber($tablebody, $kolombody++, $nourut);
    xlsWriteLabel($tablebody, $kolombody++, $data->name_prov);

    $tablebody++;
    $nourut++;
  }

  xlsEOF();
  exit();
}

}

/* End of file Provinces.php */
/* Kodir Zaelani */
/* Location: ./application/controllers/Provinces.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-06 16:31:45 */
/* http://harviacode.com */