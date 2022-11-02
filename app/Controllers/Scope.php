<?php

namespace App\Controllers;

use App\Models\ScopeModel;
use App\Models\BaseModel;

class Scope extends BaseController
{
    protected $ScopeModel;
    protected $BaseModel;

    public function __construct()
    {
        $this->ScopeModel = new ScopeModel();
        $this->BaseModel = new BaseModel();
    }

    public function main()
    {

        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            "title" => "Scope",
            "breadcrumbs" => ['Master', 'Scope'],
            "icon" => "bx-user-circle",
            "no" => 0,
            "scope" => $this->ScopeModel->get_scope(),
            "pesan" => session()->getFlashdata('pesan'),
            "menu" => $menu
        ];
        return view('Master/Scope/Main', $data);
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
            "title" => "Scope",
            "breadcrumbs" => ['Master', 'Scope'],
            "icon" => "bx-user-circle",
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation,
            "menu" => $menu
        ];
        return view('Master/Scope/Add', $data);
    }

    public function insert()
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/Scope/add')->withInput();
        } else {

            $data = [
                "scope_code" => $this->request->getVar('scope_code'),
                "scope_description" => $this->request->getVar('scope_description')
            ];
            $id = $this->ScopeModel->insert_scope($data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to("/Scope/main");
        }
    }

    public function edit($id)
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $Scope = $this->ScopeModel->get_scope($id);
        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            "title" => "Scope",
            "breadcrumbs" => ['Master', 'Scope'],
            "icon" => "bx-user-circle",
            "Scope" => $Scope,
            "pesan" => session()->getFlashdata('pesan'),
            "pesan2" => session()->getFlashdata('pesan2'),
            "validation" => $validation,
            "menu" => $menu
        ];
        return view('Master/Scope/Edit', $data);
    }

    public function update($id)
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan2', 'Data gagal disimpan. Silahkan isi data dengan lengkap dan benar!');

            return redirect()->to('/Scope/edit/' . $id)->withInput();
        } else {


            $data = [
                "scope_code" => $this->request->getVar('scope_code'),
                "scope_description" => $this->request->getVar('scope_description')
            ];

            $this->ScopeModel->update_scope($id, $data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to("/Scope/main");
        }
    }

    public function delete($id)
    {
        $this->ScopeModel->delete_scope($id);

        return redirect()->to('/Scope/main')->with('pesan', 'Data berhasil dihapus');
    }


    public function validasi_data()
    {
        if (!$this->validate([
            'scope_code' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'scope_description' => [
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
