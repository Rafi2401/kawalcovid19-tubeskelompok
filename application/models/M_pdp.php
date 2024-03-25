<?php 

class M_pdp extends CI_model {
    public function getAllPdp($table) {
        return $this->db->get($table);
    }

    public function tambahDataPdp($data, $table) {
        $this->db->insert($table, $data);
    }

    public function hapusDataPdp($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function getPdpId($table, $where) {
        return $this->db->get_where($table, $where);
    }

    public function ubahDataPdp($where, $data, $table) {
		$this->db->where($where);
		$this->db->update($table, $data);
    }

}
?>