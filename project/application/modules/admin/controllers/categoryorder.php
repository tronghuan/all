<?php
    const HOSTNAME = "localhost";   
    const USERNAME = "root";
    const PASSWORD = "";
    const DBNAME  = "mockproject";
    $connect = mysql_connect(HOSTNAME,USERNAME,PASSWORD) or die("SERVER DISCONNECT");
    mysql_select_db(DBNAME,$connect);
    $cate_id = $_POST['cate_id'];
    $cate_order = $_POST['cate_order'];
    $sql = "UPDATE tbl_category SET cate_order = '".$cate_order."' WHERE cate_id='".$cate_id."'";
    mysql_query($sql);
    
