<?php
//User class
class User {
    //Method to find all users
    public static function find_all_users(){
       return self::find_this_query("SELECT * FROM users");
    }
    //Method to find user by ID
    public static function find_user_by_id($user_id){
        global $database;
        $result_set = self::find_this_query("SELECT * FROM users WHERE id=$user_id LIMIT 1");
        $found_user = mysqli_fetch_array($result_set);
        return $found_user;
    }
    //Simplified query strings
    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        return $result_set;
    }

}


?>