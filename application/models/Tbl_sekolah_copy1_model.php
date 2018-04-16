<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tbl_sekolah_copy1_model extends CI_Model
{

    public $table = 'tbl_sekolah_copy';
    public $id = 'id_data_sekolah';
    //public $order = 'DESC';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
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
	$this->db->or_like('nilai_akreditasi', $q);
	$this->db->or_like('kode_registrasi', $q);
	$this->db->or_like('file_pendirian', $q);
	$this->db->or_like('file_npwp', $q);
	$this->db->or_like('logo', $q);
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
	$this->db->or_like('nilai_akreditasi', $q);
	$this->db->or_like('kode_registrasi', $q);
	$this->db->or_like('file_pendirian', $q);
	$this->db->or_like('file_npwp', $q);
	$this->db->or_like('logo', $q);
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

/* End of file Tbl_sekolah_copy1_model.php */
/* Location: ./application/models/Tbl_sekolah_copy1_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-10 12:52:59 */
/* http://harviacode.com */