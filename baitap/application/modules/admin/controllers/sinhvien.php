<?php
class sinhvien extends MY_Controller
{
    protected $_error = array();
    public function __construct()
    {
       $this->loadModel("sinhvien_model");
    }
    public function index()
    {
        $data['listSinhvien'] = $this->model->listSinhvien();
        $this->loadView("sinhvien/listsinhvien",$data);
    }
    public function insert()
    {
        $params = $_REQUEST;
        if(isset($_POST['btnok'])){
            if($this->checkData($params)){
                $sinhvienInsert = array(
                                "username"=>$params['txtname'],
                                "email"=>$params['txtemail'],
                                "address"=>$params['txtaddress'],
                                "phone"=>$params['txtphone'],
                                "gender"=>$params['gender'],
                                "country"=>$params['country']
                              );
                $this->model->insertSinhvien($sinhvienInsert);
                // chu y sua
                header("location:/day4/baitap/index.php?module=admin&controller=user&action=index");
            }
        }      
        $data = $this->_error;  
        $data['title'] = "Them sinh vien";
        $this->loadView("sinhvien/insertsinhvienr",$data);
    }
    
    public function delete()
    {
        $id = $_GET['id'];
        $this->model->deleteSinhvien($id);
        // chu y sua
        header("location:/day4/baitap/index.php?module=admin&controller=user&action=index");
    }
    private function checkData($params)
    {
        $flag = true;
        $dataEmail = array();
        if(isset($params['email']) && $params['email']){
            foreach($params['email'] as $value){
                $dataEmail[] = $value['email'];
            }
        }

        if(isset($_POST['btnok'])){
            if($_POST['name'] == ""){
                $errorName = "vui long nhap ten";
            } else {
                $name = $_POST['name'];
            }

            if($_POST['email'] == ""){
                $errorEmail = "vui long nhap email";
            } elseif (in_array(trim($_POST['email']), $dataEmail)){
                $errorEmail = "Email da ton tai";
            } else {
                $email = $POST['email'];
            }

            if($_POST['address'] == ""){
                $errorAddress = "Vui long nhap address";
            } else{
                $address = $_POST['address'];
            }

            if($_POST['phone'] == ""){
                $errorPhone ="Nhap so phone";
            } else {
                $phone = $_POST['phone'];
            }

            if($_POST['gender'] == ""){
                $errorgender = "Vui long chon gender";
            } else{
                $gender = $_POST['gender'];
            }

            if($_POST['country'] == ""){
                $errorcountry = "Vui long nhap country";
            } else{
                $country = $_POST['country'];
            }
        }        
    }
}