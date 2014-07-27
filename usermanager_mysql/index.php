<?php
require('config.php');
require('database.php');
require("modules/user/user_class.php");
$action = isset($_GET['action']) && $_GET['action'] != null ? $_GET['action'] : "";
switch($action)
{
    case "insertuser": require_once("modules/user/insertuser.php"); break;
    case "updateuser": require_once("modules/user/updateuser.php"); break;
    case "deleteuser": require_once("modules/user/deleteuser.php"); break;
    default: require_once("modules/user/listuser.php"); break;
}