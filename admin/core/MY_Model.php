<?php

/**
 * Created by PhpStorm.
 * User: toshiba
 * Date: 8/5/17
 * Time: 1:04 PM
 */
class MY_Model extends CI_Model
{
    protected $_table = '';
    protected $_pk = '';

    protected $_columns = array();

    public function __construct()
    {
        parent::__construct();
    }

    public function setup($table, $columns, $pk = 'id')
    {
        $this->_table = $table;
        foreach ($columns as $col) {
            $this->_columns[$col] = '';
        }
        $this->_pk = $pk;
    }

    public function setByArray($obj)
    {

        foreach ($obj as $key => $val) {
            $this->set($key, $val);
        }

    }

    public function set($col, $value)
    {
        if (isset($this->_columns[$col])) {
            $this->_columns[$col] = $value;
        }
    }

    public function get($col)
    {
        if (isset($this->_columns[$col])) {
            return $this->_columns[$col];
        }

        return null;
    }

    public function findByPk($id)
    {
        return $this->db->get_where($this->_table, array(
            $this->_pk => $id
        ))->row();
    }

    public function findOne($where = array())
    {
        $this->db->select('*')->from($this->_table);
        if (count($where) > 1)
            $this->db->where($where);

        return $this->db->get()->row();
    }

    public function find($params = array())
    {
        $this->db->select('*')->from($this->_table);

        if (isset($params['limit']) && isset($params['offset']))
            $this->db->limit($params['limit'], $params['offset']);

        if (isset($params['order']) && isset($params['order_type']))
            $this->db->order_by($params['order'], $params['order_type']);

        if (isset($params['where'])) {
            foreach ($params['where'] as $key => $val) {
                $this->db->where($key, $val);
            }
        }

        return $this->db->get()->result();
    }

    public function insert()
    {
        $this->db->insert($this->_table, $this->_columns);
        return $this->db->insert_id();
    }

    public function update($where = array())
    {
        if (count($where) > 1)
            $this->db->where($where);
        else
            $this->db->where($this->_pk, $this->_columns[$this->_pk]);

        $this->db->update($this->_table, $this->_columns);
    }

    public function delete($where = array())
    {
        if (count($where) > 1) {
            $this->db->where($where);
        } else {
            $this->db->where($this->_pk, $this->_columns[$this->_pk]);
        }

        $this->db->delete($this->_table);
    }


}