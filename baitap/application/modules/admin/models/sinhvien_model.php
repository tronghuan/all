<?php
class user_model extends MY_Model
{
    protected $_table = 'tbl_sinhvien';
    
    public function listSinhvien()
    {
        return $this->getAll($this->_table);
    }
    public function insertSinhvien($data)
    {
        $this->insert($this->_table,$data);
    }
    public function deleteSinhvien($id)
    {
        $this->setWhere("id = $id");
        $this->delete($this->_table);
    }
}