<?php include("includes/header.php"); ?>

<?php   
    //Find all photos
    $photos = Photo::find_all();


?>

<div class="row">
    <!-- Blog Entries Column -->
    <div class="col-md-12">
        <div class="thumbnails row">
        <?php  foreach ($photos as $photo): ?>
                <div class="col-xs-6 col-md-3">
                    <a class="thumbnail" href="">
                        <img class="homepage_photo" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                    </a>
                </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>
    <!-- /.row -->
<?php include("includes/footer.php"); ?>