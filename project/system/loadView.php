<?php
/**
 * Class name: loadView
 * Author: ChungND
 */
class loadView
{
    public function __construct($name_view = "",$data = array())
    {
        if($name_view == ""){
            return false;
        }
        $params = $_REQUEST;
        $arrayUrl = array();
        $url = "";
        $arrayUrl['modules'] = isset($params['module']) && $params['module'] != "" ? $params['module'] : "admin";
        foreach($arrayUrl as $key=>$value){
            $url .= $key."/".$value."/";
        }
        $url = APPLICATION_PATH.$url."views/".$name_view.".php";
        foreach($data as $key=>$value){
            $$key = $value;
        }
        require($url);
    }
}