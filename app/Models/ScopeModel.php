<?php

namespace App\Models;

use CodeIgniter\Model;

class ScopeModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function tabel_scope()
    {
        $sql = "select * from ref_scope ";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }


    public function get_scope($id = false)
    {
        $sql = "select *
            from ref_scope ";
        if ($id) {
            $sql .= " Where scope_id =? ";
            $query = $this->db->query($sql, $id);
            return $query->getRowArray();
        } else {
            $query = $this->db->query($sql);
            return $query->getResultArray();
        }
    }

    public function insert_scope($data)
    {
        $builder = $this->db->table('ref_scope');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function update_scope($id, $data)
    {
        $builder = $this->db->table('ref_scope');
        $builder->where('scope_id', $id);
        $builder->update($data);
    }

    public function delete_scope($id)
    {
        $builder = $this->db->table('ref_scope');
        $builder->where('scope_id', $id);
        $builder->delete();
    }
}
