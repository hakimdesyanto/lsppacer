<?php

namespace App\Models;

use CodeIgniter\Model;

class testModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function index()
    {
    }

    public function insertTest($data)
    {
        $builder = $this->db->table('test_online');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function getTestResult($id, $jid)
    {
        $sql = "SELECT 
                SUM(IF(a.jawaban=b.jawaban,b.bobot,0)) AS nilai 
                FROM test_online AS a 
                LEFT JOIN soal as b ON(b.soal_id = a.soal_id) 
                WHERE a.no_daftar ='" . $id . "' AND a.jadwal_id=" . $jid . " GROUP BY a.no_daftar";
        $builder = $this->db->query($sql)->getRowArray();
        if ($builder) {
            return $builder['nilai'];
        } else {
            return 0;
        }
    }
}
