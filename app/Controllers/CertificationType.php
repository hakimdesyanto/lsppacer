<?php

namespace App\Controllers;

use App\Models\CertificationTypeModel;
use App\Models\BaseModel;

class CertificationType extends BaseController
{
    protected $CertificationTypeModel;
    protected $BaseModel;

    public function __construct()
    {
        $this->CertificationTypeModel = new CertificationTypeModel();
        $this->BaseModel = new BaseModel();
    }

    public function main()
    {

        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            "title" => "Certification Type",
            "breadcrumbs" => ['Master', 'Certification Type'],
            "icon" => "bx-user-circle",
            "no" => 0,
            "certification_type" => $this->CertificationTypeModel->get_certification_type(),
            "pesan" => session()->getFlashdata('pesan'),
            "menu" => $menu
        ];
        return view('Master/Certification_type/Main', $data);
    }

    public function add()
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }
        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            "title" => "Certification Type",
            "breadcrumbs" => ['Master', 'Certification Type'],
            "icon" => "bx-user-circle",
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation,
            "menu" => $menu
        ];
        return view('Master/Certification_type/Add', $data);
    }

    public function insert()
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/CertfiticationType/add')->withInput();
        } else {

            $data = [
                "description" => $this->request->getVar('description'),
                "cost" => $this->request->getVar('cost')
            ];
            $id = $this->CertificationTypeModel->insert_certification_type($data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to("/CertificationType/main");
        }
    }

    public function edit($id)
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $certification_type = $this->CertificationTypeModel->get_certification_type($id);
        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            "title" => "Certification Type",
            "breadcrumbs" => ['Master', 'Certification Type'],
            "icon" => "bx-user-circle",
            "certification_type" => $certification_type,
            "pesan" => session()->getFlashdata('pesan'),
            "pesan2" => session()->getFlashdata('pesan2'),
            "validation" => $validation,
            "menu" => $menu
        ];
        return view('Master/Certification_type/Edit', $data);
    }

    public function update($id)
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan2', 'Data gagal disimpan. Silahkan isi data dengan lengkap dan benar!');

            return redirect()->to('/CertificationType/edit/' . $id)->withInput();
        } else {


            $data = [
                "description" => $this->request->getVar('description'),
                "cost" => $this->request->getVar('cost')
            ];

            $this->CertificationTypeModel->Update_certification_type($id, $data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to("/CertificationType/main");
        }
    }

    public function delete($id)
    {
        $this->CertificationTypeModel->delete_certification_type($id);

        return redirect()->to('/CertificationType/main')->with('pesan', 'Data berhasil dihapus');
    }


    public function validasi_data()
    {
        if (!$this->validate([
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'cost' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ]
        ])) {
            return false;
        } else {
            return true;
        }
    }
}
