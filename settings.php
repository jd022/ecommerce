<?php
include ("connection.php");
session_start();
if (empty($_SESSION['email'])){
    header("location:index.php");
    exit();
}
    $email = $_SESSION['email'];
    $select_userid = "SELECT * FROM `user` WHERE email = '$email'";
    $query_userid = mysqli_query($conn, $select_userid);
    $rows = mysqli_fetch_array($query_userid);
    $user_id = $rows['user_id'];

 include 'includes/header.php';
 include 'includes/nav.php';?>
    <div class="container d-flex justify-content-center">
        <div class="card px-2 mt-5 d-flex flex-row justify-content-evenly" style="border-radius: 0; width: 65em;">
            <div class="row py-4 px-3 w-50">
                <div class="col-12 justify-content-center">
                    <h3 class="p-3 m-2">ACCOUNT SETTINGS<br><hr class="featurette-divider my-0 p-0 mt-1 text-center" style="width:4.5vw; opacity: 1; background: black;border: 1px solid black;"></hr></h3>
                    <div class="row px-5">
                        <div class="col-12 mt-3 py-1 px-4">
                            <a href="settings.php" class="p-0 m-0 text-decoration-none color: text-black" style="font-size: 1.2em;">GENERAL SETTINGS</a>
                            <a href="settings.php?p" class="p-0 m-0 text-decoration-none color: text-black" style="font-size: 1.2em;">PRIVACY</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-divider"></div>
                <div class="row mt-2 py-4 w-75 px-5">
                    <?php 
                    if(isset($_GET['p'])){
                    ?>
                    <h5 class="p-3 px-0 m-0">ACCOUNT PRIVACY</h5>
                    <?php
                    $user_info = "SELECT * FROM user WHERE email = '$email'";
                    $query_user_info = mysqli_query($conn, $user_info);
                    $rows = mysqli_fetch_array($query_user_info);
                    $password = preg_replace("|.|","*",$rows['password']);
                    ?>
                <div class="col-12 mt-3 d-flex justify-content-between">
                    <span>
                        <label for="" class="text-black-50">PASSWORD</label>
                        <h4 style="font-size: 1.3em;"><?php echo substr($password, 0,15)?></h4>
                    </span>
                    <span class="col-2 d-flex align-items-end justify-content-end">
                        <a href="#" class="h4 text-decoration-none color: text-black" style="font-size: 1.4em;" data-bs-toggle="modal" data-bs-target="#password">EDIT</a>

                        <!-- Modal for password -->
                        <div class="modal fade" id="password" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <p class="mt-3 mb-0">Current Password</p>
                                    <input type="password" name="c_password" class="form-control" maxlength="30">

                                    <p class="mt-3 mb-0">New Password</p>
                                    <input type="password" name="password" class="form-control" maxlength="30">

                                    <p class="mt-3 mb-0">Re-enter Password</p>
                                    <input type="password" name="r_password" class="form-control" maxlength="30">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="uPassword" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                            </div>
                        </div>
                        </div>
                    </span>
                    <?php
                    }else{
                    ?>
                    <h5 class="p-3 px-0 m-0">GENERAL SETTINGS</h5>
                    <?php
                    $user_info = "SELECT * FROM user WHERE email = '$email'";
                    $query_user_info = mysqli_query($conn, $user_info);
                    $rows = mysqli_fetch_array($query_user_info);
                    ?>
                <div class="col-12 mt-3 d-flex justify-content-between">
                    <span>
                        <label for="" class="text-black-50">NAME</label>
                        <h4 style="font-size: 1.3em;"><?php echo $rows['first_name'] . " " . $rows['last_name'];?></h4>
                    </span>
                    <span class="col-2 d-flex align-items-end justify-content-end">
                        <a href="#" class="h4 text-decoration-none color: text-black" style="font-size: 1.4em;" data-bs-toggle="modal" data-bs-target="#nameModal">EDIT</a>

                        <!-- Modal for name -->
                        <div class="modal fade" id="nameModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <p class="mb-0">First Name</p>
                                    <input type="text" name="first_name" class="form-control" maxlength="15" value="<?= $rows['first_name']; ?>">
                                    
                                    <p class="mt-3 mb-0">Last Name</p>
                                    <input type="text" name="last_name" class="form-control" maxlength="15" value="<?= $rows['last_name']; ?>">
                                    
                                    <p class="mt-3 mb-0">Confirm Password</p>
                                    <input type="password" name="n_password" class="form-control" maxlength="30">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="u_name" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </span>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <span>
                        <label for="" class="text-black-50">EMAIL</label>
                        <h4 style="font-size: 1.3em;"><?php echo $rows['email'];?></h4>
                    </span>
                    <span class="col-2 d-flex align-items-end justify-content-end">
                        <a href="" class="h4 text-decoration-none color: text-black" style="font-size: 1.4em;" data-bs-toggle="modal" data-bs-target="#emailModal">EDIT</a>
                        <!-- Modal for email -->
                        <div class="modal fade" id="emailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <p class="mb-0">Email</p>
                                    <input type="email" name="email" maxlength="30" class="form-control" value="<?= $rows['email']?>">
                                    <p class="mt-3 mb-0">Confirm Password</p>
                                    <input type="password" name="e_password" class="form-control" maxlength="30">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="u_email" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </span>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <span>
                        <label for="" class="text-black-50">HOME ADDRESS</label>
                        <h4 style="font-size: 1.3em;"><?php echo $rows['address'] . " " . $rows['p_code'] . " " . $rows['brgy_no'];?></h4>
                    </span>
                    <span class="col-2 d-flex align-items-end justify-content-end">
                        <a href="" class="h4 text-decoration-none color: text-black" style="font-size: 1.4em;" data-bs-toggle="modal" data-bs-target="#addressModal">EDIT</a>
                        <!-- Modal for address -->
                        <div class="modal fade" id="addressModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body my-1">
                                <form action="" method="POST">
                                    <p class="mb-0">Address</p>
                                    <textarea name="address" id="" maxlength="50" rows="5" class="form-control" style="resize:none;"><?= $rows['address']?></textarea>
                                    <p class="mt-1 mb-0">Postal Code</p>
                                    <input type="text" name="p_code" class="form-control" value="<?= $rows['p_code']?>" maxlength="30">
                                    <p class="mt-1 mb-0">Brgy no</p>
                                    <input type="text" name="brgy_no" class="form-control" value="<?= $rows['brgy_no']?>" maxlength="30">
                                    <p class="mt-1 mb-0">Confirm Password</p>
                                    <input type="password" name="a_password" class="form-control" maxlength="30">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="u_address" class="btn btn-primary">Save</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </span>
                </div>
                <div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
<?php include 'includes/footer.php';?>
<?php
    if(isset($_POST['u_address'])){
        date_default_timezone_set('Asia/Manila');
		$date_time_updated = date("Y-m-d H:i:s");

        $address = $_POST['address'];
        $p_code = $_POST['p_code'];
        $brgy_no = $_POST['brgy_no'];
        $a_password = $_POST['a_password'];

        $validate_p_code = filter_input(INPUT_POST, 'p_code', FILTER_VALIDATE_FLOAT);

        $validate_brgy_no = filter_input(INPUT_POST, 'brgy_no', FILTER_VALIDATE_FLOAT);

        if(empty($address)){
            echo '<script>alert("Address is required")</script>';
            exit();
        }else if(strlen($address) > 50){
            echo '<script>alert("Address must not be exceeds in 50 characters")</script>';
            exit();
        }else if(empty($p_code)){
            echo '<script>alert("Postal code is required")</script>';
            exit();
        }else if($validate_p_code == false){
            echo '<script>alert("Invalid postal code")</script>';
            exit();
        }else if(empty($brgy_no)){
            echo '<script>alert("Brgy number is required")</script>';
            exit();
        }else if($validate_brgy_no == false){
            echo '<script>alert("Invalid brgy number")</script>';
            exit();
        }else if(empty($_POST['a_password'])){
            echo '<script>alert("Password is required")</script>';
            exit();
        }else{
            $get_address = "SELECT * FROM `user` WHERE email = '$email'";
            $query_address = mysqli_query($conn, $get_address);
            if(mysqli_num_rows($query_address) > 0){
                $rows = mysqli_fetch_array($query_address);
                if(password_verify($a_password, $rows['password'])){
                    $update_address = "UPDATE `user` SET `address` = '$address', `p_code` = '$p_code',
                    `brgy_no` = '$brgy_no', `date_time_updated` = '$date_time_updated'
                    WHERE email = '$email'";
                    $query_address = mysqli_query($conn, $update_address);
                    if($query_address == true){
                        echo '<script>alert("Address has been updated");
                        window.location.href="settings.php"</script>';
                        exit();
                    }else{
                        echo '<script>alert("Something went wrong check address")</script>';
                        exit();
                    }
                }else{
                    echo '<script>alert("Incorrect password")</script>';
                    exit();
                }
            }else{
                echo '<script>alert("Email does not exist")</script>';
                exit();
            }

        }
    }

    if(isset($_POST['u_email'])){
        date_default_timezone_set('Asia/Manila');
		$date_time_updated = date("Y-m-d H:i:s");

        $email = $_POST['email'];
        $e_password = $_POST['e_password'];

        $validate_email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if(empty($email)){
            echo '<script>alert("Email is required")</script>';
            exit();
        }else if(strlen($email) > 50){
            echo '<script>alert("Email must not be exceeds in 50 characters")</script>';
            exit();
        }else if($validate_email == false){
            echo '<script>alert("Invalid email format")</script>';
            exit();
        }else if(empty($_POST['e_password'])){
            echo '<script>alert("Password is required")</script>';
            exit();
        }else{
            $get_email = "SELECT * FROM user WHERE user_id = '$user_id'";
            $query_email = mysqli_query($conn, $get_email);
            if(mysqli_num_rows($query_email) > 0){
                $rows = mysqli_fetch_array($query_email);
                $hashed_pass = $rows['password'];
                if(password_verify($e_password, $hashed_pass)){
                    $update_fullname = "UPDATE `user` SET `email` = '$email', `date_time_updated` = '$date_time_updated'
                    WHERE password = '$hashed_pass'";
                    $query_fullname = mysqli_query($conn, $update_fullname);
                    if($query_fullname == true){
                        echo "<script>alert('Email has been updated, your account will be logout after this message.');
                        window.location.href='logout.php'</script>";
                        exit();
                    }else{
                        echo '<script>alert("Something went wrong check name")</script>';
                        exit();
                    }
                }else{
                    echo '<script>alert("Incorrect password")</script>';
                    exit();
                }
            }else{
                echo '<script>alert("Email does not exist")</script>';
                exit();
            }
        }
    }
    if(isset($_POST['u_name'])){
        date_default_timezone_set('Asia/Manila');
		$date_time_updated = date("Y-m-d H:i:s");

        $first_name = ucwords($_POST['first_name']);
        $last_name = ucwords($_POST['last_name']);
        $n_password = $_POST['n_password'];


        if(empty($first_name)){
            echo '<script>alert("First name is required")</script>';
            exit();
        }else if(strlen($first_name) > 15){
            echo '<script>alert("First name must not be exceeds in 15 characters")</script>';
            exit();
        }else if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
            echo '<script>alert("First name must be letters only")</script>';
            exit();
        }else if(empty($last_name)){
            echo '<script>alert("Last name is required")</script>';
            exit();
        }else if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
            echo '<script>alert("Last name must be letters only")</script>';
            exit();
        }else if(strlen($last_name) > 15){
            echo '<script>alert("Last name must not be exceeds in 15 characters")</script>';
            exit();
        }else if(empty($_POST['n_password'])){
            echo '<script>alert("Password is required")</script>';
            exit();
        }else{
            $get_password = "SELECT * FROM user WHERE email = '$email'";
            $query_password = mysqli_query($conn, $get_password);
            if(mysqli_num_rows($query_password) > 0){
                $rows = mysqli_fetch_array($query_password);
                $hashed_pass = $rows['password'];
                if(password_verify($n_password, $hashed_pass)){
                    $update_fullname = "UPDATE `user` SET `first_name` = '$first_name', 
                    `last_name` = '$last_name', `date_time_updated` = '$date_time_updated'
                    WHERE password = '$hashed_pass'";
                    $query_fullname = mysqli_query($conn, $update_fullname);
                    if($query_fullname == true){
                        echo '<script>alert("Name has been updated");
                        window.location.href="settings.php"</script>';
                        exit();
                    }else{
                        echo '<script>alert("Something went wrong check name")</script>';
                        exit();
                    }
                }else{
                    echo '<script>alert("Incorrect password")</script>';
                    exit();
                }
            }else{
                echo '<script>alert("Email does not exist")</script>';
                exit();
            }
        }

    }
    if(isset($_POST['uPassword'])){
        date_default_timezone_set('Asia/Manila');
		$date_time_updated = date("Y-m-d H:i:s");

        $c_password = $_POST['c_password'];
        $password = $_POST['password'];
        $r_password = $_POST['r_password'];
        

        if(empty($c_password) && empty($_POST['password']) && empty($r_password)){
            echo '<script>alert("Please input the required info")</script>';
            exit();
        }else if(empty($c_password)){
            echo '<script>alert("Please input your current password")</script>';
            exit();
        }else if(empty($_POST['password'])){
            echo '<script>alert("Please input your new password")</script>';
            exit();
        }else if(strlen($_POST['password']) < 8){
            echo '<script>alert("New password must be greater than 8 characters")</script>';
            exit();
        }else if(empty($r_password)){
            echo '<script>alert("Please re-type your password")</script>';
            exit();
        }else if($_POST['password'] != $r_password){
            echo '<script>alert("Password do not match")</script>';
            exit();
        }else{
            $validate_password = "SELECT * FROM `user` WHERE `email` = '$email'";
            $query_password = mysqli_query($conn, $validate_password);
            if(mysqli_num_rows($query_password) > 0){
                $row = mysqli_fetch_array($query_password);
                if(password_verify($c_password, $row['password'])){
                $update_password = "UPDATE `user` SET password = '$password', date_time_updated = '$date_time_updated'
                WHERE email = '$email'";
                $query_update_password = mysqli_query($conn, $update_password);
                    if($query_update_password == true){
                    echo '<script>alert("New password updated");
                    window.location.href="settings.php"</script>';
                    exit();
                    }else{
                        echo '<script>alert("Something went wrong")</script>';
                        exit();
                    }
                }else{
                echo '<script>alert("Incorrect Password")</script>';
                exit();
                }
            }else{
                echo '<script>alert("Email does not exist")</script>';
                exit();
            }
        }
}
?>