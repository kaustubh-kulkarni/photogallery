<?php include("includes/header.php"); ?>
<?php //If user is not signed in 
if(!$session -> is_signed_in()){redirect("login.php");}?>

<?php

//If not photo id then redirect
if(empty($_GET['id'])){
    redirect("comments.php");
}
//Instanciate with Photo class
$comment = Comment::find_by_id($_GET['id']);

if($comment){
    $comment->delete();
    $session->message("The comment by {$comment->author} has been deleted");
    redirect("comments.php");
} else {
    redirect("comments.php");
}

?>