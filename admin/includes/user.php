<?php
//User class
class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

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

    public static function instantiation($the_record){
        $user_object = new self;
        // $user_object->id = $found_user['id'];
        // $user_object->username = $found_user['username'];
        // $user_object->password = $found_user['password'];
        // $user_object->first_name = $found_user['first_name'];
        // $user_object->last_name = $found_user['last_name'];

        foreach ($the_record as $the_attribute => $value) {
            if($user_object->has_the_attribute($the_attribute)){
                $user_object->$the_attribute = $value;
                }
            }
        return $user_object;
    }

    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);
        // Check whether attribute exists in output array
        return array_key_exists($the_attribute, $object_properties);
    }

}


?>