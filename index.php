<?php include("includes/header.php"); ?>

<?php   
    //Find all photos
    $photos = Photo::find_all();


?>

<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-12">
        <?php  foreach ($photos as $photo): ?>
            <div class="thumbnail row">
                <div class="col-xs-6 col-md-3">
                    <a class="thumbnail" href="">
                        <img src="" alt="">
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /.row -->
<?php include("includes/footer.php"); ?>