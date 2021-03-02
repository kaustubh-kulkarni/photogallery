<?php
//User class
class User {
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
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
    //Check properties of objects
    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);
        // Check whether attribute exists in output array
        return array_key_exists($the_attribute, $object_properties);
    }

    protected function properties(){
        $properties = array();
        foreach (self::$db_table_fields as $db_field) {
            if(property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }


    //To check if the user exists or not
    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }
        
    //To create users
    public function create() {
        global $database;

        $properties = $this->properties();
        //Imploding the keys of the array
        $sql = "INSERT INTO ". self::$db_table . "(" . implode(",", array_keys($properties)) .")";
        $sql .= "VALUES ('". implode("','", array_values($properties))  ."')";
      

        if($database->query($sql)){
            $this->id = $database->the_insert_id();
            return true;

        } else {
            return false;
        }
        

    }
    //To update users
    public function update(){
        global $database;
        $properties = $this->properties();
        $properties_pairs = array();
        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }
        //Updating the database
        $sql = "UPDATE ". self::$db_table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($sql);
        //Pre built function of mysqli
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    public function delete(){
        global $database;
        //Deleting from the database
        $sql = "DELETE FROM ". self::$db_table . " ";
        $sql .= "WHERE id=" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    }

}


?>