<?php

namespace App\Models;

use CodeIgniter\Model;

class klienModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getKlien($id = false)
    {
        $sql = "SELECT
                klien_id,
                nm_klien,
                alamat,
                no_telp,
                no_fax,
                email,
                user_login
                FROM klien
               ";
        if ($id) {
            $sql = $sql . " WHERE klien_id=" . $id;
        }
        $builder = $this->db->query($sql);
        if ($id) {
            return $builder->getRowArray();
        } else {
            return $builder->getResultArray();
        }
    }

    public function insertKlien($data)
    {
        $builder = $this->db->table('klien');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function updateKlien($id, $data)
    {
        $builder = $this->db->table('klien');
        $builder->where('klien_id', $id);
        $builder->update($data);
    }

    public function deleteKlien($id)
    {
        $builder = $this->db->table('klien');
        $builder->where('klien_id', $id);
        $builder->delete();
    }
}
