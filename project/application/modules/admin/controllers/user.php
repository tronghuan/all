<?php
/**
 * Class name: user
 * Author: ChungND
 */
class user extends MY_Controller
{
    protected $_strname = 2;
    protected $_username;
    protected $_password;
    protected $_email;
    protected $_address;
    protected $_phone;
    protected $_level;    
    protected $_error = array();
    
    public function setLevel($value = "")
    {
        $this->_level = $value;        
    }
    
    public function getLevel()
    {
        return $this->_level;
    }
    
    public function setName($value = "")
    {
        $this->_name = $value;
    }
    public function getName()
    {
        return $this->_name;
    }
    
    public function setPassword($value = "")
    {
        $this->_password = $value;
    }
    
    public function getPassword()
    {
        return $this->_password;
    }
    
    public function setEmail($value = "")
    {
        $this->_email = $value;
    }
    
    public function getEmail()
    {
        return $this->_email;
    }
    
    public function setAddress($value = "")
    {
        $this->_address = $value;
    }
    
    public function getAddress()
    {
        return $this->_address;
    }
    
    public function setPhone($value = ""){
        $this->_phone = $value;
    }
    
    public function getPhone()
    {
        return $this->_phone;
    }
    
    public function index()
    {
        $this->loadModel("user_model");
        $data['listUser'] = $this->_model->list_user();
        $data['template'] = "user/listUser";
        $this->loadView("layout/layout",$data);
    }
    
    public function insertUser()
    {
        $params = request::getParams();
        if(request::is_Post()){
            $dataUser = $this->setValue($params);
            if($this->checkData($params)){
                $this->loadModel("user_model");
                $this->_model->insert_update_user($dataUser);
                redirect("admin","user","index");
            }
        }
        $data = $this->_error;
        $data['template'] = "user/insertUser";
        $this->loadView("layout/layout",$data);
    }
    
    public function editUser()
    {
        $params = request::getParams();
        $data['id'] = $id = $params['id'];
        $this->loadModel("user_model");
        if(request::is_Post()){
            $dataUser = $this->setValue($params);
            if($this->checkData($params)){
                $objUser = new user_model;
                $objUser->insert_update_user($dataUser,$id);
                redirect("admin","user","index");
            }else{
                $data = $this->_error;
            }    
        }
        $data['editUser'] = $this->_model->GetOnceRecord($id);
        $data['template'] = "user/editUser";
        $this->loadView("layout/layout",$data);
    }
    
    public function deleteUser()
    {
        $id = $_GET['id'];
        $this->loadModel("user_model");
        $this->_model->delete_user($id);
        redirect("admin","user","index");
    }
    
    public function checkData($params = array())
    {
        $flag = true;
        if(!validation::isNull($params['level'])){
            $flag = false;
            $this->_error['errorLevel'] = '<span class="notification-input ni-error">Please select Level!</span>';
        }
        
        if(!validation::isNull($params['username'])){
            $flag = false;
            $this->_error['errorName'] = '<span class="notification-input ni-error">Sorry, try again.</span>';
        }else if(!validation::strLength($params['username'],$this->_strname)){
            $flag = false;
            $this->_error['errorName'] = '<span class="notification-input ni-error">Username must be greater than '.$this->_strname.' characters.</span>';
        }
        
        if($params['action'] == 'insertUser'){
            if(!validation::isNull($params['password'])){
                $flag = false;
                $this->_error['errorPassword'] = '<span class="notification-input ni-error">Sorry, try again.</span>';
            }else if($params['password'] != $params['re-password']){
                    $flag = false;
                    $this->_error['errorPassword'] = '<span class="notification-input ni-error">Two passwords are not the same.</span>';
            }
        }else{
            if($this->getPassword()) {
                if($params['password'] != $params['re-password']){
                    $flag = false;
                    $this->_error['errorPassword'] = '<span class="notification-input ni-error">Two passwords are not the same.</span>';
                }
            }   
        }
        if(!validation::isNull($params['email'])){
            $flag = false;
            $this->_error['errorEmail'] = '<span class="notification-input ni-error">Sorry, try again.</span>';
        }
        
        if(!validation::isNull($params['address'])){
            $flag = false;
            $this->_error['errorAddress'] = '<span class="notification-input ni-error">Sorry, try again.</span>';
        }
        
        if(!validation::isNull($params['phone'])){
            $flag = false;
            $this->_error['errorPhone'] = '<span class="notification-input ni-error">Sorry, try again.</span>';
        }else if(!validation::isNumber($params['phone'])){
            $flag = false;
            $this->_error['errorPhone'] = '<span class="notification-input ni-error">Phone is not a number.</span>';
        }
        return $flag;
    }
    
    public function setValue($params = array())
    {
        //$dataUser = array();
        $this->setLevel($params['level']);
        $this->setName($params['username']);
        $this->setPassword($params['password']);
        $this->setEmail($params['email']);
        $this->setAddress($params['address']);
        $this->setPhone($params['phone']);
        $dataUser = array(
                                "level"   =>$this->getLevel(),
                                "name"    =>$this->getName(),
                                "email"   =>$this->getEmail(),
                                "address" =>$this->getAddress(),
                                "phone"   =>$this->getPhone()
                            );
        if($this->getPassword()){
            $dataUser['password'] = $this->getPassword();
        }
        return $dataUser;
    }
}