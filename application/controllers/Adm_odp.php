<?php

class Adm_odp extends CI_Controller {
 
	public function __construct() {
        parent::__construct();
        $this->load->model('M_odp');
    }

    public function index() {
        $this->load->view('adm_odp');
    }

    public function ambilOdp() {
        $dataOdp = $this->M_odp->getAllOdp('odp')->result();
        echo json_encode($dataOdp);
    }

    public function tambah() {
        $proses = $this->input->post('proses');
        $selesai = $this->input->post('selesai');
        $provinsi = $this->input->post('provinsi');
        $waktu = $this->input->post('waktu');
        $total = $this->input->post('total');

        if ($proses=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($selesai=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($provinsi=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($waktu=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($total=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }else {
           $result['pesan'] = "";
           $data = array(
               'proses' => $proses,
               'selesai' => $selesai,
               'provinsi' => $provinsi,
               'waktu' => $waktu,
               'total' => $total
           );
           $this->M_odp->tambahDataOdp($data, 'odp');
        }
        echo json_encode($result);
    }

    public function getOdpId() {
        $id = $this->input->post('id');
        $where = array('id' => $id);
        $dataOdp = $this->M_odp->getOdpId('odp', $where)->result();

        echo json_encode($dataOdp);
    }

    public function ubah() {
        $id = $this->input->post('id');
        $proses = $this->input->post('proses');
        $selesai = $this->input->post('selesai');
        $provinsi = $this->input->post('provinsi');
        $waktu = $this->input->post('waktu');
        $total = $this->input->post('total');

        if ($proses=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($selesai=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($provinsi=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($waktu=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($total=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }else {
           $result['pesan'] = "";
           $where = array('id' => $id);
           $data = array(
               'proses' => $proses,
               'selesai' => $selesai,
               'provinsi' => $provinsi,
               'waktu' => $waktu,
               'total' => $total
           );
           $this->M_odp->ubahDataOdp($where, $data, 'odp');
        }
        echo json_encode($result);
    }

    public function hapus() {
        $id = $this->input->post('id');
        $where = array('id' => $id);
        $this->M_odp->hapusDataOdp($where, 'odp');
    }
}
?>