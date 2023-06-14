<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class data extends Seeder
{
    public function run()
    {
        // $data = [];
        // $JumlahSiswa = $this->db->table('siswa')->select('*')->countAllResults();
        // $JumlahMapel = $this->db->table('mapel')->select('*')->countAllResults();
        // for ($i = 1; $i <= $JumlahMapel; $i++) {
        //     for ($j = 1; $j <= $JumlahSiswa; $j++) {
        //         array_push($data, [
        //             'id_mapel' => 'Ekonomi-' . $i,
        //             'NIS' => '00' . $j,
        //             'UAS' => 0,
        //             'UTS' => 0,
        //             'Tugas' => 0
        //         ]);
        //     }
        // }

        // // Using Query Builder
        // $this->db->table('nilai')->insertBatch($data);
    }
}
