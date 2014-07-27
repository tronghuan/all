<?php
class student extends MY_Controller
{   protected $_error = array();
    public function listStudent()
    {   
        $this->loadModel("student_model");
        $data['listStudent'] = $this->model->listStudent();
        $numPage = ceil (count($data['listStudent'])/5);
        $this->loadLibrary("pagination");
        $dataArr['listStudent'] = $this->library->startPaginate($data['listStudent']);
        $dataArr['numPage'] = $numPage;
        $this->loadView("student/list",$dataArr);
    }   
    public function insertStudent()
    {   
        $params = $_REQUEST;
        if(isset($_POST['btnok'])){
            if($this->checkData($params)){
                $studentInsert = array(
                                "name"=>$params['txtname'],
                                "email"=>$params['txtemail'],
                                "address"=>$params['txtaddress'],
                                "phone"=>$params['txtphone'],
                                "gender"=>$params['gender'],
                                "country"=>$params['txtcountry'],
                              );
                $this->model->insertStudent($studentInsert);
               header("location:/day4/assignment/"); 
            }
        }      
        $data = $this->_error;  
        $data['title'] = "Them user";
        $this->loadView("student/insertStudent",$data);
        
        //header("location:/day4/assignment/");     
    }
    public function updateStudent()
    {
        $id = $_GET['id'];
        $this->loadModel("student_model");
        $data = $this->model->detailStudent($id);
        
        $params = $_REQUEST;
        if(isset($_POST['btnok'])){
        if($this->checkDataUpdate($params)){
                $studentInsert = array(
                                "id"=>$id,
                                "name"=>$params['txtname'],
                                "email"=>$params['txtemail'],
                                "address"=>$params['txtaddress'],
                                "phone"=>$params['txtphone'],
                                "gender"=>$params['gender'],
                                "country"=>$params['txtcountry'],
                                
                              );
                $this->model->updateStudent($studentInsert);
               header("location:/day4/assignment/"); 
            }
        }
        $data['error'] = $this->_error; 
        $this->loadView("student/updateStudent",$data); 
       
    }
    public function deleteStudent()
    {   
        $id = $_GET['id'];
        $this->loadModel("student_model");
        $this->model->deleteStudent($id);
            header("location:/day4/assignment/default/student/listStudent");
    }
    private function checkData($params)
    {
        $flag = true;
        if(!isset($params['txtname']) || $params['txtname'] == ""){
            $this->_error['errorName'] = "Vui long nhap ten "; 
            $flag = false;
        }
        if(!isset($params['txtaddress']) || $params['txtaddress'] == ""){
            $this->_error['errorAddress'] = "Vui long nhap dia chi"; 
            $flag = false;
        }
        if(!isset($params['txtphone']) || $params['txtphone'] == ""){
            $this->_error['errorPhone'] = "Vui long nhap sdt"; 
            $flag = false;
        }
        if(!isset($params['txtcountry']) || $params['txtcountry'] == ""){
            $this->_error['errorCountry'] = "Vui long nhap ten nuoc"; 
            $flag = false;
        }
        if(!isset($params['gender']) || $params['gender'] == ""){
            $this->_error['errorGender'] = "Vui long nhap gioi tinh"; 
            $flag = false;
        }
        if(!isset($params['txtemail']) || $params['txtemail'] == ""){
            $this->_error['errorEmail'] = "Vui long nhap email"; 
            $flag = false;
        }
        $this->loadModel("student_model");
        $data['listStudent'] = $this->model->listStudent();
        foreach($data['listStudent'] as $key=>$value){
            if ($value['email']==$params['txtemail']){
                $this->_error['errorEmail'] = "Mail da ton tai";
                $flag=false;
                break;
            }
        }
        return $flag;
    }
    private function checkDataUpdate($params)
    {
        $flag = true;
        if(!isset($params['txtname']) || $params['txtname'] == ""){
            $this->_error['errorName'] = "Vui long nhap ten "; 
            $flag = false;
        }
        if(!isset($params['txtaddress']) || $params['txtaddress'] == ""){
            $this->_error['errorAddress'] = "Vui long nhap dia chi"; 
            $flag = false;
        }
        if(!isset($params['txtphone']) || $params['txtphone'] == ""){
            $this->_error['errorPhone'] = "Vui long nhap sdt"; 
            $flag = false;
        }
        if(!isset($params['txtcountry']) || $params['txtcountry'] == ""){
            $this->_error['errorCountry'] = "Vui long nhap ten nuoc"; 
            $flag = false;
        }
        if(!isset($params['gender']) || $params['gender'] == ""){
            $this->_error['errorGender'] = "Vui long nhap gioi tinh"; 
            $flag = false;
        }
        if(!isset($params['txtemail']) || $params['txtemail'] == ""){
            $this->_error['errorEmail'] = "Vui long nhap email"; 
            $flag = false;
        }
        $this->loadModel("student_model");
        $data['listStudent'] = $this->model->listStudent();
        foreach($data['listStudent'] as $key=>$value){
                if ($value['email']==$params['txtemail']&&$value['id']!=$_GET['id']){
                    $this->_error['errorEmail'] = "Mail da ton tai";
                    $flag=false;
                    break;
                }
        }
        return $flag;
    }
}