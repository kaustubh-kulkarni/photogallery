<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Blank Page
                <small>Subheading</small>
            </h1>
            <?php
               $photo = new Photo();

               $photo->title = "Testing photo title";
               $photo->size = 20;

               $photo->create();

            // $user = User::find_user_by_id(7);
            // $user->last_name = "Williams";

            // $user->update();

            // $user = User::find_user_by_id(6);
            // $user->password = "dhanashree";
            // $user->save();
            // $user = User::find_user_by_id(6);
            // $user->delete();
            $photos = Photo::find_all();
            foreach ($photos as $photo) {
                echo $photo->title . "<br>";
            }
            ?>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
