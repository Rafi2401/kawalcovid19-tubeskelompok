<?php

class M_odp extends CI_model {
    public function getAllOdp($table) {
        return $this->db->get($table);
    }

    public function tambahDataOdp($data, $table) {
        $this->db->insert($table, $data);
    }

    public function hapusDataOdp($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getOdpId($table, $where) {
        return $this->db->get_where($table, $where);
    }

    public function ubahDataOdp($where, $data, $table) {
		$this->db->where($where);
		$this->db->update($table, $data);
    }
}

?>