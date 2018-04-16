<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

public function index() {
    $this->db->like('id_bentuk_sekolah', '13');
   $this->db->from('tbl_sekolah_copy');
   $slb = $this->db->count_all_results();

    $this->db->like('id_bentuk_sekolah', '13');
    $this->db->like('status_sekolah', 'Swasta');
   $this->db->from('tbl_sekolah_copy');
   $slbs = $this->db->count_all_results();

    $this->db->like('id_bentuk_sekolah', '13');
    $this->db->like('status_sekolah', 'Negeri');
   $this->db->from('tbl_sekolah_copy');
   $slbn = $this->db->count_all_results();

   $this->db->like('id_bentuk_sekolah', '9');
    $this->db->like('status_sekolah', 'Negeri');
   $this->db->from('tbl_sekolah_copy');
   $sman = $this->db->count_all_results();

   $this->db->like('id_bentuk_sekolah', '9');
    $this->db->like('status_sekolah', 'Swasta');
   $this->db->from('tbl_sekolah_copy');
   $smas = $this->db->count_all_results();

   $this->db->like('id_bentuk_sekolah', '11');
    $this->db->like('status_sekolah', 'Negeri');
   $this->db->from('tbl_sekolah_copy');
   $smkn = $this->db->count_all_results();

   $this->db->like('id_bentuk_sekolah', '11');
    $this->db->like('status_sekolah', 'Swasta');
   $this->db->from('tbl_sekolah_copy');
   $smks = $this->db->count_all_results();

    $this->db->like('id_bentuk_sekolah', '9');
   $this->db->from('tbl_sekolah_copy');
   $sma = $this->db->count_all_results();

    $this->db->like('id_bentuk_sekolah', '11');
   $this->db->from('tbl_sekolah_copy');
   $smk = $this->db->count_all_results();

        //$this->load->view('table');
    $this->db->like('status_sekolah', 'Negeri');
   $this->db->from('tbl_sekolah_copy');
   $st = $this->db->count_all_results();

   $this->db->like('status_sekolah', 'Swasta');
   $this->db->from('tbl_sekolah_copy');
   $sts = $this->db->count_all_results();
   $t = $st + $sts;
   $data = array(
                'total'     => $t,
                'negeri'    => $st,
                'swasta'    => $sts,
                'jslb'      => $slb,
                'jsma'      => $sma,
                'jsman'     => $sman,
                'jsmas'     => $smas,
                'jsmk'      => $smk,
                'jsmkn'     => $smkn,
                'jsmks'     => $smks,
                'jslbs'     => $slbs,
                'jslbn'     => $slbn,
                 );
    $this->template->load('template', 'dashboard',$data);
}

public function form() {
        //$this->load->view('table');
    $this->template->load('template', 'form');
}

public function profile()
    {
       $this->template->load('template','user/tbl_user_profile');
    }
    
function autocomplate() {
    $this->db->like('full_name', $_GET['term']);
    $this->db->select('full_name');
    $dataUsers = $this->db->get('tbl_user')->result();
    foreach ($dataUsers as $user) {
        $return_arr[] = $user->full_name;
    }

    echo json_encode($return_arr);
}


}
