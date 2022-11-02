<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuSetupModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function tabel_menu_setup()
    {

        $sql = "SELECT
        a.menu_id,
        (case when b.menu_title is null then '- Parent -' else b.menu_title end) as menu_parent,
        a.menu_title,
        a.menu_url,
        a.menu_type,
        a.menu_icon_parent,
        a.position
        FROM lsp_menu a
        LEFT JOIN lsp_menu b ON a.menu_parent=b.menu_id ";
        $query = $this->db->query($sql);
        return $query->getResultArray();
    }
    public function get_menu_setup2($id = false)
    {
        $sql = "SELECT
                *
                FROM lsp_menu
               ";
        if ($id) {
            $sql = $sql . " WHERE menu_id=" . $id;
        }
        $builder = $this->db->query($sql);
        if ($id) {
            return $builder->getRowArray();
        } else {
            return $builder->getResultArray();
        }
    }

    public function get_menu_setup($id = false)
    {
        $sql = "select *
            from lsp_menu ";
        if ($id) {
            $sql .= " Where menu_id =? ";
            $query = $this->db->query($sql, $id);
            return $query->getRowArray();
        } else {
            $query = $this->db->query($sql);
            return $query->getResultArray();
        }
    }
    function get_menu_parent()
    {
        $sql = "select
				a.menu_id,
				b.menu_title as menu_parent,
				a.menu_title,
				a.menu_url,
				a.menu_type,
				a.menu_icon_parent,
				a.position
				from lsp_menu a
				left join lsp_menu b on a.menu_parent=b.menu_id
				order by a.menu_parent,a.menu_title
				";

        $query = $this->db->query($sql);
        return $query->getResultArray();
    }


    public function insert_menu_setup($data)
    {
        $builder = $this->db->table('lsp_menu');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function update_menu_setup($id, $data)
    {
        $builder = $this->db->table('lsp_menu');
        $builder->where('menu_id', $id);
        $builder->update($data);
    }

    public function delete_menu_setup($id)
    {
        $builder = $this->db->table('lsp_menu');
        $builder->where('menu_id', $id);
        $builder->delete();
    }

    public function check_nomor_urut($menu_parent)
    {
        $sql = "select * from lsp_menu where menu_parent=? order by position desc limit 1";
        $query = $this->db->query($sql, $menu_parent);
        $row = $query->getRowArray();
        if ($row == Null) {
            return '0';
        } else {
            return $row['position'];
        }
    }
}
