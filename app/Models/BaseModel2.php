<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    function getdata($table, $field, $criteria)
    {
        $sql = "SELECT * FROM " . $table . " WHERE " . $criteria;
        $row = $this->db->query($sql)->getRowArray();
        if ($row) {
            return $row[$field];
        } else {
            return FALSE;
        }
    }

    function getaggregation($table, $field, $criteria, $kindofagggregation = 'SUM')
    {
        $sql = "SELECT " . $kindofagggregation . "(" . $field . ") AS result FROM " . $table . " WHERE " . $criteria;
        $row = $this->db->query($sql)->getResultArray();
        if ($row) {
            return $row[0]['result'];
        } else {
            return FALSE;
        }
    }

    function isgetdata($table, $criteria)
    {
        $sql = "SELECT * FROM " . $table . " WHERE " . $criteria;
        $row = $this->db->query($sql)->getRowArray();
        if ($row) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_data_user($email, $password)
    {
        $sql = "SELECT * FROM user where email=? and user_password=?";
        $query = $this->db->query($sql, array($email, $password));

        return $query->getRowArray();
    }

    function getdata4selectoption($table, $fieldkey, $fields, $criteria = '', $selected = '', $insertempty = false)
    {
        $sql = "SELECT * FROM " . $table;
        if ($criteria != '') {
            $sql = $sql . " WHERE " . $criteria;
        }
        $rows = $this->db->query($sql)->getResultArray();
        if ($rows) {
            $option = '';
            if ($insertempty) {
                $option = '<option value="">Please Select</option>';
            }
            foreach ($rows as $record) {
                $option = $option . '<option value="' . $record[$fieldkey] . '" ';
                if ($selected == htmlentities($record[$fieldkey], ENT_QUOTES)) {
                    $option = $option . ' selected ';
                }
                $option = $option . '>';

                $first = true;
                foreach ($fields as $field) {
                    if ($first) {
                        $first = false;
                    } else {
                        $option = $option . " | ";
                    }
                    $option = $option . $record[$field];
                }
                $option = $option . '</option>';
            }
            return $option;
        } else {
            return FALSE;
        }
    }

    public function get_menu($role_id, $menu_parent = 0)
    {
        //$role_id = session('role_id');
        $sql = "SELECT lsp_menu.menu_id
		,lsp_menu.menu_parent
		,lsp_menu.menu_title
		,lsp_menu.menu_url
		,lsp_menu.menu_type
		,lsp_menu.menu_icon_parent 
		FROM lsp_menu
		LEFT JOIN lsp_user_nav ON lsp_user_nav.menu_id = lsp_menu.menu_id
		WHERE lsp_user_nav.role_id = ? AND lsp_menu.menu_parent = ? ORDER BY position ASC";
        $query = $this->db->query($sql, array($role_id, $menu_parent));

        return $query->getResultArray();
    }

    function getdata4multiselectoption($table, $fieldkey, $fields, $criteria = '', $selected = array(), $insertempty = false)
    {
        $sql = "SELECT * FROM " . $table;
        if ($criteria != '') {
            $sql = $sql . " WHERE " . $criteria;
        }
        $rows = $this->db->query($sql)->getResultArray();
        if ($rows) {
            $option = '';
            if ($insertempty) {
                $option = '<option value="">Please Select</option>';
            }
            foreach ($rows as $record) {
                $option = $option . '<option value="' . $record[$fieldkey] . '" ';
                foreach ($selected as $select) {
                    if ($select == htmlentities($record[$fieldkey], ENT_QUOTES)) {
                        $option = $option . ' selected ';
                    }
                }

                $option = $option . '>';

                $first = true;
                foreach ($fields as $field) {
                    if ($first) {
                        $first = false;
                    } else {
                        $option = $option . " | ";
                    }
                    $option = $option . $record[$field];
                }
                $option = $option . '</option>';
            }
            return $option;
        } else {
            return FALSE;
        }
    }
}
