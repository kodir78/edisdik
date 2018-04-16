<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class V_data_sekolah_model extends CI_Model
{

    public $table = 'v_data_sekolah';
    public $id = '';
    //public $order = 'DESC';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('id_data_sekolah,nama_bentuk,npsn,nama_sekolah,status_sekolah,name_reg,name_dist');
        $this->datatables->from('v_data_sekolah');
        //add this line for join
        //$this->datatables->join('table2', 'v_data_sekolah.field = table2.field');
        $this->datatables->add_column('action', anchor(site_url('vdatasekolah/read/$1'),'<i class="fa fa-eye" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-sm'))." 
            ".anchor(site_url('vdatasekolah/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-info btn-sm'))." 
                ".anchor(site_url('vdatasekolah/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), '');
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
        $this->db->like('', $q);
	$this->db->or_like('id_data_sekolah', $q);
	$this->db->or_like('nama_bentuk', $q);
	$this->db->or_like('npsn', $q);
	$this->db->or_like('nama_sekolah', $q);
	$this->db->or_like('status_sekolah', $q);
	$this->db->or_like('name_reg', $q);
	$this->db->or_like('name_dist', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('', $q);
	$this->db->or_like('id_data_sekolah', $q);
	$this->db->or_like('nama_bentuk', $q);
	$this->db->or_like('npsn', $q);
	$this->db->or_like('nama_sekolah', $q);
	$this->db->or_like('status_sekolah', $q);
	$this->db->or_like('name_reg', $q);
	$this->db->or_like('name_dist', $q);
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

/* End of file V_data_sekolah_model.php */
/* Location: ./application/models/V_data_sekolah_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-04-08 14:57:34 */
/* http://harviacode.com */