<?php
    require("application/config/config.php");
    require("application/config/database_config.php");
    require("application/helpers/myhelper.php");
    require("system/loadController.php");
    require("system/loadView.php");
    require("system/loadModel.php");
    require("system/helper.php");
    require("system/activerecord/db.php");
    require("system/activerecord/MY_Model.php");
    require("system/MY_Controller.php");
    require("application/library/request.php");
    require("application/library/validation.php");
    require("application/library/recursion.php");
    $objLoad = new loadController;