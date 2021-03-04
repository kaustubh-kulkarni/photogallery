<?php


class Db_object {
     protected static $db_table = "users";
     //Late static binding
     //Method to find all users
     public static function find_all(){
        return static::find_this_query("SELECT * FROM " . static::$db_table . "");
     }
     //Method to find user by ID
     public static function find_by_id($user_id){
         global $database;
         $the_result_array = static::find_this_query("SELECT * FROM " . static::$db_table . " WHERE id=$user_id LIMIT 1");
         return !empty($the_result_array) ? array_shift($the_result_array) : false;
     }
     //Simplified query strings
    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        $user_object_array = array();

        while($row = mysqli_fetch_array($result_set)){
            $user_object_array[] = static::instantiation($row);

        }
        return $user_object_array;
    }

    public static function instantiation($the_record){
        $calling_class = get_called_class();
        $user_object = new $calling_class;
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
    //Check properties of objects
    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);
        // Check whether attribute exists in output array
        return array_key_exists($the_attribute, $object_properties);
    }
}



?>