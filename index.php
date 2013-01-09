<?php

//load configuration settings
require("appconfig.php");
//load the general classes
require("classes/loader.php");
require("classes/basecontroller.php");
require("classes/basemodel.php");
//load the model classes
require("models/avatar.php");
require("models/home.php");
require("models/add.php");
require("models/user.php");
require("models/process.php");
//load the controller classes
require("controllers/home.php");
require("controllers/add.php");

//create the controller and execute the action
$loader = new Loader($_GET);
$controller = $loader->CreateController();
$controller->ExecuteAction();

?>