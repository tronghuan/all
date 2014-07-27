<?php
/**
 * Class name: helper
 * Author: ChungND
 */
    function redirect($module = "",$controller= "",$action = "") {
        if($module == "")
        {
                return false;
        }
        if($action == ""){
                header("location:index.php?module=$module&controller=$controller");
        }else{
            header("location:index.php?module=$module&controller=$controller&action=$action");
        }
    }
    function setValue($name = "",$value = "", $flag = "checked"){
        if($name == "") {
            return false;
        }
        $return = "";
        if(isset($_POST)) {
            if($value && $flag) {
                    if(isset($_POST[$name]) &&  $_POST[$name] == $value) {
                        if($flag == "selected") {
                            $return = "selected='selected'";
                        } else {
                            $return = "checked='checked'";
                        }   
                    }  
                }else{
                    if(isset($_POST[$name]) && $_POST[$name] != null) {
                        $return = $_POST[$name];
                    }
            }
        }
        echo $return;
    }
    
    function debug($data = array())
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
