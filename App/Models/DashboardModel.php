<?php
class DashboardModel
{
    private $tabel = 'data_penduduk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPenduduk()
    {

        $this->db->query('SELECT * FROM ' . $this->tabel);
        return $this->db->resultSet();
    }

    public function tambahDataPenduduk($data)
    {
        $query = "INSERT INTO data_penduduk 
                    VALUES
                    (null,:nama,:tempat_lahir,:tanggal_lahir,:pekerjaan,:alamat,:jenis_kelamin,:agama)";
        $this->db->query($query);
        $this->db->bind('nama', $data["nama"]);
        $this->db->bind('tempat_lahir', $data["tempat_lahir"]);
        $this->db->bind('tanggal_lahir', $data["tanggal_lahir"]);
        $this->db->bind('pekerjaan', $data["pekerjaan"]);
        $this->db->bind('alamat', $data["alamat"]);
        $this->db->bind('agama', $data["agama"]);
        $this->db->bind('jenis_kelamin', $data["jenis_kelamin"]);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataPenduduk($data)
    {
        $query = "UPDATE data_penduduk SET
                    nama=:nama,
                    tempat_lahir=:tempat_lahir,
                    tanggal_lahir=:tanggal_lahir,
                    pekerjaan=:pekerjaan,
                    alamat=:alamat,
                    jenis_kelamin=:jenis_kelamin,
                    agama=:agama
                    WHERE id=:id
        ";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('pekerjaan', $data['pekerjaan']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('jenis_kelamin', $data['jenis_kelamin']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataPenduduk($id)
    {
        $query = "DELETE FROM data_penduduk WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getPendudukById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->tabel . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function cariDataPenduduk()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM data_penduduk WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        $this->db->execute();
        return $this->db->resultSet();
    }
}
