<?php

namespace App\Controllers;

use App\Models\jadwaltestModel;
use App\Models\pelamarModel;
use App\Models\soalModel;
use App\Models\testModel;

class Pelamar extends BaseController
{
    protected $pelamarModel;
    protected $soalModel;
    protected $testModel;
    protected $jadwaltestModel;
    public function __construct()
    {
        $this->pelamarModel = new pelamarModel();
        $this->soalModel = new soalModel();
        $this->testModel = new testModel();
        $this->jadwaltestModel = new jadwaltestModel();
    }
    public function index()
    {
        $data = [
            "title" => "Pelamar",
            "breadcrumbs" => ['Data SDM', 'Pelamar'],
            "icon" => "bx-user-pin",
            "no" => 0,
            "pelamar" => $this->pelamarModel->getPelamar()
        ];
        return view('pelamar/index', $data);
    }

    public function detail($id)
    {
        $data = [
            "title" => "Pelamar",
            "breadcrumbs" => ['Data SDM', 'Pelamar'],
            "icon" => "bx-user-pin",
            "pelamar" => $this->pelamarModel->getPelamar($id)
        ];
        return view('pelamar/detail', $data);
    }

    public function pelamardetail($id)
    {
        $data = [
            "title" => "Pelamar",
            "breadcrumbs" => ['Profile'],
            "icon" => "bx-user-pin",
            "pelamar" => $this->pelamarModel->getPelamar($id)
        ];
        return view('pelamar/pelamardetail', $data);
    }

    public function testonline($id)
    {
        $data = [
            "title" => "Pelamar",
            "breadcrumbs" => ['Test Online'],
            "icon" => "bx-user-pin",
            "pelamar" => $this->pelamarModel->getPelamar($id),
            "soal" => $this->soalModel->getSoal(),
            "nodaftar" => $id,
            "sudahUjian" => $this->db->isgetdata("test_online", "no_daftar='" . $id . "'"),
            "jadwalhariini" => $this->jadwaltestModel->getJadwaltest_bydate(date('Y/m/d')),
            "jadwalakandatang" => $this->jadwaltestModel->getJadwaltest_bydate(date('Y/m/d'), ">")
        ];

        return view('pelamar/testonline', $data);
    }

    public function prosessoal($id, $jid)
    {
        $counter = 0;
        for ($i = 0; $i < intval($this->request->getVar("soal")); $i++) {
            $data = [
                "no_daftar" => $id,
                "soal_id" => $this->request->getVar("soal" . $i),
                "jawaban" => $this->request->getVar("gpilih" . $i),
                "jadwal_id" => $jid
            ];

            $this->testModel->insertTest($data);
            $counter++;
        }
        $result = $this->testModel->getTestResult($id, $jid);
        $datatest = [
            "nilai_tes" => $result
        ];
        $this->pelamarModel->updatePelamar($id, $datatest);

        return redirect()->to('/pelamar/hasiltest/' . $id);
    }

    public function hasiltest($id)
    {
        $data = [
            "title" => "Pelamar",
            "breadcrumbs" => ['Hasil Test'],
            "icon" => "bx-user-pin",
            "pelamar" => $this->pelamarModel->getPelamar($id),
            "sudahUjian" => $this->db->isgetdata("test_online", "no_daftar='" . $id . "'")
        ];

        return view('pelamar/hasiltest', $data);
    }

    public function diterima($id)
    {
        $data = [
            "status" => "Diterima"
        ];
        $this->pelamarModel->updatePelamar($id, $data);

        return redirect()->to('/pelamar/detail/' . $id);
    }

    public function ditolak($id)
    {
        $data = [
            "status" => "Ditolak"
        ];
        $this->pelamarModel->updatePelamar($id, $data);

        return redirect()->to('/pelamar/detail/' . $id);
    }

    public function uploadberkas($id)
    {
        $fileUpload = $this->request->getfile('berkas');
        $fileName = $fileUpload->getName();
        $x = explode('.', $fileName);
        $ekstensi = strtolower(end($x));
        $newfilename = $id . '.' . $ekstensi;
        $fileUpload->move('files', $newfilename);

        return redirect()->to('/pelamar/pelamardetail/' . $id);
    }

    public function delete($id)
    {
        $this->pelamarModel->deletePelamar($id);
        return redirect()->to('/pelamar');
    }

    public function report()
    {
        $data = [
            "title" => "Pelamar",
            "breadcrumbs" => ['Laporan', 'Pelamar'],
            "icon" => "bx-user-pin",
            "pelamar" => $this->pelamarModel->listPelamarDiterima()
        ];
        return view('pelamar/report', $data);
    }
}
