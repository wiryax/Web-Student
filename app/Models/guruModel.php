<?php

namespace App\Models;

use CodeIgniter\Model;

class guruModel extends Model
{
    protected $table = 'nilai';
    protected $allowedFields = ['NIS','id_mapel','Tugas','UAS','UTS'];
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
    // public function getData($data ='', $table)
    // {
    //     $builder = $this->db->table($table);

    // }
}