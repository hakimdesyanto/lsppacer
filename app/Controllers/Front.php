<?php

namespace App\Controllers;

use App\Models\frontModel;

class Front extends BaseController
{
    protected $frontModel;
    protected $alert;
    public function __construct()
    {
        $this->frontModel = new frontModel();
    }

    public function index()
    {
        if (session()->getFlashdata('validation')) {
            $validation = session()->getFlashdata('validation');
        } else {
            $validation = \Config\Services::validation();
        }

        $data = [
            "noregistrasi" => 'R' . date('ym') . $this->zerofill($this->frontModel->getNoRegistrasi('no_daftar'), 3),
            "statuskawin" => $this->array4selectoption(array('' => '', 'Lajang' => 'Lajang', 'Kawin' => 'Kawin', 'Duda' => 'Duda', 'Janda' => 'Janda'), old('gstatuskawin')),
            "pendidikan" => $this->array4selectoption(array('' => '', 'SMA' => 'SMA', 'D1' => 'D1', 'D2' => 'D2', 'D3' => 'D3', 'D4' => 'D4', 'S1' => 'S1', 'S2' => 'S2', 'S3' => 'S3'), old('gpendidikan')),
            "posisi" => $this->db->getdata4selectoption('posisi', 'posisi_id', array('nm_posisi'), 'status=1', old('gposisi')),
            "lowongan" => $this->frontModel->getLowongan(),
            "pelamarditerima" => $this->frontModel->getListPelamarDiterima(),
            "pesan" => session()->getFlashdata('pesan'),
            "validation" => $validation,
            "alert" => $this->alert
        ];
        return view('Front/index', $data);
    }

    public function register()
    {
        if (!$this->validate([
            'gnama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Lengkap wajib diisi'
                ]
            ],
            'gnotelp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor telpon wajib diisi'
                ]
            ],
            'gnoktp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor KTP wajib diisi'
                ]
            ],
            'guser' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'User wajib diisi'
                ]
            ],
            'gpassword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password wajib diisi'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('validation', $validation);
            session()->setFlashdata('pesan', 'Data gagal disimpan. Silahkan isi data dengan lengkap!');
            $this->alert = 'danger';

            return redirect()->to('/')->withInput()->with('alert', $this->alert);
        } else {
            if ($this->request->getVar('gpassword') == $this->request->getVar('gkpassword')) {
                if (!$this->db->isgetdata("pelamar", "user_login='" . $this->request->getVar('guser') . "'")) {
                    $data = [
                        "no_daftar" => $this->request->getVar('gnodaftar'),
                        "nm_pelamar" => $this->request->getVar('gnama'),
                        "alamat" => $this->request->getVar('galamat'),
                        "no_telp" => $this->request->getVar('gnotelp'),
                        "no_ktp" => $this->request->getVar('gnoktp'),
                        "email" => $this->request->getVar('gemail'),
                        "jenis_kelamin" => $this->request->getVar('gjeniskelamin'),
                        "status_kawin" => $this->request->getVar('gstatuskawin'),
                        "pendidikan" => $this->request->getVar('gpendidikan'),
                        "jurusan" => $this->request->getVar('gjurusan'),
                        "universitas" => $this->request->getVar('guniversitas'),
                        "pengalaman" => $this->request->getVar('gpengalaman'),
                        "posisi_id" => $this->request->getVar('gposisi'),
                        "tmp_lahir" => $this->request->getVar('gtmplahir'),
                        "tgl_lahir" => ($this->request->getVar('gtgllahir') != '') ? date('Y/m/d', strtotime($this->request->getVar('gtgllahir'))) : 'NULL',
                        "user_login" => $this->request->getVar('guser'),
                        "password" => md5($this->request->getVar('gpassword')),
                        "tgl_buat" => date('Y/m/d H:i:s'),
                        "tgl_koreksi" => date('Y/m/d H:i:s'),
                    ];

                    session()->setFlashdata('pesan', 'Data berhasil disimpan');
                    $this->alert = 'success';

                    $id = $this->frontModel->insertRegistrasi($data);
                    $this->frontModel->updateNoRegistrasi('no_daftar', array('nilai' => $this->frontModel->getNoRegistrasi('no_daftar')));
                    return redirect()->to("/")->with('alert', $this->alert);
                } else {
                    session()->setFlashdata('pesan', 'Data gagal disimpan. Nama user sudah digunakan.');
                    $this->alert = 'danger';
                    return redirect()->to("/")->withInput()->with('alert', $this->alert);
                }
            } else {
                session()->setFlashdata('pesan', 'Data gagal disimpan. Password dan Konfirm Password tidak sama.');
                $this->alert = 'danger';
                return redirect()->to("/")->withInput()->with('alert', $this->alert);
            }
        }
    }
}
