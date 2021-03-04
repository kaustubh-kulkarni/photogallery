<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Blank Page
                <small>Subheading</small>
            </h1>
            <?php
            //    $user = new User();

            //    $user->username = "ABC";
            //    $user->password = "123";
            //    $user->first_name = "ABC";
            //    $user->last_name = "ROG";

            //    $user->create();

            // $user = User::find_user_by_id(7);
            // $user->last_name = "Williams";

            // $user->update();

            // $user = User::find_user_by_id(6);
            // $user->password = "dhanashree";
            // $user->save();
            // $user = User::find_user_by_id(6);
            // $user->delete();
            $users = User::find_all();
            foreach ($users as $user) {
                echo $user->username . "<br>";
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
