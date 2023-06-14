<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Validation\StrictRules\Rules;

class Home extends BaseController
{
    public function __construct()
    {
        // $this->session = \Config\Services::session();   
    }

    public function index()
    {
        session();
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('Login-template/Login', $data);
    }
    public function Validation()
    {
        $data = $this->request->getVar();
        $dataModel = new LoginModel();
        $cekLogin = $dataModel->cek($data['username'], $data['password']);


        if (!$this->validate([
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi !!!',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus Diisi !!!',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/Home')->withInput()->with('validation', $validation);
        }

        if ($cekLogin === 'siswa') {
            $this->session->set([
                'statusLogin' => true,
                'Username' => $data['username']
            ]);
            return redirect()->to('/Siswa/');
        } elseif ($cekLogin === 'guru') {
            $this->session->set([
                'statusLogin' => true,
                'Username' => $data['username'],
                'status' => 'guru'
            ]);
            return redirect()->to('/Guru/');
        } else {
            return redirect()->to('/Home/');
        }
    }
    function dashboard()
    {
        if ($this->session->get('statusLogin') == true) {
            $data = ['Username' => $this->session->get('Username')];
            return view('Siswa/Dashboard', $data);
        } else {
            echo 'Maaf Anda Tidak mempunyai Akses';
            return redirect()->back();
        }
    }
    public function deleteSession()
    {
        $this->session->remove('Username');
        $this->session->remove('statusLogin');
        $this->session->remove('status');
        return redirect()->to('Home/index');
    }
}
