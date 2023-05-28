<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\guruModel;
use App\Models\siswaModel;

class Guru extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->NIP = $this->session->get('Username');
        $this->statusLogin = $this->session->get('statusLogin');
        $this->guru = $this->session->get('status');
    }
    public function index()
    {
        if (!$this->LogValidation() == true) {
            $this->session->setFlashdata('data', 'anda tidak memiliki akses');
            return redirect()->to('Home/');
        } else {
            $model = db_connect();
            $builder = $model->table('guru');
            $builder->select('Nama');
            $builder->where('NIP', $this->NIP);
            $get = $builder->get();
            $data = ['Nama' => $get->getResult()];
            return view('Guru/DashboardGuru', $data);
        }
    }
    public function LogValidation()
    {
        if ($this->statusLogin === true) {
            return true;
        } else {
            // $this->session->setFlashdata('data', 'anda tidak memiliki akses');
            return false;
        }
    }
    //Halaman Tugas
    public function TugasPage()
    {
        if (!$this->LogValidation() == true) {
            return redirect()->to('Home/');
        }
        $db = db_connect();
        $model = new siswaModel();
        $builder = $db->table('tugas');
        $builder->select('mapel.nama_mapel, tugas.tgl_deadline,tugas.keterangan');
        $builder->join('mapel', 'mapel.id_mapel = tugas.id_mapel');
        $builder->where("mapel.NIP", $this->NIP);
        $query = $builder->get();

        $data = ['dataTugas' => $query->getResult(), 'dataMapel' => $model->getData("SELECT mapel.id_mapel, mapel.nama_mapel FROM guru JOIN mapel ON guru.NIP = mapel.NIP WHERE guru.NIP = $this->NIP"), 'validation' => \Config\Services::validation(), 'dateNotValid' => $this->session->get('dateNotValid')];
        return view('Guru/Tugas/TugasPage', $data);
    }
    public function Tugas($id)
    {
        if (!$this->LogValidation() == true) {
            return redirect()->to('Home/');
        }
        $data = ['idMapel' => $id, 'validation' => \Config\Services::validation(), 'dateNotValid' => $this->session->get('dateNotValid')];
        return view('Guru/Tugas/InputTugas', $data);
    }
    public function saveTugas()
    {

        $model = new guruModel();
        $validation = \Config\Services::validation();
        $dataFile = $this->request->getFile('file');
        $dataReq = $this->request->getVar();
        $start = date_create($dataReq['tgl_upload']);
        $end = date_create($dataReq['tgl_deadline']);
        $dateVal = (int)date_diff($start, $end)->format("%R%a");
        // dd($dataReq['id_mapel']);
        if (!$this->LogValidation() == true) {
            return redirect()->to('Home/');
        }
        if (!$this->validate(['keterangan' => 'required', 'id_mapel' => 'required'])) {
            return redirect()->to('Guru/Tugas')->withInput()->with('validation', $validation);
        }

        if ($dateVal < 0) {
            return redirect()->to('Guru/Tugas')->with('dateNotValid', 'you must input valid date');
        }
        $dataFinish = [
            'id_mapel' => $dataReq['id_mapel'], 'tgl_upload' => $dataReq['tgl_upload'], 'tgl_deadline' => $dataReq['tgl_deadline'], 'file' => $dataFile->getName(), 'keterangan' => $dataReq['keterangan']
        ];
        $data = $model->saveData($dataFinish);
        return redirect()->to("Guru/TugasPage");
    }
    public function getDataMapel()
    {
        if (!$this->LogValidation() == true) {
            return redirect()->to('Home/');
        }
        $db = db_connect();
        $NIP = $this->NIP;
        $builder  = $db->table('mapel')->select('id_kelas, id_mapel, nama_mapel')->where('NIP', $NIP)->get();
        $data = ['mapel' => $builder->getResult()];
        return view('Guru/inputNilai', $data);
    }
    public function daftarSiswa($id_mapel)
    {
        $db = db_connect();
        $data = ['siswa' => $db->query("SELECT siswa.NIS, mapel.id_mapel, siswa.Nama FROM siswa JOIN mapel ON mapel.id_kelas = siswa.id_kelas WHERE mapel.id_mapel = '$id_mapel' ")->getResult()];
        return view("Guru/formInputNilai", $data);
    }
    public function formInputNilai($NIS = '', $id_mapel = '')
    {
        $model = new guruModel();
        if (!$this->LogValidation() == true) {
            return redirect()->to('Home/');
        }
        // $result = $model->select()->where('NIS',$NIS)->where('id_mapel',$id_mapel);
        // dd($result->get()->getResultArray());
        $data = ['NIS' => $NIS, 'id_mapel' => $id_mapel, 'dataValue' => $model->select('UAS,UTS,Tugas')->where('NIS', $NIS)->where('id_mapel', $id_mapel)->get()->getResult()];
        return view("Guru/inputNilaiSiswa", $data);
        // $data = ['siswa'=>$db->query("SELECT siswa.NIS, siswa.Nama, mapel.id_mapel FROM siswa,mapel WHERE (siswa.id_kelas = '$id_kelas' AND mapel.id_mapel = '$id_mapel')")->getResult(),'tabel' => $kategoriNilai];
        // return view('Guru/formInputNilai',$data);

    }
    public function saveNilai()
    {
        if (!$this->LogValidation() == true) {
            return redirect()->to('Home/');
        }
        $db = db_connect();

        $data = $this->request->getVar();
        // dd($data);
        $UAS = $data['UAS'];
        $UTS = $data['UTS'];
        $Tugas = $data['Tugas'];
        $NIS = $data['NIS'];
        $id_mapel = $data['id_mapel'];
        $builder = $db->query("UPDATE nilai SET UAS = $UAS, UTS = $UTS, Tugas = $Tugas WHERE NIS = '$NIS' AND id_mapel= '$id_mapel'");
        if ($db->affectedRows() < 1) {
            return redirect()->to("Guru/formInputNilai/$NIS/$id_mapel")->withInput()->with('validation', 'error in input');
        } else {
            return redirect()->to("Guru/daftarSiswa/$id_mapel");
        }
    }
    public function jadwal()
    {
        if (!$this->LogValidation() == true) {
            return redirect()->to('Home/');
        }
        $db = db_connect();
        $NIP = $this->NIP;
        $builder  = $db->table('mapel')->select('id_kelas, id_mapel, nama_mapel')->where('NIP', $NIP)->get();
        $data = ['mapel' => $builder->getResult()];
        return view('Guru/viewJadwal', $data);
    }
    public function Progres_Tugas()
    {
        if (!$this->LogValidation() == true) {
            return redirect()->to('Home/');
        }
        return view('Guru/Tugas/progresNilai');
    }
}
