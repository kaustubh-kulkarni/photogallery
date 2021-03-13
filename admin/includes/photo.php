<?php

class Photo extends Db_object {
    //Properties for photos table
    protected static $db_table = "photos";
    protected static $db_table_fields = array('id', 'title','caption','description', 'filename','alternate_text' , 'type', 'size');
    public $id;
    public $title;
    public $caption;
    public $description;
    public $filename;
    public $alternate_text;
    public $type;
    public $size;
    
    //Temporary path for images to move 
    public $tmp_path;
    public $upload_directory = "images";
    // public $errors = array();
    // public $upload_errors_array = array (
    //     UPLOAD_ERR_OK => "There is no error",
    //     UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload max filesize limit",
    //     UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the max filesize limit",
    //     UPLOAD_ERR_PARTIAL => "PARTIAL ERROR",
    //     UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded",
    //     UPLOAD_ERR_NO_FILE => "No file was uploaded",
    //     UPLOAD_ERR_NO_TMP_DIR => "Missing Temporary folder",
    //     UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
    //     UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload"
    //     );

    // This is passing $_FILES['uploaded_file'] as an argument
    public function set_file($file){

        if(empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "There was no file uploaded here";
            return false;
        } elseif($file['error'] !=0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {
            //$file is same as $_FILES and basename will clean the name
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
        
    }

    public function picture_path() {
        return $this->upload_directory.DS.$this->filename;
    }

    //Function to save the uploaded photo
    public function save() {
        //Error checking
        if($this->id){
            $this->update();
        } else {
            if(!empty($this->errors)){
                return false;
            }
            if(empty($this->filename) || empty($this->tmp_path)) {
                $this->errors[] = "The file was not available";
                return false;
            }
            $target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

            if(file_exists($target_path)) {
                $this->errors[] = "The file {$this->filename} already exists";
                return false;
            }

            //Predefined function to move the uploaded file
            if(move_uploaded_file($this->tmp_path, $target_path)) {
                if($this->create()) {
                    unset($this->tmp_path);
                    return true;
                }
            } else {
                $this->errors[] = "The file directory does not have permission";
                return false;
            }
        }
    }
    //Delete file from database and from server
    public function delete_photo(){
        if($this->delete()) {
            $target_path = SITE_ROOT. DS . 'admin' . DS . $this->picture_path();
            //Unlink is predefined function in php which will delete the file
            return unlink($target_path) ? true : false;   
        } else {
            return false;
        }
    }
}




?>