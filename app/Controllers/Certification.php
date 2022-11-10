<?php

namespace App\Controllers;

use App\Models\CertificationModel;
use App\Models\BaseModel;

class Certification extends BaseController
{
    protected $CertificationModel;
    protected $BaseModel;

    public function __construct()
    {
        $this->CertificationModel = new CertificationModel();
        $this->BaseModel = new BaseModel();
    }

    public function main()
    {

        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            "title" => "Certification",
            "breadcrumbs" => ['Certification'],
            "icon" => "bx-user-circle",
            "no" => 0,
            "certification" => $this->CertificationModel->get_certification(),
            "pesan" => session()->getFlashdata('pesan'),
            "menu" => $menu
        ];
        return view('Certification/Main', $data);
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
            "title" => "Certification",
            "breadcrumbs" => ['Certification'],
            "icon" => "bx-user-circle",
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation,
            "certification_type" => $this->BaseModel->getdata4selectoption('ref_certification_type', 'certification_type_id', array('description'), '', '', true),
            "scope" => $this->BaseModel->getdata4selectoption('ref_scope', 'scope_id', array('scope_description'), '', '', true),
            "field_code" => $this->BaseModel->getdata4selectoption('ref_fieldcode', 'fieldcode_id', array('fieldcode_description'), '', '', true),
            "peran" => $this->BaseModel->getdata4selectoption('ref_role', 'role_id', array('role_name'), '', '', true),
            "menu" => $menu
        ];
        return view('Certification/Add', $data);
    }

    public function insert()
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');

            return redirect()->to('/Certification/add')->withInput();
        } else {

            //            $certification_id = $this->CertificationModel->get_certification_id();
            $certification_id = $this->get_uuid();

            /** insert into certification */
            $data = [
                "certification_id" => $certification_id,
                "certification_number" => $this->request->getVar('certification_number'),
                "apply_date" => date('Y-m-d H:i:s'),
                "user_id" => session('user_id'),
                "certification_type_id" => $this->request->getVar('certification_type_id'),
                "level_auditor" => $this->request->getVar('level_auditor'),
                "createdAt" => date('Y-m-d H:i:s')
            ];
            $id = $this->CertificationModel->insert_certification($data);

            /** insert into certificationd_scope */
            $scope_id = $this->request->getVar('scope_id');
            $scope_detail = count($scope_id);

            for ($i = 0; $i < $scope_detail; $i++) {
                $data = array(
                    'certification_id' => $certification_id,
                    'scope_id' => $scope_id[$i]
                );

                $id = $this->CertificationModel->insert_certification_scope($data);
            }

            /** insert into certificationd_fieldcode */
            $fieldcode_id = $this->request->getVar('fieldcode_id');
            $fc_detail = count($fieldcode_id);

            for ($i = 0; $i < $fc_detail; $i++) {
                $data = array(
                    'certification_id' => $certification_id,
                    'fieldcode_id' => $fieldcode_id[$i]
                );

                $id = $this->CertificationModel->insert_certification_fieldcode($data);
            }

            /** insert into education */
            $user_id = session('user_id');
            $folder = $_SERVER["DOCUMENT_ROOT"] . '/assets/Education/Doc_path/' . $user_id;
            $date = date('YmdHis');
            $folderName = $folder . '/' . $date . ' ' . basename($_FILES['doc_path_education']['name']);
            $file_type = $_FILES['doc_path_education']['type'];
            $file_name = $date . ' ' . basename($_FILES['doc_path_education']['name']);
            if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg") {
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }
                move_uploaded_file($_FILES['doc_path_education']['tmp_name'], $folderName);
            } else {
                $msg = 'Hanya Boleh upload PDF, JPEG GIF';
                $success = false;
                session()->setFlashdata('pesan', 'Hanya Boleh upload PDF, JPEG GIF');
                session()->setFlashdata('success', $success);
                return redirect()->to("/Certification/main");
            }


            $data = array(
                'education_id' =>  $this->get_uuid(),
                'certification_id' => $certification_id,
                'user_id' => session('user_id'),
                'level' => $this->request->getVar('level'),
                'university' => $this->request->getVar('university'),
                'major' => $this->request->getVar('major'),
                'start_date' => $this->request->getVar('start_date_education'),
                'end_date' => $this->request->getVar('end_date_education'),
                'certificate_number' => $this->request->getVar('certificate_number'),
                'accreditation_status' => $this->request->getVar('accreditation_status'),
                'doc_path' => $folderName,
                'createdAt' => date('Y-m-d H:i:s')
            );
            $id = $this->CertificationModel->insert_certification_education($data);

            /** insert into experience */
            $folder = $_SERVER["DOCUMENT_ROOT"] . '/assets/Experience/Doc_path/' . $user_id;
            $date = date('YmdHis');
            $folderName = $folder . '/' . $date . ' ' . basename($_FILES['doc_path_experience']['name']);
            $file_type = $_FILES['doc_path_experience']['type'];
            if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg") {
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }
                move_uploaded_file($_FILES['doc_path_experience']['tmp_name'], $folderName);
            } else {
                session()->setFlashdata('pesan', 'Hanya Boleh upload PDF, JPEG GIF');
                session()->setFlashdata('success', false);
                return redirect()->to("/Certification/main");
            }
            $data = array(
                'experience_id' => $this->get_uuid(),
                'certification_id' => $certification_id,
                'user_id' => session('user_id'),
                'company_name' => $this->request->getVar('company_name'),
                'departement_id' => $this->request->getVar('departement_id'),
                'position' => $this->request->getVar('position'),
                'start_date' => $this->request->getVar('start_date_experience'),
                'end_date' => $this->request->getVar('end_date_experience'),
                'doc_path' => $folderName,
                'createdAt' => date('Y-m-d H:i:s')
            );
            $id = $this->CertificationModel->insert_certification_experience($data);

            /** insert into audit experience */
            $folder = $_SERVER["DOCUMENT_ROOT"] . '/assets/Audit_Experience/Doc_path/' . $user_id;
            $date = date('YmdHis');
            $folderName = $folder . '/' . $date . ' ' . basename($_FILES['doc_audit_plan_path']['name']);
            $file_type = $_FILES['doc_audit_plan_path']['type'];
            if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg") {
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }
                move_uploaded_file($_FILES['doc_audit_plan_path']['tmp_name'], $folderName);
            } else {
                session()->setFlashdata('pesan', 'Hanya Boleh upload PDF, JPEG GIF');
                session()->setFlashdata('success', false);
                return redirect()->to("/Certification/main");
            }

            $folder = $_SERVER["DOCUMENT_ROOT"] . '/assets/Audit_Experience/Doc_path/' . $user_id;
            $date = date('YmdHis');
            $folderName2 = $folder . '/' . $date . ' ' . basename($_FILES['doc_work_order_path']['name']);
            $file_type = $_FILES['doc_work_order_path']['type'];
            if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg") {
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }
                move_uploaded_file($_FILES['doc_work_order_path']['tmp_name'], $folderName2);
            } else {
                session()->setFlashdata('pesan', 'Hanya Boleh upload PDF, JPEG GIF');
                session()->setFlashdata('success', false);
                return redirect()->to("/Certification/main");
            }
            $audit_experience_id =  $this->get_uuid();
            $data = array(
                'audit_experience_id' => $audit_experience_id,
                'certification_id' => $certification_id,
                'user_id' => session('user_id'),
                'company_addres' => $this->request->getVar('company_addres'),
                'company_phone' => $this->request->getVar('company_phone'),
                'contact_person' => $this->request->getVar('contact_person'),
                'start_date' => $this->request->getVar('start_date_audit_experience'),
                'end_date' => $this->request->getVar('end_date_audit_experience'),
                'doc_audit_plan_path' => $folderName,
                'doc_work_order_path' => $folderName2,
                'createdAt' => date('Y-m-d H:i:s')
            );
            $id = $this->CertificationModel->insert_certification_audit_experience($data);

            /** insert into audit_experienced_role */
            $role_id = $this->request->getVar('role_id');
            $role_detail = count($role_id);

            for ($i = 0; $i < $role_detail; $i++) {
                $data = array(
                    'audit_experience_id' => $audit_experience_id,
                    'role_id' => $role_id[$i]
                );
                $id = $this->CertificationModel->insert_audit_experienced_role($data);
            }

            /** insert into audit_experienced_scope */
            $scope_id = $this->request->getVar('scope_id');
            $scope_detail = count($scope_id);


            for ($i = 0; $i < $scope_detail; $i++) {
                $data = array(
                    'audit_experience_id' => $audit_experience_id,
                    'scope_id' => $scope_id[$i]
                );

                $id = $this->CertificationModel->insert_audit_experienced_scope($data);
            }

            /** insert into training */
            $folder = $_SERVER["DOCUMENT_ROOT"] . '/assets/Training/Doc_path/' . $user_id;
            $date = date('YmdHis');
            $folderName = $folder . '/' . $date . ' ' . basename($_FILES['doc_path_training']['name']);
            $file_type = $_FILES['doc_path_training']['type'];
            if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg") {
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }
                move_uploaded_file($_FILES['doc_path_training']['tmp_name'], $folderName);
            } else {
                session()->setFlashdata('pesan', 'Hanya Boleh upload PDF, JPEG GIF');
                session()->setFlashdata('success', false);
                return redirect()->to("/Certification/main");
            }
            $data = array(
                'training_id' => $this->get_uuid(),
                'certification_id' => $certification_id,
                'user_id' => session('user_id'),
                'provider_name' => $this->request->getVar('provider_name'),
                'start_date' => $this->request->getVar('start_date_training'),
                'end_date' => $this->request->getVar('end_date_training'),
                'training_topic' => $this->request->getVar('training_topic'),
                'relation_status' => $this->request->getVar('relation_status'),
                'doc_path' => $folderName,
                'createdAt' => date('Y-m-d H:i:s')
            );
            $id = $this->CertificationModel->insert_training($data);

            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to("/Certification/main");
        }
    }

    public function edit($id)
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $certification = $this->CertificationModel->get_certification($id);
        $education = $this->CertificationModel->get_education($id);
        $experience = $this->CertificationModel->get_experience($id);
        $audit_experience = $this->CertificationModel->get_audit_experience($id);
        $training = $this->CertificationModel->get_training($id);

        $scope = $this->BaseModel->getdatatoarray("certificationd_scope", "scope_id", "certification_id='" . $certification['certification_id'] . "'");
        $field_code = $this->BaseModel->getdatatoarray("certificationd_fieldcode", "fieldcode_id", "certification_id='" . $certification['certification_id'] . "'");
        $audit_experience_id = $this->CertificationModel->get_audit_experience_id($id);
        $peran = $this->CertificationModel->get_role_id($audit_experience_id);
        $menu = $this->generate_menu(session('user_type_id'));
        $data = [
            'title' => 'Certification',
            'breadcrumbs' => ['Certification'],
            'icon' => 'bx-user-circle',
            'certification' => $certification,
            'education' => $education,
            'experience' => $experience,
            'audit_experience' => $audit_experience,
            'training' => $training,
            'pesan' => session()->getFlashdata('pesan'),
            'pesan2' => session()->getFlashdata('pesan2'),
            'validation' => $validation,
            'certification_type' => $this->BaseModel->getdata4selectoption('ref_certification_type', 'certification_type_id', array('description'), '', $certification['certification_type_id'], true),
            'scope' => $this->BaseModel->getdata4multiselectoption('ref_scope', 'scope_id', array('scope_description'), '', $scope, true),
            'field_code' => $this->BaseModel->getdata4multiselectoption('ref_fieldcode', 'fieldcode_id', array('fieldcode_description'), '', $field_code, true),
            "peran" => $this->BaseModel->getdata4selectoption('ref_role', 'role_id', array('role_name'), '', $peran, true),
            'menu' => $menu
        ];
        return view('Certification/Edit', $data);
    }

    public function update($certification_id, $audit_experience_id)
    {
        if (!$this->validasi_data()) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan2', 'Data gagal disimpan. Silahkan isi data dengan lengkap dan benar!');

            return redirect()->to('/Certification/edit/' . $certification_id)->withInput();
        } else {

            /** update certification */
            $data = [
                "certification_number" => $this->request->getVar('certification_number'),
                "apply_date" => date('Y-m-d H:i:s'),
                "certification_type_id" => $this->request->getVar('certification_type_id'),
                "level_auditor" => $this->request->getVar('level_auditor'),
                "updatedAt" => date('Y-m-d H:i:s')
            ];

            $this->CertificationModel->update_certification($certification_id, $data);

            /** insert into certificationd_scope */
            $this->CertificationModel->delete_certificationd_scope($certification_id);

            $scope_id = $this->request->getVar('scope_id');
            $scope_detail = count($scope_id);
            // $certification_id = $id;
            for ($i = 0; $i < $scope_detail; $i++) {
                $data = array(
                    'certification_id' => $certification_id,
                    'scope_id' => $scope_id[$i]
                );

                $id = $this->CertificationModel->insert_certification_scope($data);
            }

            /** insert into certificationd_fieldcode */
            $this->CertificationModel->delete_certificationd_fieldcode($certification_id);

            $fieldcode_id = $this->request->getVar('fieldcode_id');
            $fc_detail = count($fieldcode_id);

            for ($i = 0; $i < $fc_detail; $i++) {
                $data = array(
                    'certification_id' => $certification_id,
                    'fieldcode_id' => $fieldcode_id[$i]
                );

                $id = $this->CertificationModel->insert_certification_fieldcode($data);
            }

            /** insert into education */
            $this->CertificationModel->delete_education($certification_id);

            $user_id = session('user_id');
            $folder = $_SERVER["DOCUMENT_ROOT"] . '/assets/Education/Doc_path/' . $user_id;
            $date = date('YmdHis');
            $folderName = $folder . '/' . $date . ' ' . basename($_FILES['doc_path_education']['name']);
            $file_type = $_FILES['doc_path_education']['type'];
            $file_name = $date . ' ' . basename($_FILES['doc_path_education']['name']);
            if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg") {
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }
                move_uploaded_file($_FILES['doc_path_education']['tmp_name'], $folderName);
            } else {
                $msg = 'Hanya Boleh upload PDF, JPEG GIF';
                $success = false;
                session()->setFlashdata('pesan', 'Hanya Boleh upload PDF, JPEG GIF');
                session()->setFlashdata('success', $success);
                return redirect()->to("/Certification/main");
            }


            $data = array(
                'education_id' =>  $this->get_uuid(),
                'certification_id' => $certification_id,
                'user_id' => session('user_id'),
                'level' => $this->request->getVar('level'),
                'university' => $this->request->getVar('university'),
                'major' => $this->request->getVar('major'),
                'start_date' => $this->request->getVar('start_date_education'),
                'end_date' => $this->request->getVar('end_date_education'),
                'certificate_number' => $this->request->getVar('certificate_number'),
                'accreditation_status' => $this->request->getVar('accreditation_status'),
                'doc_path' => $folderName,
                'updatedAt' => date('Y-m-d H:i:s')
            );
            $id = $this->CertificationModel->insert_certification_education($data);

            /** insert into experience */
            $this->CertificationModel->delete_experience($certification_id);

            $folder = $_SERVER["DOCUMENT_ROOT"] . '/assets/Experience/Doc_path/' . $user_id;
            $date = date('YmdHis');
            $folderName = $folder . '/' . $date . ' ' . basename($_FILES['doc_path_experience']['name']);
            $file_type = $_FILES['doc_path_experience']['type'];
            if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg") {
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }
                move_uploaded_file($_FILES['doc_path_experience']['tmp_name'], $folderName);
            } else {
                session()->setFlashdata('pesan', 'Hanya Boleh upload PDF, JPEG GIF');
                session()->setFlashdata('success', false);
                return redirect()->to("/Certification/main");
            }
            $data = array(
                'experience_id' => $this->get_uuid(),
                'certification_id' => $certification_id,
                'user_id' => session('user_id'),
                'company_name' => $this->request->getVar('company_name'),
                'departement_id' => $this->request->getVar('departement_id'),
                'position' => $this->request->getVar('position'),
                'start_date' => $this->request->getVar('start_date_experience'),
                'end_date' => $this->request->getVar('end_date_experience'),
                'doc_path' => $folderName,
                'updatedAt' => date('Y-m-d H:i:s')
            );
            $id = $this->CertificationModel->insert_certification_experience($data);

            /** insert into audit experience */
            $this->CertificationModel->delete_audit_experience($certification_id);

            $folder = $_SERVER["DOCUMENT_ROOT"] . '/assets/Audit_Experience/Doc_path/' . $user_id;
            $date = date('YmdHis');
            $folderName = $folder . '/' . $date . ' ' . basename($_FILES['doc_audit_plan_path']['name']);
            $file_type = $_FILES['doc_audit_plan_path']['type'];
            if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg") {
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }
                move_uploaded_file($_FILES['doc_audit_plan_path']['tmp_name'], $folderName);
            } else {
                session()->setFlashdata('pesan', 'Hanya Boleh upload PDF, JPEG GIF');
                session()->setFlashdata('success', false);
                return redirect()->to("/Certification/main");
            }

            $folder = $_SERVER["DOCUMENT_ROOT"] . '/assets/Audit_Experience/Doc_path/' . $user_id;
            $date = date('YmdHis');
            $folderName2 = $folder . '/' . $date . ' ' . basename($_FILES['doc_work_order_path']['name']);
            $file_type = $_FILES['doc_work_order_path']['type'];
            if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg") {
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }
                move_uploaded_file($_FILES['doc_work_order_path']['tmp_name'], $folderName2);
            } else {
                session()->setFlashdata('pesan', 'Hanya Boleh upload PDF, JPEG GIF');
                session()->setFlashdata('success', false);
                return redirect()->to("/Certification/main");
            }
            $audit_experience_id =  $this->get_uuid();
            $data = array(
                'audit_experience_id' => $audit_experience_id,
                'certification_id' => $certification_id,
                'user_id' => session('user_id'),
                'company_addres' => $this->request->getVar('company_addres'),
                'company_phone' => $this->request->getVar('company_phone'),
                'contact_person' => $this->request->getVar('contact_person'),
                'start_date' => $this->request->getVar('start_date_audit_experience'),
                'end_date' => $this->request->getVar('end_date_audit_experience'),
                'doc_audit_plan_path' => $folderName,
                'doc_work_order_path' => $folderName2,
                'updatedAt' => date('Y-m-d H:i:s')
            );
            $id = $this->CertificationModel->insert_certification_audit_experience($data);

            /** insert into audit_experienced_role */
            $this->CertificationModel->delete_audit_experienced_role($audit_experience_id);

            $role_id = $this->request->getVar('role_id');
            $role_detail = count($role_id);

            for ($i = 0; $i < $role_detail; $i++) {
                $data = array(
                    'audit_experience_id' => $audit_experience_id,
                    'role_id' => $role_id[$i]
                );
                $id = $this->CertificationModel->insert_audit_experienced_role($data);
            }

            /** insert into audit_experienced_scope */
            $this->CertificationModel->delete_audit_experienced_scope($audit_experience_id);

            $scope_id = $this->request->getVar('scope_id');
            $scope_detail = count($scope_id);


            for ($i = 0; $i < $scope_detail; $i++) {
                $data = array(
                    'audit_experience_id' => $audit_experience_id,
                    'scope_id' => $scope_id[$i]
                );

                $id = $this->CertificationModel->insert_audit_experienced_scope($data);
            }

            /** insert into training */
            $this->CertificationModel->delete_training($certification_id);

            $folder = $_SERVER["DOCUMENT_ROOT"] . '/assets/Training/Doc_path/' . $user_id;
            $date = date('YmdHis');
            $folderName = $folder . '/' . $date . ' ' . basename($_FILES['doc_path_training']['name']);
            $file_type = $_FILES['doc_path_training']['type'];
            if ($file_type == "application/pdf" || $file_type == "image/gif" || $file_type == "image/jpeg") {
                if (!file_exists($folder)) {
                    mkdir($folder, 0755, true);
                }
                move_uploaded_file($_FILES['doc_path_training']['tmp_name'], $folderName);
            } else {
                session()->setFlashdata('pesan', 'Hanya Boleh upload PDF, JPEG GIF');
                session()->setFlashdata('success', false);
                return redirect()->to("/Certification/main");
            }
            $data = array(
                'training_id' => $this->get_uuid(),
                'certification_id' => $certification_id,
                'user_id' => session('user_id'),
                'provider_name' => $this->request->getVar('provider_name'),
                'start_date' => $this->request->getVar('start_date_training'),
                'end_date' => $this->request->getVar('end_date_training'),
                'training_topic' => $this->request->getVar('training_topic'),
                'relation_status' => $this->request->getVar('relation_status'),
                'doc_path' => $folderName,
                'updatedAt' => date('Y-m-d H:i:s')
            );
            $id = $this->CertificationModel->insert_training($data);

            session()->setFlashdata('pesan', 'Data berhasil disimpan');
            return redirect()->to("/Certification/main");
        }
    }

    public function delete($certification_id)
    {

        $this->CertificationModel->delete_certification($certification_id);
        $this->CertificationModel->delete_certificationd_scope($certification_id);
        $this->CertificationModel->delete_certificationd_fieldcode($certification_id);

        $this->CertificationModel->delete_education($certification_id);

        $this->CertificationModel->delete_experience($certification_id);

        $this->CertificationModel->delete_audit_experience($certification_id);

        $audit_experience_id = $this->CertificationModel->get_audit_experience_id($certification_id);
        $this->CertificationModel->delete_audit_experienced_role($audit_experience_id);
        $this->CertificationModel->delete_audit_experienced_scope($audit_experience_id);

        $this->CertificationModel->delete_training($certification_id);

        return redirect()->to('/Certification/main')->with('pesan', 'Data berhasil dihapus');
    }


    public function validasi_data()
    {
        if (!$this->validate([
            'certification_number' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'scope_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'fieldcode_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'certification_type_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'level_auditor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'university' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'major' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'start_date_education' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'end_date_education' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'certificate_number' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'accreditation_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'doc_path_education' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'company_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'departement_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'position' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'start_date_experience' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'end_date_experience' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'doc_path_experience' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'company_addres' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'scope_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'role_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'company_phone' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'contact_person' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'start_date_audit_experience' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'end_date_audit_experience' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'doc_audit_plan_path' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'doc_work_order_path' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'provider_name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'start_date_training' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'end_date_training' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'training_topic' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'relation_status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'doc_path_training' => [
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
