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

            //    $user->username = "Dhanashree";
            //    $user->password = "123";
            //    $user->first_name = "Dhanashree";
            //    $user->last_name = "Awadhani";

            //    $user->create();

            $user = User::find_user_by_id(2);
            $user->last_name = "Williams";

            $user->update();

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
