<?php
//forward or backword slash (DIrectory separator) C:\xampp\htdocs\gallery
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
//Path to our project file
defined('SITE_ROOT') ? null : define('SITE_ROOT','C:' . DS . 'xampp' . DS . 'htdocs' . DS . 'gallery');
//Defining includes path
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS . 'includes');

//Including classes that we have.
require_once(INCLUDES_PATH.DS."functions.php");
require_once(INCLUDES_PATH.DS."new_config.php");
require_once(INCLUDES_PATH.DS."database.php");
require_once(INCLUDES_PATH.DS."db_object.php");
require_once(INCLUDES_PATH.DS."user.php");
require_once(INCLUDES_PATH.DS."photo.php");
require_once(INCLUDES_PATH.DS."session.php");
require_once(INCLUDES_PATH.DS."comment.php");
require_once(INCLUDES_PATH.DS."paginate.php");

?>