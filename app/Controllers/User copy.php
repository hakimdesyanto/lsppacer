<?php

namespace App\Controllers;

use App\Models\userModel;

class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new userModel();
    }
    public function index()
    {
        $data = [
            "title" => "User",
            "breadcrumbs" => ['Pengelolaan User', 'User'],
            "icon" => "bx-user-circle",
            "no" => 0,
            "user" => $this->userModel->getUser(),
            "pesan" => session()->getFlashdata('pesan')
        ];
        return view('user/index', $data);
    }

    public function create()
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $data = [
            "title" => "User",
            "breadcrumbs" => ['Pengelolaan User', 'User'],
            "icon" => "bx-user-circle",
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation
        ];
        return view('user/create', $data);
    }

    public function insert()
    {
        if (!$this->validate([
            'guser' => [
                'rules' => 'required|is_unique[user.nm_user]',
                'errors' => [
                    'required' => 'Nama user harus diisi',
                    'is_unique' => 'Nama user sudah terdaftar'
                ]
            ],
            'gpassword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ],
            'gpassword2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konfirm password harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/user/create')->withInput();
        } else {
            if ($this->request->getVar('gpassword') != $this->request->getVar('gpassword2')) {
                session()->setFlashdata('pesan2', 'Data gagal disimpan. Password dan Konfirm Password tidak sama');

                return redirect()->to('/user/create')->withInput();
            } else {
                $data = [
                    "nm_user" => $this->request->getVar('guser'),
                    "password" => md5($this->request->getVar('gpassword')),
                ];

                session()->setFlashdata('pesan', 'Data berhasil disimpan');

                $id = $this->userModel->insertUser($data);
                return redirect()->to("/user/edit/" . $id);
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

        $user = $this->userModel->getUser($id);
        $data = [
            "title" => "User",
            "breadcrumbs" => ['Pengelolaan User', 'User'],
            "icon" => "bx-user-circle",
            "user" => $user,
            "pesan" => session()->getFlashdata('pesan'),
            "pesan2" => session()->getFlashdata('pesan2'),
            "validation" => $validation
        ];
        return view('user/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'guser' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama user harus diisi'
                ]
            ],
            'gpassword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ],
            'gpassword2' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konfirm password harus diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan2', 'Data gagal disimpan. Silahkan isi data dengan lengkap dan benar!');

            return redirect()->to('/user/edit/' . $id)->withInput();
        } else {
            if ($this->request->getVar('gpassword') != $this->request->getVar('gpassword2')) {
                return redirect()->to("/user/edit/" . $id)->withInput()->with('pesan2', 'Data gagal disimpan. Password dan Konfirm Password tidak sama');
            } else {
                if ($this->db->isgetdata("user", "user_id<>" . $id . " AND nm_user='" . $this->request->getVar('guser') . "'")) {
                    return redirect()->to("/user/edit/" . $id)->withInput()->with('pesan2', 'Data gagal disimpan. Nama user sudah terdaftar');
                } else {
                    $data = [
                        "nm_user" => $this->request->getVar('guser'),
                        "password" => md5($this->request->getVar('gpassword')),
                    ];

                    session()->setFlashdata('pesan', 'Data berhasil disimpan');

                    $this->userModel->updateUser($id, $data);
                    return redirect()->to("/user/edit/" . $id);
                }
            }
        }
    }

    public function delete($id)
    {
        $this->userModel->deleteUser($id);

        return redirect()->to('/user')->with('pesan', 'Data berhasil dihapus');
    }

    public function login()
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $data = [
            "title" => "Login",
            "pesan" => session()->getFlashdata('pesan'),
            "user" => $this->array4selectoption(array('0' => 'Pelamar', '1' => 'Admin'), old('guser')),
            "validation" => $validation
        ];
        return view('user/login', $data);
    }

    public function authen()
    {
        if (!$this->validate([
            'guser' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama user harus diisi'
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
            session()->setFlashdata('pesan', 'Silahkan masukkan user dan password!');

            return redirect()->to('/user/login')->withInput();
        } else {
            if ($this->request->getVar('gjenis') == 1) {
                if ($this->db->isgetdata("user", "nm_user='" . $this->request->getVar('guser') . "' AND password='" . md5($this->request->getVar('gpassword')) . "'")) {
                    $session = session();
                    $user_id = $this->db->getdata("user", "user_id", "nm_user='" . $this->request->getVar('guser') . "' AND password='" . md5($this->request->getVar('gpassword')) . "'");
                    $session->set('logged', true);
                    $session->set('user_id', $user_id);
                    $session->set('user_type', 1);
                    $session->set('user_logged', $this->request->getVar('guser'));

                    return redirect()->to('/beranda');
                } else {
                    session()->setFlashdata('pesan', 'User atau password tidak ditemukan');
                    return redirect()->to('/user/login')->withInput();
                }
            } else {
                if ($this->db->isgetdata("pelamar", "user_login='" . $this->request->getVar('guser') . "' AND password='" . md5($this->request->getVar('gpassword')) . "'")) {
                    $session = session();
                    $user_id = $this->db->getdata("pelamar", "no_daftar", "user_login='" . $this->request->getVar('guser') . "' AND password='" . md5($this->request->getVar('gpassword')) . "'");
                    $session->set('logged', true);
                    $session->set('user_id', $user_id);
                    $session->set('user_type', 0);
                    $session->set('user_logged', $this->request->getVar('guser'));

                    return redirect()->to('/pelamar/pelamardetail/' . $user_id);
                } else {
                    session()->setFlashdata('pesan', 'User atau password tidak ditemukan');
                    return redirect()->to('/user/login')->withInput();
                }

                $username = session('user_id');
            }
        }
    }

    public function unauthen()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/');
    }
}
