<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BaseModel;

class User extends BaseController
{
    protected $UserModel;
    protected $BaseModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->BaseModel = new BaseModel();
    }

    public function index()
    {

        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            "title" => "User",
            "breadcrumbs" => ['Pengelolaan User', 'User'],
            "icon" => "bx-user-circle",
            "no" => 0,
            "user" => $this->UserModel->getUser(),
            "pesan" => session()->getFlashdata('pesan'),
            "menu" => $menu
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
        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            "title" => "User",
            "breadcrumbs" => ['Pengelolaan User', 'User'],
            "icon" => "bx-user-circle",
            "province" => $this->BaseModel->getdata4selectoption('ref_province', 'province_id', array('province_name'), '', '', true),
            "district" => $this->BaseModel->getdata4selectoption('ref_district', 'district_id', array('district_name'), '', '', true),
            "user_type" => $this->BaseModel->getdata4selectoption('ref_user_type', 'user_type_id', array('user_type'), '', '', true),
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation,
            "menu" => $menu
        ];
        return view('user/create', $data);
    }

    public function insert()
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/user/create')->withInput();
        } else {
            if ($this->request->getVar('user_password') != $this->request->getVar('confirm_password')) {
                session()->setFlashdata('pesan2', 'Data gagal disimpan. Password dan Konfirm Password tidak sama');

                return redirect()->to('/user/create')->withInput();
            } else {
                $data = [
                    "full_name" => $this->request->getVar('full_name'),
                    "birth_place" => $this->request->getVar('birth_place'),
                    "birth_date" => $this->request->getVar('birth_date'),
                    "gender" => $this->request->getVar('gender'),
                    "address" => $this->request->getVar('address'),
                    "province_id" => $this->request->getVar('province_id'),
                    "district_id" => $this->request->getVar('district_id'),
                    "subdistrict_id" => $this->request->getVar('subdistrict_id'),
                    "village_id" => $this->request->getVar('village_id'),
                    "email" => $this->request->getVar('email'),
                    "mobile_phone" => $this->request->getVar('mobile_phone'),
                    "phone" => $this->request->getVar('phone'),
                    "user_type_id" => $this->request->getVar('user_type_id'),
                    "idcard_number" => $this->request->getVar('idcard_number'),
                    "doc_idcard_path" => $this->request->getVar('doc_idcard_path'),
                    "user_name" => $this->request->getVar('user_name'),
                    "user_password" => md5($this->request->getVar('user_password')),
                    "createdAt" => date('Y-m-d H:i:s')
                ];
                $id = $this->UserModel->insertUser($data);
                session()->setFlashdata('pesan', 'Data berhasil disimpan');
                return redirect()->to("/user");
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

        $user = $this->UserModel->getUser($id);
        // dd($user['province_id']);
        $province = $this->UserModel->get_province($user['province_id']);
        $district = $this->UserModel->get_district($user['district_id']);
        $user_type = $this->UserModel->get_user_type($user['user_type_id']);
        $menu = $this->generate_menu(session('user_type_id'));

        $data = [
            "title" => "User",
            "breadcrumbs" => ['Pengelolaan User', 'User'],
            "icon" => "bx-user-circle",
            "user" => $user,
            "province" => $this->BaseModel->getdata4selectoption('ref_province', 'province_id', array('province_name'), '', $province['province_id'], true),
            "district" => $this->BaseModel->getdata4selectoption('ref_district', 'district_id', array('district_name'), '', $district['district_id'], true),
            "user_type" => $this->BaseModel->getdata4selectoption('ref_user_type', 'user_type_id', array('user_type'), '', $user_type['user_type_id'], true),
            "pesan" => session()->getFlashdata('pesan'),
            "pesan2" => session()->getFlashdata('pesan2'),
            "validation" => $validation,
            "menu" => $menu
        ];
        return view('user/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan2', 'Data gagal disimpan. Silahkan isi data dengan lengkap dan benar!');

            return redirect()->to('/user/edit/' . $id)->withInput();
        } else {
            if ($this->request->getVar('user_password') != $this->request->getVar('confirm_password')) {
                return redirect()->to("/user/edit/" . $id)->withInput()->with('pesan2', 'Data gagal disimpan. Password dan Konfirm Password tidak sama');
            } else {
                if ($this->db->isgetdata("user", "user_id<>" . $id . " AND user_name='" . $this->request->getVar('user_name') . "'")) {
                    return redirect()->to("/user/edit/" . $id)->withInput()->with('pesan2', 'Data gagal disimpan. Nama user sudah terdaftar');
                } else {
                    $data = [
                        "full_name" => $this->request->getVar('full_name'),
                        "birth_place" => $this->request->getVar('birth_place'),
                        "birth_date" => $this->request->getVar('birth_date'),
                        "gender" => $this->request->getVar('gender'),
                        "address" => $this->request->getVar('address'),
                        "province_id" => $this->request->getVar('province_id'),
                        "district_id" => $this->request->getVar('district_id'),
                        "subdistrict_id" => $this->request->getVar('subdistrict_id'),
                        "village_id" => $this->request->getVar('village_id'),
                        "email" => $this->request->getVar('email'),
                        "mobile_phone" => $this->request->getVar('mobile_phone'),
                        "phone" => $this->request->getVar('phone'),
                        "user_type_id" => $this->request->getVar('user_type_id'),
                        "idcard_number" => $this->request->getVar('idcard_number'),
                        "doc_idcard_path" => $this->request->getVar('doc_idcard_path'),
                        // "user_name" => $this->request->getVar('user_name'),
                        "user_password" => md5($this->request->getVar('user_password')),
                        "updatedAt" => date('Y-m-d H:i:s')
                    ];


                    $this->UserModel->updateUser($id, $data);
                    session()->setFlashdata('pesan', 'Data berhasil disimpan');
                    return redirect()->to("/user");
                }
            }
        }
    }

    public function delete($id)
    {
        $this->UserModel->deleteUser($id);

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
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama user harus diisi'
                ]
            ],
            'password' => [
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
            $email = $this->request->getVar('email');
            $password = md5($this->request->getVar('password'));
            if ($this->BaseModel->isgetdata("user", "email='" . $email . "' AND user_password='" . $password . "'")) {
                $session = session();
                $data_user = $this->BaseModel->get_data_user($email, $password);
                //$menu = $this->generate_menu($data_user['role_id']);
                // dd($menu);
                $session->set('logged', true);
                $session->set('user_logged', $data_user['user_name']);
                $session->set($data_user);
                // $session->set('menu', $menu);
                return redirect()->to('/beranda');
            } else {
                session()->setFlashdata('pesan', 'User atau password tidak ditemukan');
                return redirect()->to('/user/login')->withInput();
            }
        }
    }

    public function unauthen()
    {
        $session = session();
        $session->destroy();

        return redirect()->to('/');
    }

    public function validasi_data()
    {
        if (!$this->validate([
            'full_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'birth_place' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'birth_date' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'address' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'province_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'district_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'subdistrict_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'village_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'mobile_phone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'phone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'idcard_number' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'user_name' => [
                'rules' => 'required',
                'user_name' => [
                    'rules' => 'required|is_unique[user.user_name]',
                    'errors' => [
                        'required' => 'Nama user harus diisi',
                        'is_unique' => 'Nama user sudah terdaftar'
                    ]
                ],
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'user_type_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'user_password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi'
                ]
            ],
            'confirm_password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Konfirm password harus diisi'
                ]
            ]
        ])) {
            return false;
        } else {
            return true;
        }
    }
}
