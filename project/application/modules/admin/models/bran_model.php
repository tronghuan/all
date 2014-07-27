<?php
class bran_model extends MY_Model
{
    protected $_table = "tbl_bran";

    public function __construct()
    {
        parent::connect();
    }
    public function getBran()
    {
        return $this->getAll($this->_table);
    }
    
}