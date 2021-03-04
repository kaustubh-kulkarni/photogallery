<?php include("includes/header.php"); ?>
<?php //If user is not signed in 
if(!$session -> is_signed_in()){redirect("login.php");}?>

<?php

$photos = Photo::find_all();

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
                    Photos
                    <small>Subheading</small>
                </h1>
                <!-- Table for uploaded images -->
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Id</th>
                                <th>File Name</th>
                                <th>Title</th>
                                <th>Size</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($photos as $photo) : ?>
                            <tr>
                                <td><img src="http://placehold.it/62x62" alt=""></td>
                                <td><?php echo $photo->photo_id;   ?></td>
                                <td><?php echo $photo->filename;   ?></td>
                                <td><?php echo $photo->title;   ?></td>
                                <td><?php echo $photo->size;   ?></td>
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