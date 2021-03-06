<?php include "includes/admin_header.php"; ?>
<?php include "functions.php"; ?>
<?php
if (isset($_SESSION['username'])){

    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '$username' ";

    $select_user_profile = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_profile)){

        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
       // $user_image = $row['user_image'];
        $user_role = $row['user_role'];

    }

}
if(isset($_POST['update_profile'])) {

    $username = $_POST['username'];
    $user_password =$_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];


    $query = "UPDATE users SET  ";
    $query .= "username = '$username' , ";
    $query .= "user_password = '{user_password}' , ";
    $query .= "user_firstname = '{$user_firstname}' , ";
    $query .= "user_lastname = '{$user_lastname}' , ";
    $query .= "user_email = '{$user_email}' , ";
    $query .= "user_role = '{$user_role}'  ";
    $query .= "WHERE username = '$username' ";

    $query_update_user = mysqli_query($connection, $query);

    confirm($query_update_user);


}

?>

<?php
/*if(isset($_POST['update_profile'])) {

    $username = $_POST['username'];
    $user_password =$_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];


    $query = "UPDATE users SET  ";
    $query .= "username = '$username' , ";
    $query .= "user_password = '{user_password}' , ";
    $query .= "user_firstname = '{$user_firstname}' , ";
    $query .= "user_lastname = '{$user_lastname}' , ";
    $query .= "user_email = '{$user_email}' , ";
    $query .= "user_role = '{$user_role}'  ";
    $query .= "WHERE username = '$username' ";

    $query_update_user = mysqli_query($connection, $query);

    confirm($query_update_user);


}
*/?>



<div id="wrapper">


    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcome
                        <small>
                            <?php
                              echo $_SESSION['username'];
                            ?>
                        </small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="title">Firstname</label>
                            <input type="text" value="<?php  echo $user_firstname; ?>" class="form-control" name="user_firstname">
                        </div>

                        <div class="form-group">
                            <label for="post_author">Lastname</label>
                            <input type="text" value="<?php  echo $user_lastname; ?>" class="form-control" name="user_lastname">
                        </div>

                        <div class="form-group">

                            <select name = "user_role" id="">
                                <option value="subscriber"><?php echo $user_role; ?> </option>
                                <?php
                                if ($user_role == 'admin'){
                                    echo "<option value='subscriber'>Subscriber</option>";
                                }
                                else{
                                    echo "<option value='admin'>admin</option>";
                                }
                                ?>


                            </select>
                        </div>

                        <div class="form-group">
                            <label for="post_status">Username</label>
                            <input type="text" value="<?php  echo $username; ?>" class="form-control" name="username">
                        </div>

                        <!--<div class="form-group">
                            <label for="post_image">Post Image</label>
                            <input type="file" name="post_image">
                        </div>-->

                        <div class="form-group">
                            <label for="post_tags">Email</label>
                            <input type="text" value="<?php  echo $user_email; ?>" class="form-control" name="user_email">
                        </div>



                        <div class="form-group">
                            <label for="post_content">Password</label>
                            <input type="password" value="<?php  echo $user_password; ?>" class="form-control" name="user_password">
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">
                        </div>
                    </form>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/admin_footer.php"; ?>
