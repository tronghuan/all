<?php
class category_model extends MY_Model
{
    protected $_table = "tbl_category";
    public function listCategory()
    {
        return $this->getAll($this->_table);
    }
}