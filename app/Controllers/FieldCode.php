<?php

namespace App\Controllers;

use App\Models\FieldCodeModel;
use App\Models\BaseModel;

class FieldCode extends BaseController
{
    protected $FieldCodeModel;
    protected $BaseModel;

    public function __construct()
    {
        $this->FieldCodeModel = new FieldCodeModel();
        $this->BaseModel = new BaseModel();
    }

    public function main()
    {

        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            "title" => "Field Code",
            "breadcrumbs" => ['Master', 'Field Code'],
            "icon" => "bx-user-circle",
            "no" => 0,
            "field_code" => $this->FieldCodeModel->get_field_code(),
            "pesan" => session()->getFlashdata('pesan'),
            "menu" => $menu
        ];
        return view('Master/Field_code/Main', $data);
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
            "title" => "Field Code",
            "breadcrumbs" => ['Master', 'Field Code'],
            "icon" => "bx-user-circle",
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation,
            "menu" => $menu
        ];
        return view('Master/Field_code/Add', $data);
    }

    public function insert()
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/FieldCode/add')->withInput();
        } else {

            $data = [
                "fieldcode_code" => $this->request->getVar('fieldcode_code'),
                "fieldcode_description" => $this->request->getVar('fieldcode_description')
            ];
            $id = $this->FieldCodeModel->insert_field_code($data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to("/FieldCode/main");
        }
    }

    public function edit($id)
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $field_code = $this->FieldCodeModel->get_field_code($id);
        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            "title" => "Field Code",
            "breadcrumbs" => ['Master', 'Field Code'],
            "icon" => "bx-user-circle",
            "field_code" => $field_code,
            "pesan" => session()->getFlashdata('pesan'),
            "pesan2" => session()->getFlashdata('pesan2'),
            "validation" => $validation,
            "menu" => $menu
        ];
        return view('Master/Field_code/Edit', $data);
    }

    public function update($id)
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan2', 'Data gagal disimpan. Silahkan isi data dengan lengkap dan benar!');

            return redirect()->to('/FieldCode/edit/' . $id)->withInput();
        } else {


            $data = [
                "fieldcode_code" => $this->request->getVar('fieldcode_code'),
                "fieldcode_description" => $this->request->getVar('fieldcode_description')
            ];

            $this->FieldCodeModel->Update_field_code($id, $data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to("/FieldCode/main");
        }
    }

    public function delete($id)
    {
        $this->FieldCodeModel->delete_field_code($id);

        return redirect()->to('/FieldCode/main')->with('pesan', 'Data berhasil dihapus');
    }


    public function validasi_data()
    {
        if (!$this->validate([
            'fieldcode_code' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'fieldcode_description' => [
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
