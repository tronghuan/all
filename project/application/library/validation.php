<?php
/**
 * Class name: validation
 * Author: ChungND
 */
final class validation
{
    static function isNull($name = "")
    {
        $flag = true;
        if($name == ""){
            $flag = false;
        }
        return $flag;
    }
    
    static function isNumber($name = "")
    {
        $flag = false;
        if(is_numeric($name)){
            $flag = true;
        }
        return $flag;
    }
    
    static function strLength($name = "",$min_length = "")
    {
        if($name == "" || $min_length == ""){
            return false;
        }
        $flag = false;
        if(strlen($name) > $min_length){
            $flag = true;
        }
        return $flag;
    }
}