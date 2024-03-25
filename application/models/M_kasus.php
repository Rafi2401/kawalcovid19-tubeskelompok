<?php

class M_kasus extends CI_model {
    public function getAllKasus($table) {
        return $this->db->get($table);
    }

    public function tambahDataKasus($data, $table) {
        $this->db->insert($table, $data);
    }

    public function hapusDataKasus($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getKasusId($table, $where) {
        return $this->db->get_where($table, $where);
    }

    public function ubahDataKasus($where, $data, $table) {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}

?>