<?php
class user extends MY_Controller
{
    protected $_error = array();
    public function __construct()
    {
       $this->loadModel("user_model");
    }
    public function index()
    {
        $data['listUser'] = $this->model->listUser();
        $this->loadView("user/listuser",$data);
    }
    public function insert()
    {
        $params = $_REQUEST;
        if(isset($_POST['btnok'])){
            if($this->checkData($params)){
                $userInsert = array(
                                "username"=>$params['txtname'],
                                "email"=>$params['txtemail'],
                                "address"=>$params['txtaddress'],
                                "phone"=>$params['txtphone'],
                                "gender"=>$params['gender']
                              );
                $this->model->insertUser($userInsert);
            }
        }      
        $data = $this->_error;  
        $data['title'] = "Them user";
        $this->loadView("user/insertUser",$data);
    }
    
    public function delete()
    {
        $id = $_GET['id'];
        $this->model->deleteUser($id);
        header("location:/all/cart_with_mvc/index.php?module=admin&controller=user&action=index");
    }
    private function checkData($params)
    {
        $flag = true;
        if(!isset($params['txtname']) || $params['txtname'] == ""){
            $this->_error['errorName'] = "Vui long nhap ten user"; 
            $flag = false;
        }
        return $flag;
    }
}