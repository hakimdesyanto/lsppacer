<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getUser($id = false)
    {
        $sql = "SELECT
                a.*, b.province_name,c.district_name,d.subdistrict_name,e.village_name,f.user_type
                FROM user a 
                left join ref_province b on a.province_id=b.province_id  
                left join ref_district c on a.district_id=c.district_id
                left join ref_subdistrict d on a.subdistrict_id=d.subdistrict_id  
                left join ref_village e on a.village_id=e.village_id    
                left join ref_user_type f on a.user_type_id=f.user_type_id  
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

    public function updateUser($id, $data)
    {
        $builder = $this->db->table('user');
        $builder->where('user_id', $id);
        $builder->update($data);
    }

    public function deleteUser($id)
    {
        $builder = $this->db->table('user');
        $builder->where('user_id', $id);
        $builder->delete();
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

    public function get_user_type($id = '')
    {
        $sql = "select * from ref_user_type";
        if ($id) {
            $sql = $sql . " WHERE user_type_id=" . $id;
        }
        $builder = $this->db->query($sql);

        if ($id) {
            return $builder->getRowArray();
        } else {
            return $builder->getResultArray();
        }
    }
}
