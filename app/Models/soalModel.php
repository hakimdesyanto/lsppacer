<?php

namespace App\Models;

use CodeIgniter\Model;

class soalModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getSoal($id = false)
    {
        $sql = "SELECT
                soal_id,
                pertanyaan,
                jawab_a,
                jawab_b,
                jawab_c,
                jawab_d,
                jawaban,
                bobot
                FROM soal
               ";
        if ($id) {
            $sql = $sql . " WHERE soal_id=" . $id;
        }
        $builder = $this->db->query($sql);
        if ($id) {
            return $builder->getRowArray();
        } else {
            return $builder->getResultArray();
        }
    }

    public function insertSoal($data)
    {
        $builder = $this->db->table('soal');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function updateSoal($id, $data)
    {
        $builder = $this->db->table('soal');
        $builder->where('soal_id', $id);
        $builder->update($data);
    }

    public function deleteSoal($id)
    {
        $builder = $this->db->table('soal');
        $builder->where('soal_id', $id);
        $builder->delete();
    }
}
