<?php

namespace App\Models;

use CodeIgniter\Model;

class CertificationTypeModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function tabel_certification_type()
    {
        $sql = "select * from ref_certification_type ";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }


    public function get_certification_type($id = false)
    {
        $sql = "select *
            from ref_certification_type ";
        if ($id) {
            $sql .= " Where certification_type_id =? ";
            $query = $this->db->query($sql, $id);
            return $query->getRowArray();
        } else {
            $query = $this->db->query($sql);
            return $query->getResultArray();
        }
    }

    public function insert_certification_type($data)
    {
        $builder = $this->db->table('ref_certification_type');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function update_certification_type($id, $data)
    {
        $builder = $this->db->table('ref_certification_type');
        $builder->where('certification_type_id', $id);
        $builder->update($data);
    }

    public function delete_certification_type($id)
    {
        $builder = $this->db->table('ref_certification_type');
        $builder->where('certification_type_id', $id);
        $builder->delete();
    }
}
