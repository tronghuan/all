<?php
/**
 * Class name: loadController
 * Author: ChungND
 */
class loadController
{
    public function __construct()
    {
        $params = $_REQUEST;
        if(empty($params)){
            $params['controller'] = "";
        }
        $arrayUrl = array();
        $url = "";
        $arrayUrl['modules'] = isset($params['module']) && $params['module'] != "" ? $params['module'] : "admin";
        $arrayUrl['controllers'] = isset($params['controller']) && $params['controller'] != "" ? $params['controller'] : "admin";
        $action = isset($params['action']) && $params['action'] != "" ? $params['action'] : "index";
        foreach($arrayUrl as $key=>$value){
            $url .= $key."/".$value."/";
        }
        $url = APPLICATION_PATH.substr($url,0,-1).".php";
        require($url);
        if($params['controller'] != ""){
            $objController = new $params['controller'];
            $objController->$action();
        }
    }
}