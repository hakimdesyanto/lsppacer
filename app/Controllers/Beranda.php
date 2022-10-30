<?php

namespace App\Controllers;

class Beranda extends BaseController
{
    public function index()
    {
        $data = [
            "title" => "Dashboard",
            "breadcrumbs" => [],
            "icon" => "bx-home-alt",
            "total_pelamar" => $this->db->getaggregation("pelamar", "*", "1", "COUNT"),
            "total_diterima" => $this->db->getaggregation("pelamar", "*", "status='diterima'", "COUNT"),
            "total_lakilaki" => $this->db->getaggregation("pelamar", "*", "jenis_kelamin=1", "COUNT"),
            "total_perempuan" => $this->db->getaggregation("pelamar", "*", "jenis_kelamin=0", "COUNT")
        ];
        return view('beranda/index', $data);
    }
}
