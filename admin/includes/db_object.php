<?php


class Db_object {
    public $errors = array();
    public $upload_errors_array = array (
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload max filesize limit",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the max filesize limit",
        UPLOAD_ERR_PARTIAL => "PARTIAL ERROR",
        UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
        UPLOAD_ERR_NO_FILE => "No file was uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing Temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
        UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload"
        );
     protected static $db_table = "users";
     protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');

     public function set_file($file){

        if(empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif($file['error'] !=0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {
            //$file is same as $_FILES and basename will clean the name
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }
     //Late static binding
     //Method to find all users
     public static function find_all(){
        return static::find_by_query("SELECT * FROM " . static::$db_table . "");
     }
     //Method to find user by ID
     public static function find_by_id($id){
         global $database;
         $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id=$id LIMIT 1");
         return !empty($the_result_array) ? array_shift($the_result_array) : false;
     }
     //Simplified query strings
    public static function find_by_query($sql){
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
        foreach ($the_record as $the_attribute => $value) {
            if($user_object->has_the_attribute($the_attribute)){
                $user_object->$the_attribute = $value;
                }
            }
        return $user_object;
    }
    //Check properties of objects
    private function has_the_attribute($the_attribute){
        //$object_properties = get_object_vars($this);
        // Check whether attribute exists in output array
        return property_exists($this, $the_attribute);
    }

    protected function properties(){
        $properties = array();
        foreach (static::$db_table_fields as $db_field) {
            if(property_exists($this, $db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }
        return $properties;
    }

    protected function clean_properties(){
        global $database;

        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }

     //To check if the user exists or not
     public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }
        
    //To create users
    public function create() {
        global $database;

        $properties = $this->clean_properties();
        //Imploding the keys of the array
        $sql = "INSERT INTO ". static::$db_table . "(" . implode(",", array_keys($properties)) .")";
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
        $properties = $this->clean_properties();
        $properties_pairs = array();
        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }
        //Updating the database
        $sql = "UPDATE ". static::$db_table . " SET ";
        $sql .= implode(", ", $properties_pairs);
        $sql .= " WHERE id= " . $database->escape_string($this->id);

        $database->query($sql);
        //Pre built function of mysqli
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }


    public function delete(){
        global $database;
        //Deleting from the database
        $sql = "DELETE FROM ". static::$db_table . " ";
        $sql .= "WHERE id=" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;

    }

    public static function count_all(){
        global $database;
        $sql = "SELECT COUNT(*) FROM " . static::$db_table;
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);
        return array_shift($row);
    }



}



?>