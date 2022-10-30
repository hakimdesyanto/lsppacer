<?php

namespace App\Controllers;

use App\Models\soalModel;

class Soal extends BaseController
{
    protected $soalModel;
    public function __construct()
    {
        $this->soalModel = new soalModel();
    }
    public function index()
    {
        $data = [
            "title" => "Soal Test",
            "breadcrumbs" => ['Rekrutmen', 'Soal Test'],
            "icon" => "bx-task",
            "no" => 0,
            "soal" => $this->soalModel->getSoal(),
            "pesan" => session()->getFlashdata('pesan')
        ];
        return view('soal/index', $data);
    }

    public function create()
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $data = [
            "title" => "Soal Test",
            "breadcrumbs" => ['Rekrutmen', 'Soal Test'],
            "icon" => "bx-task",
            "jawaban" => $this->array4selectoption(array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'), ''),
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation
        ];
        return view('soal/create', $data);
    }

    public function insert()
    {
        if (!$this->validate([
            'gpertanyaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pertanyaan soal harus diisi'
                ]
            ],
            'gjawaba' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jawaban A harus diisi'
                ]
            ],
            'gjawabb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jawaban B harus diisi'
                ]
            ],
            'gjawabc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jawaban C harus diisi'
                ]
            ],
            'gjawabd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jawaban D harus diisi'
                ]
            ],
            'gbobot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bobot harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/soal/create')->withInput();
        } else {
            $data = [
                "pertanyaan" => $this->request->getVar('gpertanyaan'),
                "jawab_a" => $this->request->getVar('gjawaba'),
                "jawab_b" => $this->request->getVar('gjawabb'),
                "jawab_c" => $this->request->getVar('gjawabc'),
                "jawab_d" => $this->request->getVar('gjawabd'),
                "jawaban" => $this->request->getVar('gjawaban'),
                "bobot" => $this->request->getVar('gbobot'),
            ];

            session()->setFlashdata('pesan', 'Data berhasil disimpan');

            $id = $this->soalModel->insertSoal($data);
            return redirect()->to("/soal/edit/" . $id);
        }
    }

    public function edit($id)
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $soal = $this->soalModel->getSoal($id);
        $data = [
            "title" => "Soal Test",
            "breadcrumbs" => ['Rekrutmen', 'Soal Test'],
            "icon" => "bx-task",
            "soal" => $soal,
            "jawaban" => $this->array4selectoption(array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D'), $soal['jawaban']),
            "pesan" => session()->getFlashdata('pesan'),
            "pesan2" => session()->getFlashdata('pesan2'),
            "validation" => $validation
        ];
        return view('soal/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'gpertanyaan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pertanyaan soal harus diisi'
                ]
            ],
            'gjawaba' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jawaban A harus diisi'
                ]
            ],
            'gjawabb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jawaban B harus diisi'
                ]
            ],
            'gjawabc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jawaban C harus diisi'
                ]
            ],
            'gjawabd' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jawaban D harus diisi'
                ]
            ],
            'gbobot' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Bobot harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan2', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/soal/edit/' . $id)->withInput();
        } else {
            $data = [
                "pertanyaan" => $this->request->getVar('gpertanyaan'),
                "jawab_a" => $this->request->getVar('gjawaba'),
                "jawab_b" => $this->request->getVar('gjawabb'),
                "jawab_c" => $this->request->getVar('gjawabc'),
                "jawab_d" => $this->request->getVar('gjawabd'),
                "jawaban" => $this->request->getVar('gjawaban'),
                "bobot" => $this->request->getVar('gbobot'),
            ];

            session()->setFlashdata('pesan', 'Data berhasil disimpan');

            $this->soalModel->updateSoal($id, $data);
            return redirect()->to("/soal/edit/" . $id);
        }
    }

    public function delete($id)
    {
        $this->soalModel->deleteSoal($id);

        return redirect()->to('/soal')->with('pesan', 'Data berhasil dihapus');
    }
}
