<?php include("includes/header.php"); ?>
<?php //If user is not signed in 
if(!$session -> is_signed_in()){redirect("login.php");}?>

<?php

//If not photo id then redirect
if(empty($_GET['photo_id'])){
    redirect("photos.php");
}
//Instanciate with Photo class
$photo = Photo::find_by_id($_GET['photo_id']);

if($photo){
    $photo->delete_photo();
} else {
    redirect("photos.php");
}

?>