<?php

namespace App\Models;

use CodeIgniter\Model;

class FieldCodeModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function tabel_field_code()
    {
        $sql = "select * from ref_field_code ";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }


    public function get_field_code($id = false)
    {
        $sql = "select *
            from ref_fieldcode ";
        if ($id) {
            $sql .= " Where fieldcode_id =? ";
            $query = $this->db->query($sql, $id);
            return $query->getRowArray();
        } else {
            $query = $this->db->query($sql);
            return $query->getResultArray();
        }
    }

    public function insert_field_code($data)
    {
        $builder = $this->db->table('ref_fieldcode');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function update_field_code($id, $data)
    {
        $builder = $this->db->table('ref_fieldcode');
        $builder->where('fieldcode_id', $id);
        $builder->update($data);
    }

    public function delete_field_code($id)
    {
        $builder = $this->db->table('ref_fieldcode');
        $builder->where('fieldcode_id', $id);
        $builder->delete();
    }
}
