<?php

namespace App\Models;

use CodeIgniter\Model;

class CertificationModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function tabel_certification()
    {
        $sql = "select * from certification ";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }


    public function get_certification($id = false)
    {
        $sql = "select a.*,b.description
            from certification a
            left join ref_certification_type b on a.certification_type_id =b.certification_type_id ";
        if ($id) {
            $sql .= " Where certification_id =? ";
            $query = $this->db->query($sql, $id);
            return $query->getRowArray();
        } else {
            $query = $this->db->query($sql);
            return $query->getResultArray();
        }
    }

    public function get_certification_scope($id)
    {
        $sql = "select *
            from certificationd_scope where certification_id=? ";
        $query = $this->db->query($sql, $id);
        return $query->getResultArray();
    }

    public function get_certification_fieldcode($id)
    {
        $sql = "select *
            from certificationd_fieldcode where certification_id=? ";
        $query = $this->db->query($sql, $id);
        return $query->getResultArray();
    }

    public function get_education($id)
    {
        $sql = "select * from education where certification_id=?";
        $query = $this->db->query($sql, $id);
        return $query->getRowArray();
    }

    public function get_experience($id)
    {
        $sql = "select * from experience where certification_id=?";
        $query = $this->db->query($sql, $id);
        return $query->getRowArray();
    }

    public function get_audit_experience($id)
    {
        $sql = "select * from audit_experience where certification_id=?";
        $query = $this->db->query($sql, $id);
        return $query->getRowArray();
    }

    public function get_training($id)
    {
        $sql = "select * from training where certification_id=?";
        $query = $this->db->query($sql, $id);
        return $query->getRowArray();
    }




    public function insert_certification($data)
    {
        $builder = $this->db->table('certification');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function insert_certification_scope($data)
    {
        $builder = $this->db->table('certificationd_scope');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function insert_certification_fieldcode($data)
    {
        $builder = $this->db->table('certificationd_fieldcode');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function insert_certification_education($data)
    {
        $builder = $this->db->table('education');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function insert_certification_experience($data)
    {
        $builder = $this->db->table('experience');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function insert_certification_audit_experience($data)
    {
        $builder = $this->db->table('audit_experience');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function insert_audit_experienced_role($data)
    {
        $builder = $this->db->table('audit_experienced_role');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function insert_audit_experienced_scope($data)
    {
        $builder = $this->db->table('audit_experienced_scope');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function insert_training($data)
    {
        $builder = $this->db->table('training');
        $builder->insert($data);
        return $this->db->insertID();
    }


    public function update_certification($id, $data)
    {
        $builder = $this->db->table('certification');
        $builder->where('certification_id', $id);
        $builder->update($data);
    }

    public function delete_certification($id)
    {
        $builder = $this->db->table('certification');
        $builder->where('certification_id', $id);
        $builder->delete();
    }

    public function get_certification_id()
    {
        $sql = "select * from certification order by certification_id desc limit 1";
        $query = $this->db->query($sql);
        $row = $query->getRowArray();
        if ($row == Null) {
            return '1';
        } else {
            return $row['certification_id'] + 1;
        }
    }

    public function get_audit_experience_id($id)
    {
        $sql = "select * from audit_experience where certification_id=?";
        $query = $this->db->query($sql, $id);
        $row = $query->getRowArray();
        return $row['audit_experience_id'];
    }

    public function delete_certificationd_scope($id)
    {
        $builder = $this->db->table('certificationd_scope');
        $builder->where('certification_id', $id);
        $builder->delete();
    }

    public function delete_certificationd_fieldcode($id)
    {
        $builder = $this->db->table('certificationd_fieldcode');
        $builder->where('certification_id', $id);
        $builder->delete();
    }

    public function delete_education($id)
    {
        $builder = $this->db->table('education');
        $builder->where('certification_id', $id);
        $builder->delete();
    }

    public function delete_experience($id)
    {
        $builder = $this->db->table('experience');
        $builder->where('certification_id', $id);
        $builder->delete();
    }

    public function delete_audit_experience($id)
    {
        $builder = $this->db->table('audit_experience');
        $builder->where('certification_id', $id);
        $builder->delete();
    }

    public function delete_audit_experienced_role($id)
    {
        $builder = $this->db->table('audit_experienced_role');
        $builder->where('audit_experience_id', $id);
        $builder->delete();
    }

    public function delete_audit_experienced_scope($id)
    {
        $builder = $this->db->table('audit_experienced_scope');
        $builder->where('audit_experience_id', $id);
        $builder->delete();
    }

    public function delete_training($id)
    {
        $builder = $this->db->table('training');
        $builder->where('certification_id', $id);
        $builder->delete();
    }

    public function get_role_id($id)
    {
        $sql = "select * from audit_experienced_role where audit_experience_id=?";
        $query = $this->db->query($sql, $id);
        $row = $query->getRowArray();
        return $row['role_id'];
    }
}
