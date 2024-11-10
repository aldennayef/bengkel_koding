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

    public function get_periksa(){
        $this->db->select('dokter.nama as nama_dokter, dokter.*, pasien.nama as nama_pasien, pasien.*, periksa.id as id_periksa, periksa.*');
        $this->db->from('periksa');
        $this->db->join('dokter','periksa.id_dokter = dokter.id');
        $this->db->join('pasien','periksa.id_pasien = pasien.id');
        return $this->db->get()->result_array();
    }

}