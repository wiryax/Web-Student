<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    // protected $table      = 'siswa';
    public function cek($username,$password){
        $this->db = \Config\Database::connect();
        $builder = $this->db->table('siswa');
        $dataSiswa = $builder->where('NIS',$username)->where('password',$password);
        $builder2 = $this->db->table('guru');
        $dataGuru = $builder2->where('NIP',$username)->where('password',$password);
        if($dataSiswa->countAllResults() >= 1){
            return 'siswa';
        }
        else if($dataGuru->countAllResults() >= 1){
            return 'guru';
        }else{
            return false;
        }
    }
}