<?php
//Session class which will control login
//This class is available everytime the application is on
class Session {

    private $signed_in = false;
    public $user_id;
    public $message;
    public $count;

//Instantiation
function __construct()
{
    //Start the session
    session_start();
    $this->visitor_count();
    $this->check_the_login();
    $this->check_message();
}

//Check visitor count
public function visitor_count(){
    if(isset($_SESSION['count'])){
        return $this->count = $_SESSION['count']++;
    } else {
        return $_SESSION['count'] = 1;
    }

}
//Method for message
public function message($msg=""){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    } else {
        return $this->message;
    }
}

//Method to check message
private function check_message(){
    if(isset($_SESSION['message'])){
        $this->message = $_SESSION['message'];
        unset($_SESSION['message']);
    } else {
        $this->message = "";
    }
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
$message = $session->message();



?>