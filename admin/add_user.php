<?php include("includes/header.php"); ?>
<?php //If user is not signed in 
if (!$session->is_signed_in()) {
    redirect("login.php");
} ?>
<?php
//If dont have an ID redirect

// $user = User::find_by_id($_GET['id']);
// if (isset($_POST['update'])) {
//     if ($user) {
//         $user->title = $_POST['title'];
//         $user->caption = $_POST['caption'];
//         $user->description = $_POST['description'];
//         $user->alternate_text = $_POST['alternate_text'];

//         $user->save();
//     }
// }




// $users = user::find_all();

?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php include("includes/top_nav.php") ?>
    <?php include("includes/side_nav.php") ?>
</nav>
<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Users
                    <small>Subheading</small>
                </h1>

                <!-- Form control -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control">
                        </div>
                    </div>
                </form>



            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<?php include("includes/footer.php"); ?>