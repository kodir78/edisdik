<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	
public function __construct()
{
	parent::__construct();
	//Do your magic here
	$this->load->model('Regencies_model');
	$this->load->model('Provinces_model');
}
	public function index(){
    $data['provinsi'] = $this->Provinces_model->view();
    
    $this->load->view('form1', $data);
  }
  
  public function listKota(){
    // Ambil data ID Provinsi yang dikirim via ajax post
    $id_provinsi = $this->input->post('province_id');
    
    $kota = $this->Regencies_model->viewByProvinsi($id_provinsi);
    
    // Buat variabel untuk menampung tag-tag option nya
    // Set defaultnya dengan tag option Pilih
    $lists = "<option value=''>Pilih</option>";
    
    foreach($kota as $data){
      $lists .= "<option value='".$data->regency_id."'>".$data->name_reg."</option>"; // Tambahkan tag option ke variabel $lists
    }
    
    $callback = array('list_kota'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
    echo json_encode($callback); // konversi varibael $callback menjadi JSON
  }

}

/* End of file Form.php */
/* Location: ./application/controllers/Form.php */