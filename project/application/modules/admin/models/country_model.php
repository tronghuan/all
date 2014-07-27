<?php
class country_model extends MY_Model
{
    protected $_table = "tbl_country";

    public function __construct()
    {
        parent::connect();
    }
    public function getCountry()
    {
        return $this->getAll($this->_table);
    }
    
}