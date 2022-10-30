<?php

namespace App\Controllers;

use App\Models\klienModel;

class Klien extends BaseController
{
    protected $klienModel;
    public function __construct()
    {
        $this->klienModel = new klienModel();
    }
    public function index()
    {
        $data = [
            "title" => "Klien",
            "breadcrumbs" => ['Klien'],
            "icon" => "bx-task",
            "no" => 0,
            "klien" => $this->klienModel->getKlien(),
            "pesan" => session()->getFlashdata('pesan')
        ];
        return view('klien/index', $data);
    }

    public function create()
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $data = [
            "title" => "Klien",
            "breadcrumbs" => ['Klien'],
            "icon" => "bx-task",
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation
        ];

        return view('klien/create', $data);
    }

    public function insert()
    {
        if (!$this->validate([
            'gklien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama klien harus diisi'
                ]
            ],
            'galamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'gtelp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. Telp harus diisi'
                ]
            ],
            'gmail' => [
                'rules' => 'valid_email',
                'errors' => [
                    'valid_email' => 'Email harus diisi dan penulisan harus benar'
                ]
            ],
            'guserlogin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'User login harus diisi'
                ]
            ],
            'gpassword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/klien/create')->withInput();
        } else {
            if ($this->request->getVar('gpassword') == $this->request->getVar('gkpassword')) {
                if (!$this->db->isgetdata("klien", "nm_klien='" . $this->request->getVar('gklien') . "'")) {
                    if (!$this->db->isgetdata("klien", "user_login='" . $this->request->getVar('guserlogin') . "'")) {
                        $data = [
                            "nm_klien" => $this->request->getVar('gklien'),
                            "alamat" => $this->request->getVar('galamat'),
                            "no_telp" => $this->request->getVar('gtelp'),
                            "no_fax" => $this->request->getVar('gfax'),
                            "email" => $this->request->getVar('gmail'),
                            "user_login" => $this->request->getVar('guserlogin'),
                            "password" => md5($this->request->getVar('gpassword')),
                        ];

                        session()->setFlashdata('pesan', 'Data berhasil disimpan');

                        $id = $this->klienModel->insertKlien($data);
                        return redirect()->to("/klien/edit/" . $id);
                    } else {
                        session()->setFlashdata('pesan', 'Data gagal disimpan. Nama user login sudah digunakan.');
                        $this->alert = 'danger';
                        return redirect()->to("/")->withInput()->with('alert', $this->alert);
                    }
                } else {
                    session()->setFlashdata('pesan', 'Data gagal disimpan. Nama klien sudah ada.');
                    $this->alert = 'danger';
                    return redirect()->to("/")->withInput()->with('alert', $this->alert);
                }
            } else {
                session()->setFlashdata('pesan', 'Data gagal disimpan. Password dan Konfirm Password tidak sama.');
                $this->alert = 'danger';
                return redirect()->to("/klien/create")->withInput()->with('alert', $this->alert);
            }
        }
    }

    public function edit($id)
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $klienModel = $this->klienModel->getKlien($id);
        $data = [
            "title" => "Klien",
            "breadcrumbs" => ['Klien'],
            "icon" => "bx-task",
            "klien" => $klienModel,
            "pesan" => session()->getFlashdata('pesan'),
            "pesan2" => session()->getFlashdata('pesan2'),
            "validation" => $validation
        ];
        return view('klien/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'gklien' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama klien harus diisi'
                ]
            ],
            'galamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi'
                ]
            ],
            'gtelp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No. Telp harus diisi'
                ]
            ],
            'gmail' => [
                'rules' => 'valid_email',
                'errors' => [
                    'valid_email' => 'Email harus diisi dan penulisan harus benar'
                ]
            ],
            'guserlogin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'User login harus diisi'
                ]
            ],
            'gpassword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan2', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/klien/edit/' . $id)->withInput();
        } else {
            if ($this->request->getVar('gpassword') == $this->request->getVar('gkpassword')) {
                if (!$this->db->isgetdata("klien", "nm_klien='" . $this->request->getVar('gklien') . "' AND klien_id<>" . $id)) {
                    if (!$this->db->isgetdata("klien", "user_login='" . $this->request->getVar('guserlogin') . "' AND klien_id<>" . $id)) {
                        $data = [
                            "nm_klien" => $this->request->getVar('gklien'),
                            "alamat" => $this->request->getVar('galamat'),
                            "no_telp" => $this->request->getVar('gtelp'),
                            "no_fax" => $this->request->getVar('gfax'),
                            "email" => $this->request->getVar('gmail'),
                            "user_login" => $this->request->getVar('guserlogin'),
                            "password" => md5($this->request->getVar('gpassword')),
                        ];

                        session()->setFlashdata('pesan', 'Data berhasil disimpan');

                        $this->klienModel->updateKlien($id, $data);
                        return redirect()->to("/klien/edit/" . $id);
                    } else {
                        session()->setFlashdata('pesan2', 'Data gagal disimpan. Nama user login sudah digunakan.');
                        $this->alert = 'danger';
                        return redirect()->to("/klien/edit/" . $id)->withInput()->with('alert', $this->alert);
                    }
                } else {
                    session()->setFlashdata('pesan2', 'Data gagal disimpan. Nama klien sudah ada.');
                    $this->alert = 'danger';
                    return redirect()->to("/klien/edit/" . $id)->withInput()->with('alert', $this->alert);
                }
            } else {
                session()->setFlashdata('pesan2', 'Data gagal disimpan. Password dan Konfirm Password tidak sama.');
                $this->alert = 'danger';
                return redirect()->to("/klien/edit/" . $id)->withInput()->with('alert', $this->alert);
            }
        }
    }

    public function delete($id)
    {
        $this->klienModel->deleteKlien($id);

        return redirect()->to('/klien')->with('pesan', 'Data berhasil dihapus');
    }
}
