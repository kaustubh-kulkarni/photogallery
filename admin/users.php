<?php include("includes/header.php"); ?>
<?php //If user is not signed in 
if (!$session->is_signed_in()) {
    redirect("login.php");
} ?>

<?php

$users = User::find_all();

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
                    users
                    <small>Subheading</small>
                </h1>
                <!-- Table for uploaded images -->
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?php echo $user->id;   ?></td>
                                    <td><img class="admin-user-thumbnail user-image" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
                                    <td><?php echo $user->username;   ?>
                                    <div class="action_link">
                                        <a href="delete_user.php?id=<?php echo $user->id;  ?>">Delete</a>
                                        <a href="edit_user.php?id=<?php echo $user->id;  ?>">Edit</a>
                                        <a href="">View</a>
                                    </div>
                                    </td>
                                    <td><?php echo $user->first_name;   ?></td>
                                    <td><?php echo $user->last_name;   ?></td>
                                </tr>
                            <?php endforeach;   ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

<?php include("includes/footer.php"); ?>