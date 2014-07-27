<?php
class product_model extends MY_Model
{
    protected $_table = "tbl_product";
    public function listProduct()
    {
        return $this->getAll($this->_table);
    }
}