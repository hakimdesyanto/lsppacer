<?php

namespace App\Models;

use CodeIgniter\Model;

class jadwaltestModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function getJadwaltest($id = false)
    {
        $sql = "SELECT
                jadwal_id,
                keterangan,
                tgl_test
                FROM jadwal_test
               ";
        if ($id) {
            $sql = $sql . " WHERE jadwal_id=" . $id;
        }
        $builder = $this->db->query($sql);
        if ($id) {
            return $builder->getRowArray();
        } else {
            return $builder->getResultArray();
        }
    }

    public function getJadwaltest_bydate($date, $operator = '=')
    {
        $sql = "SELECT
                jadwal_id,
                keterangan,
                tgl_test
                FROM jadwal_test
                WHERE tgl_test" . $operator . "'" . $date . "'";
        $builder = $this->db->query($sql);
        return $builder->getRowArray();
    }

    public function insertJadwaltest($data)
    {
        $builder = $this->db->table('jadwal_test');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function updateJadwaltest($id, $data)
    {
        $builder = $this->db->table('jadwal_test');
        $builder->where('jadwal_id', $id);
        $builder->update($data);
    }

    public function deleteJadwaltest($id)
    {
        $builder = $this->db->table('jadwal_test');
        $builder->where('jadwal_id', $id);
        $builder->delete();
    }
}
