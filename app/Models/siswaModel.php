<?php

namespace App\Models;

use CodeIgniter\Model;

class siswaModel extends Model
{
    // protected $table      = 'siswa';
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function jadwal($NIS)
    {
        $db = $this->db;

        $query = $db->query("SELECT mapel.nama_mapel, kelas.id_kelas, guru.Nama, mapel.id_mapel FROM siswa JOIN kelas ON kelas.id_kelas = siswa.id_kelas JOIN mapel ON mapel.id_kelas = kelas.id_kelas JOIN guru ON mapel.NIP = guru.NIP WHERE siswa.NIS = $NIS");

        // $this->from('siswa');
        // $this->join('kelas','kelas.id_kelas = siswa.id_kelas');
        // $this->join('mapel','mapel.id_kelas = mapel.id_kelas');
        // $query = $this->get();
        return $query->getResult();
    }
    public function getNilai($NIS)
    {
        $db = $this->db;
        $query = $db->query("SELECT kelas.nama_kelas,mapel.nama_mapel, nilai.Tugas, nilai.UAS, nilai.UTS FROM siswa JOIN kelas ON kelas.id_kelas = siswa.id_kelas JOIN mapel ON mapel.id_kelas = kelas.id_kelas JOIN nilai ON nilai.id_mapel = mapel.id_mapel WHERE siswa.NIS = $NIS");
        return $query->getResult();
    }
    public function getTugas($data)
    {
        //inisialisasi kelas
        $db = $this->db;
        $kelas = $db->table('siswa')->select('id_kelas')->where('NIS', $data);
        $builder = $this->db->table('mapel')->select('mapel.id_mapel, mapel.nama_mapel, tugas.id_tugas, tugas.tgl_upload, tugas.tgl_deadline')->join('tugas', 'tugas.id_mapel = mapel.id_mapel')->where('mapel.id_kelas', $kelas)->get();
        return $builder;

        // SELECT mapel.id_mapel, tugas.id_tugas FROM `mapel` JOIN tugas ON tugas.id_mapel = mapel.id_mapel JOIN kelas ON kelas.id_kelas = mapel.id_kelas WHERE mapel.id_kelas = 'IPS5'
    }
    public function getData($query)
    {
        $builder = $this->db->query($query);
        return $builder->getResult();
    }
    public function getDataMapel($id)
    {
        $data = $this->db->table('mapel')->select(' mapel.nama_mapel, mapel.keterangan, guru.Nama, kelas.nama_kelas')
            ->from('tugas')
            ->where('mapel.id_mapel', $id)
            ->join('guru', 'guru.NIP = mapel.NIP')
            ->join('kelas', 'kelas.id_kelas = mapel.id_kelas')->get();
        return $data;
    }
    public function insertTugas($data)
    {
        $this->db->table('submit_tugas')->insert($data);
    }
}
