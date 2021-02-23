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
    //sql is variable to call query from
    public function query($sql) {
        //first parameter is connection and second will be query
        $result = mysqli_query($this->connection, $sql);
        if(!$result){
            die("Query failed!");
        }

        return $result;
    }

}
//Variable to access Database class
$database = new Database();


?>