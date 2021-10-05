<?php

class Dashboard extends Controller
{
    public  function index()
    {
        $data = [""];

        $this->view('Layouts/header', $data);
        $this->view('Dashboard/index', $data);
        $this->view('Layouts/footer', $data);
    }
    public function getubah()
    {
        echo json_encode(($this->model('DashboardModel')->getPendudukById($_POST["id"])));
    }

    public function data()
    {
        $data["penduduk"] = $this->model('DashboardModel')->getAllPenduduk();
        $this->view('Dashboard/data', $data);
    }

    public function tambah()
    {
        if ($this->model('DashboardModel')->tambahDataPenduduk($_POST) > 0) {
            echo json_encode(["sukses" => "berhasil tambah data"]);
        }
    }

    public function ubah()
    {
        if ($this->model('DashboardModel')->ubahDataPenduduk($_POST) > 0) {
            echo json_encode(["sukses" => "berhasil ubah data"]);
        }
    }

    public function hapus()
    {
        if ($this->model('DashboardModel')->hapusDataPenduduk($_POST["id"]) > 0) {
            echo json_encode(["sukses" => "berhasil menghapus data"]);
        }
    }

    public function cari()
    {
        $data["penduduk"] = $this->model('DashboardModel')->cariDataPenduduk();
        $this->view('Dashboard/data', $data);
    }
}
