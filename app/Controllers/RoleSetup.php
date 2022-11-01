<?php

namespace App\Controllers;

use App\Models\RoleSetupModel;
use App\Models\BaseModel;

class RoleSetup extends BaseController
{
    protected $RoleSetupModel;
    protected $BaseModel;
    public function __construct()
    {
        $this->RoleSetupModel = new RoleSetupModel();
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
            "title" => "Role Setup",
            "breadcrumbs" => ['Setting', 'Role Setup'],
            "icon" => "bx-user-circle",
            "no" => 0,
            "role_setup" => $this->RoleSetupModel->tabel_role_setup(),
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation,
            "menu" => $menu
        ];


        return view('Setting/Role_setup/main', $data);
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
            "title" => "Role Setup",
            "breadcrumbs" => ['Setting', 'Role Setup'],
            "icon" => "bx-user-circle",
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation,
            "menu" => $menu
        ];
        return view('Setting/Role_setup/Add', $data);
    }

    public function insert()
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/RoleSetup/add')->withInput();
        } else {

            $data = [
                "role_name" => $this->request->getVar('role_name'),
                "role_desc" => $this->request->getVar('role_desc'),
                "created_by" => session('user_id'),
                "created_stamp" => date('Y-m-d H:i:s')
            ];
            $id = $this->RoleSetupModel->insert_role_setup($data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to("/RoleSetup/main");
        }
    }

    public function edit($id)
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $role_setup = $this->RoleSetupModel->get_role_setup($id);
        $role_setup2 = $this->RoleSetupModel->get_role_setup2($id);
        // dd($this->RoleSetupModel->get_menu_parent());
        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            "title" => "Role Setup",
            "breadcrumbs" => ['Setting', 'Role Setup'],
            "icon" => "bx-user-circle",
            "role_setup" => $role_setup,
            "pesan" => session()->getFlashdata('pesan'),
            "pesan2" => session()->getFlashdata('pesan2'),
            "validation" => $validation,
            "menu" => $menu
        ];
        return view('Setting/Role_setup/Edit', $data);
    }

    public function update($id)
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan2', 'Data gagal disimpan. Silahkan isi data dengan lengkap dan benar!');

            return redirect()->to('/RoleSetup/edit/' . $id)->withInput();
        } else {

            $data = [
                "role_name" => $this->request->getVar('role_name'),
                "role_desc" => $this->request->getVar('role_desc'),
            ];

            $this->RoleSetupModel->update_role_setup($id, $data);
            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to("/RoleSetup/main/" . $id);
        }
    }

    public function delete($id)
    {
        $this->RoleSetupModel->delete_role_setup($id);

        return redirect()->to('/RoleSetup/main')->with('pesan', 'Data berhasil dihapus');
    }
    public function validasi_data()
    {
        if (!$this->validate([
            'role_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'role_desc' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            return false;
        } else {
            return true;
        }
    }

    public function edit_privilage($id)
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $role_setup = $this->RoleSetupModel->get_role_setup($id);
        $edit_privilage = $this->get_menu_by_role($id);
        // dd($this->RoleSetupModel->get_menu_parent());
        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            "title" => "Role Setup",
            "breadcrumbs" => ['Setting', 'Role Setup'],
            "icon" => "bx-user-circle",
            "role_setup" => $role_setup,
            "pesan" => session()->getFlashdata('pesan'),
            "pesan2" => session()->getFlashdata('pesan2'),
            "validation" => $validation,
            "edit_privilage" => $edit_privilage,
            "menu" => $menu
        ];
        return view('Setting/Role_setup/Edit_privilage', $data);
    }

    function get_menu_by_role($role_id)
    {
        //$role_id = $this->request->getVar('role_id');

        $menuroleparent = $this->RoleSetupModel->get_menu_parent_by_role($role_id);

        $menu = '<ol>';

        foreach ($menuroleparent as $parent) {
            $parent_is = '';
            if ($parent['role_id'] != "")
                $parent_is = ' checked="checked"';

            $menu .= '<li>
					    <input type="checkbox" name="menu_id[]" id="parent"' . $parent_is . ' value="' . $parent['menu_id'] . '"> ' . $parent['menu_title'];

            $menurolechild = $this->RoleSetupModel->get_menu_child_by_role($role_id, $parent['menu_id']);

            if (count($menurolechild) > 0)
                $menu .= '<ol>';

            foreach ($menurolechild as $child) {

                $menurolegrandchild = $this->RoleSetupModel->get_menu_child_by_role($role_id, $child['menu_id']);

                $child_is = '';
                if ($child['role_id'] != "")
                    $child_is = ' checked="checked"';

                $menu .= '<li>
					    	<input type="checkbox" name="menu_id[]" id="child"' . $child_is . ' value="' . $child['menu_id'] . '"> ' . $child['menu_title'];

                if (count($menurolegrandchild) > 0)
                    $menu .= '<ol>';

                foreach ($menurolegrandchild as $grandchild) {
                    $grandchild_is = '';
                    if ($grandchild['role_id'] != "")
                        $grandchild_is = ' checked="checked"';

                    $menu .= '<li><input type="checkbox" name="menu_id[]" id="grandchild"' . $grandchild_is . ' value="' . $grandchild['menu_id'] . '"> ' . $grandchild['menu_title'] . '</li>';
                }

                if (count($menurolegrandchild) > 0)
                    $menu .= '</ol>';

                $menu .= '</li>';
            }

            if (count($menurolechild) > 0)
                $menu .= '</ol>';

            $menu .= '					    
					  </li>';
        }

        $menu .= '</ol>';

        return $menu;
    }

    function update_priviledge($role_id)
    {

        $menu_id = $this->request->getVar('menu_id');

        $data_batch = array();

        if (isset($menu_id)) {
            for ($i = 0; $i < count($menu_id); $i++) {
                $data_batch[] = array(
                    'role_id' => $role_id,
                    'menu_id' => $menu_id[$i]
                );
            }
        }
        $param_delete = $role_id;


        $this->RoleSetupModel->delete_user_nav($param_delete);

        if (count($data_batch) > 0) {
            $this->RoleSetupModel->insert_batch_user_nav($data_batch);
        } else {
            $return = array('success' => true);
        }

        session()->setFlashdata('pesan', 'Data berhasil disimpan');
        return redirect()->to("/RoleSetup/main/" . $role_id);
    }
}
