<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Blank Page
                <small>Subheading</small>
            </h1>

            <?php
                //Query
                $sql = "SELECT * FROM users WHERE id=1";
                //Query method from database class
                $result =  $database->query($sql);
                //Fetching the result and storing into user_found
                $user_found = mysqli_fetch_array($result);
                //printing the result
                echo $user_found['username'];
            ?>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
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
