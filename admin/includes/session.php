<?php
//Session class which will control login
//This class is available everytime the application is on
class Session {

    private $signed_in;
    public $user_id;

//Instantiation
function __construct()
{
    //Start the session
    session_start();
}


}

$session = new Session();



?>