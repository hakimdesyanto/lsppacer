<?php

namespace App\Controllers;

use App\Models\MenuSetupModel;
use App\Models\BaseModel;

class MenuSetup extends BaseController
{
    protected $MenuSetupModel;
    protected $BaseModel;
    public function __construct()
    {
        $this->MenuSetupModel = new MenuSetupModel();
        $this->BaseModel = new BaseModel();
    }
    public function main()
    {

        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }
        $menu = $this->generate_menu(session('user_type_id'));
        // dd($menu);
        $data = [
            "title" => "Menu Setup",
            "breadcrumbs" => ['Setting', 'Menu Setup'],
            "icon" => "bx-user-circle",
            "no" => 0,
            "menu_setup" => $this->MenuSetupModel->tabel_menu_setup(),
            "menu_parents" => $this->MenuSetupModel->get_menu_parent(),
            "menu_parents" => $this->MenuSetupModel->get_menu_parent(),

            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation,
            "menu" => $menu
        ];


        return view('Setting/Menu_setup/main', $data);
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
            "title" => "Menu Setup",
            "breadcrumbs" => ['Setting', 'Menu Setup'],
            "icon" => "bx-user-circle",
            "menu_parents" => $this->MenuSetupModel->get_menu_parent(),
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation,
            "menu" => $menu
        ];
        return view('Setting/Menu_setup/Add', $data);
    }

    public function insert()
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/MenuSetup/add')->withInput();
        } else {
            if ($this->request->getVar('user_password') != $this->request->getVar('confirm_password')) {
                session()->setFlashdata('pesan2', 'Data gagal disimpan. Password dan Konfirm Password tidak sama');

                return redirect()->to('/MenuSetup/add')->withInput();
            } else {
                $data = [
                    "menu_parent" => $this->request->getVar('menu_parent'),
                    "menu_title" => $this->request->getVar('menu_title'),
                    "menu_url" => $this->request->getVar('menu_url'),
                    "menu_type" => $this->request->getVar('menu_type'),
                    "menu_icon_parent" => $this->request->getVar('menu_icon_parent')
                ];
                $id = $this->MenuSetupModel->insert_menu_setup($data);
                session()->setFlashdata('pesan', 'Data berhasil disimpan');
                return redirect()->to("/MenuSetup/main");
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

        $menu_setup = $this->MenuSetupModel->get_menu_setup($id);
        $menu_setup2 = $this->MenuSetupModel->get_menu_setup2($id);
        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            "title" => "User",
            "breadcrumbs" => ['Pengelolaan User', 'User'],
            "icon" => "bx-user-circle",
            "menu_setup" => $menu_setup,
            "menu_parents" => $this->MenuSetupModel->get_menu_parent(),
            "pesan" => session()->getFlashdata('pesan'),
            "pesan2" => session()->getFlashdata('pesan2'),
            "validation" => $validation,
            "menu" => $menu
        ];
        return view('Setting/Menu_setup/Edit', $data);
    }

    public function update($id)
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan2', 'Data gagal disimpan. Silahkan isi data dengan lengkap dan benar!');

            return redirect()->to('/MasterSetup/edit/' . $id)->withInput();
        } else {

            $data = [
                "menu_parent" => $this->request->getVar('menu_parent'),
                "menu_title" => $this->request->getVar('menu_title'),
                "menu_url" => $this->request->getVar('menu_url'),
                "menu_type" => $this->request->getVar('menu_type'),
                "menu_icon_parent" => $this->request->getVar('menu_icon_parent')
            ];


            $this->MenuSetupModel->update_menu_setup($id, $data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to("/MenuSetup/main/" . $id);
        }
    }

    public function delete($id)
    {
        $this->MenuSetupModel->delete_menu_setup($id);

        return redirect()->to('/MenuSetup/main')->with('pesan', 'Data berhasil dihapus');
    }
    public function validasi_data()
    {
        if (!$this->validate([
            'menu_parent' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'menu_title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'menu_url' => [
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
