<?php

namespace App\Models;

use CodeIgniter\Model;

class posisiModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getPosisi($id = false)
    {
        $sql = "SELECT
                a.posisi_id,
                a.nm_posisi,
                a.klien_id,
                b.nm_klien,
                a.keterangan,
                status
                FROM posisi AS a
                LEFT JOIN klien AS b ON(b.klien_id = a.klien_id)
               ";
        if ($id) {
            $sql = $sql . " WHERE a.posisi_id=" . $id;
        }
        $builder = $this->db->query($sql);
        if ($id) {
            return $builder->getRowArray();
        } else {
            return $builder->getResultArray();
        }
    }

    public function insertPosisi($data)
    {
        $builder = $this->db->table('posisi');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function updatePosisi($id, $data)
    {
        $builder = $this->db->table('posisi');
        $builder->where('posisi_id', $id);
        $builder->update($data);
    }

    public function deletePosisi($id)
    {
        $builder = $this->db->table('posisi');
        $builder->where('posisi_id', $id);
        $builder->delete();
    }
}
