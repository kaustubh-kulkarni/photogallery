<?php

require_once("new_config.php");

class Database {
    //To have access outside this class
    public $connection;
    //Open the connection automatically
    function __construct()
    {
        $this->open_db_connection();
    }
    //Create method to open up connection
    public function open_db_connection() {   
        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if(mysqli_connect_errno()){
            die("Database connection failed" . mysqli_error($this->connection));
        }
    }

}
//Variable to access Database class
$database = new Database();


?>