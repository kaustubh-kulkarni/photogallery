<?php
//Session class which will control login
//This class is available everytime the application is on
class Session {

    private $signed_in = false;
    public $user_id;

//Instantiation
function __construct()
{
    //Start the session
    session_start();
    $this->check_the_login();
}

//Get value from class and check(Getter function)
public function is_signed_in(){
    return $this->signed_in;
}

//Function to login the user
public function login($user){
    if($user){
        //Get user_id from session and assign it to user
        $this->user_id = $_SESSION['user_id'] = $user->id;
        $this->signed_in = true;
    }

}

//Function to logout the user
public function logout(){
    unset($_SESSION['user_id']);
    unset($this->user_id);
    $this->signed_in = false;
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