<!-- Autoload function -->


<?php


function classAutoLoader($class){
    //Lowercase the class
    $class = strtolower($class);
    //Path for the class
    $the_path = "includes/{$class}.php";
    //If the path exists then add it
    if(is_file($the_path) && !class_exists($class)) {
        require_once($the_path);
    } else {
        die("This file named {$class}.php was not found");
    }
}

spl_autoload_register('classAutoLoader');


?>