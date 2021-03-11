<?php include("includes/header.php"); ?>
<?php //If user is not signed in 
if(!$session -> is_signed_in()){redirect("login.php");}?>

<?php

//If not photo id then redirect
if(empty($_GET['id'])){
    redirect("users.php");
}
//Instanciate with Photo class
$user = User::find_by_id($_GET['id']);

if($user){
    $user->delete();
    redirect("users.php");
} else {
    redirect("users.php");
}

?>