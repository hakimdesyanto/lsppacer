<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getUser($id = false)
    {
        $sql = "SELECT
                *
                FROM user
               ";
        if ($id) {
            $sql = $sql . " WHERE user_id=" . $id;
        }
        $builder = $this->db->query($sql);
        if ($id) {
            return $builder->getRowArray();
        } else {
            return $builder->getResultArray();
        }
    }

    public function insertUser($data)
    {
        $builder = $this->db->table('user');
        $builder->insert($data);
        return $this->db->insertID();
    }
    public function get_province($id = '')
    {
        $sql = "select * from ref_province";
        if ($id) {
            $sql = $sql . " WHERE province_id=" . $id;
        }
        $builder = $this->db->query($sql);

        if ($id) {
            return $builder->getRowArray();
        } else {
            return $builder->getResultArray();
        }
    }

    public function get_district($id = '')
    {
        $sql = "select * from ref_district";
        if ($id) {
            $sql = $sql . " WHERE district_id=" . $id;
        }
        $builder = $this->db->query($sql);

        if ($id) {
            return $builder->getRowArray();
        } else {
            return $builder->getResultArray();
        }
    }
}
