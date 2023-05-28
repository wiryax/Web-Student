<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\siswaModel;

class Siswa extends BaseController
{
    private $NIS;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->NIS = $this->session->get('Username');
        $this->statusLogin = $this->session->get('statusLogin');
    }
    public function index()
    {
        return view('Siswa/template');
        // if ($this->statusLogin === true) {
        //     $model = new siswaModel();
        //     $data = ['jadwalMapel' => $model->jadwal($this->NIS)];
        //     return view('Siswa/jadwalSiswa', $data);
        // } else {
        //     return redirect()->to('Home/');
        // }
    }
    public function Jadwal()
    {
        if ($this->statusLogin === true) {
            $model = new siswaModel();
            $data = ['jadwalMapel' => $model->jadwal($this->NIS)];
            return view('Siswa/jadwalSiswa', $data);
        } else {
            return redirect()->to('Home/');
        }
    }
    public function Nilai()
    {
        $model = new siswaModel();
        if ($this->statusLogin === true) {
            $data = ['nilai' => $model->getNilai($this->NIS)];
            return view('Siswa/Nilai', $data);
        }
    }
    public function Mapel($idMapel)
    {
        $model = new siswaModel();
        // $query = "SELECT mapel.nama_mapel, mapel.keterangan, guru.Nama, kelas.nama_kelas FROM mapel JOIN guru ON guru.NIP = mapel.NIP JOIN kelas ON kelas.id_kelas = mapel.id_kelas WHERE mapel.id_mapel = '$idMapel'";
        if ($this->statusLogin === true) {
            $data = [
                'mapel' => $model->getDataMapel($idMapel)->getResult(),
                'tugas' => $model->getData("SELECT tugas.id_tugas FROM tugas WHERE tugas.id_mapel = '$idMapel'")
            ];
        } else {
            return redirect()->to('Home/');
        }
        return view('Siswa/Mapel', $data);
    }
    public function Tugas()
    {
        $model = new siswaModel();
        if ($this->statusLogin === true) {
            $data = ['data' => $model->getTugas($this->NIS)->getResultArray()];
        } else {
            return redirect()->to('Home/');
        }
        return view('Siswa/viewTugas', $data);
    }
    public function formTugas($id_tugas, $nama_mapel)
    {
        if ($this->statusLogin === true) {
            $data = ['id_tugas' => $id_tugas, 'nama_mapel' => $nama_mapel, 'NIS' => $this->NIS];
        } else {
            return redirect()->to('Home/');
        }
        return view('Siswa/formTugas', $data);
    }
    public function submitTugas()
    {
        if ($this->statusLogin === true) {
            $file = $this->request->getFile('file');
            $data = $this->request->getVar();
            if ($file->getClientExtension() != 'docx') {
                return redirect()->back();
            } else {
                $dataInsert = ['id_tugas' => $data['id_tugas'], 'NIS' => $data['NIS'], 'file' => $file->getName(), 'catatan' => $data['catatan']];
                $model = new siswaModel();
                //cek data tugas siswa
                if ($model->db->table('submit_tugas')->select('*')->where('NIS', $data['NIS'])->where('id_tugas', $data['id_tugas'])->countAllResults() > 0) {
                    echo 'data sudah ada';
                    return redirect()->back();
                } else {
                    $model->insertTugas($dataInsert);
                }
            }
        } else {
            return redirect()->to('/Home');
        }
    }
}
