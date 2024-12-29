<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelku extends CI_Model{

    public function insert_data($tabel, $data)
    {
        return $this->db->insert($tabel,$data);
    }

    public function delete_data($tabel, $where)
    {
        return $this->db->delete($tabel,$where);
    }

    public function update_data($tabel, $data, $where){
        return $this->db->update($tabel, $data, $where);
    }

    public function get_data($tabel){
        return $this->db->get($tabel)->result_array();
    }

    public function get_where_data($tabel, $where){
        return $this->db->get_where($tabel,$where);
    }
    
}