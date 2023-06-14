<?php

namespace App\Models;

use CodeIgniter\Model;

class guruModel extends Model
{
    protected $table = 'nilai';
    protected $allowedFields = ['NIS', 'id_mapel', 'Tugas', 'UAS', 'UTS'];
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function saveData($data)
    {
        $builder = $this->db->table('tugas');
        $builder->insert($data);
        return true;
    }
    public function GuruHome($NIP)
    {
        $data = ['dataJumlahTugas', 'dataJumlahKelas', 'dataGuru'];

        $data['dataGuru'] = $this->db->table('guru')->select('nama')->where('NIP', $NIP);
        $data['dataJumlahTugas'] = $this->db->table('tugas')->select('*')->where('mapel.NIP', $NIP)->join('mapel', 'mapel.id_mapel = tugas.id_mapel')->join('guru', 'guru.NIP = mapel.NIP');
        $data['dataJumlahKelas'] = $this->db->table('mapel')->select('*')->where('NIP', $NIP);
        return $data;
    }
    public function getDataNIlai($NIS, $id_mapel)
    {
        $builder = $this->db->table('nilai')->select('UAS,UTS,Tugas')->where('NIS', $NIS)->where('id_mapel', $id_mapel);
        return $builder;
    }
}
