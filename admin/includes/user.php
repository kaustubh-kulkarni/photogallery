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
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE id=$user_id LIMIT 1");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
    //Simplified query strings
    public static function find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);
        $user_object_array = array();

        while($row = mysqli_fetch_array($result_set)){
            $user_object_array[] = self::instantiation($row);

        }
        return $user_object_array;
    }

    public static function verify_user($username, $password){
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);
        //Getting username and pass from DB
        $sql = "SELECT * FROM users WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

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

    public function create() {
        global $database;

        $sql = "INSERT INTO users (username, password, first_name. last_name)";
        $sql .= "VALUES ('";
        $sql .= $database->escape_string($this->username) . "', '";
        $sql .= $database->escape_string($this->password) . "', '";
        $sql .= $database->escape_string($this->first_name) . "', '";
        $sql .= $database->escape_string($this->last_name) . "')";

    }

}


?>