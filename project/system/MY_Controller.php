<?php
/**
 * Class name: MY_Controller
 * Author: ChungND
 */
class MY_Controller
{
    public $_model;
    
    public function __construct()
    {
        ob_start();
    }
    
    public function loadView($name_view = "",$data = array())
    {
        if($name_view == ""){
            return false;
        }
        $objView = new loadView($name_view,$data);
    }
    
    public function loadModel($name_model = "")
    {
        $objModel = new loadModel($name_model);
        $this->_model = new $name_model;
    }
}