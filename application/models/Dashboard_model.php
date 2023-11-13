<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function total($table)
    {
        $query = $this->db->get($table)->num_rows();
        return $query;
    }

    public function get_where($table, $pk, $id, $join = null, $order = null)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($pk, $id);

        if($join !== null){
            foreach($join as $table => $field){
                $this->db->join($table, $field);
            }
        }
        
        if($order !== null){
            foreach($order as $field => $sort){
                $this->db->order_by($field, $sort);
            }
        }

        $query = $this->db->get();
        return $query;
    }

    function jmlAdmin() {

        $sql = $this->db->query('SELECT DISTINCT id FROM m_admin a, m_level b WHERE a.level = b.id_level AND nama_level = "Operator" ');

        return $sql->num_rows();
    }

    function jmlVerifAdmin() {

        $sql = $this->db->query('SELECT DISTINCT id FROM t_pribadi WHERE status_data = "0"');

        return $sql->num_rows();
    }

    public function jmlVerifAdmin2() {

        $sql = $this->db->query('SELECT DISTINCT id FROM t_pribadi WHERE verifikasi = "Sudah Verifikasi" AND status_data = "1"');

        return $sql->num_rows();
    }

    function jmlVerif($desa) {

        $sql = $this->db->query('SELECT DISTINCT id FROM t_pribadi WHERE verifikasi = "Sudah Verifikasi" AND status_data = "1" AND id_desa = "'.$desa.'"');

        return $sql->num_rows();
    }

    public function jmlVerif2($desa) {

        $sql = $this->db->query('SELECT DISTINCT id FROM t_pribadi WHERE verifikasi = "Belum Verifikasi" AND status_data = "0" AND id_desa = "'.$desa.'" ');

        return $sql->num_rows();
    }

    public function jmlVerif3($id) {

        $sql = $this->db->query('SELECT DISTINCT id FROM t_pribadi WHERE verifikasi = "Sudah Verifikasi" AND status_data = "1" AND id_user = "'.$id.'"');

        return $sql->num_rows();
    }
}