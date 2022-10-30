<?php

namespace App\Controllers;

use App\Models\jadwaltestModel;

class Jadwaltest extends BaseController
{
    protected $jadwaltestModel;
    public function __construct()
    {
        $this->jadwaltestModel = new jadwaltestModel();
    }
    public function index()
    {
        $data = [
            "title" => "Jadwal Test",
            "breadcrumbs" => ['Referensi', 'Jadwal Test'],
            "icon" => "bx-task",
            "no" => 0,
            "jadwaltest" => $this->jadwaltestModel->getJadwaltest(),
            "pesan" => session()->getFlashdata('pesan')
        ];
        return view('jadwaltest/index', $data);
    }

    public function create()
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $data = [
            "title" => "Jadwal Test",
            "breadcrumbs" => ['Rekrutmen', 'Jadwal Test'],
            "icon" => "bx-task",
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation
        ];

        return view('jadwaltest/create', $data);
    }

    public function insert()
    {
        if (!$this->validate([
            'gketerangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan Jadwal Test harus diisi'
                ]
            ],
            'gtgltest' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tgl Jadwal Test harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/jadwaltest/create')->withInput();
        } else {
            $data = [
                "keterangan" => $this->request->getVar('gketerangan'),
                "tgl_test" => $this->request->getVar('gtgltest'),
            ];

            session()->setFlashdata('pesan', 'Data berhasil disimpan');

            $id = $this->jadwaltestModel->insertJadwaltest($data);
            return redirect()->to("/jadwaltest/edit/" . $id);
        }
    }

    public function edit($id)
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $jadwaltest = $this->jadwaltestModel->getJadwaltest($id);
        $data = [
            "title" => "Jadwal Test",
            "breadcrumbs" => ['Rekrutmen', 'Jadwal Test'],
            "icon" => "bx-task",
            "jadwaltest" => $jadwaltest,
            "pesan" => session()->getFlashdata('pesan'),
            "pesan2" => session()->getFlashdata('pesan2'),
            "validation" => $validation
        ];
        return view('jadwaltest/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'gketerangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan Jadwal Test harus diisi'
                ]
            ],
            'gtgltest' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tgl Jadwal Test harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan2', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/jadwaltest/edit/' . $id)->withInput();
        } else {
            $data = [
                "keterangan" => $this->request->getVar('gketerangan'),
                "tgl_test" => $this->request->getVar('gtgltest'),
            ];

            session()->setFlashdata('pesan', 'Data berhasil disimpan');

            $this->jadwaltestModel->updateJadwaltest($id, $data);
            return redirect()->to("/jadwaltest/edit/" . $id);
        }
    }

    public function delete($id)
    {
        $this->jadwaltestModel->deleteJadwaltest($id);

        return redirect()->to('/jadwaltest')->with('pesan', 'Data berhasil dihapus');
    }
}
