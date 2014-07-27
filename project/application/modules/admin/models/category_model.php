<?php
/**
 * Class name: category_model
 * Author: ChungND
 */
class category_model extends MY_Model
{
    protected $_table = "tbl_category";
    
    public function getCategory($id = "")
    {
        $data = array();
        if($id != "") {
            $this->setWhere("cate_id = $id");
            $data = $this->getOnce($this->_table);
        }else{
            $this->setOrder("cate_order","DESC");
            $data = $this->getAll($this->_table);
        }
        return $data;
    }
    public function getCategoryParent($id)
    {
        $this->setWhere("cate_parent = $id");
        return $this->getAll($this->_table);    
    }
    public function insert_update_category($data = array(),$id = "")
    {
        if($id == ""){
            $this->insert($data,$this->_table);
        }else{
            $this->setWhere("cate_id = $id");
            $this->update($data,$this->_table);
        }
    }
    
    public function deleteCategory($id = "")
    {
        if($id == "") {
            return false;
        }
        $this->setWhere("cate_id = $id");
        $this->delete($this->_table);
    }
}