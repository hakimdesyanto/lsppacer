<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleSetupModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function tabel_role_setup()
    {

        $sql = "SELECT * FROM lsp_user_role";

        $query = $this->db->query($sql);
        return $query->getResultArray();
    }

    public function get_role_setup2($id = false)
    {
        $sql = "SELECT
                *
                FROM lsp_user_role
               ";
        if ($id) {
            $sql = $sql . " WHERE role_id=" . $id;
        }
        $builder = $this->db->query($sql);
        if ($id) {
            return $builder->getRowArray();
        } else {
            return $builder->getResultArray();
        }
    }

    public function get_role_setup($id = false)
    {
        $sql = "select *
            from lsp_user_role ";
        if ($id) {
            $sql .= " Where role_id =? ";
            $query = $this->db->query($sql, $id);
            return $query->getRowArray();
        } else {
            $query = $this->db->query($sql);
            return $query->getResultArray();
        }
    }

    function get_data_role_by_id($role_id)
    {
        $sql = "select * from lsp_user_role where role_id=?";
        $query = $this->db->query($sql, array($role_id));
        return $query->getRowarray();
    }

    public function insert_role_setup($data)
    {
        $builder = $this->db->table('lsp_user_role');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function update_role_setup($id, $data)
    {
        $builder = $this->db->table('lsp_user_role');
        $builder->where('role_id', $id);
        $builder->update($data);
    }

    public function delete_role_setup($id)
    {
        $builder = $this->db->table('lsp_user_role');
        $builder->where('role_id', $id);
        $builder->delete();
    }

    function get_menu_parent_by_role($role_id)
    {
        $sql = "SELECT
				lsp_menu.menu_id,
				lsp_menu.menu_title,
				lsp_user_nav.role_id
				FROM lsp_menu
				LEFT JOIN lsp_user_nav ON lsp_user_nav.menu_id = lsp_menu.menu_id and lsp_user_nav.role_id = ?
				WHERE lsp_menu.menu_parent = '0' order by lsp_menu.position asc";

        $query = $this->db->query($sql, array($role_id));

        return $query->getResultArray();
    }

    function get_menu_child_by_role($role_id, $menu_parent)
    {
        $sql = "SELECT
				lsp_menu.menu_id,
				lsp_menu.menu_title,
				lsp_user_nav.role_id
				FROM lsp_menu
				LEFT JOIN lsp_user_nav ON lsp_user_nav.menu_id = lsp_menu.menu_id and lsp_user_nav.role_id = ?
				WHERE lsp_menu.menu_parent = ? order by lsp_menu.position asc";

        $query = $this->db->query($sql, array($role_id, $menu_parent));

        return $query->getResultArray();
    }

    function delete_user_nav($param)
    {
        $builder = $this->db->table('lsp_user_nav');
        $builder->where('role_id', $param);
        $builder->delete();
    }

    function insert_batch_user_nav($data)
    {
        $builder = $this->db->table('lsp_user_nav');
        $builder->insertBatch($data);
        // return $this->db->insertID();
    }
}
