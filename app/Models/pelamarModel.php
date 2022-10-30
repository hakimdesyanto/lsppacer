<?php

namespace App\Models;

use CodeIgniter\Model;

class pelamarModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getPelamar($id = false)
    {
        $sql = "SELECT 
                a.no_daftar,
                a.nm_pelamar,
                a.alamat,
                a.no_telp,
                a.no_ktp,
                a.email,
                a.jenis_kelamin,
                a.status_kawin,
                a.pendidikan,
                a.jurusan,
                a.universitas,
                a.pengalaman,
                b.nm_posisi,
                a.tmp_lahir,
                a.tgl_lahir,
                a.keterangan_sehat,
                a.skck,
                a.ktp,
                a.status,
                a.nilai_tes 
                FROM pelamar AS a
                LEFT JOIN posisi AS b ON(b.posisi_id = a.posisi_id)";
        if ($id) {
            $sql = $sql . " WHERE a.no_daftar='" . $id . "'";
        }

        $builder = $this->db->query($sql);
        if ($id) {
            return $builder->getRowArray();
        } else {
            return $builder->getResultArray();
        }
    }

    public function updatePelamar($id, $data)
    {
        $builder = $this->db->table('pelamar');
        $builder->where('no_daftar', $id);
        $builder->update($data);
    }

    public function deletePelamar($id)
    {
        $builder = $this->db->table('pelamar');
        $builder->where('no_daftar', $id);
        $builder->delete();
    }

    public function listPelamarDiterima()
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

        $builder = $this->db->query($sql);
        return $builder->getResultArray();
    }
}
