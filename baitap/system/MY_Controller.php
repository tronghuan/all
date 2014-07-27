<?php
class MY_Controller
{
    protected $model;
    public function loadView($url,$data = array()){
        $module = isset($_REQUEST['module'])  && $_REQUEST['module'] != null ? $_REQUEST['module'] : "admin";
        $controller = isset($_REQUEST['module'])  && $_REQUEST['controller'] != null ? $_REQUEST['controller'] : "index";
        $url = "application/modules/$module/views/$url.phtml";
        foreach($data as $key=>$value)
        {
            $$key = $value;
        }
        require_once($url);
        
    }
    public function loadModel($model_name = "")
    {
        if($model_name == "")
        {
            return false;
        }
        $module = isset($_REQUEST['module'])  && $_REQUEST['module'] != null ? $_REQUEST['module'] : "admin";
        $url = "application/modules/$module/models/$model_name.php";
        require_once($url);
        $this->model = new $model_name;
    }
}