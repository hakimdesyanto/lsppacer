<?php

namespace App\Controllers;

class Beranda extends BaseController
{
    public function index()
    {
        //$menu = $this->generate_menu(session('user_type_id'));

        $data = [
            "title" => "Dashboard",
            "breadcrumbs" => [],
            "icon" => "bx-home-alt",
            "total_pelamar" => $this->db->getaggregation("pelamar", "*", "1", "COUNT"),
            "total_diterima" => $this->db->getaggregation("pelamar", "*", "status='diterima'", "COUNT"),
            "total_lakilaki" => $this->db->getaggregation("pelamar", "*", "jenis_kelamin=1", "COUNT"),
            "total_perempuan" => $this->db->getaggregation("pelamar", "*", "jenis_kelamin=0", "COUNT")
            // ,"menu" => session('menu')
        ];
        return view('beranda/index', $data);
    }
}
