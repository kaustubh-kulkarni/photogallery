<?php
//User class
class User {
    //Method to find all users
    public function find_all_users(){
        //Using database class globally
        global $database;
        //Querying all the users
        $result_set = $database->query("SELECT * FROM users");
        return $result_set;

    }

}


?>