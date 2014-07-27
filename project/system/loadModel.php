<?php
/**
 * Class name: loadModel
 * Author: ChungND
 */
class loadModel
{
    public function __construct($name_model = "")
    {
        if($name_model == ""){
            return false;
        }
        $params = $_REQUEST;
        $arrayUrl = array();
        $url = "";
        $arrayUrl['modules'] = isset($params['module']) && $params['module'] != "" ? $params['module'] : "admin";
        foreach($arrayUrl as $key=>$value){
            $url .= $key."/".$value."/";
        }
        $url = APPLICATION_PATH.$url."models/".$name_model.".php";
        require($url);
    }
}