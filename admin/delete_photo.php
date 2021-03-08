<?php include("includes/header.php"); ?>
<?php //If user is not signed in 
if(!$session -> is_signed_in()){redirect("login.php");}?>

<?php


echo "page created";



?>