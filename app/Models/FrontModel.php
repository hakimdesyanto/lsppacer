<?php

namespace App\Models;

use CodeIgniter\Model;

class frontModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getNoRegistrasi($nm_pengaturan)
    {
        $sql = "SELECT
                nilai
                FROM pengaturan
               ";
        $sql = $sql . " WHERE nm_pengaturan='" . $nm_pengaturan . "'";
        $builder = $this->db->query($sql)->getRowArray();
        return $builder['nilai'] + 1;
    }

    public function getLowongan()
    {
        $sql = "SELECT * 
                FROM posisi AS a
                LEFT JOIN klien AS b ON(b.klien_id = a.klien_id)
                WHERE a.status=1
                ORDER BY a.posisi_id";
        $builder = $this->db->query($sql)->getResultArray();
        return $builder;
    }

    public function getListPelamarDiterima()
    {
        $sql = "SELECT
        pelamar.no_daftar,
        pelamar.nm_pelamar,
        pelamar.alamat,
        pelamar.no_telp,
        pelamar.no_ktp,
        pelamar.email,
        IF(pelamar.jenis_kelamin=1,'Pria','Wanita') AS jenis_kelamin,
        pelamar.status_kawin,
        pelamar.pendidikan,
        pelamar.jurusan,
        pelamar.universitas,
        pelamar.foto,
        pelamar.pengalaman,
        posisi.nm_posisi,
        pelamar.tmp_lahir,
        pelamar.tgl_lahir,
        pelamar.keterangan_sehat,
        pelamar.skck,
        pelamar.ktp,
        pelamar.nilai_tes
        FROM pelamar
        LEFT JOIN posisi ON(posisi.posisi_id = pelamar.posisi_id)
        LEFT JOIN test_online ON(test_online.no_daftar = pelamar.no_daftar)
        LEFT JOIN jadwal_test ON(jadwal_test.jadwal_id = test_online.jadwal_id)
        WHERE DATEDIFF(NOW(),jadwal_test.tgl_test)<=30 AND pelamar.status='diterima'
        GROUP BY pelamar.no_daftar
        ORDER BY no_daftar";
        $builder = $this->db->query($sql)->getResultArray();
        return $builder;
    }

    public function insertRegistrasi($data)
    {
        $builder = $this->db->table('pelamar');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function updateNoRegistrasi($id, $data)
    {
        $builder = $this->db->table('pengaturan');
        $builder->where('nm_pengaturan', $id);
        $builder->update($data);
    }
}
