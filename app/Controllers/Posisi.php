<?php

namespace App\Controllers;

use App\Models\posisiModel;

class Posisi extends BaseController
{
    protected $posisiModel;
    public function __construct()
    {
        $this->posisiModel = new posisiModel();
    }
    public function index()
    {
        $data = [
            "title" => "Posisi",
            "breadcrumbs" => ['Rekrutmen', 'Posisi'],
            "icon" => "bx-cube-alt",
            "no" => 0,
            "posisi" => $this->posisiModel->getPosisi(),
            "pesan" => session()->getFlashdata('pesan')
        ];
        return view('posisi/index', $data);
    }

    public function create()
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $data = [
            "title" => "Posisi",
            "breadcrumbs" => ['Rekrutmen', 'Posisi'],
            "icon" => "bx-cube-alt",
            "klien" => $this->db->getdata4selectoption('klien', 'klien_id', array('nm_klien'), '', Old('gklien'), true),
            "status" => $this->array4selectoption(array('1' => 'ADA LOWONGAN', '0' => 'TIDAK ADA LOWONGAN'), ''),
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation
        ];
        return view('posisi/create', $data);
    }

    public function insert()
    {
        if (!$this->validate([
            'gposisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama posisi harus diisi'
                ]
            ],
            'gklien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama klien harus diisi'
                ]
            ],
            'gtglorder' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal order harus diisi'
                ]
            ],
            'gkebutuhan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kebutuhan (berapa) orang harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/posisi/create')->withInput();
        } else {
            $data = [
                "nm_posisi" => $this->request->getVar('gposisi'),
                "klien_id" => $this->request->getVar('gklien'),
                //"tgl_order" => $this->request->getVar('gtglorder'),
                "keterangan" => $this->request->getVar('gketerangan'),
                "status" => $this->request->getVar('gstatus'),
                "kebutuhan" => $this->request->getVar('gkebutuhan'),
            ];

            $id = $this->posisiModel->insertPosisi($data);
            return redirect()->to("/posisi/edit/" . $id);
        }
    }

    public function edit($id)
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $posisi = $this->posisiModel->getPosisi($id);
        $data = [
            "title" => "Posisi",
            "breadcrumbs" => ['Rekrutmen', 'Posisi'],
            "icon" => "bx-cube-alt",
            "posisi" => $posisi,
            "klien" => $this->db->getdata4selectoption('klien', 'klien_id', array('nm_klien'), '', $posisi['klien_id'], true),
            "status" => $this->array4selectoption(array('1' => 'ADA LOWONGAN', '0' => 'TIDAK ADA LOWONGAN'), $posisi['status']),
            "pesan" => session()->getFlashdata('pesan'),
            "pesan2" => session()->getFlashdata('pesan2'),
            "validation" => $validation
        ];
        return view('posisi/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'gposisi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama posisi harus diisi'
                ]
            ],
            'gklien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama klien harus diisi'
                ]
            ],
            'gtglorder' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal order harus diisi'
                ]
            ],
            'gkebutuhan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kebutuhan (berapa) orang harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan2', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/posisi/edit/' . $id)->withInput();
        } else {
            $data = [
                "nm_posisi" => $this->request->getVar('gposisi'),
                "klien_id" => $this->request->getVar('gklien'),
                "tgl_order" => $this->request->getVar('gtglorder'),
                "keterangan" => $this->request->getVar('gketerangan'),
                "status" => $this->request->getVar('gstatus'),
                "kebutuhan" => $this->request->getVar('gkebutuhan'),
            ];

            session()->setFlashdata('pesan', 'Data berhasil disimpan');

            $this->posisiModel->updatePosisi($id, $data);
            return redirect()->to("/posisi/edit/" . $id);
        }
    }

    public function delete($id)
    {
        $this->posisiModel->deletePosisi($id);

        return redirect()->to('/posisi')->with('pesan', 'Data berhasil dihapus');
    }
}
