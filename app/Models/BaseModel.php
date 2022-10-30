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
}
