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
    redirect("photo_comment.php?id={$comment->photo_id}");
} else {
    redirect("photo_comment.php?id={$comment->photo_id}");
}

?>