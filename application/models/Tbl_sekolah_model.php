<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_sekolah_model extends CI_Model
{

    public $table = 'tbl_sekolah';
    public $id = 'id_data_sekolah';
    //public $order = 'DESC';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_data_sekolah,npsn,nss,nama_bentuk,nama_sekolah,status_sekolah,id_status_kepemilikan,id_opdpembina,kebutuhan_khusus,mbs,penerima_bos,sertifikat_iso,id_kategori_wilayah,id_waktu_penyelengaraan,no_sk_pendirian,tgl_sk,file_pendirian,logo,name_reg,name_dist,id_villages,alamat,rt,rw,dusun,postal_code,lintang,bujur,kode_registrasi,no_tlp,no_fax,hp,email,website,no_rekening,nama_bank,cabang_bank,nama_direkening,luas_tanahmilik,luas_tanahbukanmilik,nama_wajibpajak,no_npwp');
        $this->datatables->from('tbl_sekolah');
        //add this line for join
        //$this->datatables->join('table2', 'tbl_sekolah.field = table2.field');
        $this->datatables->join('tbl_refbentuksekolah', 'tbl_sekolah.id_bentuk_sekolah = tbl_refbentuksekolah.id_bentuk_sekolah');
        $this->datatables->join('regencies', 'tbl_sekolah.regency_id = regencies.regency_id');
        $this->datatables->join('districts', 'tbl_sekolah.id_districts = districts.id_districts');
        $this->datatables->add_column('action', anchor(site_url('sekolah/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm btn-xs'))." 
            ".anchor(site_url('sekolah/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm btn-xs'))." 
                ".anchor(site_url('sekolah'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm btn-xs" '), 'id_data_sekolah');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_data_sekolah', $q);
	$this->db->or_like('npsn', $q);
	$this->db->or_like('nss', $q);
	$this->db->or_like('id_bentuk_sekolah', $q);
	$this->db->or_like('nama_sekolah', $q);
	$this->db->or_like('status_sekolah', $q);
	$this->db->or_like('id_status_kepemilikan', $q);
	$this->db->or_like('id_opdpembina', $q);
	$this->db->or_like('kebutuhan_khusus', $q);
	$this->db->or_like('mbs', $q);
	$this->db->or_like('penerima_bos', $q);
	$this->db->or_like('sertifikat_iso', $q);
	$this->db->or_like('id_kategori_wilayah', $q);
	$this->db->or_like('id_waktu_penyelengaraan', $q);
	$this->db->or_like('no_sk_pendirian', $q);
	$this->db->or_like('tgl_sk', $q);
	$this->db->or_like('file_pendirian', $q);
	$this->db->or_like('logo', $q);
	$this->db->or_like('province_id', $q);
	$this->db->or_like('regency_id', $q);
	$this->db->or_like('id_districts', $q);
	$this->db->or_like('id_villages', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('rt', $q);
	$this->db->or_like('rw', $q);
	$this->db->or_like('dusun', $q);
	$this->db->or_like('postal_code', $q);
	$this->db->or_like('lintang', $q);
	$this->db->or_like('bujur', $q);
	$this->db->or_like('kode_registrasi', $q);
	$this->db->or_like('no_tlp', $q);
	$this->db->or_like('no_fax', $q);
	$this->db->or_like('hp', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('website', $q);
	$this->db->or_like('no_rekening', $q);
	$this->db->or_like('nama_bank', $q);
	$this->db->or_like('cabang_bank', $q);
	$this->db->or_like('nama_direkening', $q);
	$this->db->or_like('luas_tanahmilik', $q);
	$this->db->or_like('luas_tanahbukanmilik', $q);
	$this->db->or_like('nama_wajibpajak', $q);
	$this->db->or_like('no_npwp', $q);
	$this->db->or_like('tgl_input', $q);
	$this->db->or_like('user_input', $q);
	$this->db->or_like('user_update', $q);
	$this->db->or_like('tgl_update', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_data_sekolah', $q);
	$this->db->or_like('npsn', $q);
	$this->db->or_like('nss', $q);
	$this->db->or_like('id_bentuk_sekolah', $q);
	$this->db->or_like('nama_sekolah', $q);
	$this->db->or_like('status_sekolah', $q);
	$this->db->or_like('id_status_kepemilikan', $q);
	$this->db->or_like('id_opdpembina', $q);
	$this->db->or_like('kebutuhan_khusus', $q);
	$this->db->or_like('mbs', $q);
	$this->db->or_like('penerima_bos', $q);
	$this->db->or_like('sertifikat_iso', $q);
	$this->db->or_like('id_kategori_wilayah', $q);
	$this->db->or_like('id_waktu_penyelengaraan', $q);
	$this->db->or_like('no_sk_pendirian', $q);
	$this->db->or_like('tgl_sk', $q);
	$this->db->or_like('file_pendirian', $q);
	$this->db->or_like('logo', $q);
	$this->db->or_like('province_id', $q);
	$this->db->or_like('regency_id', $q);
	$this->db->or_like('id_districts', $q);
	$this->db->or_like('id_villages', $q);
	$this->db->or_like('alamat', $q);
	$this->db->or_like('rt', $q);
	$this->db->or_like('rw', $q);
	$this->db->or_like('dusun', $q);
	$this->db->or_like('postal_code', $q);
	$this->db->or_like('lintang', $q);
	$this->db->or_like('bujur', $q);
	$this->db->or_like('kode_registrasi', $q);
	$this->db->or_like('no_tlp', $q);
	$this->db->or_like('no_fax', $q);
	$this->db->or_like('hp', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('website', $q);
	$this->db->or_like('no_rekening', $q);
	$this->db->or_like('nama_bank', $q);
	$this->db->or_like('cabang_bank', $q);
	$this->db->or_like('nama_direkening', $q);
	$this->db->or_like('luas_tanahmilik', $q);
	$this->db->or_like('luas_tanahbukanmilik', $q);
	$this->db->or_like('nama_wajibpajak', $q);
	$this->db->or_like('no_npwp', $q);
	$this->db->or_like('tgl_input', $q);
	$this->db->or_like('user_input', $q);
	$this->db->or_like('user_update', $q);
	$this->db->or_like('tgl_update', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Tbl_sekolah_model.php */
/* Location: ./application/models/Tbl_sekolah_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-07 14:16:57 */
/* http://harviacode.com */