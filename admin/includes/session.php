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

private function check_the_login(){
    //Check if there is user id on session
    if(isset($_SESSION['user_id'])){
        //Give the session that value
        $this->user_id = $_SESSION['user_id'];
        $this->signed_in = true;
    } else {
        //Unset the values and make sign in false
        unset($this->user_id);
        $this->signed_in = false;

    }

}


}

$session = new Session();



?>