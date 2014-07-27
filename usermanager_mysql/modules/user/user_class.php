<?php
class user_class extends database
{
    protected $_table = "tbl_user";
    protected $_id ='id';
    protected $_username;
    protected $_email;
    protected $_address;
    protected $_phone;
    protected $_gender;
    public function __construct()
    {
        $this->connect();   
    }
    public function  setName($value)
    {
        $this->_username = $value;
    }
    
    public function  getName()
    {
        return  $this->_username;
    }
    
    public function  setEmail($value)
    {
        $this->_email = $value;
    }
    
    public function  getEmail()
    {
        return  $this->_email;
    }
    
    public function  setAddress($value)
    {
        $this->_address = $value;
    }
    
    public function  getAddress()
    {
        return  $this->_address;
    }
    
    public function  setPhone($value)
    {
        $this->_phone = $value;
    }
    
    public function  getPhone()
    {
        return  $this->_phone;
    }
    
    public function  setGender($value)
    {
        $this->_gender = $value;
    }
    
    public function  getGender()
    {
        return  $this->_gender;
    }
    public function getOnce($id)
    {
        $sql = "SELECT * FROM $this->_table WHERE $this->_id='".$id."'";
        $this->query($sql);
        return $this->fetch();
    }
    public function listUser()
    {
        $sql = "SELECT *,IF(gender=1,'Nam','NU') as gioitinh FROM $this->_table";
        $this->query($sql);
        return $this->fetchAll();   
    }
    public function getInfo()
    {
        $data = array();
        $data['username'] = $this->getName();
        $data['email'] = $this->getEmail();
        $data['address'] = $this->getAddress();
        $data['phone'] = $this->getPhone();
        $data['gender'] = $this->getGender();
        return $data;
    }
    public function insertUser()
    {
        $data = $this->getInfo();
        if($data == null) {
            return false;
        }
        $columnArr = array_keys($data);
        $valueArr = array_values($data);
        $columnString = implode(",",$columnArr);
        foreach($valueArr as $list){
            $newValue[] = "'".$list."'";
        }
        $valueString = implode(",",$newValue);
        $sql = "INSERT INTO $this->_table($columnString) VALUE($valueString)";
        $this->query($sql);
    }
    
    public function updateUser($id)
    {
        $data = $this->getInfo();
        if($data == null) {
            return false;
        }
        foreach($data as $key=>$value)
        {
            $valueArr[] = $key."="."'".$value."'";
        }
        
        $valueString = implode(",",$valueArr);
        $sql = "UPDATE $this->_table SET $valueString WHERE $this->_id ='".$id."'";
        $this->query($sql);
    }
    
}