<?php

class Adm_kasus extends CI_Controller {
 
	public function __construct() {
        parent::__construct();
        $this->load->model('M_kasus');
    }

    public function index() {
        $this->load->view('adm_kasus');
    }

    public function ambilKasus() {
        $dataKasus = $this->M_kasus->getAllKasus('kasus')->result();
        echo json_encode($dataKasus);
    }

    public function tambah() {
        $terkonfirmasi = $this->input->post('terkonfirmasi');
        $perawatan = $this->input->post('perawatan');
        $sembuh = $this->input->post('sembuh');
        $meninggal = $this->input->post('meninggal');
        $provinsi = $this->input->post('provinsi');
        $waktu = $this->input->post('waktu');

        if ($terkonfirmasi=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($perawatan=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($sembuh=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($meninggal=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($provinsi=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($waktu=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }else {
           $result['pesan'] = "";
           $data = array(
               'terkonfirmasi' => $terkonfirmasi,
               'perawatan' => $perawatan,
               'sembuh' => $sembuh,
               'meninggal' => $meninggal,
               'provinsi' => $provinsi,
               'waktu' => $waktu
           );
           $this->M_kasus->tambahDataKasus($data, 'kasus');
        }
        echo json_encode($result);
    }

    public function getKasusId() {
        $id = $this->input->post('id');
        $where = array('id' => $id);
        $dataKasus = $this->M_kasus->getKasusId('kasus', $where)->result();

        echo json_encode($dataKasus);
    }

    public function ubah() {
        $id = $this->input->post('id');
        $terkonfirmasi = $this->input->post('terkonfirmasi');
        $perawatan = $this->input->post('perawatan');
        $sembuh = $this->input->post('sembuh');
        $meninggal = $this->input->post('meninggal');
        $provinsi = $this->input->post('provinsi');
        $waktu = $this->input->post('waktu');

        if ($terkonfirmasi=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($perawatan=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($sembuh=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($meninggal=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($provinsi=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }elseif ($waktu=='') {
            $result['pesan'] = "*Ada field yang belum diisi!";
        }else {
           $result['pesan'] = "";
           $where = array('id' => $id);
           $data = array(
               'terkonfirmasi' => $terkonfirmasi,
               'perawatan' => $perawatan,
               'sembuh' => $sembuh,
               'meninggal' => $meninggal,
               'provinsi' => $provinsi,
               'waktu' => $waktu
           );
           $this->M_kasus->ubahDataKasus($where, $data, 'kasus');
        }
        echo json_encode($result);
    }

    public function hapus() {
        $id = $this->input->post('id');
        $where = array('id' => $id);
        $this->M_kasus->hapusDataKasus($where, 'kasus');
    }
}

?>