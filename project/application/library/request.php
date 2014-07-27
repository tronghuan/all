<?php
/**
 * Class name: request
 * Author: ChungND
 */
class request
{
    static function is_Post()
    {
        $flag = false;
        if($_POST){
            $flag = true;
        }
        return $flag;
    }
    
    static function getParams($name = "")
    {
        if($name != "" || !isset($name)){
            $params = $_REQUEST[$name];
        }else{
            $params = $_REQUEST;
        }
        return $params;
    }    
}