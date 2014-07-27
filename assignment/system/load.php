<?php
class load 
{
    public function __construct()
    {
        
        $module = isset($_REQUEST['module'])  && $_REQUEST['module'] != null ? $_REQUEST['module'] : "default";
        $controller = isset($_REQUEST['module'])  && $_REQUEST['controller'] != null ? $_REQUEST['controller'] : "student";
        $action = isset($_REQUEST['action'])  && $_REQUEST['action'] != null ? $_REQUEST['action'] : "listStudent";
        $url = "application/modules/$module/controllers/$controller";
        require("$url.php");
        $obj = new $controller;
        $obj->$action();
    }
}