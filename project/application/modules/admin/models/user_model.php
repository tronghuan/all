<?php
/**
 * Class name: user_model
 * Author: ChungND
 */
class user_model extends MY_Model
{
    protected $_table = "tbl_user";

    public function list_user()
    {
        return $this->getAll($this->_table);
    }
    
    public function insert_update_user($data = array(),$id = "")
    {
        if(empty($data)){
            return false;
        }
        if($id == ""){
          $this->insert($data,$this->_table);  
        }else{
            $this->setWhere("user_id = $id");
            $this->update($data,$this->_table);
        }
    }
    
    public function delete_user($id = ""){
        if($id == ""){
            return false;
        }
        $this->setWhere("user_id = $id");
        $this->delete($this->_table);
    }
    
    public function GetOnceRecord($id = ""){
        if($id == ""){
            return false;
        }
        $this->setWhere("user_id = $id");
        return $this->getOnce($this->_table);
    }
}