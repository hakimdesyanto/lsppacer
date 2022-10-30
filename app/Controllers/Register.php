<?php

namespace App\Controllers;

use App\Models\RegisterModel;
use App\Models\BaseModel;

class Register extends BaseController
{
    protected $RegisterModel;
    protected $BaseModel;
    public function __construct()
    {
        $this->RegisterModel = new RegisterModel();
        $this->BaseModel = new BaseModel();
    }

    public function index()
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }
        $data = [
            "title" => "Register",
            "breadcrumbs" => ['Register'],
            "icon" => "bx-user-circle",
            "province" => $this->BaseModel->getdata4selectoption('ref_province', 'province_id', array('province_name'), '', '', true),
            "district" => $this->BaseModel->getdata4selectoption('ref_district', 'district_id', array('district_name'), '', '', true),
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation
        ];
        return view('Register', $data);
    }

    public function insert()
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/Register')->withInput();
        } else {
            if ($this->request->getVar('user_password') != $this->request->getVar('confirm_password')) {
                session()->setFlashdata('pesan2', 'Data gagal disimpan. Password dan Konfirm Password tidak sama');

                return redirect()->to('/Register')->withInput();
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
                    "user_type_id" => '5',
                    "user_name" => $this->request->getVar('user_name'),
                    "user_password" => md5($this->request->getVar('user_password')),
                    "createdAt" => date('Y-m-d H:i:s')
                ];
                $id = $this->RegisterModel->insertUser($data);
                session()->setFlashdata('pesan', 'Data berhasil disimpan');
                return redirect()->to("/Front");
            }
        }
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
